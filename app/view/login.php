<div style="max-width: 500px; margin-right: auto; margin-left: auto; margin-top: 40px; margin-bottom: 20px;">
<form action="?p=login" method="post" class="form-signin">
  		<h2 class="form-signin-heading">Connexion</h2>

		<?php if(isset($_GET['callback'])) { ?>
			<p style="font-weight: bold;">Vous devez vous connecter pour effectuer cette action.</p>
		<?php } ?>

		<label for="username" class="sr-only">Nom d'utilisateur</label>
		<input class="form-control" type="text" id="username" name="username" <?php if(isset($_GET['newAccount'])) {
				echo "value=" . $_GET['newAccount'] . " "; } ?><?php if(isset($_POST['username'])) { echo "value=" . $_POST['username'] . " ";
			} ?>placeholder="Nom d'utilisateur" required<?php if(!isset($_GET['newAccount']) AND !isset($_POST['username'])) {
				echo " autofocus";
			} ?>>

		<label for="password" class="sr-only">Mot de passe</label>
		<input class="form-control" id="password" type="password" name="password" placeholder="Mot de passe" required<?php
			if(isset($_GET['newAccount']) OR isset($_POST['username'])) {
				echo " autofocus";
			} ?>>

		<?php if(isset($_SESSION['loginCount']) AND $_SESSION['loginCount'] >= LOGIN_COUNT_CAPTCHA) { ?>
		<div class="login-captcha">
			<p>Veuillez saisir le Captcha : </p>
			<img src="<?php echo $captcha->getImage(); ?>" />
			<input class="form-control" type="text" name="captcha" placeholder="Entrez le Captcha..." required>
			<input type="hidden" name="captchaId" value="<?php echo $captchaId; ?>">
		</div>
		<?php } ?>
		<?php if(isset($_GET['callback'])) { ?>
			<input type="hidden" name="callback" value="<?=$_GET['callback']?>">
		<?php } ?>
		<input class="form-control btn btn-block btn-danger" type="submit" value="Connexion">
	</div>
</form>
</div>
