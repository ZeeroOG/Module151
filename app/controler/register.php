<?php

$errorCount = 0;

function errorMessage($message) {
	global $errorCount;

	$errorCount++;
	echo '<p style="color: red; text-align: center;">' . $message . '</p>';
}

include('app/model/register.php');

// Génération du captcha
$captcha = new Captcha();

// Création d'un id captcha
$captchaId = 'captcha_login_' . uniqid();

// Enregistrement du texte captcha dans la session
$_SESSION[$captchaId] = $captcha->getTexte();

// Si le navigateur envoie des data, on les traites
if(isset($_POST['captcha']) AND isset($_POST['captchaId']) AND isset($_SESSION[$_POST['captchaId']]) AND isset($_POST['username']) AND isset($_POST['nom']) AND isset($_POST['prenom']) AND isset($_POST['mail']) AND isset($_POST['birthdate']) AND isset($_POST['password1']) AND isset($_POST['password2'])) {
	// Check captcha
	if(strtolower($_POST['captcha']) != $_SESSION[$_POST['captchaId']]) {
		// Si captcha incorrect
		errorMessage('Captcha incorrect');
	} else {
		// Si captcha correct tester les données envoyées par l'utilisateur
		checkUsername($_POST['username']);
		checkNom($_POST['nom']);
		checkPrenom($_POST['prenom']);
		checkMail($_POST['mail']);
		checkBirthdate($_POST['birthdate']);
		checkPasswords($_POST['password1'], $_POST['password2']);

		if($errorCount == 0) {
			// Créer compte
			createAccount($_POST['username'], $_POST['nom'], $_POST['prenom'], $_POST['mail'], $_POST['birthdate'], $_POST['password1']);

			// Redirection vers login
			header('Location: ?p=login&newAccount=' . strtolower($_POST['username']));
			die();
		}
	}
} elseif(isset($_POST['captcha']) OR isset($_POST['username']) OR isset($_POST['nom']) OR isset($_POST['prenom']) OR isset($_POST['mail']) OR isset($_POST['birthdate']) OR isset($_POST['password1']) OR isset($_POST['password2'])) {
	errorMessage('Veuillez remplir tous les champs !');
}

if(isset($_POST['captchaId']) AND isset($_SESSION[$_POST['captchaId']])) unset($_SESSION[$_POST['captchaId']]);

include('app/view/register.php');

?>
