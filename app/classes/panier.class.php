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
		$this->syncPanier();
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

		$this->syncPanier();
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

	private function syncPanier() {
		global $db_sql;

		if($this->userid != null) {
			// Sync db
		}
	}
}


?>
