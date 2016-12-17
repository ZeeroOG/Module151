<?php

// Constantes
define("PROJECT_PATH", dirname(__FILE__));

// Mettre le HTML en cache
ob_start();

// Fichiers inclus
include("app/core/includes.php");

// Importer le panier
include("app/core/importPanier.php");

//Système de routage des pages
include('app/core/router.php');

// Exporter le panier
include("app/core/exportPanier.php");

// Envoyer le HTML
ob_end_flush();

?>
