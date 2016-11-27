<?php

if(isset($_POST['username']) && isset($_POST['password']))
{
	// login
	$user = new User($_POST['username']);
	$rep = $user->login($_POST['password']);

	if($rep == false) {
		echo '<p style="color: red; text-align: center;">Utilisateur ou mot de passe incorrect</p>';
	} else {
		$_SESSION['user'] = $user;

		new Login($user->getUsername());

		header('Location: ?p=home');
		die();
	}


}

include("app/view/login.php");

?>
