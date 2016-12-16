<?php

// Constantes
define("PROJECT_PATH", dirname(__FILE__));

// Fichiers inclus
include("app/core/includes.php");

// TEST PANIER
/*
$panier = new Panier();
$panier->addItem('idtest', 3);
$panier->addItem('idtest2', 1);
$panier->addItem('delTest', 1);
$panier->addItem('dimTest', 2);
$panier->delItem('delTest');
$panier->delItem('dimTest', 1);
echo "<pre>" . $panier->exportJSON() . "</pre>";
die();
*/

//Système de routage des pages
include('app/core/router.php')

?>
