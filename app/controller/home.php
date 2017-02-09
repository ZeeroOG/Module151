<?php

$films = new FilmList();
$films->orderByDate();
$newFilms = $films->getFilmList(1, 5);

$films->orderByNotes();
$favFilms = $films->getFilmList(1, 5);

$films->orderByVotes();
$popFilms = $films->getFilmList(1, 5);

include('app/view/home.php');

?>
