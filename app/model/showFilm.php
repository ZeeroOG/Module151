<?php

function createComment($filmid, $userid, $comment) {
	global $db_sql;
	
	$req = $db_sql->prepare('INSERT INTO t_commentaire (fk_film, fk_user, commentaire) VALUES (?, ?, ?)');
	$req->execute(array($filmid, $userid, $comment));
}

?>
