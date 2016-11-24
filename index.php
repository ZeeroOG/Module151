<?php

// Démarrage de la session
session_start();

// Constantes
define("PROJECT_PATH", dirname(__FILE__));

// Fichiers inclus
include("app/core/includes.php");

// Connexion aux bases de données
$db_sql = connectDB();
$db_acc = connectUserDB();

//Système de routage des pages
include('app/core/router.php')

?>
