<?php

$errorCount = 0;

function formError($str) {
	global $errorCount;
	$errorCount++;
	echo '<p style="color: red;"><b>' . $str . '</b></p>';
}

function verifyOrder($livraison, $facturation, $panier, $userid) {
	global $errorCount;

	$prix = (double)getPrixPanier($panier);

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
		createOrder($livraison, $facturation, $panier, $userid, $prix);
		emptyPanier();
		return true;
	}

	return false;
}

function createOrder($livraison, $facturation, $panier, $userid, $prix) {
	global $db_acc;

	$req = $db_acc->prepare('INSERT INTO t_commandes (fk_facturation, fk_livraison, fk_user, panier, numero, prix, fk_etat) VALUES (:fact, :livr, :user, :panier, :numero, :prix, :etat)');
	$req->execute(array(
		'fact' => $facturation,
		'livr' => $livraison,
		'user' => $userid,
		'panier' => $panier,
		'numero' => uniqid(),
		'prix' => $prix,
		'etat' => 1
	));
}

function getPrixPanier($panier) {
	$prix = 0;

	foreach (json_decode($panier, true) as $key => $item) {
		$prix += (double)getPrixItem($item['id'])*(int)$item['qte'];
	}

	return (double)$prix;
}

function getPrixItem($numero) {
	global $db_sql;

	$req = $db_sql->prepare('SELECT prix FROM t_formatfilm WHERE numero_article = ?');
	$req->execute(array($numero));
	$res = $req->fetch();

	return (double)$res['prix'];
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

	$req = $db_acc->prepare('SELECT fk_users FROM t_adresses WHERE id_adresses = ?');
	$req->execute(array($adresse));

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
