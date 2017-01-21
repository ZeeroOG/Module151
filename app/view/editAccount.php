<h2>Editer le compte</h2>
<form action="?p=editAccount" method="post">
	<table class="table table-striped">
		<tr>
			<td>Nom d'utilisateur</td>
			<td><input class="form-control" type="text" name="username-null" value="<?php echo $edit_user->getUsername(); ?>" disabled></td>
		</tr>
		<tr>
			<td>Nom</td>
			<td><input class="form-control" type="text" name="nom" placeholder="Nom de famille" value="<?php echo $edit_user->nom; ?>" autofocus></td>
		</tr>
		<tr>
			<td>Prénom</td>
			<td><input class="form-control" type="text" name="prenom" placeholder="Prénom" value="<?php echo $edit_user->prenom; ?>"></td>
		</tr>
		<tr>
			<td>Date de naissance</td>
			<td><input class="form-control" type="date" name="birthdate" value="<?php echo date('Y-m-d', strtotime($edit_user->getBirthDate())); ?>"></td>
		</tr>
		<tr>
			<td>Adresse mail</td>
			<td><input class="form-control" type="text" name="mail" placeholder="Adresse Mail" value="<?php echo $edit_user->email; ?>"></td>
		</tr>
		<tr>
			<td>Grade</td>
			<td>
				<select class="form-control" name="grade"<?php isDisabledGrade($_SESSION['user']->getLevel()); ?>>
					<option value="1"<?php isSelectedGrade(1, $edit_user->getLevel()); ?>>Utilisateur</option>
					<option value="2"<?php isSelectedGrade(2, $edit_user->getLevel()); ?>>Gestionnaire</option>
					<option value="3"<?php isSelectedGrade(3, $edit_user->getLevel()); ?>>Administrateur</option>
				</select>
			</td>
		</tr>
	</table>
	<?php if(isset($_GET['username'])) { ?>
		<input type="hidden" name="username" value="<?php echo $_GET['username']; ?>">
	<?php } ?>
	<?php if(isset($_POST['username'])) { ?>
		<input type="hidden" name="username" value="<?php echo $_POST['username']; ?>">
	<?php } ?>
	<?php if(isset($_GET['callback'])) { ?>
		<input type="hidden" name="callback" value="<?php echo $_GET['callback']; ?>">
	<?php } ?>
	<?php if(isset($_POST['callback'])) { ?>
		<input type="hidden" name="callback" value="<?php echo $_POST['callback']; ?>">
	<?php } ?>
	<input type="submit" name="send" class="btn btn-danger btn-block" value="Mettre à jour">
	<button onclick="window.history.back();" class="btn btn-primary btn-block">Annuler</button>
</form>
