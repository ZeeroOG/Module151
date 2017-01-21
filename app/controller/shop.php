<?php

$filmList = new FilmList();

if(isset($_POST['search']) OR isset($_POST['order'])) {
	$url = '?p=shop';

	if(isset($_POST['search'])) {
		$url .= '&search=' . $_POST['search'];
	} elseif(isset($_GET['search'])) {
		$url .= '&search=' . $_GET['search'];
	}

	if(isset($_POST['order'])) {
		$url .= '&order=' . $_POST['order'] . '&invert=' . $_POST['invert'];
	} elseif(isset($_GET['order'])) {
		$url .= '&order=' . $_GET['order'] . '&invert=' . $_GET['invert'];
	}

	header('Location: ' . $url);
}

if(isset($_GET['search'])) {
	$filmList->search($_GET['search']);
}

if(isset($_GET['order'], $_GET['invert'])) {
	if($_GET['order'] == 'title') $filmList->orderByTitle($_GET['invert']);
	elseif($_GET['order'] == 'date') $filmList->orderByDate($_GET['invert']);
} else {
	$filmList->orderByDate(1);
}

include('app/view/shop.php');

?>
