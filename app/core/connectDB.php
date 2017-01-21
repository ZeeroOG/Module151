<?php

function connectDB() {
	$host = MYSQL_HOST;
	$name = MYSQL_NAME;
	$user = MYSQL_USER;
	$pass = MYSQL_PASS;

	try {
		$database = new PDO("mysql:host=$host;dbname=$name;charset=UTF8", $user, $pass);
		$database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	} catch(Exception $e) {
		echo "Erreur critique ! Vérifiez les logs.";
		Log::error("Echec de connexion MySQL: " . $e->getMessage());
		die();
	}

	return $database; // Retourner l'objet PDO
}

// Connexion à la base de données
$db_sql = connectDB();

?>
