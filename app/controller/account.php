<?php

$adresses = new Adresses($_SESSION['user']->getUserId());

include("app/view/account.php");

?>
