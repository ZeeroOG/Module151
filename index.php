<?php

// Constantes
define("PROJECT_PATH", dirname(__FILE__));

// Fichiers inclus
include("app/core/includes.php");
Log::info("TEST");
Log::warn("TEST");
Log::error("TEST");
//Système de routage des pages
include('app/core/router.php')

?>
