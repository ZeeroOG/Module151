<?php

if(isset($_GET['id'])) {
	$adresse = new Adresses($_SESSION['user']->getUserId());
	$adresse->delete($_GET['id']);
}

if(isset($_GET['callback'])) {
	header('Location: ' . $_GET['callback']);
} else {
	header('Location: ?p=home');
}

?>
