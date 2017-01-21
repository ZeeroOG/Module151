<?php

class Adresses
{
	private $userId;
	private $adresses = array();

	function __construct($userId)
	{
		$this->userId = $userId;
		$this->refresh();

		return $this->get();
	}

	private function refresh() {
		global $db_acc;

		$this->adresses = array();

		$req = $db_acc->prepare('SELECT * FROM t_adresses WHERE fk_users = ? ORDER BY rue ASC');
		$req->execute(array($this->userId));

		while ($x = $req->fetch()) {
			$adresse = array();

			$adresse['id'] = $x['id_adresses'];
			$adresse['nom'] = $x['nom'];
			$adresse['rue'] = $x['rue'];
			$adresse['numero'] = $x['numero'];
			$adresse['complement'] = $x['complement'];
			$adresse['npa'] = $x['npa'];
			$adresse['ville'] = $x['ville'];

			array_push($this->adresses, $adresse);
		}
	}

	public function get() {
		return $this->adresses;
	}

	public function delete($id, $safe = false) {
		global $db_acc;

		if($safe == false) {
			$req = $db_acc->prepare('DELETE FROM t_adresses WHERE id_adresses = ?');
			$req->execute(array($id));
		} else {
			$req = $db_acc->prepare('DELETE FROM t_adresses WHERE id_adresses = ? AND fk_users = ?');
			$req->execute(array($id, $this->userId));
		}

		$this->refresh();
	}

	public function create($nom, $rue, $numero, $complement, $npa, $ville) {
		global $db_acc;

		$send = array(
			'id' => $this->userId,
			'nom' => $nom,
			'rue' => $rue,
			'numero' => $numero,
			'complement' => $complement,
			'npa' => $npa,
			'ville' => $ville
		);

		$req = $db_acc->prepare('INSERT INTO t_adresses (fk_users, nom, rue, numero, complement, npa, ville) VALUES (:id, :nom, :rue, :numero, :complement, :npa, :ville)');
		$req->execute($send);

		$this->refresh();
	}
}

?>
