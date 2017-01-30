<?php

function resetPassword($username) {
	global $db_acc;

	$password = new RandomPassword();

	$req = $db_acc->prepare('UPDATE t_users SET password = :password WHERE username = :username');
	$req->execute(array(
		'username' => $username,
		'password' => sha1(SALT . $password->getPass())
	));

	return $password->getPass();
}

?>
