<div style="max-width: 500px; margin-left: auto; margin-right: auto;">
	<?php if(isset($_GET['return'])) {
		if ($_GET['return'] == 'delete-success') { ?>
		<div class="alert alert-success alert-dismissible" role="alert">
			<button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
			<strong>Succés !</strong> Le compte est supprimé.
		</div>
		<?php } elseif ($_GET['return'] == 'restore-success') { ?>
		<div class="alert alert-success alert-dismissible" role="alert">
			<button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
			<strong>Succés !</strong> Le compte est restauré.
		</div>
		<?php }
	} ?>

	<h3>Utilisateurs actifs</h3>
	<table class="table table-striped">
		<tr style="font-weight: bold;">
			<td>Nom d'utilisateur</td>
			<td>Actions</td>
		</tr>
		<?php foreach ($users as $user) { ?>
		<tr>
			<td><?php echo $user['username'] ?></td>
			<td>
				<a href="?p=editAccount&username=<?php echo $user['username']; ?>&callback=<?php echo urlencode('?p=listUsers&return=edit-success'); ?>" class="btn btn-xs btn-primary">Editer</a>
				<a href="?p=resetPassword&username=<?php echo $user['username']; ?>&" class="btn btn-xs btn-warning">Mot de passe</a>
				<a href="?p=delUser&id=<?php echo $user['id_users']; ?>&callback=<?php echo urlencode('?p=listUsers&return=delete-success'); ?>" class="btn btn-xs btn-danger">Supprimer</a>
			</td>
		</tr>
		<?php } ?>
	</table>
	<?php if(count($users) < 1) { ?>
		<center>
			<p>
				<b>Aucun résultat</b>
			</p>
		</center>
	<?php } ?>

	<br />

	<h3>Utilisateurs supprimés</h3>
	<table class="table table-striped">
		<tr style="font-weight: bold;">
			<td>Nom d'utilisateur</td>
			<td>Actions</td>
		</tr>
		<?php foreach ($deleted_users as $user) { ?>
		<tr>
			<td><?php echo $user['username'] ?></td>
			<td>
				<a href="?p=editAccount&username=<?php echo $user['username']; ?>&callback=<?php echo urlencode('?p=listUsers&return=edit-success'); ?>" class="btn btn-xs btn-primary">Editer</a>
				<a href="?p=resetPassword&username=<?php echo $user['username']; ?>&" class="btn btn-xs btn-warning">Mot de passe</a>
				<a href="?p=delUser&id=<?php echo $user['id_users']; ?>&restore=yes&callback=<?php echo urlencode('?p=listUsers&return=restore-success'); ?>" class="btn btn-xs btn-success">Restaurer</a>
			</td>
		</tr>
		<?php } ?>
	</table>
	<?php if(count($deleted_users) < 1) { ?>
		<center>
			<p>
				<b>Aucun résultat</b>
			</p>
		</center>
	<?php } ?>
</div>
<br />
