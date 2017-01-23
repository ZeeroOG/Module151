<?php
	if(!isset($_GET['id']) OR !is_numeric($_GET['id'])) {
		header('location: .?p=listFilms&noID=true');
	}
	
	$film = new Film($_GET['id']);
	$errors = Array();
	
	function getHTMLClasses($errors,$name,$add_class = '') {
		if(isset($errors[$name])) {
			return 'error '.$add_class;
		}
		else if(!empty($add_class)) {
			return $add_class;
		}
		return -1;
	}
	include('app/model/editFilm.php');
	include('app/view/editFilm.php');
?>