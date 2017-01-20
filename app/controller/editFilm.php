<?php
	if(!isset($_GET['id']) OR !is_numeric($_GET['id'])) {
		header('location: .?p=listFilms&noID=true');
	}
	
	$film = new Film($_GET['id']);
	die($film->getDescription());
	include('app/model/editFilm.php');
?>