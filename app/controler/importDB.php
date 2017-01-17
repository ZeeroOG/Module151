<?php
	include("app/view/adminMenu.php");

	$errors = array();
	include('app/model/importDB.php');
	if(isset($_POST['send'])) {

	  if (empty($_FILES) OR empty($_FILES['file']) OR $_FILES['file']['error'] == 4) {

	    array_push($errors,'Aucun fichier choisi');
	  }
	  else {

		$file = $_FILES['file'];
		if($file['error'] != 0) {

		  array_push($errors,'Erreur lors de l\'envoi du fichier');
		}
		else if(pathinfo($file['name'],PATHINFO_EXTENSION) != 'sql') {

		  array_push($errors,'Le fichier doit être au format .SQL');
		}
		else {

		  $sql = file($file['tmp_name']);
		  import($db_sql,$sql,$errors,$_POST['eraseBefore']);
	    }
	  }
	}


	include('app/view/importDB.php');
?>
