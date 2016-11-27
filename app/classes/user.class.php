<?php

class User {
	private $username;
	public $nom;
	public $prenom;
	public $naissance;
	public $age;
	public $email;
	public $level;

	public function __construct($username) {
		$this->username = $username;
		$this->update();
	}

	public function getUsername() {
		return $this->username;
	}

	public function update()
	{
		global $db_acc;
		// Si utilisateur existe pas encore :
		// ne rien faire

		$req = $db_acc->prepare("SELECT password FROM t_users WHERE username = ?");
		$rep = $req->execute(array($this->username));

		for($i = 0; $user = $req->fetch(); $i++) {}

		if($i > 0) {
			$this->getUserInfos();
		}
	}

	public function getAge($naissance = NULL)
	{
		if($naissance == NULL) $naissance = $this->naissance;

		// Calcluler l'age en fonction de la date de naissance
		$maintenant = new DateTime();
		$naissance = new DateTime($naissance);
		$age = $maintenant->diff($naissance);
		$age = $age->y;

		// retourner $age en années
		return $age;
	}

	public function login($password)
	{
		global $db_acc;

		// login via la base de données access
		// si ok retourner TRUE
		// si pas ok retourner FALSE

		$req = $db_acc->prepare("SELECT password FROM t_users WHERE username = ?");
		$rep = $req->execute(array($this->username));

		while($user = $req->fetch()) {
			if($user['password'] == sha1(SALT . $password)) return true;
		}

		return false;
	}

	public function create() {
		// si nom d'utilisateur non défini retourner code erreur

		// Si le nom d'utilisateur existe déjà retourner code erreur
		// Sinon créer utilisateur dans la base access
	}

	public function getUserInfos() {
		global $db_acc;

		$req = $db_acc->prepare("SELECT * FROM t_users WHERE username = ?");
		$req->execute(array($this->username));

		while($x = $req->fetch()) {
			$this->username = utf8_encode($x['username']);
			$this->nom = utf8_encode($x['nom']);
			$this->prenom = utf8_encode($x['prenom']);
			$this->naissance = $x['naissance'];
			$this->age = $this->getAge($this->naissance);
			$this->email = utf8_encode($x['email']);
			$this->level = $x['fk_level'];
		}
	}

	public function getLevel() {
		return $this->level;
	}

	public function getLevelName() {
		if($this->level == 1) return "Utilisateur";
		else if($this->level == 2) return "Opérateur";
		else if($this->level == 3) return "Administrateur";
		else return "N/A";
	}
}

?>
