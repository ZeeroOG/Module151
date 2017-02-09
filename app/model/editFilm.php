<?php
	function editToDB(&$db,$post,$film_class,$files,&$errors) {// MODIFICATION DU FILM {
		$film = Array(	'titreOriginal' => $film_class->getTitreOriginal(),
						'titreTraduit' => $film_class->getTitreTraduit(),
						'duree' => $film_class->getDuree(),
						'dateSortieSuisse' => $film_class->getDateSortie(),
						'description' => $film_class->getDescription(),
						'accordParental' => $film_class->getAccordParental(),
						'bandeAnnonceURL' => $film_class->getBandeAnnonceURL());
						
		$names = Array(	'titreOriginal',
						'titreTraduit',
						'duree',
						'dateSortieSuisse',
						'description',
						'accordParental',
						'bandeAnnonceURL');
		foreach($names as $value) {
			if($post[$value] != $film[$value]) {
				$stmt = $db->prepare('UPDATE t_film SET '.$value.' = ? WHERE id_film = ?');
				if(dbError($stmt,$db,$errors)) return FALSE;
				$stmt->execute(Array($post[$value],$film_class->getFilmID()));
			}
		}
		
		$pochettePath = '';
		if($files['pochetteFile']['error'] != 4) {
			$unique = FALSE;
			while(!$unique) {
				$id = dechex(rand(1,mt_getrandmax()));
				$target = 'img/films/img_'.$id.'.'.strtolower(pathinfo($files['pochetteFile']['name'],PATHINFO_EXTENSION));
				if(!file_exists($target)) {
					
					$unique = TRUE;
					$pochettePath = $target;
				}
				
			}
			if($film_class->getImage() != 'img/noimage.jpg') unlink($film_class->getImage());
			move_uploaded_file($files['pochetteFile']['tmp_name'], $pochettePath);
			$stmt = $db->prepare('UPDATE t_film SET pochetteURL = ? WHERE id_film = ?');
			if(dbError($stmt,$db,$errors)) return FALSE;
			$stmt->execute(Array($pochettePath,$film_class->getFilmID()));
		}
		//echo '<pre>';
		//print_r($post);
		
		
		//Pour les tables de liaison, on préfèrera tout supprimmer puis remettre le tout (en vrais c'est pck on a plus le temps mais chuuut)
		
		$db->query('SET foreign_key_checks = 0');
		$db->query('DELETE FROM t_genrefilm WHERE fk_film = '.$film_class->getFilmID());
		$db->query('DELETE FROM t_languefilm WHERE fk_film = '.$film_class->getFilmID());
		$db->query('DELETE FROM t_sagafilm WHERE fk_film = '.$film_class->getFilmID());
		$db->query('DELETE FROM t_societefilm WHERE fk_film = '.$film_class->getFilmID());
		$db->query('DELETE FROM t_formatfilm WHERE fk_film = '.$film_class->getFilmID());
		$db->query('DELETE FROM t_rolefilm WHERE fk_film = '.$film_class->getFilmID());
		$db->query('SET foreign_key_checks = 1');
		

		// LIAISON genres <> film, formats <> film, ...
		foreach($post as $key => $value) {
			if($value == 'NULL') continue;
			//GENRE
			if(preg_match('#^genre.+#',$key)) {
				$stmt = $db->prepare('INSERT INTO t_genrefilm (fk_film,fk_genre) VALUES (?,?)');
				if(dbError($stmt,$db,$errors)) return FALSE;
				$stmt->execute(array($film_class->getFilmID(),$value));
			}
			// LANGUE
			else if(preg_match('#^langue.+#',$key)) {
				$stmt = $db->prepare('INSERT INTO t_languefilm (fk_film,fk_langue) VALUES (?,?)');
				if(dbError($stmt,$db,$errors)) return FALSE;
				$stmt->execute(array($film_class->getFilmID(),$value));
			}
			//SAGA
			else if(preg_match('#^saga.+#',$key)) {
				$stmt = $db->prepare('INSERT INTO t_sagafilm (fk_film,fk_saga) VALUES (?,?)');
				if(dbError($stmt,$db,$errors)) return FALSE;
				$stmt->execute(array($film_class->getFilmID(),$value));
			}
			//SOCIETE
			else if(preg_match('#^societe.+#',$key)) {
				$stmt = $db->prepare('INSERT INTO t_societefilm (fk_film,fk_societe) VALUES (?,?)');
				if(dbError($stmt,$db,$errors)) return FALSE;
				$stmt->execute(array($film_class->getFilmID(),$value));
			}
			//FORMAT&PRIX
			else if(preg_match('#^prix.+#',$key)) {
				$format = $post['format'.substr($key,4)];
				$stmt = $db->prepare('INSERT INTO t_formatfilm (fk_film,fk_format,prix,numero_article) VALUES (?,?,?,?)');
				if(dbError($stmt,$db,$errors)) return FALSE;
				$stmt->execute(array($film_class->getFilmID(),$format,$value,uniqid()));
			}
			//PERSONNE&ROLE
			else if(preg_match('#^role.+#',$key)) {
				$personne = $post['personne'.substr($key,4)];
				$stmt = $db->prepare('INSERT INTO t_rolefilm (fk_film,fk_personne,role) VALUES (?,?,?)');
				if(dbError($stmt,$db,$errors)) return FALSE;
				$stmt->execute(array($film_class->getFilmID(),$personne,$value));
			}
		}

		Log::info('Un film a été modifié par '.$_SESSION['user']->getUsername().' : '. (empty($post['titreTraduit']) ? $post['titreOriginal'] : $post['titreTraduit']));
		header('location: .?p=listFilms&success=1');

	}
?>