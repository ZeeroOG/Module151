<?php if(isset($_GET['return'])) {
 	if($_GET['return'] == '1') echo '<a onclick="window.history.back();"><i class="glyphicon glyphicon-chevron-left"></i> Retour</a>';
	else echo '<a href="' . $_GET['return'] . '"><i class="glyphicon glyphicon-chevron-left"></i> Retour</a>';
	echo '<hr />';
} ?>
<table class="table table-striped">
	<tr style="font-weight: bold;">
		<td>Nom</td>
		<td>Format</td>
		<td>Quantité</td>
		<td>Prix</td>
		<td></td>
	</tr>
	<?php
	$prixTotal = 0;
	foreach ($showPanier as $value) {
		$value = explode('-', $value);
		$data = getArticle($value[0]);

		if($data['titreTraduit'] == null) {
			$nom = $data['titreOriginal'];
		} else {
			$nom = $data['titreTraduit'];
		}

		$prix = (double)$data['prix']*(int)$value[1];
		$prixTotal = $prixTotal + $prix;
	?>
	<tr>
		<td><?php echo $nom; ?></td>
		<td><?php echo $data['format']; ?></td>
		<td>
			<a class="btn btn-sm btn-primary" href="?p=panier&del=<?php echo $value[0]; ?>&qte=1"><i class="glyphicon glyphicon-minus"></i></a>
			<a class="btn btn-sm btn-default"><b><?php echo $value[1]; ?></b></a>
			<a class="btn btn-sm btn-primary" href="?p=panier&add=<?php echo $value[0]; ?>"><i class="glyphicon glyphicon-plus"></i></a>
		</td>
		<td><?php echo formatPrice($prix); ?> CHF</td>
		<td>
			<a class="btn btn-sm btn-danger" href="?p=panier&del=<?php echo $value[0]; ?>"><i class="glyphicon glyphicon-trash"></i>&nbsp;&nbsp;Supprimer</a>
		</td>
	</tr>
	<?php } ?>
</table>
<p><b>Total: <?php echo formatPrice($prixTotal); ?> CHF</b><a style="float: right;" class="btn btn-md btn-primary" href="?p=order">Passer commande</a></p>
<br />
