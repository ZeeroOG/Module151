<?php

function checkUsername($username) {
	global $db_acc;

	$req = $db_acc->prepare("SELECT id_users FROM t_users WHERE LCase(username) = ?");
	$req->execute(array(strtolower($username)));
	
	if(count($req->fetchAll()) > 0) errorMessage('Le nom d\'utilisateur est déjà pris !');
	elseif(!preg_match('/^[a-zA-Z0-9\-_]{6,20}$/', $username)) errorMessage('Le nom d\'utilisateur ne doit pas comprendre des caractères spéciaux, et faire entre 6 et 20 caractères !');
}

function checkNom($nom) {
	if(!preg_match('/^[\D]{1,50}$/', $nom)) errorMessage('Votre nom ne peut pas contenir de chiffres !');
}

function checkPrenom($prenom) {
	if(!preg_match('/^[\D]{1,50}$/', $prenom)) errorMessage('Votre prénom ne peut pas contenir de chiffres !');
}

function checkMail($mail) {
	if(!filter_var($mail, FILTER_VALIDATE_EMAIL)) errorMessage('Votre adresse mail n\'est pas correcte !');
}

function checkBirthdate($date) {
	if(!strtotime($date)) {
		errorMessage('Votre date de naissance n\'est pas correcte !');
	} else {
		// Calcluler l'age en fonction de la date de naissance
		$maintenant = new DateTime();
		$naissance = new DateTime($date);
		$age = $maintenant->diff($naissance);
		$age = $age->y;

		if($age < 13) {
			errorMessage('Vous devez avoir au moins 13 ans pour vous inscrire !');
		}
	}
}

function checkPasswords($pass1, $pass2) {
	if($pass1 != $pass2) {
		errorMessage('Les mot des passes ne sont pas identiques !');
	} else {
		if(!preg_match('/^(?=.*\d)(?=.*[A-Za-z])[\s\S]{8,50}$/', $pass1)) {
		    errorMessage('Le mot de passe doit être composé au minimum de 8 caractères et doit contenir au moins une lettre et un chiffre !');
		}
	}
}

function createAccount($username, $nom, $prenom, $mail, $birthdate, $password) {
	global $db_acc;

	$req = $db_acc->prepare("INSERT INTO t_users (username, nom, prenom, naissance, email, password, fk_level) VALUES (?, ?, ?, ?, ?, ?, 1)");
	$req->execute(array($username, $nom, $prenom, $birthdate, $mail, hashPassword($password)));
}

function hashPassword($password) {
	return sha1(SALT . $password);
}
