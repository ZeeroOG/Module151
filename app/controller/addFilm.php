<?php
/* =================== INCLUDES ===================*/

	include('app/model/addFilm.php');
	include('app/controller/checkFormErrors.php');
	
/* =================== FUNCTIONS ===================*/

	// permet de convertir les caractère spéciaux d'un tableau p et retourne le tableau avec les caractères "sécurisés"
	function html_check($p) {
		$r = Array();//											on crée un tableau vide
		foreach ($p as $k =>$v) {//								pour chaque clé $k et valeur $v du tableau donné en entrée
			$r[htmlspecialchars($k)] = htmlspecialchars($v);//	on incrémente notre tableau vide $r avec la clé $k controlée et la valeur $v controlée
		}
		return $r;//											on retourne notre tableau $r
	}
	
	// permet de savoir si une option d'un select à été choisie par l'utilisateur. Pas de gestion d'erreur car l'utilisateur ne peut pas changer l'id (BON a moins de modifier le code HTML avec un éditeur mais voila)
	function getHTMLSelected($select,$id) {
		if(isset($_POST[$select]) AND $_POST[$select] == $id)
			return 'selected';
	}
	
	// permet de recup les infos + erreurs d'un élément du formulaire (sauf pour les select, c'est la fonction en dessus qui s'en occupe)
	function getHTMLElements($id,$errors,$add_class = '') {
		$html = '';
		if(isset($_POST[$id]) AND !empty($_POST[$id]) AND $id != 'description') { // la description est traitée différement car c'est un textarea
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
	
	//permet de recupérer les différentes options disponibles et de savoir si une avait déjà été sélectionnée par l'utilisateur précédemment
	function getHTMLOptions($type,$default) {
		$r = '';
		foreach($type as $key => $value) {
		$r .= '<option value="'.$key.'" '.getHTMLSelected($default,$key).'>'.$value.'</option>'.PHP_EOL;
		}
		return $r;
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

/* =================== START ===================*/

	$errors = Array();	// on crée un tableau d'erreur vide


	// si le formulaire "insérer un (...)" à été remplis
	if(isset($_POST['submitItem'])) {

		$item = array();
		if(checkItemError($errors,$_POST,'insertGenre')) {
			$item['genre'] = $_POST['insertGenre'];
		}
		else if(checkItemError($errors,$_POST,'insertLangue')) {
			$item['langue'] = $_POST['insertLangue'];
		}
		else if(checkItemError($errors,$_POST,'insertSaga')) {
			$item['saga'] = $_POST['insertSaga'];
		}
		else if(checkItemError($errors,$_POST,'insertSociete')) {
			$item['societe'] = $_POST['insertSociete'];
		}
		else if(checkItemError($errors,$_POST,'insertFormat')) {
			$item['format'] = $_POST['insertFormat'];
		}
		else if(checkItemError($errors,$_POST,'insertPersonne')) {
			$item['personne'] = $_POST['insertPersonne'];
		}

		if(empty($errors)) {
			if(sendItemToDB($db_sql,html_check($item),$errors)) {
				$_GET['success'] = 2;
			}
		}
	}

	//si le formulaire à été rempli
	if(isset($_POST['submit'])) {
		if(checkError($errors,$_POST,$_FILES)) {//			on check si il n'y a pas d'erreurs
			
			if(!sendToDB($db_sql,html_check($_POST),$_FILES,$errors)){ //   si il n'y a pas d'erreur alors on insert les valeurs dans la DB
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
	
/* =================== VIEW ===================*/

	include('app/view/adminMenu.php');
	include('app/view/addFilm.php');
	
/* =============================================*/
?>
