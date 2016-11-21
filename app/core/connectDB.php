<?php

function connectDB() {
	$host = MYSQL_HOST;
	$name = MYSQL_NAME;
	$user = MYSQL_USER;
	$pass = MYSQL_PASS;

	try {
		$database = new PDO("mysql:host=$host;dbname=$name", $user, $pass);
	} catch(Exception $e) {
	    echo "Echec de connexion MySQL: " . $e->getMessage();
	}

	return $database; // Retourner l'objet PDO
}

?>
