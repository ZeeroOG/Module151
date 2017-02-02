<?php

	if(isset($_POST['submit'])) {
		die('NO CODE');
	}

	if(!isset($_GET['id']) OR !is_numeric($_GET['id'])) {
		header('location: .?p=listFilms&noID=true');
	}
	
	$film = new Film($_GET['id']);
	
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
	
	include('app/model/editFilm.php');
	include('app/model/addFilm.php');
	
	$genres = getGenres($db_sql);
	$formats = getFormats($db_sql);
	$langues = getLangues($db_sql);
	$personnes = getPersonnes($db_sql);
	$sagas = getSagas($db_sql);
	$societes = getSocietes($db_sql);
	include('app/view/adminMenu.php');
	include('app/view/editFilm.php');
?>