<?php

if(!isset($_GET['id'])) {
	header("Location: ?p=home");
	die();
} else {
	$filmid = $_GET['id'];
}

include('app/model/showFilm.php');

if(checkFilmExists($filmid) == false) {
	echo '<p>Vous êtes perdu ! <br /><a href="?">Retour vers la page d\'accueil</a></p>';
	$filmName = '404';
} else {
	if(isset($_SESSION['user'])) {
		$vote = new Vote($filmid, $_SESSION['user']->getUserId());

		if(isset($_POST['vote']) AND !empty($_POST['vote'])) {
			$vote->setVote($_POST['vote']);
		}
	}

	$film = new Film($filmid);

	$commentFail = NULL;
	$commentText = "";

	if(isset($_POST['text'], $_SESSION['user'], $_POST['id-captcha'], $_POST['captcha'])) {
		if(strtolower($_POST['captcha']) == $_SESSION[$_POST['id-captcha']]) {
			createComment($film->getFilmId(), $_SESSION['user']->getUserId(), $_POST['text']);
		} else {
			$commentFail = 'Captcha incorrect !';
			$commentText = $_POST['text'];
		}

		unset($_SESSION[$_POST['id-captcha']]);
	}

	// Nom du film dans la balise <title>
	if($film->getTitreTraduit() == NULL) {
		$filmName = $film->getTitreOriginal();
	} else {
		$filmName = $film->getTitreTraduit();
	}

	// Récup commentaires
	$comments = new Comments($filmid);

	// Si défini récup vidéo youtube
	if($film->getBandeAnnonceURL() != NULL) $youtube = new Youtube($film->getBandeAnnonceURL());

	// Génération du captcha
	$captcha = new Captcha();

	// Création d'un id captcha
	$captchaId = 'captcha_login_' . uniqid();

	// Enregistrement du texte captcha dans la session
	$_SESSION[$captchaId] = $captcha->getTexte();

	$emotes = json_decode(file_get_contents('db/emotes.json'));

	include('app/view/showFilm.php');
}

?>
