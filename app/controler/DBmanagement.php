<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

	if(isset($_POST['submit'])) {
		echo '<pre>';
		print_r($_POST);
		echo '</pre>';
	}

	include('app/model/DBManagement.php');
	$genres = getGenres($db_sql);
	$formats = getFormats($db_sql);
	$langues = getLangues($db_sql);
	$personnes = getPersonnes($db_sql);
	$sagas = getSagas($db_sql);
	$societes = getSocietes($db_sql);
	include('app/view/DBManagement.php');
?>