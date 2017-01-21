<?php

function isSelectedGrade($x, $y) {
	if($x == $y) echo ' selected';
}

function isDisabledGrade($x) {
	if($x < 3) echo ' disabled';
}

function updateAccount($data) {
	global $db_acc;

	$req = $db_acc->prepare('UPDATE t_users SET nom = :nom, prenom = :prenom, naissance = :naissance, email = :email, fk_level = :grade WHERE id_users = :id');
	$req->execute($data);
}

?>
