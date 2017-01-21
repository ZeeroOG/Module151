<?php

function getUserList() {
	global $db_acc;

	$req = $db_acc->query('SELECT id_users, username FROM t_users WHERE deleted = 0 ORDER BY username ASC');

	return $req->fetchAll();
}

function getDeletedUsersList() {
	global $db_acc;

	$req = $db_acc->query('SELECT id_users, username FROM t_users WHERE deleted = 1 ORDER BY username ASC');

	return $req->fetchAll();
}

?>
