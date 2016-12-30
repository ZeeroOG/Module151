<?php

// Constantes
define("PROJECT_PATH", dirname(__FILE__));

// Début chargement page
$loadingTime = microtime();

// Mettre le HTML en cache
ob_start();

// Fichiers inclus
include("app/core/includes.php");

// Démarrage de la session
session_start();

// Importer le panier
include("app/core/importPanier.php");

//Système de routage des pages
include('app/core/router.php');

// Exporter le panier
include("app/core/exportPanier.php");

// Copier le HTML et fermer le buffer
$html = ob_get_contents();
ob_end_clean();

// Insérer variables dans le HTML
if(isset($filmName)) setVarHTML($html, 'filmName', $filmName); // Nom du film dans showFilm
setVarHTML($html, 'serverName', gethostname()); // Nom du serveur qui a traité la demande
setVarHTML($html, 'loadingTime', microtime() - $loadingTime); // Temps de chargement de la page

// Envoyer le HTML
echo $html;

?>
