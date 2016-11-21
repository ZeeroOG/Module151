<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Magasin</title>
    <link rel="stylesheet" href="css/styles.css" />
</head>
<body>
	<div class="container header">
		<!-- PROMO -->
		<div style="text-align: center; margin-bottom: 20px;">
			<img style="width: 100%;" src="img/promo.jpg" alt="PROMO" />
		</div>
		<!-- Barre de navigation -->
		<div class="navbar">
			<ul>
				<!-- Tout le monde -->
				<li class="active"><a href="?p=home">Accueil</a></li>
				<li><a href="?p=shop">Shop</a></li>
				<!-- Utilisateur connecté -->
				<li><a href="?p=orders">Commandes</a></li>
				<li><a href="?p=admin">Administration</a></li>
				<div class="right">
					<!-- Utilisateur déconnecté -->
					<li><a href="?p=register">Inscription</a></li>
					<li><a href="?p=login">Connexion</a></li>
					<!-- Utilisateur connecté -->
					<li><a href="?p=account">Mon compte</a></li>
					<li><a href="?p=logout">Déconnexion</a></li>
				</div>
			</ul>
		</div>
	</div>
    <div class="container">
        <?php include($page_link);
        echo "\n"; ?>
	</div>
	<div class="container footer">
        <p class="muted">&copy; 2017 - Henry Jonas, Sebastiao Cristiano, Mujynya Cédric, Maillard William</p>
	</div>
</body>
</html>
