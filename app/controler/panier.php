<?php

if(isset($_GET['add'])) {
	$article = $_GET['add'];

	if(isset($_GET['qte']) AND is_numeric($_GET['qte'])) {
		$qte = $_GET['qte'];
	} else {
		$qte = 1;
	}

	if(isset($_GET['callback'])) {
		$callback = urldecode($_GET['callback']);
	} else {
		$callback = '?p=panier';
	}

	$panier->addItem($article, $qte);

	header('Location: ' . $callback);
}

if(isset($_GET['del'])) {
	$article = $_GET['del'];

	if(isset($_GET['qte']) AND is_numeric($_GET['qte'])) {
		$qte = $_GET['qte'];
	} else {
		$qte = null;
	}

	if(isset($_GET['callback'])) {
		$callback = urldecode($_GET['callback']);
	} else {
		$callback = '?p=panier';
	}

	if($qte == null) $panier->delItem($article);
	else $panier->delItem($article, $qte);

	header('Location: ' . $callback);
}

$showPanier = $panier->getPanier();

include('app/view/panier.php');

?>
