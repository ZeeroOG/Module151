<?php

$admin_username = $_SESSION['user']->getUsername();
$admin_level = mb_strtolower($_SESSION['user']->getLevelName(), 'UTF-8');

include("app/view/adminMenu.php");
include("app/view/admin.php")

?>
