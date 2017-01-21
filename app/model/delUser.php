<?php

// Delete user
// Parametre : id utilisateur
function deleteUser($id) {
	global $db_acc;

	$req = $db_acc->prepare('UPDATE t_users SET deleted = 1 WHERE id_users = ?');
	$req->execute(array($id));
}

// Restore user
// Parametre : id utilisateur
function restoreUser($id) {
	global $db_acc;

	$req = $db_acc->prepare('UPDATE t_users SET deleted = 0 WHERE id_users = ?');
	$req->execute(array($id));
}

?>
