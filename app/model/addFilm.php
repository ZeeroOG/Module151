<?php
	//fonction pour optimiser le code des fonctions ci-dessous (getGenres, getFormats, ...)
	function get(&$db,$table,$id) {
		$stmt = $db->prepare('SELECT * FROM '.$table);
		$stmt->execute();
		$r = Array();
		while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
			$r[$row[$id]] = $row['nom'];
		}
		return $r;
	}
	// les fonctions pour récupérer les genres,formats,...
	function getGenres(&$db) {
		$table = 't_genre';
		$id = 'id_genre';
		return get($db,$table,$id);
	}
	function getFormats(&$db) {
		$table = 't_format';
		$id = 'id_format';
		return get($db,$table,$id);
	}
	function getLangues(&$db) {
		$table = 't_langue';
		$id = 'id_langue';
		return get($db,$table,$id);
	}
	function getPersonnes(&$db) {
		$table = 't_personne';
		$id = 'id_personne';
		return get($db,$table,$id);
	}
	function getSagas(&$db) {
		$table = 't_saga';
		$id = 'id_saga';
		return get($db,$table,$id);
	}
	function getSocietes(&$db) {
		$table = 't_societe';
		$id = 'id_societe';
		return get($db,$table,$id);
	}



	function dbError(&$stmt,&$db,&$errors) {
		if(!$stmt) {
			array_push($errors,$db->errorInfo()[2]);
			return TRUE;
		}
		else return FALSE;
	}
	function sendToDB(&$db,$post,&$errors) {// AJOUT DU FILM
		$film = array($post['titreOriginal'],
					  (empty($post['titreTraduit']) ? NULL : $post['titreTraduit']),
					  $post['duree'],
					  $post['dateSortieSuisse'],
					  $post['description'],
					  $post['accordParental'],
					  (empty($post['pochetteURL']) ? NULL : $post['pochetteURL']),
					  (empty($post['bandeAnnonceURL']) ? NULL : $post['bandeAnnonceURL']));
		$stmt = $db->prepare('INSERT INTO t_film (titreOriginal,titreTraduit,duree,dateSortieSuisse,description,accordParental,pochetteURL,bandeAnnonceURL)
							  VALUES (?,?,?,?,?,?,?,?)');
		if(dbError($stmt,$db,$errors)) return FALSE;
		$stmt->execute($film);
		// LIAISON genres <> film, formats <> film, ...
		$film_id = $db->lastInsertId();
		foreach($post as $key => $value) {
			//GENRE
			if(preg_match('#^genre.+#',$key)) {
				$stmt = $db->prepare('INSERT INTO t_genrefilm (fk_film,fk_genre) VALUES (?,?)');
				if(dbError($stmt,$db,$errors)) return FALSE;
				$stmt->execute(array($film_id,$value));
			}
			// LANGUE
			else if(preg_match('#^langue.+#',$key)) {
				$stmt = $db->prepare('INSERT INTO t_languefilm (fk_film,fk_langue) VALUES (?,?)');
				if(dbError($stmt,$db,$errors)) return FALSE;
				$stmt->execute(array($film_id,$value));
			}
			//SAGA
			else if(preg_match('#^saga.+#',$key)) {
				$stmt = $db->prepare('INSERT INTO t_sagafilm (fk_film,fk_saga) VALUES (?,?)');
				if(dbError($stmt,$db,$errors)) return FALSE;
				$stmt->execute(array($film_id,$value));
			}
			//SOCIETE
			else if(preg_match('#^societe.+#',$key)) {
				$stmt = $db->prepare('INSERT INTO t_societefilm (fk_film,fk_societe) VALUES (?,?)');
				if(dbError($stmt,$db,$errors)) return FALSE;
				$stmt->execute(array($film_id,$value));
			}
			//FORMAT&PRIX
			else if(preg_match('#^prix.+#',$key)) {
				$format = $post['format'.substr($key,-1)];
				$stmt = $db->prepare('INSERT INTO t_formatfilm (fk_film,fk_format,prix,numero_article) VALUES (?,?,?,?)');
				if(dbError($stmt,$db,$errors)) return FALSE;
				$stmt->execute(array($film_id,$format,$value,uniqid()));
			}
			//PERSONNE&ROLE
			else if(preg_match('#^role.+#',$key)) {
				$personne = $post['personne'.substr($key,-1)];
				$stmt = $db->prepare('INSERT INTO t_rolefilm (fk_film,fk_personne,role) VALUES (?,?,?)');
				if(dbError($stmt,$db,$errors)) return FALSE;
				$stmt->execute(array($film_id,$personne,$value));
			}
		}

		//print_r($film);
		header('location: .?p=addFilm&success=1');

	}
	function sendItemToDB(&$db,$element,$errors) {
		$key = array_keys($element);
		$table = '';
		switch($key[0]) {

			case 'genre':
				$table = 't_genre';
				break;

			case 'langue':
				$table = 't_langue';
				break;

			case 'saga':
				$table = 't_saga';
				break;

			case 'societe':
				$table = 't_societe';
				break;

			case 'format':
				$table = 't_format';
				break;

			case 'personne':
				$table = 't_personne';
				break;
		}
		$stmt = $db->prepare('INSERT INTO '.$table.' (nom) VALUES (?)');
		$stmt->execute(array($element[$key[0]]));
		if(dbError($stmt,$db,$errors)) return FALSE;
		else return TRUE;
	}
