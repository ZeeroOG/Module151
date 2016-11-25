<?php

function connectUserDB() {
	// Chemin de la base de données (relatif au dossier du projet)
	// puis check sur l'existance du fichier
	$path = PROJECT_PATH . "\db\users.mdb";
	if(!file_exists($path)) die("Base de données Access non trouvée !");

	try {
		// Création de l'objet PDO avec le driver ODBC
		// Les strings de connexion sont disponibles ici : https://www.connectionstrings.com/microsoft-access-accdb-odbc-driver/
		$database = new PDO("odbc:Driver={Microsoft Access Driver (*.mdb)};Dbq=$path;Uid=Admin;Pwd=;");
	} catch(Exception $e) {
	    echo "Echec de connexion Access 2002: " . $e->getMessage();
	}

	return $database; // Retourner l'objet PDO
}

// Connexion à la base de données
$db_acc = connectUserDB();

?>
