<div style="max-width: 500px; margin-right: auto; margin-left: auto; margin-top: 40px; margin-bottom: 20px;">
<form action="?p=register" method="post" class="loginForm">
	<fieldset>
  		<legend>Inscription</legend>
		<table>
			<tr>
				<td>Nom d'utilisateur</td>
				<td><input class="form-control" type="text" name="username" <?php if(isset($_POST['username'])) { echo "value=" . $_POST['username'] . " "; } ?>placeholder="Nom d'utilisateur" autofocus required></td>
			</tr>
			<tr>
				<td>Nom</td>
				<td><input class="form-control" type="text" name="nom" <?php if(isset($_POST['nom'])) { echo "value=" . $_POST['nom'] . " "; } ?>placeholder="Nom" required></td>
			</tr>
			<tr>
				<td>Prénom</td>
				<td><input class="form-control" type="text" name="prenom" <?php if(isset($_POST['prenom'])) { echo "value=" . $_POST['prenom'] . " "; } ?>placeholder="Prénom" required></td>
			</tr>
			<tr>
				<td>Adresse Mail</td>
				<td><input class="form-control" type="text" name="mail" <?php if(isset($_POST['mail'])) { echo "value=" . $_POST['mail'] . " "; } ?>placeholder="Adresse Mail" required></td>
			</tr>
			<tr>
				<td>Date de naissance</td>
				<td><input class="form-control" type="date" name="birthdate" <?php if(isset($_POST['birthdate'])) { echo "value=" . $_POST['birthdate'] . " "; } ?>placeholder="Date de naissance" required></td>
			</tr>
			<tr>
				<td>Mot de passe</td>
				<td><input class="form-control" id="password1" type="password" name="password1" placeholder="Mot de passe" required></td>
			</tr>
			<tr>
				<td>Mot de passe</td>
				<td><input class="form-control" id="password2" type="password" name="password2" placeholder="Mot de passe" required></td>
			</tr>
		</table>
		<style>
			.login-captcha {
				width: 300px;
				text-align: center;
				margin-left: auto;
				margin-right: auto;
				margin-bottom: 20px;
			}
			.login-captcha input {
				/*width: 98%;*/
			}
		</style>
		<div class="login-captcha">
			<p>Veuillez saisir le Captcha : </p>
			<img src="<?php echo $captcha->getImage(); ?>" />
			<input class="form-control" type="text" name="captcha" placeholder="Entrez le Captcha..." required>
			<input type="hidden" name="captchaId" value="<?php echo $captchaId; ?>">
		</div>
		<div><button class="btn btn-block btn-primary" type="submit">Inscription</button></div>
	</fieldset>
</form>
<br />
</div>
