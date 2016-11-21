<?php

echo 'Déconnexion...';

$_SESSION = array();
session_destroy();

// http://stackoverflow.com/questions/3512507/proper-way-to-logout-from-a-session-in-php
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

session_start();
header("Location: ?p=home");

?>
