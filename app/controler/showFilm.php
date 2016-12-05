<?php

if(!isset($_GET['id'])) {
	header("Location: ?p=home");
	die();
} else {
	$filmid = $_GET['id'];
}

include('app/model/showFilm.php');

$film = new Film($filmid);

if(isset($_POST['text']) AND isset($_SESSION['user'])) {
	createComment($film->getFilmId(), $_SESSION['user']->getUserId(), $_POST['text']);
}

$comments = new Comments($filmid);
$youtube = new Youtube($film->getBandeAnnonceURL());
$emotes = json_decode(file_get_contents('db/emotes.json'));

include('app/view/showFilm.php');

?>
