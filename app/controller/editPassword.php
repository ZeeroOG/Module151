<?php

include('app/model/register.php');
include('app/model/editPassword.php');

$errors = 0;
function errorMessage($mess) {
	global $errors;

	echo '<p style="color: red; font-weight: bold;">' . $mess . '</p>';
	$errors++;
}

if(isset($_POST['pass1'], $_POST['pass2'])) {
	checkPasswords($_POST['pass1'], $_POST['pass2']);

	if($errors == 0) {
		editPassword($_SESSION['user']->getUserName(), $_POST['pass1']);

		if(isset($_POST['callback'])) {
			header('Location: ' . $_POST['callback']);
		} else {
			header('Location: ?p=home');
		}

		die();
	}
}

include('app/view/editPassword.php');

?>
