<?php

function checkActive($check) {
	global $pages;
	global $page;

	if($pages->$page->menu == $check) echo " class=\"active\"";
}

$pages = json_decode(file_get_contents('db/router.json'));

if(!isset($_GET['p']) || !isset($pages->$_GET['p'])) {
    header('Location: ?p=home');
    die();
} else {
    $page = $_GET['p'];
}

if(isset($_SESSION['user'])) {
	$grade = $_SESSION['user']->getLevel();
} else {
	$grade = 0;
}

if($pages->$page->grade == -1 AND $grade != 0) {
	header('Location: ?p=home');
    die();
} elseif ($grade < $pages->$page->grade) {
	header('Location: ?p=home');
    die();
}

if($pages->$page->title == 'RSS') {
	header("Content-type: text/xml");
	include($pages->$page->path);
} else { ?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo $pages->$page->title; ?> | Nexflit | Achetez vos DVD et Blu-Ray en ligne !</title>
	<link rel="stylesheet" href="css/bootstrap.min.css" />
	<link rel="stylesheet" href="css/fonts.css" />
    <link rel="stylesheet" href="css/styles.css" />
</head>
<body>
	<div class="container header">
		<!-- Logo -->
		<div style="text-align: center; margin-bottom: 20px;">
			<a href="?p=home"><img style="width: 100%; max-height: 150px; max-width: 1000px;" src="img/logo.png" alt="Logo" /></a>
		</div>
		<?php if(isset($_SESSION['user'])) { ?><p class="welcome-message">Connecté en tant que : <a href="?p=account"><?php echo $_SESSION['user']->getUsername(); ?></a></p><?php } ?>
		<!-- Barre de navigation -->
		<div class="navbar">
			<ul>
				<li<?php checkActive("home"); ?>><a href="?p=home">Accueil</a></li>
				<li<?php checkActive("shop"); ?>><a href="?p=shop">Shop</a></li>
				<li<?php checkActive("panier"); ?>><a href="?p=panier">Panier</a></li>
				<?php if(isset($_SESSION['user']) AND $_SESSION['user']->getLevel() > 0) { ?>
				<!-- Utilisateur connecté -->
				<li<?php checkActive("orders"); ?>><a href="?p=orders">Commandes</a></li>
				<?php } ?>
				<?php if(isset($_SESSION['user']) AND $_SESSION['user']->getLevel() > 1) { ?>
				<!-- Opérateur / Administrateur -->
				<li<?php checkActive("admin"); ?>><a href="?p=admin">Administration</a></li>
				<?php } ?>
				<li><a target="_blank" href="?p=rss">Flux RSS</a></li>
				<div class="right">
					<?php if(!isset($_SESSION['user'])) { ?>
					<!-- Utilisateur déconnecté -->
					<li<?php checkActive("register"); ?>><a href="?p=register">Inscription</a></li>
					<li<?php checkActive("login"); ?>><a href="?p=login">Connexion</a></li>
					<?php } ?>
					<?php if(isset($_SESSION['user']) AND $_SESSION['user']->getLevel() > 0) { ?>
					<!-- Utilisateur connecté -->
					<li<?php checkActive("account"); ?>><a href="?p=account">Mon compte</a></li>
					<li<?php checkActive("logout"); ?>><a href="?p=logout">Déconnexion</a></li>
					<?php } ?>
				</div>
			</ul>
		</div>
	</div>
    <div class="main container">
        <?php include($pages->$page->path);
        echo "\n"; ?>
	</div>
	<footer class="footer">
	  <div class="container">
	    <p class="muted">Page générée en : <b>%loadingTime%ms</b> par le serveur <b>%serverName%</b></p>
        <p class="muted"><b>&copy; 2016-<?php echo date('Y'); ?></b> - Henry Jonas, Sebastiao Cristiano, Mujynya Cédric, Maillard William</p>
	  </div>
	</footer>
	<!-- Javascript -->
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/addMovie.js"></script>
</body>
</html>
<?php } ?>
