<?php

if(isset($_POST['username']) && isset($_POST['password']))
{
	// login
	$user = new User($_POST['username']);
	$rep = $user->login($_POST['password']);

	if($rep == false) echo "ERROR !";
	else echo "Welcome " . $user->username . " !";
}

include("app/view/login.php");

?>
