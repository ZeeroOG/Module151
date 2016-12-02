<?php

Class Film {
	private $filmid;
	private $titreOriginal, $titreTraduit, $duree, $dateSortieSuisse, $description, $accordParental, $pochetteURL, $bandeAnnonceURL;

	function __construct($filmid) {
		global $db_sql;

		$this->filmid = $filmid;

		$req = $db_sql->prepare("SELECT * FROM t_film WHERE id_film = ?");
		$req->execute(array($filmid));

		while($x = $req->fetch()) {
			$this->titreOriginal = $x['titreOriginal'];
			$this->titreTraduit = $x['titreTraduit'];
			$this->duree = $x['duree'];
			$this->dateSortieSuisse = $x['dateSortieSuisse'];
			$this->description = $x['description'];
			$this->accordParental = $x['accordParental'];
			$this->pochetteURL = $x['pochetteURL'];
			$this->bandeAnnonceURL = $x['bandeAnnonceURL'];
		}
	}

	public function getFilmId() { return $this->filmid; }
	public function getTitreOriginal() { return $this->titreOriginal; }
	public function getTitreTraduit() { return $this->titreTraduit; }
	public function getDuree() { return $this->duree; }
	public function getDateSortie() { return $this->dateSortieSuisse; }
 	public function getDescription() { return $this->description; }
	public function getAccordParental() { return $this->accordParental; }
	public function getPochetteURL() { return $this->pochetteURL; }
	public function getBandeAnnonceURL() { return $this->bandeAnnonceURL; }
}

?>
