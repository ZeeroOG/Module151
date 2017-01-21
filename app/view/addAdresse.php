<div style="max-width: 500px; margin-left: auto; margin-right: auto;">
	<h2>Ajouter une adresse</h2>
	<hr />
	<form action="?p=addAdresse" method="post">
		<div class="form-group">
			<label for="name">Nom & Prénom</label>
			<input type="text" name="nom" id="nom" class="form-control" placeholder="Nom & Prénom" required autofocus>

			<label for="rue">Rue</label>
			<input type="text" name="rue" id="rue" class="form-control" placeholder="Rue" required>

			<label for="numero">Numéro</label>
			<input type="text" name="numero" id="numero" class="form-control" placeholder="Numéro" required>

			<label for="complement">Complément</label>
			<input type="text" name="complement" id="complement" class="form-control" placeholder="Complément">

			<label for="npa">Code postal</label>
			<input type="text" name="npa" id="npa" pattern="[0-9][0-9][0-9][0-9]" class="form-control" placeholder="Code postal" required>

			<label for="npa">Localité</label>
			<input type="text" name="ville" id="ville" class="form-control" placeholder="Localité" required>

			<label for="npa">Pays</label>
			<input type="text" name="pays" id="pays" class="form-control" value="Suisse" disabled>

			<?php if(isset($_GET['callback'])) { ?>
			<input type="hidden" name="callback" value="<?php echo $_GET['callback']; ?>">
			<?php } ?>

			<br />
			<input type="submit" value="Ajouter" name="send" class="btn btn-danger btn-block">
		</div>
	</form>
</div>
