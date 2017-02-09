<?php

function getCommandes() {
	global $db_acc;

	$commandes = array();

	$req = $db_acc->prepare('SELECT * FROM t_commandes ORDER BY id_commande DESC, fk_user ASC');
	$req->execute();

	while ($x = $req->fetch()) {
		$commande = array();

		$commande['id'] = $x['id_commande'];
		$commande['userid'] = $x['fk_user'];
		$commande['username'] = getUserName($x['fk_user']);
		$commande['numero'] = $x['numero'];
		$commande['livr'] = getAdresse($x['fk_livraison']);
		$commande['fact'] = getAdresse($x['fk_facturation']);
		$commande['etat'] = getEtat($x['fk_etat']);
		$commande['panier'] = json_decode($x['panier'], true);
		$commande['prix'] = $x['prix'];

		array_push($commandes, $commande);
	}

	$req->closeCursor();

	return $commandes;
}

function getUserName($userid) {
	global $db_acc;

	$req = $db_acc->prepare('SELECT username FROM t_users WHERE id_users = ?');
	$req->execute(array($userid));
	$res = $req->fetch();
	$req->closeCursor();

	return utf8_encode($res['username']);
}

function getAdresse($id) {
	global $db_acc;

	$req = $db_acc->prepare('SELECT * FROM t_adresses WHERE id_adresses = ?');
	$req->execute(array($id));
	$x = $req->fetch();
	$req->closeCursor();

	return utf8_encode($x['nom'] . ' - ' . $x['rue'] . ' ' . $x['numero'] . ' - ' . $x['npa'] . ' ' . $x['ville']);
}

function getEtat($id) {
	global $db_acc;

	$req = $db_acc->prepare('SELECT nom FROM t_etat WHERE id_etat = ?');
	$req->execute(array($id));
	$x = $req->fetch();
	$req->closeCursor();

	return utf8_encode($x['nom']);
}

function getNomArticle($numero) {
	global $db_sql;

	$req = $db_sql->prepare('SELECT t_film.titreOriginal AS nom_film, t_format.nom AS nom_format FROM t_film
							INNER JOIN t_formatfilm ON t_formatfilm.fk_film = t_film.id_film
							INNER JOIN t_format ON t_format.id_format = t_formatfilm.fk_format
							WHERE t_formatfilm.numero_article = ?');
	$req->execute(array($numero));
	$article = $req->fetch();
	$req->closeCursor();

	return $article['nom_film'] . " - " . $article['nom_format'];
}

?>
