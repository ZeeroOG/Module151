<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Magasin</title>
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/styles.css" />
</head>
<body>
	<div class="container" style="min-width: 1000px; margin-top: 20px;">
		<!-- PROMO -->
		<div style="text-align: center; margin-bottom: 20px;">
			<img style="width: 100%;" src="img/promo.jpg" alt="PROMO" />
		</div>
		<!-- Barre de navigation -->
		<nav class="navbar navbar-default">
			<div class="container-fluid">
				<div class="navbar-header">
					<a class="navbar-brand" href="?">Magasin</a>
				</div>
				<div id="navbar">
					<ul class="nav navbar-nav">
						<li><a href="?p=home"><i class="glyphicon glyphicon-home"></i> Accueil</a></li>
						<li><a href="?p=shop"><i class="glyphicon glyphicon-shopping-cart"></i> Shop</a></li>
						<li><a href="?p=orders"><i class="glyphicon glyphicon-book"></i> Commandes</a></li>
						<li><a href="?p=admin"><i class="glyphicon glyphicon-wrench"></i> Administration</a></li>
					</ul>
					<ul class="nav navbar-nav navbar-right">
						<!-- Utilisateur déconnecté -->
						<li><a href="?p=register"><i class="glyphicon glyphicon-pencil"></i> Inscription</a></li>
						<li><a href="?p=login"><i class="glyphicon glyphicon-log-in"></i> Connexion</a></li>
						<!-- Utilisateur connecté -->
						<!--<li><a href="?p=account"><i class="glyphicon glyphicon-user"></i> Mon compte</a></li>
						<li><a href="?p=logout"><i class="glyphicon glyphicon-log-out"></i> Déconnexion</a></li>-->
					</ul>
				</div><!--/.nav-collapse -->
			</div><!--/.container-fluid -->
		</nav>
	</div>
    <div class="container" style="min-width: 1000px;">
        <?php include($page_link);
        echo "\n"; ?>
	</div>
	<div class="container" style="min-width: 1000px; text-align: center; margin-top: 20px;">
        <p class="muted">&copy; 2017 - Henry Jonas, Sebastiao Cristiano, Mujynya Cédric, Maillard William</p>
	</div>
    <!-- Javascript -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>
