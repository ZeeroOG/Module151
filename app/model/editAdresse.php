<?php

// Paramètre : id de l'adresse
// Retourne : l'id du propriétaire de l'adresse
function getAddressUser($id) {
	global $db_acc;

	$req = $db_acc->prepare('SELECT fk_users FROM t_adresses WHERE id_adresses = ?');
	$req->execute(array($id));

	$data = $req->fetch();
	$userId = $data['fk_users'];

	return $userId;
}

function getAddress($id) {
	global $db_acc;

	$req = $db_acc->prepare('SELECT * FROM t_adresses WHERE id_adresses = ?');
	$req->execute(array($id));
	$data = $req->fetch();

	return $data;
}

?>
