<?php

class FilmList {
	private $filmList;

	function __construct()
	{
		$this->getData();
	}

	private function getData() {
		global $db_sql;

		$req = $db_sql->query('SELECT * FROM t_film');

		$this->filmList = array();

		while($x = $req->fetch()) {
			$film = array();

			$req2 = $db_sql->prepare('SELECT t_formatfilm.prix, t_format.nom, t_formatfilm.numero_article FROM t_film
									  INNER JOIN t_formatfilm ON t_film.id_film = t_formatfilm.fk_film
									  INNER JOIN t_format ON t_formatfilm.fk_format = t_format.id_format
									  WHERE t_film.id_film = ?
								  	');
			$req2->execute(array($x['id_film']));
			$film['prix'] = array();
			while($y = $req2->fetch()) {
				$prixfilm = array();

				$prixfilm['nom'] = $y['nom'];
				$prixfilm['prix'] = $y['prix'];
				$prixfilm['numero'] = $y['numero_article'];

				array_push($film['prix'], $prixfilm);
			}

			$req2->closeCursor();

			// Récup infos sur la note du film
			$req3 = $db_sql->prepare("SELECT * FROM t_notefilm WHERE fk_film = ?");
			$req3->execute(array($x['id_film']));

			if($req3->rowCount() > 0)
			{
				$note = 0;
				for($i = 0; $z = $req3->fetch(); $i++) {
					$note = $note + $z['note'];
				}
				$note = $note / $i;
				$nbVotes = $i;
			} else {
				$note = 0;
				$nbVotes = 0;
			}

			$req3->closeCursor();

			if($x['titreTraduit'] == NULL) $titre = $x['titreOriginal'];
			else $titre = $x['titreTraduit'];

			if($x['pochetteURL'] == NULL) $image = "img/noimage.jpg";
			else $image = $x['pochetteURL'];

			$film['id'] = $x['id_film'];
			$film['titre'] = $titre;
			$film['duree'] = $x['duree'];
			$film['sortie'] = $x['dateSortieSuisse'];
			$film['desc'] = $x['description'];
			$film['age'] = $x['accordParental'];
			$film['image'] = $image;
			$film['youtube'] = $x['bandeAnnonceURL'];
			$film['note'] = $note;
			$film['votes'] = $nbVotes;

			array_push($this->filmList, $film);
		}
	}

	public function reset() {
		$this->getData();
	}

	public function search($str) {
		foreach ($this->filmList as $key => $value) {
			if(!preg_match('/' . strtolower($str) . '/', strtolower($value['titre']))) {
				unset($this->filmList[$key]);
			}
		}
	}

	public function orderByTitle($invert = 1) {
		$temp = array();
		$temp2 = array();

		foreach ($this->filmList as $key => $value) {
			$temp[$key] = $value['titre'];
		}

		natsort($temp);

		foreach ($temp as $key => $value) {
			$temp2[$key] = $this->filmList[$key];
		}

		if($invert == 1) $temp2 = array_reverse($temp2);

		$this->filmList = $temp2;
	}

	public function orderByDate($invert = 1) {
		$temp = array();
		$temp2 = array();

		foreach ($this->filmList as $key => $value) {
			$temp[$key] = strtotime($value['sortie']);
		}

		natsort($temp);

		foreach ($temp as $key => $value) {
			$temp2[$key] = $this->filmList[$key];
		}

		if($invert == 1) $temp2 = array_reverse($temp2);

		$this->filmList = $temp2;
	}

	public function orderByVotes($invert = 1) {
		$temp = array();
		$temp2 = array();

		foreach ($this->filmList as $key => $value) {
			$temp[$key] = (int)$value['votes'];
		}

		natsort($temp);

		foreach ($temp as $key => $value) {
			$temp2[$key] = $this->filmList[$key];
		}

		if($invert == 1) $temp2 = array_reverse($temp2);

		$this->filmList = $temp2;
	}

	public function orderByNotes($invert = 1) {
		$temp = array();
		$temp2 = array();

		foreach ($this->filmList as $key => $value) {
			$temp[$key] = (int)$value['note'];
		}

		natsort($temp);

		foreach ($temp as $key => $value) {
			$temp2[$key] = $this->filmList[$key];
		}

		if($invert == 1) $temp2 = array_reverse($temp2);

		$this->filmList = $temp2;
	}

	public function getFilmList($first = NULL, $last = NULL) {
		$return = array();

		if($first == NULL) $return = $this->filmList;
		elseif($last == NULL) $return = array_slice($this->filmList, $first-1);
		else $return = array_slice($this->filmList, $first-1, $last);

		return $return;
	}
}


?>
