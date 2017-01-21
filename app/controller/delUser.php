<?php

include('app/model/delUser.php');

if(isset($_GET['id'])) {
	if(isset($_GET['restore'])) {
		restoreUser($_GET['id']);
	} else {
		deleteUser($_GET['id']);
	}
}

if(isset($_GET['callback'])) {
	$callback = $_GET['callback'];
} else {
	$callback = "?p=home";
}

header('Location: ' . $callback);

?>
