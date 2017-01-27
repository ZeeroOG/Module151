<?php

$films = new filmList();
$films->orderByDate();

include('app/view/rss.php');

?>
