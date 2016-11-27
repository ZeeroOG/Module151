<table>
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
		<td><?php echo date("d-m-Y", strtotime($_SESSION['user']->naissance)) . " (age: " . $_SESSION['user']->getAge() . ")"; ?></td>
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
