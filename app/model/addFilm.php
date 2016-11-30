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