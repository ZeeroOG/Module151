<?php

/*
 	Démarrage de la session
	=======================
*/

session_start();

/*
	Constantes
	==========
*/

define("PROJECT_PATH", dirname(__FILE__));

include("app/model/users/connectUserDB.php");

$database = connectUserDB();

$test = $database->query('SELECT * FROM t_test');
while ($lol = $test->fetch()) {
	echo $lol['test'] . "<br />";
}

die();

/*
	Système de routage des pages
	============================
*/

$pages = array();

// Tout le monde
$pages['home'] = 'app/controler/home/index.php';
$pages['shop'] = 'app/controler/shop/index.php';

// Utilisateur déconnecté
$pages['register'] = 'app/controler/register/index.php';
$pages['login'] = 'app/controler/login/index.php';

// Utilisateur connecté
$pages['orders'] = 'app/controler/orders/index.php';
$pages['account'] = 'app/controler/account/index.php';
$pages['logout'] = 'app/controler/logoff/index.php';

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
