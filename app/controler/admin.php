<?php

$admin_username = $_SESSION['user']->getUsername();
$admin_level = strtolower($_SESSION['user']->getLevelName());

include("app/view/adminMenu.php");
include("app/view/admin.php")

?>
