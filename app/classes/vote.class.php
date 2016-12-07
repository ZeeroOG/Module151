<?php

class Vote
{
	private $userid;
	private $filmid;
	private $hasVoted;
	private $vote;

	function __construct($filmid, $userid)
	{
		$this->filmid = $filmid;
		$this->userid = $userid;

		$this->checkDBforVote();
	}

	private function checkDBforVote() {
		global $db_sql;

		$req = $db_sql->prepare("SELECT note FROM t_notefilm WHERE fk_film = ? AND fk_user = ? LIMIT 1");
		$req->execute(array($this->filmid, $this->userid));

		if($req->rowCount() == 0) {
			$this->hasVoted = false;
		} else {
			$this->hasVoted = true;

			$x = $req->fetch();
			$this->vote = $x['note'];
		}
	}

	private function updateDatabase() {
		global $db_sql;

		if($this->hasVoted == true) {
			$req = $db_sql->prepare("UPDATE t_notefilm SET note = ? WHERE fk_film = ? AND fk_user = ?");
			$req->execute(array($this->vote, $this->filmid, $this->userid));
		}
		else {
			$req = $db_sql->prepare("INSERT INTO t_notefilm (fk_film, fk_user, note) VALUES (?, ?, ?)");
			$req->execute(array($this->filmid, $this->userid, $this->vote));
			$this->hasVoted = true;
		}


	}

	public function setVote($note) {
		if(is_numeric($note) AND $note > 0 AND $note < 11) {
			$this->vote = $note;
			$this->updateDatabase();
			return true;
		} else {
			return false;
		}

	}

	public function hasVoted() {
		return $this->hasVoted;
	}

	public function getVote() {
		return $this->vote;
	}
}


?>
