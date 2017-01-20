<div style="max-width: 500px; margin-right: auto; margin-left: auto;">
	<h2>Inscription</h2>
	<hr />
	<form action="?p=register" method="post" class="loginForm">
		<div class="form-group">

			<label for="username">Nom d'utilisateur</label>
			<input id="username" class="form-control" type="text" name="username" <?php if(isset($_POST['username'])) { echo "value=" . $_POST['username'] . " "; } ?>placeholder="Nom d'utilisateur" autofocus required>

			<label for="nom">Nom</label>
			<input id="nom" class="form-control" type="text" name="nom" <?php if(isset($_POST['nom'])) { echo "value=" . $_POST['nom'] . " "; } ?>placeholder="Nom" required>

			<label for="prenom">Prénom</label>
			<input id="prenom" class="form-control" type="text" name="prenom" <?php if(isset($_POST['prenom'])) { echo "value=" . $_POST['prenom'] . " "; } ?>placeholder="Prénom" required>

			<label for="mail">Adresse Mail</label>
			<input id="mail" class="form-control" type="text" name="mail" <?php if(isset($_POST['mail'])) { echo "value=" . $_POST['mail'] . " "; } ?>placeholder="Adresse Mail" required>

			<label for="birthdate">Date de naissance</label>
			<input id="birthdate" class="form-control" type="date" name="birthdate" <?php if(isset($_POST['birthdate'])) { echo "value=" . $_POST['birthdate'] . " "; } ?>placeholder="Date de naissance" required>

			<label for="password1">Mot de passe</label>
			<input id="password1" class="form-control" id="password1" type="password" name="password1" placeholder="Mot de passe" required>

			<label for="password2">Mot de passe</label>
			<input id="password2" class="form-control" id="password2" type="password" name="password2" placeholder="Mot de passe" required>

			<div class="login-captcha">
				<p>Veuillez saisir le Captcha : </p>
				<img src="<?php echo $captcha->getImage(); ?>" />
				<input class="form-control" type="text" name="captcha" placeholder="Entrez le Captcha..." required>
				<input type="hidden" name="captchaId" value="<?php echo $captchaId; ?>">
			</div>
			<input class="btn btn-block btn-danger" type="submit" value="Inscription">
		</div>
	</form>
</div>
