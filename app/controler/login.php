<?php

if(isset($_POST['username']) AND isset($_POST['password']))
{
	if(isset($_SESSION['loginCount']) AND $_SESSION['loginCount'] >= LOGIN_COUNT_CAPTCHA) {
		// Check captcha
		if(!isset($_POST['captcha']) OR !isset($_POST['captchaId']) OR !isset($_SESSION[$_POST['captchaId']]) OR strtolower($_POST['captcha']) != $_SESSION[$_POST['captchaId']]) {
			// Si captcha incorrect
			echo '<p style="color: red; text-align: center;">Captcha incorrect</p>';
			$_SESSION['loginCount']++;
			$doNotLogin = true;
		}

		if(isset($_POST['captchaId']) AND isset($_SESSION[$_POST['captchaId']])) unset($_SESSION[$_POST['captchaId']]);
	}

	if(!isset($doNotLogin)) {
		// Création de l'objet login et vérification du mot de passe
		$user = new User($_POST['username']);
		$rep = $user->login($_POST['password']);

		if($rep == false) {
			// On affiche un message d'erreur
			echo '<p style="color: red; text-align: center;">Utilisateur ou mot de passe incorrect</p>';

			// Si le compteur de login foireux n'est pas défini on le défini à 1
			// Sinon on l'incrémente
			if(!isset($_SESSION['loginCount'])) $_SESSION['loginCount'] = 1;
			else $_SESSION['loginCount']++;
		} else {
			// Créeation de la session utilisateur
			$_SESSION['user'] = $user;

			// Si le compteur de login foireux est existant on le supprime
			if(isset($_SESSION['loginCount'])) unset($_SESSION['loginCount']);

			// On logue l'adresse IP et l'heure de la connexion dans la base access
			new Login($user->getUsername());

			// Redirection & fin du script non nécessaire
			header('Location: ?p=home');
			die();
		}
	}
}

if(isset($_SESSION['loginCount']) AND $_SESSION['loginCount'] >= LOGIN_COUNT_CAPTCHA) {
	// Génération du captcha
	$captcha = new Captcha();

	// Création d'un id captcha
	$captchaId = 'captcha_login_' . uniqid();

	// Enregistrement du texte captcha dans la session
	$_SESSION[$captchaId] = $captcha->getTexte();

	// Logue la tentative de connexion
	Log::info("Un utilisateur à dépassé le nombre de tentatives de connexion (" . LOGIN_COUNT_CAPTCHA . ") avant le captcha. (IP: " . $_SERVER['REMOTE_ADDR'] . ")");
}

if(isset($_GET['newAccount'])) {
	echo '<p style="color: green; text-align: center;">Compte créé, connectez vous !</p>';
}

include("app/view/login.php");

?>
