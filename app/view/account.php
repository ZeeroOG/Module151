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
		<td>Rue & Numéro</td>
		<td>NPA & Ville</td>
		<td>Pays</td>
		<td></td>
	</tr>
	<tr>
		<td>Chemin des Tests 666</td>
		<td>1000 Lausanne</td>
		<td>Suisse</td>
		<td>
			<a class="btn btn-xs btn-primary">Editer</a>
			<a class="btn btn-xs btn-danger">Supprimer</a>
		</td>
	</tr>
</table>
<a class="btn btn-danger btn-block">Ajouter</a>
