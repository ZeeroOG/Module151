<?php

if(isset($_SESSION['user'])) {
	$panier = new Panier($_SESSION['user']->getUserId());
} else {
	$panier = new Panier();
}

if(isset($_COOKIE["panier"])) $panier->importJSON($_COOKIE["panier"]);


?>
