<?php

function removeFilm($id, &$db, &$errors) {

	$req = $db->query("SELECT pochetteURL FROM t_film WHERE id_film = $id");
	$image = $req->fetch();
	$image = $image['pochetteURL'];
	
	if($image != null AND file_exists($image)) {
		unlink($image);
	}

	$req->closeCursor();

	$tables = array(
		't_commentaire',
		't_formatfilm',
		't_genrefilm',
		't_languefilm',
		't_notefilm',
		't_rolefilm',
		't_sagafilm',
		't_societefilm',
		't_film'
	);

	foreach ($tables as $table) {
		if($table == 't_film') {
			$req = $db->query("DELETE FROM $table WHERE id_film = $id");
		} else {
			$req = $db->query("DELETE FROM $table WHERE fk_film = $id");
		}

		if(!$req) {
			array_push($errors, $db->errorInfo()[2]);
			Log::warn('Erreur SQL lors de la supression des attributs d\'un film dans la base de données: ' . $db->errorInfo()[2]);
		}

		$req->closeCursor();
	}

	header('Location: ?p=listFilms');
}

?>
