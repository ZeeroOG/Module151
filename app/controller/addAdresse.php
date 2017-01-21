<?php

if(isset($_POST['nom'], $_POST['rue'], $_POST['numero'], $_POST['npa'], $_POST['ville'])) {
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

	$adresses->create($nom, $rue, $numero, $complement, $npa, $ville);

	if(isset($_POST['callback'])) {
		$callback = $_POST['callback'];
	} else {
		$callback = "?p=home";
	}

	header('Location: ' . $callback);
}

include("app/view/addAdresse.php");

?>
