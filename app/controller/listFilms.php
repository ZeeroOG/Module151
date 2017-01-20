<?php
	$listFilms = new FilmList();
	$listFilms->orderByTitle();
	$errors = array();
	include('app/model/listFilms.php');
	if(isset($_GET['removeFilm']) AND isset($_GET['id']) AND is_numeric($_GET['id']) AND $_GET['removeFilm'] == 'true') {
		removeFilm($_GET['id'],$db_sql,$errors);
	}
	include('app/view/adminMenu.php');
	include('app/view/listFilms.php');
?>