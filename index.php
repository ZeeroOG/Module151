<?php

// ========================= //
// Système de routage génial //
// ========================= //

$pages = array();

$pages['home'] = 'app/controler/home.php';
$pages['test'] = 'app/controler/test.php';

if(!isset($_GET['p']) || !array_key_exists($_GET['p'], $pages)) {
    header('Location: ?p=home');
    die();
} else {
    $page = $_GET['p'];
}

$page_link = $pages[$page];

?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>routeur</title>
</head>
<body>
<?php

include($page_link);
echo "\n";

?>
</body>
</html>
