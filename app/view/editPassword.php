<form action="?p=editPassword" method="post">
	<div class="form-group" style="max-width: 500px; margin-left: auto; margin-right: auto;">
		<h3>Changement de mot de passe</h3>
		<hr />
		<label for="pass1">Entrez le nouveau mot de passe :</label>
		<input type="password" class="form-control" name="pass1" id="pass1">
		<label for="pass2">Confirmez le nouveau mot de passe :</label>
		<input type="password" class="form-control" name="pass2" id="pass2">
		<?php if(isset($_GET['callback'])) { ?><input type="hidden" name="callback" value="<?php echo $_GET['callback']; ?>"><?php } ?>
		<br />
		<input class="btn btn-block btn-success" type="submit" value="Changer">
		<button class="btn btn-block btn-danger" onclick="window.history.back();">Annuler</button>
	</div>
</form>
