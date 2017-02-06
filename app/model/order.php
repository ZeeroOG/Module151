<?php

$errorCount = 0;

function formError($str) {
	global $errorCount;
	$errorCount++;
	echo '<p style="color: red;"><b>' . $str . '</b></p>';
}

function verifyOrder($livraison, $facturation, $panier, $userid) {
	global $errorCount;

	if(!verifyAdresse($livraison, $userid)) {
		formError('Veuillez choisir une adresse de livraison.');
	}

	if(!verifyAdresse($facturation, $userid)) {
		formError('Veuillez choisir une adresse de facturation.');
	}

	if(!isJson($panier)) {
		formError('Panier incorrect.');
	}

	if($errorCount == 0) {
		createOrder($livraison, $facturation, $panier, $userid);
		emptyPanier();
		return true;
	}

	return false;
}

function createOrder($livraison, $facturation, $panier, $userid) {
	global $db_acc;

	$req = $db_acc->prepare('INSERT INTO t_commandes (fk_facturation, fk_livraison, fk_user, panier, numero) VALUES (:fact, :livr, :user, :panier, :numero)');
	$req->execute(array(
		'fact' => $facturation,
		'livr' => $livraison,
		'user' => $userid,
		'panier' => $panier,
		'numero' => uniqid()
	));
}

function emptyPanier() {
	global $panier;
	$panier->emptyPanier();
}

function verifyAdresse($adresse, $userid) {
	global $db_acc;

	if($adresse == 0) {
		return false;
	}

	$req = $db_acc->prepare('SELECT fk_users FROM t_adresses');
	$req->execute(array($adresse));

	if(count($req->fetch()) < 1) {
		return false;
	}

	$data = $req->fetch();
	$id = $data['fk_users'];

	if($id != $userid) {
		return false;
	}

	return true;
}

function isJson($str) {
	json_decode($str);
	return (json_last_error() == JSON_ERROR_NONE);
}

function getAdresses($userid) {
	global $db_acc;

	$req = $db_acc->prepare('SELECT * FROM t_adresses WHERE fk_users = ? ORDER BY nom');
	$req->execute(array($userid));

	$adresses = array();

	while($x = $req->fetch()) {
		$adresse = array();

		$adresse['id'] = $x['id_adresses'];
		$adresse['nom'] = utf8_encode($x['nom']);
		$adresse['rue'] = utf8_encode($x['rue']);
		$adresse['numero'] = utf8_encode($x['numero']);
		$adresse['complement'] = utf8_encode($x['complement']);
		$adresse['npa'] = utf8_encode($x['npa']);
		$adresse['ville'] = utf8_encode($x['ville']);

		array_push($adresses, $adresse);
	}

	return $adresses;
}

?>
