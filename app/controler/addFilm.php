<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if(isset($_POST['submit'])) {
	print_r($_POST);
}

include('app/model/addFilm.php');

if(isset($_POST['submit'])) {
	$errors = Array();
	if(checkError($errors,$_POST)) {
		sendToDB($db_sql,$_POST);
	}
}

$genres = getGenres($db_sql);
$formats = getFormats($db_sql);
$langues = getLangues($db_sql);
$personnes = getPersonnes($db_sql);
$sagas = getSagas($db_sql);
$societes = getSocietes($db_sql);

include('app/view/adminMenu.php');
include('app/view/addFilm.php');

?>