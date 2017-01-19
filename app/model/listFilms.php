<?php
	function removeFilm($id,&$db,&$errors) {
		function getSQL($id,$table) {
	   	  
		  return 'DELETE FROM '.$table.' WHERE fk_film = '.$id.';'.PHP_EOL;
		}

		$sql = '';
		$sql .= getSQL($id,'t_commentaire');
		$sql .= getSQL($id,'t_formatfilm');
		$sql .= getSQL($id,'t_genrefilm');
		$sql .= getSQL($id,'t_languefilm');
		$sql .= getSQL($id,'t_notefilm');
		$sql .= getSQL($id,'t_rolefilm');
		$sql .= getSQL($id,'t_sagafilm');
		$sql .= getSQL($id,'t_societefilm');
		$stmt = $db->query($sql);
		if(!$stmt) {
			array_push($errors,$db->errorInfo()[2]);
			Log::warn('Erreur SQL lors de la supression des attributs d\'un film dans la base de donnée: '.$db->errorInfo()[2]);
		}
		$stmt->fetchAll();
		$sql = getSQL($id,'t_film');
		$stmt = $db->query($sql);
		if(!$stmt) {
			array_push($errors,$db->errorInfo()[2]);
			Log::warn('Erreur SQL lors de la supression d\'un film dans la base de donnée: '.$db->errorInfo()[2]);
		}
		die('YOLO');
		
		
		
		
	}
	
	
?>