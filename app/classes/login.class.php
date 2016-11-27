<?php

class Login
{
	private $userid;
	private $username;
	private $ip;
	private $time;

	function __construct($username)
	{
		$this->username = $username;

		$this->getIP();
		$this->getTime();
		$this->getUserId();
		$this->writeDB();
	}

	private function getIP() {
		$this->ip = $_SERVER['REMOTE_ADDR'];
	}

	private function getTime() {
		$this->time = time();
	}

	private function getUserId() {
		global $db_acc;

		$req = $db_acc->prepare("SELECT id_users FROM t_users WHERE username = ?");
		$rep = $req->execute(array($this->username));

		while($user = $req->fetch()) {
			$userid = $user['id_users'];
		}

		$this->userid = $userid;
	}

	private function writeDB() {
		global $db_acc;

		$req = $db_acc->prepare("INSERT INTO t_login (logtime, logip, fk_user) VALUES (?, ?, ?)");
		$req->execute(array($this->time, $this->ip, $this->userid));
	}
}


?>
