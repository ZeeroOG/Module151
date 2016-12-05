<div style="max-width: 500px; margin-right: auto; margin-left: auto; margin-top: 40px; margin-bottom: 20px;">
<form action="?p=login" method="post" class="loginForm">
	<fieldset>
  		<legend>Connexion</legend>
		<table>
			<tr>
				<td>Nom d'utilisateur</td>
				<td><input type="text" name="username" <?php if(isset($_GET['newAccount'])) { echo "value=" . $_GET['newAccount'] . " "; } ?><?php if(isset($_POST['username'])) { echo "value=" . $_POST['username'] . " "; } ?>placeholder="Nom d'utilisateur" autofocus required></td>
			</tr>
			<tr>
				<td>Mot de passe</td>
				<td><input type="password" name="password" placeholder="Mot de passe" required></td>
			</tr>
		</table>
		<?php
		if(isset($_SESSION['loginCount']) AND $_SESSION['loginCount'] >= LOGIN_COUNT_CAPTCHA) {
			?>
			<style>
				.login-captcha {
					width: 300px;
					text-align: center;
					margin-left: auto;
					margin-right: auto;
					margin-bottom: 20px;
				}
				.login-captcha input {
					width: 98%;
				}
				.login-captcha p {
					color: red;
				}
			</style>
			<div class="login-captcha">
				<p>Veuillez saisir le Captcha : </p>
				<img src="<?php echo $captcha->getImage(); ?>" />
				<input type="text" name="captcha" placeholder="Entrez le Captcha..." required>
				<input type="hidden" name="captchaId" value="<?php echo $captchaId; ?>">
			</div>
			<?php
		}
		?>
		<div><button type="submit">Connexion</button></div>
	</fieldset>
</form>
<br />
</div>
