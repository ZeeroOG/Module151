<?php

class Panier
{
	private $userid = null;
	private $panier = array();

	function __construct($userid = null)
	{
		if($userid != null) {
			$this->userid = $userid;
			$this->syncPanier();
		}
	}

	public function addItem($id, $qte = 1) {
		foreach ($this->panier as $key => $item) {
			$item = explode('-', $item);
			if($item[0] == (string)$id) {
				unset($this->panier[$key]);
				$qte = $qte + (int)$item[1];
			}
		}

		array_push($this->panier, $id . "-" . $qte);
	}

	public function delItem($id, $qte = null) {
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
	}

	public function importJSON($json) {
		global $db_sql;

		$json = json_decode($json);

		foreach ($json as $value) {
			$this->addItem($value->id, $value->qte);
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

	public function emptyPanier() {
		$this->panier = array();
	}

	public function syncPanier() {
		global $db_sql;

		if($this->userid != null) {
			$req = $db_sql->prepare('SELECT * FROM t_panier WHERE fk_user = ? ORDER BY article ASC');
			$req->execute(array($this->userid));

			while($x = $req->fetch()) {
				$check = false;

				foreach($this->panier as $key => $item) {
					$item = explode('-', $item);
					if($item[0] == $x['article']) {
						$this->panier[$key] = $item[0] . '-' . $this->getHighest($x['qte'], $item[1]);
						$check = true;
					}
				}

				if($check == true) $this->addItem($x['article'], $x['qte']);
			}

			$req3 = $db_sql->prepare('DELETE FROM t_panier WHERE fk_user = ?');
			$req3->execute(array($this->userid));

			foreach($this->panier as $item) {
				$item = explode('-', $item);
				$req2 = $db_sql->prepare('INSERT INTO t_panier (fk_user, article, qte) VALUES (?, ?, ?)');
				$req2->execute(array($this->userid, $item[0], (int)$item[1]));
			}
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
