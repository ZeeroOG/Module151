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

// TODO: Migrer ce tableau dans la base SQL
$pages = array();

// Tout le monde
$pages['home'] = 'app/controler/home/index.php';
$pages['shop'] = 'app/controler/shop/index.php';

// Utilisateur déconnecté
$pages['register'] = 'app/controler/register/index.php';
$pages['login'] = 'app/controler/session/login.php';

// Utilisateur connecté
$pages['orders'] = 'app/controler/orders/index.php';
$pages['account'] = 'app/controler/account/index.php';
$pages['logout'] = 'app/controler/session/logout.php';

// Administrateur uniquement
$pages['admin'] = 'app/controler/admin/index.php';


if(!isset($_GET['p']) || !array_key_exists($_GET['p'], $pages)) {
    header('Location: ?p=home');
    die();
} else {
    $page = $_GET['p'];
}

$page_link = $pages[$page];

include('app/view/global/index.php')

?>
