<?php

// permet de convertir les caractère spéciaux d'un tableau p et retourne le tableau avec les caractères "sécurisés"
function html_check($p) {
	$r = Array();//											on crée un tableau vide
	foreach ($p as $k =>$v) {//								pour chaque clé $k et valeur $v du tableau donné en entrée
		$r[htmlspecialchars($k)] = htmlspecialchars($v);//	  on incrémente notre tableau vide $r avec la clé $k controlée et la valeur $v controlée
	}
	return $r;//											on retourne notre tableau $r
}
// permet de savoir si une option d'un select à été choisie par l'utilisateur. Pas de gestion d'erreur car l'utilisateur ne peut pas changer l'id (BON a moins de modifier le code HTML avec un éditeur mais voila)
function getHTMLSelected($select,$id) {
	if($_POST[$select] == $id)
		return 'selected';
}
// permet de recup les infos + erreur d'un élément du formulaire (sauf pour les select, c'est la fonction en dessus qui s'en occupe)
function getHTMLElements($id,$errors,$add_class = '') {
	$html = '';
	if(isset($_POST[$id]) AND !empty($_POST[$id])) {
		$html .= 'value="'.htmlspecialchars($_POST[$id]).'" ';
	}
	if(isset($errors[$id])) {
		$html .= 'class="error '.$add_class.'"';
	}
	else if(!empty($add_class)) {
		$html .= 'class="'.$add_class.'"';
	}
	return $html;
}
// permet d'afficher les erreurs
function getHTMLErrors($errors) {
	if(empty($errors)) {
		return '';
	}
	else {
		$r = '<div class="error">
			  <h4>Erreur(s):</h4>';
		foreach($errors as $key => $value) {
			$r .= '- '.$value.'<br/>'.PHP_EOL;
		}
		$r .= '</div>';
		return $r;
	}
}
// permet d'afficher les succes
function getHTMLSuccess($get) {
	if(empty($get['success'])) {
		return '';
	}
	else {
		$r = '<div class="success">
			  <h4>Succès:</h4>';
		switch($get['success']) {
			
			case 1:
			  $r .= '- Le film à été ajouté à la base de donnée';
			  break;
			case 2:
			  $r .= '- L\'élément à été ajouté à la base de donnée';
			  break;
		}
		$r .= '</div>';
		return $r;
	}
}
//permet de recupérer les différentes options disponibles et de savoir si une avait déjà été sélectionnée par l'utilisateur précédemment 
function getHTMLOptions($type,$default) {
	$r = '';
	foreach($type as $key => $value) {
	$r .= '<option value="'.$key.'" '.getHTMLSelected($default,$key).'>'.$value.'</option>'.PHP_EOL;
	}
	return $r;	
}
//contôle des erreurs
function checkError(&$errors,$post) {
		if(empty($post['titreOriginal']) OR strlen($post['titreOriginal']) > 255) {
			$errors['titreOriginal'] = 'Titre original vide ou trop long';
		}
		if(!empty($post['titreTraduit']) AND strlen($post['titreTraduit']) > 255) {
			$errors['titreTraduit'] = 'Titre traduit trop long';
		}
		if(empty($post['duree']) OR !is_numeric($post['duree']) OR preg_match('#^.+\..+$#',$post['duree']) OR intval($post['duree']) > 999) {
			$errors['duree'] = 'Durée vide ou format non autorisé (1-999)';
		}
		if(empty($post['dateSortieSuisse']) OR !preg_match('#^(19|20)[0-9]{2}-(0[1-9])|(1[0-2])-([0-2][0-9])|(3[0-1])$#',$post['dateSortieSuisse'])) { //aide pour la regex: https://openclassrooms.com/courses/concevez-votre-site-web-avec-php-et-mysql/les-expressions-regulieres-partie-1-2
			$errors['dateSortieSuisse'] = 'Date vide ou format non autorisé (yyyy-mm-dd)';
		}
		if(empty($post['description'])) {
			$errors['description'] = 'Description vide';
		}
		if(empty($post['accordParental']) OR !is_numeric($post['accordParental']) OR preg_match('#^.+\..+$#',$post['accordParental']) OR intval($post['accordParental']) > 99) {
			$errors['accordParental'] = 'Accord parental vide ou format non autorisé (1-99)';
		}
		foreach(preg_grep('#^prix.$#',array_keys($post)) as $value) {// aide pour faire un foreach avec une regex: openclassrooms et http://php.net/manual/fr/function.preg-grep.php
			if(empty($post[$value]) OR !is_numeric($post[$value])) {
				$errors[$value] = $value.' vide ou format non autorisé';
			}
		}
		foreach(preg_grep('#^role.$#',array_keys($post)) as $value) {
			if(empty($post[$value]) OR strlen($post[$value]) > 255) {
				$errors[$value] = $value.' vide ou trop long';
			}
		}
		if(empty($errors)) return TRUE;
		else return FALSE;
}

/*-------------------------------------------------------DEBUT -------------------------------------------------------*/

include('app/model/addFilm.php');


if(isset($_POST['submit']) OR isset($_POST['submitItem'])) {
	$errors = Array();//						on crée un tableau d'erreur vide
}
// si le formulaire "insérer un (...)" à été remplis
if(isset($_POST['submitItem'])) {
	
	$item = array();
	if(isset($_POST['insertGenre'])) {
		if(empty($_POST['insertGenre']))
			$errors['insertGenre'] = 'Le genre à ajouter était vide';
		else
			$item['genre'] = $_POST['insertGenre'];
	}
	else if(isset($_POST['insertLangue'])) {
		if(empty($_POST['insertLangue']))
			$errors['insertLangue'] = 'La langue à ajouter était vide';
		else
			$item['langue'] = $_POST['insertLangue'];
	}
	else if(isset($_POST['insertSaga'])) {
		if(empty($_POST['insertSaga']))
			$errors['insertSaga'] = 'La saga à ajouter était vide';
		else
			$item['langue'] = $_POST['insertSaga'];
	}
	else if(isset($_POST['insertSociete'])) {
		if(empty($_POST['insertSociete']))
			$errors['insertSociete'] = 'La société à ajouter était vide';
		else
			$item['langue'] = $_POST['insertSociete'];
	}
	else if(isset($_POST['insertFormat'])) {
		if(empty($_POST['insertFormat']))
			$errors['insertFormat'] = 'Le format à ajouter était vide';
		else
			$item['langue'] = $_POST['insertFormat'];
	}
	else if(isset($_POST['insertPersonne'])) {
		if(empty($_POST['insertPersonne']))
			$errors['insertPersonne'] = 'La personne à ajouter était vide';
		else
			$item['langue'] = $_POST['insertPersonne'];
	}
	$r = FALSE;
	if(empty($errors)) $r = sendItemToDB($db_sql,html_check($item),$errors);
	if($r) {
		$_GET['success'] = 2;
	}
}

//si le formulaire à été rempli
if(isset($_POST['submit'])) {
	if(checkError($errors,$_POST)) {//			on le remplis en checkant les erreurs
		if(!sendToDB($db_sql,html_check($_POST),$errors)){ //   si il n'y a pas d'erreur alors on insert les valeurs dans la DB
			//insérer ici du code pour si jamais il y a une erreur à l'envoi dans la DB...
		}
	}
}
//on récupère les genres,formats,... existants de la DB (voir model/addFilm.php)
$genres = getGenres($db_sql);
$formats = getFormats($db_sql);
$langues = getLangues($db_sql);
$personnes = getPersonnes($db_sql);
$sagas = getSagas($db_sql);
$societes = getSocietes($db_sql);
// on ajoute le HTML
include('app/view/adminMenu.php');
include('app/view/addFilm.php');
?>
