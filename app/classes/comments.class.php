<?php

/*

UTILISATION
===========

$comments = new Comments($id_film);

while($comments->fetch()) {
	echo $comments->getUsername();
	echo $comments->getName();
	echo $comments->getCommentId();
	echo $comments->getComment();
	echo $comments->getDateTime();
}

*/
Class Comments {
	private $filmid;
	private $count;

	private $commentid;
	private $name;
	private $username;
	private $comment;
	private $time;

	function __construct($filmid) {
		global $db_sql;
		global $db_acc;

		$this->filmid = $filmid;
		$this->count = -1;

		$req = $db_sql->prepare("SELECT id_commentaire, fk_user, unixtime, commentaire FROM t_commentaire WHERE visible = 1 AND fk_film = ?");
		$req->execute(array($filmid));

		for($i = 0; $x = $req->fetch(); $i++) {
			$req2 = $db_acc->prepare("SELECT username, nom, prenom FROM t_users WHERE id_users = ?");
			$req2->execute(array($x['fk_user']));

			while($y = $req2->fetch()) {
				$this->name[$i] = $y['prenom'] . " " . $y['nom'];
				$this->username[$i] = $y['username'];
			}

			$this->commentid[$i] = $x['id_commentaire'];
			$this->comment[$i] = $x['commentaire'];
			$this->time[$i] = $x['unixtime'];
		}
	}

	public function fetch() {
		if($this->count+1 < count($this->commentid)) {
			$this->count = $this->count + 1;
			return true;
		} else {
			return false;
		}
	}

	public function getUsername() {
		return $this->username[$this->count];
	}

	public function getName() {
		return $this->name[$this->count];
	}

	public function getCommentId() {
		return $this->commentid[$this->count];
	}

	public function getComment() {
		return $this->parseEmotes($this->comment[$this->count]);
	}

	public function getDateTime() {
		return date("d.m.Y H:i", strtotime($this->time[$this->count]));
	}

	private function parseEmotes($comment) {
		$emotes = json_decode(file_get_contents('db/emotes.json'));

		foreach($emotes as $key => $emote) {
			$comment = str_replace(":" . $key . ":", "<img src=\"img/emotes/" . $emote . "\" height=\"20\" width=\"20\" />", $comment);
		}

		return $comment;
	}
}

?>
