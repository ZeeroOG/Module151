<?php

if(!isset($_GET['id'])) {
	header("Location: ?p=home");
	die();
} else {
	$filmid = $_GET['id'];
}

$film = new Film($filmid);
$comments = new Comments($filmid);
$youtube = new Youtube($film->getBandeAnnonceURL());

include('app/view/showFilm.php');

?>
