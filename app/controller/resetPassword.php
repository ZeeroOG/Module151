<?php

include('app/model/resetPassword.php');

if(!isset($_GET['username'])) {
	header('Location: ?p=home');
	die();
}

if(isset($_GET['sure']) AND $_GET['sure'] == 'yes') {
	$newPassword = resetPassword($_GET['username']);
}

include('app/view/resetPassword.php');

?>
