<?php

echo 'Déconnexion...';

// Destruction du panier
setcookie('panier', '', time()-3600);

// Destruction de la session
$_SESSION = array();
session_destroy();

session_start();
header("Location: ?p=home");
die();

?>
