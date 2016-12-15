<?php

function createComment($filmid, $userid, $comment) {
	global $db_sql;

	$req = $db_sql->prepare('INSERT INTO t_commentaire (fk_film, fk_user, commentaire) VALUES (?, ?, ?)');
	$req->execute(array($filmid, $userid, $comment));
}

function checkFilmExists($id) {
	global $db_sql;

	$req = $db_sql->prepare('SELECT id_film FROM t_film WHERE id_film = ?');
	$req->execute(array($id));

	if($req->rowCount() < 1) {
		return false;
	} else {
		return true;
	}
}

?>
