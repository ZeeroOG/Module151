<?php
	$listFilms = new FilmList();
	$listFilms->orderByTitle();
	include('app/view/adminMenu.php');
	include('app/view/listFilms.php');
?>