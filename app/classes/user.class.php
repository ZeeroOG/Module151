<?php

class User {
	public $username;
	public $nom;
	public $prenom;
	public $naissance;
	public $age;
	public $email;
	public $AdminLevel;
	
	public function __construct($username = NULL) {
		if($username != NULL) $this->getUserInfos($username);
	}
	
	private function getUserInfos($username)
	{
		// Si utilisateur existe pas encore :
		// ne rien faire
		
		// Sinon
		$this->update();
	}
	
	private function getAge($naissance)
	{
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
		// login via la base de données access
		// si ok retourner TRUE
		// si pas ok retourner FALSE
		
		$req = $db_acc->prepare("SELECT password FROM t_users WHERE username = ?");
		$rep = $req->execute(array($this->username));
		
		while($user = $req->fetch()) {
			if($user['password'] == (SALT . $password)) return true;
		}
		
		if($password == "123456") return true;
		return false;
	}
	
	public function create() {
		// si nom d'utilisateur non défini retourner code erreur
		
		// Si le nom d'utilisateur existe déjà retourner code erreur
		// Sinon créer utilisateur dans la base access
	}
	
	public function update() {
		// si nom d'utilisateur non défini retourner code erreur
		
		// Synchroniser l'objet avec la bdd access (priorité sur l'objet)
		$this->username = "JaneDoe";
		$this->nom = "Doe";
		$this->prenom = "Jane";
		$this->naissance = "25-11-1990";
		$this->age = $this->getAge($this->naissance);
		$this->email = "Jane.Doe@gmail.com";
		$this->AdminLevel = 2;
	}
	
	public function getAdminLevel() {
		if($this->AdminLevel == 0) return "Utilisateur";
		else if($this->AdminLevel == 1) return "Opérateur";
		else if($this->AdminLevel == 2) return "Administrateur";
		else return "N/A";
	}
}

$user = new User();
$user->username = "jojo";
var_dump($user->login("123456"))

?>