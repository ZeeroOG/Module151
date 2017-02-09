<?php
/* =================== INCLUDES ===================*/

	include('app/controller/checkFormErrors.php');
	include('app/model/editFilm.php');
	include('app/model/addFilm.php');
	
/* =================== FUNCTIONS ===================*/

	function html_check($p) {
		$r = Array();
		foreach ($p as $k =>$v) {
			$r[htmlspecialchars($k)] = htmlspecialchars($v);
		}
		return $r;
	}
	
	function getHTMLOptions($type,$old_value) {
			$html = '';
		foreach($type as $key => $value) {
		$html .= '<option value="'.$key.'" '.($old_value == $value ? 'selected':'').'>'.$value.'</option>'.PHP_EOL;
		}
		
		return $html;
	}
	
	function getOldPochette($path) {
		$html = '';
		if($path != 'img/noimage.jpg') {
			$html .= '<span id="oldImage"><img src="'.$path.'" alt="ancienne image"/><span>(pochette actuelle)</span></span>';
		}
		return $html;
	}
	
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
	
/* =================== START ===================*/
	$errors = Array();
	$film = new Film($_GET['id']);
	if(isset($_POST['submit'])) {
		if(checkError($errors,$_POST,$_FILES)) {
			editToDB($db_sql,html_check($_POST),$film,$_FILES,$errors);
		}
	}

	if(!isset($_GET['id']) OR !is_numeric($_GET['id'])) {
		header('location: .?p=listFilms&noID=true');
	}
	
	$genres = getGenres($db_sql);
	$formats = getFormats($db_sql);
	$langues = getLangues($db_sql);
	$personnes = getPersonnes($db_sql);
	$sagas = getSagas($db_sql);
	$societes = getSocietes($db_sql);
	
/* =================== VIEW ===================*/	

	include('app/view/adminMenu.php');
	include('app/view/editFilm.php');
	
/* =============================================*/
?>