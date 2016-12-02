<?php
	function get(&$db,$sql,$id) {
		$stmt = $db->prepare($sql);
		$stmt->execute();
		$r = Array();
		while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
			$r[$row[$id]] = $row['nom'];
		}
		return $r;
	}

	function getGenres(&$db) {
		$sql = 'SELECT * FROM t_genre';
		$id = 'id_genre';
		return get($db,$sql,$id);
	}
	function getFormats(&$db) {
		$sql = 'SELECT * FROM t_format';
		$id = 'id_format';
		return get($db,$sql,$id);
	}
	function getLangues(&$db) {
		$sql = 'SELECT * FROM t_langue';
		$id = 'id_langue';
		return get($db,$sql,$id);
	}
	function getPersonnes(&$db) {
		$sql = 'SELECT * FROM t_personne';
		$id = 'id_personne';
		return get($db,$sql,$id);
	}
	function getSagas(&$db) {
		$sql = 'SELECT * FROM t_saga';
		$id = 'id_saga';
		return get($db,$sql,$id);
	}
	function getSocietes(&$db) {
		$sql = 'SELECT * FROM t_societe';
		$id = 'id_societe';
		return get($db,$sql,$id);
	}
	function checkError(&$errors,$post) {
		// CONTROLE DES ERREURS PHP
		return TRUE; // aucune erreur
	}
	function sendToDB(&$db,$post) {
		
		// AJOUT DU FILM
		$film = array($post['titreOriginal'],
					  $post['titreTraduit'],
					  $post['duree'],
					  $post['dateSortieSuisse'],
					  $post['description'],
					  $post['accordParental'],
					  $post['pochetteURL'],
					  $post['bandeAnnonceURL']);
		$stmt = $db->prepare('INSERT INTO t_film (titreOriginal,titreTraduit,duree,dateSortieSuisse,description,accordParental,pochetteURL,bandeAnnonceURL)
							  VALUES (?,?,?,?,?,?,?,?)');
		$stmt->execute($film);
		
		
		// LIAISON
		
		//$stmt = $db->prepare('SELECT id_film FROM t_film WHERE titreOriginal = ?';
		//$stmt->execute($film['titreOriginal'];
		//$film_id = $stmt->fetch(PDO::FETCH_ASSOC);
		$film_id = $db->lastInsertId();
		
		$lastValue = '';
		foreach($post as $key => $value) {
			//GENRE
			if(preg_match('#^genre.+#',$key)) {
				$stmt = $db->prepare('INSERT INTO t_genrefilm (fk_film,fk_genre) VALUES (?,?)');
				$stmt->execute(array($film_id,$value));
			}
			// LANGUE
			else if(preg_match('#^langue.+#',$key)) {
				$stmt = $db->prepare('INSERT INTO t_languefilm (fk_film,fk_langue) VALUES (?,?)');
				$stmt->execute(array($film_id,$value));
			}
			//SAGA
			else if(preg_match('#^saga.+#',$key)) {
				$stmt = $db->prepare('INSERT INTO t_sagafilm (fk_film,fk_saga) VALUES (?,?)');
				$stmt->execute(array($film_id,$value));
			}
			//SOCIETE
			else if(preg_match('#^societe.+#',$key)) {
				$stmt = $db->prepare('INSERT INTO t_societefilm (fk_film,fk_langue) VALUES (?,?)');
				$stmt->execute(array($film_id,$value));
			}
			//FORMAT&PRIX
			else if(preg_match('#^prix.+#',$key)) {
				$stmt = $db->prepare('INSERT INTO t_formatfilm (fk_film,fk_format,prix) VALUES (?,?,?)');
				$stmt->execute(array($film_id,$lastValue,$value));
			}
			//PERSONNE&ROLE
			else if(preg_match('#^role.+#',$key)) {
				$stmt = $db->prepare('INSERT INTO t_rolefilm (fk_film,fk_personne,role) VALUES (?,?,?)');
				$stmt->execute(array($film_id,$lastValue,$value));
			}
			//RECUP FORMAT
			else if(preg_match('#^format.+#',$key)) {
				$lastValue = $value;
			}
			//RECUP PERSONNE
			else if(preg_match('#^personne.+#',$key)) {
				$lastValue = $value;
			}
		}
		
		print_r($film);
		die();
	
	}