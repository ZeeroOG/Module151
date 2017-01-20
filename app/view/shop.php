<?php if(isset($_GET['panier']) AND $_GET['panier'] == 'ok') { ?>
<div class="alert alert-success alert-dismissible" role="alert">
	<button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
	<strong>Succés !</strong> Le film a été ajouté à votre <a href="?p=panier&return=1">panier</a>.
</div>
<?php } ?>
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
		<tr class="">
			<td style="text-align: center; padding: 0;"><img style="width: 100%; margin: 0;" src="<?php echo $value['image']; ?>" /></td>
			<td><a href="?p=showFilm&id=<?php echo $value['id']; ?>"><?php echo $value['titre']; ?></a></td>
			<td><?php echo $value['sortie']; ?></td>
			<td><?php echo $value['age']; ?> ans</td>
			<td>
				<ul>
				<?php
					foreach ($value['prix'] as $prix) {
						echo '<li><b>' . $prix['nom'] . ':</b>&nbsp;' . formatPrice($prix['prix']) . ' CHF<a style="float: right; margin: 0;" href="?p=panier&add=' . $prix['numero'] . '&callback=' . urlencode("?p=shop&panier=ok") . '"><i class="glyphicon glyphicon-shopping-cart"></i> Ajouter panier</a></li>';
					}
				?>
				</ul>
			</td>
		</tr>
		<?php
	}

	?>
</table>
