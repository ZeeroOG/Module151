<?php

function editPassword($username, $password) {
	global $db_acc;

	$req = $db_acc->prepare('UPDATE t_users SET password = :password WHERE username = :username');
	$req->execute(array(
		'username' => $username,
		'password' => sha1(SALT . $password)
	));
}

?>
