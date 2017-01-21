<form action="<?php echo getURL(); ?>" method="post">
	<div class="from-group">
		<label for="order">Trier par :</label>
		<select class="form-control" id="order" name="order" onchange="$(this).closest('form').trigger('submit');">
			<option value="title">Nom</option>
			<option value="date"<?php if(isset($_GET['order']) AND $_GET['order'] == 'date') echo ' selected'; ?>>Date</option>
		</select>
		<label for="invert">Ordre :</label>
		<select class="form-control" id="invert" name="invert" onchange="$(this).closest('form').trigger('submit');">
			<option value="0">Ascendant</option>
			<option value="1"<?php if(isset($_GET['invert']) AND $_GET['invert'] == 1) echo ' selected'; ?>>Descendant</option>
		</select>
		<label for="search">Recherche :</label>
		<div>
			<input style="width: 78%; display: inline;"  class="form-control" id="search" type="text" name="search" placeholder="Recherche..." <?php if(isset($_GET['search'])) echo 'value="' . $_GET['search'] . '"'; ?>/>
			<input style="width: 20%; display: inline; float: right;" class="form-control btn btn-danger" type="submit" value="Rechercher" />
		</div>
	</div>
</form>
<br />
<?php if(isset($_GET['panier']) AND $_GET['panier'] == 'ok') {
	$message_panier = ""; ?>
	<div class="alert alert-success alert-dismissible" role="alert">
		<button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
		<strong>Succés !</strong> Le film a été ajouté à votre <a href="?p=panier&return=1">panier</a>.
	</div>
<?php } else {
	$message_panier = "&panier=ok";
} ?>
<table class="table table-striped">
	<tr style="font-weight: bold;">
		<td style="width: 60px;">Couverture</td>
		<td>Titre</td>
		<td>Date de sortie</td>
		<td>Age requis</td>
		<td>Prix</td>
	</tr>
	<?php

	foreach ($filmList->getFilmList() as $value) {
		?>
		<tr>
			<td style="text-align: center; padding: 0;"><img style="width: 100%; margin: 0;" src="<?php echo $value['image']; ?>" /></td>
			<td><a href="?p=showFilm&id=<?php echo $value['id']; ?>"><?php echo $value['titre']; ?></a></td>
			<td><?php echo date('d.m.Y', strtotime($value['sortie'])); ?></td>
			<td><?php echo $value['age']; ?> ans</td>
			<td>
				<ul>
				<?php
					foreach ($value['prix'] as $prix) {
						echo '<li><b>' . $prix['nom'] . ':</b>&nbsp;' . formatPrice($prix['prix']) . ' CHF<a style="float: right; margin: 0;" href="?p=panier&add=' . $prix['numero'] . '&callback=' . urlencode(getURL() . $message_panier) . '"><i class="glyphicon glyphicon-shopping-cart"></i> Ajouter panier</a></li>';
					}
				?>
				</ul>
			</td>
		</tr>
		<?php
	}

	?>
</table>
<?php if(count($filmList->getFilmList()) < 1) { ?>
<center>
	<p><b>Aucun résultat<b/></p>
</center>
<?php } ?>
