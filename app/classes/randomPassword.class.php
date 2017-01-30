<?php
/*

Usage :
=======

$password = new RandomPassword();
echo $password->getPass();

Optionnel :
===========

$password = new RandomPassword($nombreDeMajuscules, $nombreDeMinuscules, $nombreDeChiffres, $nombreDeCharSpeciaux);
echo $password->getPass();

*/
class RandomPassword {
	private $maj = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
	private $min = "abcdefghijklmnopqrstuvwxyz";
	private $spe = "@#!&$";
	private $passChars = array();
	private $password = "";

	function __construct($maj = 1, $min = 3, $num = 4, $spe = 0)
	{
		for($i = 0; $i < $maj; $i++) {
			array_push($this->passChars, $this->genMaj());
		}

		for ($i = 0; $i < $min; $i++) {
			array_push($this->passChars, $this->genMin());
		}

		for ($i = 0; $i < $num; $i++) {
			array_push($this->passChars, $this->genNum());
		}

		for ($i = 0; $i < $spe; $i++) {
			array_push($this->passChars, $this->genSpe());
		}

		shuffle($this->passChars);

		foreach ($this->passChars as $value) {
			$this->password .= $value;
		}

		return $this->getPass();
	}

	private function genMaj() {
		return $this->maj[rand(0, strlen($this->maj)-1)];
	}

	private function genMin() {
		return $this->min[rand(0, strlen($this->min)-1)];
	}

	private function genNum() {
		return (string) rand(0, 9);
	}

	private function genSpe() {
		return $this->spe[rand(0, strlen($this->spe)-1)];
	}

	public function getPass() {
		return $this->password;
	}
}


?>
