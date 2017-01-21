<?php

include('app/model/editAccount.php');
include('app/model/register.php');

if(isset($_GET['username']) AND $_SESSION['user']->getLevel() >= 3) {
	$edit_user = new User($_GET['username']);
} elseif (isset($_POST['username']) AND $_SESSION['user']->getLevel() >= 3) {
	$edit_user = new User($_POST['username']);
} else {
	$edit_user = $_SESSION['user'];
}

$errorCount = 0;

function errorMessage($message) {
	global $errorCount;

	$errorCount++;
	echo '<p style="color: red; text-align: center;">' . $message . '</p>';
}

if(isset($_POST['nom'], $_POST['prenom'], $_POST['birthdate'], $_POST['mail'], $_POST['grade'])) {
	checkNom($_POST['nom']);
	checkPrenom($_POST['prenom']);
	checkBirthdate($_POST['birthdate']);
	checkMail($_POST['mail']);

	if($errorCount == 0) {
		$data = array(
			'id' => $edit_user->getUserId(),
			'nom' => utf8_decode($_POST['nom']),
			'prenom' => utf8_decode($_POST['prenom']),
			'naissance' => utf8_decode($_POST['birthdate']),
			'email' => utf8_decode($_POST['mail'])
		);

		if($_SESSION['user']->getLevel() >= 3) {
			$data['grade'] = (int)$_POST['grade'];
		} else {
			$data['grade'] = (int)$edit_user->getLevel();
		}

		updateAccount($data);

		if(isset($_POST['callback'])) {
			$callback = $_POST['callback'];
		} else {
			$callback = "?p=home";
		}

		header('Location: ' . $callback);
		die();
	}
}

include('app/view/editAccount.php');

?>
