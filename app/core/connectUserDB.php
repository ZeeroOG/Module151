<?php

function connectUserDB() {
	// Chemin de la base de données (relatif au dossier du projet)
	// puis check sur l'existance du fichier
	$driver = "{Microsoft Access Driver (*.mdb)}";
	$path = PROJECT_PATH . "\db\users.mdb";

	if(!file_exists($path)) {
		echo "Erreur critique ! Vérifiez les logs.";
		Log::error("Base de données Access non trouvée !");
		die();
	}

	try {
		// Création de l'objet PDO avec le driver ODBC
		// Les strings de connexion sont disponibles ici : https://www.connectionstrings.com/microsoft-access-accdb-odbc-driver/
		$database = new PDO("odbc:Driver=$driver;Dbq=$path;Uid=Admin;Pwd=;");
		$database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	} catch(Exception $e) {
		echo "Erreur critique ! Vérifiez les logs.";
		Log::error("Echec de connexion Access 2002: " . $e->getMessage());
		die();
	}

	return $database; // Retourner l'objet PDO
}

// Connexion à la base de données
$db_acc = connectUserDB();

?>
