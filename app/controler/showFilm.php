<?php

if(!isset($_GET['id'])) {
	header("Location: ?p=home");
	die();
} else {
	$filmid = $_GET['id'];
}

$film = new Film($filmid);

if(isset($_POST['text']) AND isset($_SESSION['user'])) {
	$req = $db_sql->prepare('INSERT INTO t_commentaire (fk_film, fk_user, commentaire) VALUES (?, ?, ?)');
	$req->execute(array($film->getFilmId(), $_SESSION['user']->getUserId(), $_POST['text']));
}

$comments = new Comments($filmid);
$youtube = new Youtube($film->getBandeAnnonceURL());
$emotes = json_decode(file_get_contents('db/emotes.json'));

include('app/view/showFilm.php');

?>
