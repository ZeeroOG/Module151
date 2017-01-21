<?php if(isset($_GET['return'])) {
	if ($_GET['return'] == 'del-success') { ?>
	<div class="alert alert-success alert-dismissible" role="alert">
		<button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
		<strong>Succés !</strong> L'adresse a été supprimée de votre compte.
	</div>
	<?php } elseif ($_GET['return'] == 'edit-success') { ?>
	<div class="alert alert-success alert-dismissible" role="alert">
		<button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
		<strong>Succés !</strong> L'adresse a été mise à jour.
	</div>
	<?php } elseif ($_GET['return'] == 'add-success') { ?>
	<div class="alert alert-success alert-dismissible" role="alert">
		<button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
		<strong>Succés !</strong> L'adresse a été ajoutée à votre compte.
	</div>
	<?php }
} ?>
<h2>Mon compte</h2>
<table class="table table-striped">
	<tr>
		<td>Nom d'utilisateur</td>
		<td><?php echo $_SESSION['user']->getUsername(); ?></td>
	</tr>
	<tr>
		<td>Nom</td>
		<td><?php echo $_SESSION['user']->nom; ?></td>
	</tr>
	<tr>
		<td>Prénom</td>
		<td><?php echo $_SESSION['user']->prenom; ?></td>
	</tr>
	<tr>
		<td>Date de naissance</td>
		<td><?php echo $_SESSION['user']->getBirthDate() . " (age: " . $_SESSION['user']->getAge() . ")"; ?></td>
	</tr>
	<tr>
		<td>Adresse mail</td>
		<td><?php echo $_SESSION['user']->email; ?></td>
	</tr>
	<tr>
		<td>Grade</td>
		<td><?php echo $_SESSION['user']->getLevelName(); ?></td>
	</tr>
</table>
<a class="btn btn-danger btn-block">Editer</a>

<h2>Adresse(s)</h2>
<table class="table table-striped">
	<tr style="font-weight: bold;">
		<td>Nom</td>
		<td>Rue & Numéro</td>
		<td>NPA & Ville</td>
		<td>Pays</td>
		<td></td>
	</tr>
	<?php foreach ($adresses->get() as $data) { ?>
	<tr>
		<td><?php echo $data['nom']; ?></td>
		<td><?php echo $data['rue'] . " " . $data['numero']; ?></td>
		<td><?php echo $data['npa'] . " " . $data['ville']; ?></td>
		<td>Suisse</td>
		<td>
			<a href="?p=editAdresse&id=<?php echo $data['id']; ?>&callback=<?php echo urlencode('?p=account&return=edit-success'); ?>" class="btn btn-xs btn-primary">Editer</a>
			<a href="?p=delAdresse&id=<?php echo $data['id']; ?>&callback=<?php echo urlencode('?p=account&return=del-success'); ?>" class="btn btn-xs btn-danger">Supprimer</a>
		</td>
	</tr>
	<?php } ?>
</table>
<?php if(count($adresses->get()) < 1) { ?>
<center>
	<p>
		<b>Aucune adresse</b>
	</p>
	<br />
</center>
<?php } ?>
<a href="?p=addAdresse&callback=<?php echo urlencode('?p=account&return=add-success'); ?>" class="btn btn-danger btn-block">Ajouter</a>
