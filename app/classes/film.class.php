<?php

Class Film {
	private $filmid;
	private $titreOriginal;
	private $titreTraduit;
	private $duree;
	private $dateSortieSuisse;
	private $description;
	private $accordParental;
	private $pochetteURL;
	private $bandeAnnonceURL;
	private $price;
	private $langues;
	private $note;
	private $nbVotes;
	private $gens;
	private $genres;

	function __construct($filmid) {
		global $db_sql;

		$this->filmid = $filmid;

		// Récup infos film
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

		$req->CloseCursor();

		// Récup infos sur la note du film
		$req = $db_sql->prepare("SELECT * FROM t_notefilm WHERE fk_film = ?");
		$req->execute(array($filmid));

		if($req->rowCount() > 0)
		{
			$note = 0;
			for($i = 0; $x = $req->fetch(); $i++) {
				$note = $note + $x['note'];
			}
			$this->note = $note / $i;
			$this->nbVotes = $i;
		} else {
			$this->note = NULL;
			$this->nbVotes = NULL;
		}

		$req->CloseCursor();

		// Récup infos sur les prix du film en fonction du format
		$req = $db_sql->prepare("SELECT t_formatfilm.prix, t_formatfilm.numero_article, t_format.nom FROM t_formatfilm INNER JOIN t_format ON t_format.id_format = t_formatfilm.fk_format WHERE t_formatfilm.fk_film = ?");
		$req->execute(array($filmid));

		if($req->rowCount() > 0)
		{
			while ($x = $req->fetch()) {
				$this->price[$x['numero_article']]['prix'] = $x['prix'];
				$this->price[$x['numero_article']]['nom'] = $x['nom'];
			}
		} else {
			$this->price = NULL;
		}

		$req->CloseCursor();

		// Récup des infos sur les langues disponibles
		$req = $db_sql->prepare("SELECT t_langue.nom FROM t_languefilm INNER JOIN t_langue ON t_languefilm.fk_langue = t_langue.id_langue WHERE t_languefilm.fk_film = ? ORDER BY t_langue.nom ASC");
		$req->execute(array($filmid));

		for ($i = 0; $x = $req->fetch(); $i++) {
			$this->langues[$i] = $x['nom'];
		}

		$req->CloseCursor();

		// Récup des infos sur les gens qui ont contribué au film
		$req = $db_sql->prepare("SELECT t_personne.nom, t_rolefilm.role FROM t_rolefilm INNER JOIN t_personne ON t_rolefilm.fk_personne = t_personne.id_personne WHERE t_rolefilm.fk_film = ? ORDER BY t_rolefilm.role ASC, t_personne.nom ASC");
		$req->execute(array($filmid));

		for ($i = 0; $x = $req->fetch(); $i++) {
			$this->gens[$i]['nom'] = $x['nom'];
			$this->gens[$i]['role'] = $x['role'];
		}

		$req->CloseCursor();

		// Récup des infos sur les sociétés qui ont contribué au film
		$req = $db_sql->prepare("SELECT t_societe.nom FROM t_societefilm INNER JOIN t_societe ON t_societefilm.fk_societe = t_societe.id_societe WHERE t_societefilm.fk_film = ? ORDER BY t_societe.nom ASC");
		$req->execute(array($filmid));

		for ($i = 0; $x = $req->fetch(); $i++) {
			$this->societes[$i] = $x['nom'];
		}

		$req->CloseCursor();

		// Récup des infos sur le(s) genre(s) du film
		$req = $db_sql->prepare("SELECT t_genre.nom FROM t_genrefilm INNER JOIN t_genre ON t_genre.id_genre = t_genrefilm.fk_genre WHERE t_genrefilm.fk_film = ? ORDER BY t_genre.nom ASC");
		$req->execute(array($filmid));

		for ($i = 0; $x = $req->fetch(); $i++) {
			$this->genres[$i] = $x['nom'];
		}

		$req->CloseCursor();
	}

	public function getFilmId() { return $this->filmid; }
	public function getTitreOriginal() { return $this->titreOriginal; }
	public function getTitreTraduit() { return $this->titreTraduit; }
	public function getDuree() { return $this->duree; }
	public function getDateSortie() { return $this->dateSortieSuisse; }
 	public function getDescription() { return $this->description; }
	public function getAccordParental() { return $this->accordParental; }
	public function getBandeAnnonceURL() { return $this->bandeAnnonceURL; }
	public function getNote() { return $this->note; }
	public function getNbVotes() { return $this->nbVotes; }
	public function getLangues() { return $this->langues; }
	public function getPrice() { return $this->price; }
	public function getGens() { return $this->gens; }
	public function getGenres() { return $this->genres; }
	public function getSocietes() { return $this->societes; }

	public function getImage() {
		if($this->pochetteURL != NULL) return $this->pochetteURL;
		else return "img/noimage.jpg";
	}
}

?>
