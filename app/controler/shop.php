<?php

$filmList = new FilmList();

$filmList->orderByDate();
$filmList->orderByTitle();
$filmList->search('test');
$filmList->reset();

foreach ($filmList->getFilmList() as $value) {
	echo '<a href="?p=showFilm&id=' . $value['id'] . '">' . $value['titre'] . " - " . $value['sortie'] . "</a><br />";
}

?>
