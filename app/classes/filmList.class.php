<?php

class FilmList {
	private $filmList;

	function __construct()
	{
		$this->getData();
	}

	private function getData() {
		global $db_sql;

		$req = $db_sql->prepare('SELECT * FROM t_film');
		$req->execute();

		$this->filmList = array();

		while($x = $req->fetch()) {
			$film = array();

			$req2 = $db_sql->prepare('SELECT t_formatfilm.prix, t_format.nom FROM t_film
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

				array_push($film, $prixfilm);
			}

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

	public function orderByTitle() {
		$temp = array();
		$temp2 = array();

		foreach ($this->filmList as $key => $value) {
			$temp[$key] = $value['titre'];
		}

		natsort($temp);

		foreach ($temp as $key => $value) {
			$temp2[$key] = $this->filmList[$key];
		}

		$this->filmList = $temp2;
	}

	public function orderByDate() {
		$temp = array();
		$temp2 = array();

		foreach ($this->filmList as $key => $value) {
			$temp[$key] = strtotime($value['sortie']);
		}

		natsort($temp);

		foreach ($temp as $key => $value) {
			$temp2[$key] = $this->filmList[$key];
		}

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
