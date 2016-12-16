<?php

class Panier {
	private $userid = null;
	private $panier = array();

	function __construct($userid = null)
	{
		if($userid != null) {
			$this->userid = $userid;
			$this->syncPanier();
		}
	}

	public function addItem($id, $qte = 1, $merge = false) {
		foreach ($this->panier as $key => $item) {
			$item = explode('-', $item);
			if($item[0] == (string)$id) {
				unset($this->panier[$key]);

				if($merge == true) {
					$qte = $this->getHighest($qte, (int)$item[1]);
				} else {
					$qte = $qte + (int)$item[1];
				}
			}
		}

		array_push($this->panier, $id . "-" . $qte);
	}

	public function delItem($id, $qte = null) {
		global $db_acc;

		foreach ($this->panier as $key => $item) {
			$item = explode('-', $item);
			if($item[0] == (string)$id) {
				if($qte == null OR $qte == (int)$item[1]) {
					unset($this->panier[$key]);
				} else {
					$this->panier[$key] = $item[0] . '-' . ((int)$item[1] - $qte);
				}
			}
		}

		if($this->userid != null) {
			$req2 = $db_acc->prepare('UPDATE t_users SET panier = ? WHERE id_users = ?');
			$req2->execute(array($this->exportJSON(), $this->userid));
		}
	}

	public function importJSON($json, $merge = true) {
		global $db_sql;

		$json = json_decode($json);

		foreach ($json as $value) {
			$this->addItem($value->id, $value->qte, $merge);
		}
	}

	public function exportJSON() {
		$json = array();

		foreach ($this->panier as $key => $item) {
			$item = explode('-', $item);
			array_push($json, array('id' => $item[0], 'qte' => (int)$item[1]));
		}

		return json_encode($json, JSON_FORCE_OBJECT);
	}

	public function setUserId($userid) {
		$this->userid = $userid;
	}

	public function getPanier() {
		sort($this->panier);
		return $this->panier;
	}

	public function emptyPanier() {
		$this->panier = array();
	}

	public function syncPanier() {
		global $db_acc;

		if($this->userid != null) {
			$req = $db_acc->prepare('SELECT panier FROM t_users WHERE id_users = ?');
			$req->execute(array($this->userid));

			$data = $req->fetch();
			if($data['panier'] != "" AND $data['panier'] != null AND $data['panier'] != '{}') $this->importJSON($data['panier'], true);

			$req2 = $db_acc->prepare('UPDATE t_users SET panier = ? WHERE id_users = ?');
			$req2->execute(array($this->exportJSON(), $this->userid));
		}
	}

	private function getHighest($x, $y) {
		if($x < $y) {
			return $y;
		} else {
			return $x;
		}
	}
}


?>
