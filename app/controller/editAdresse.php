<?php

include("app/model/editAdresse.php");

if(isset($_POST['id'], $_POST['nom'], $_POST['rue'], $_POST['numero'], $_POST['npa'], $_POST['ville'])) {
	$adresses = new Adresses($_SESSION['user']->getUserId());

	$nom = $_POST['nom'];
	$rue = $_POST['rue'];
	$numero = $_POST['numero'];
	$npa = $_POST['npa'];
	$ville = $_POST['ville'];

	if(isset($_POST['complement'])) {
		$complement = $_POST['complement'];
	} else {
		$complement = "";
	}

	$adresses->delete($_POST['id'], true);
	$adresses->create($nom, $rue, $numero, $complement, $npa, $ville);

	if(isset($_POST['callback'])) {
		$callback = $_POST['callback'];
	} else {
		$callback = "?p=home";
	}
	//die($callback);
	header('Location: ' . $callback);
	die();
}

if(!isset($_GET['id'])) {
	header('Location: ?p=home');
	die();
}

if(getAddressUser((int)$_GET['id']) != $_SESSION['user']->getUserId()) {
	header('Location: ?p=home');
	die();
}

$adresse = getAddress($_GET['id']);

include("app/view/editAdresse.php");

?>
