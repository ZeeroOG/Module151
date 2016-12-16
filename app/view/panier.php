<table cellspacing="10">
	<tr style="font-weight: bold;">
		<td>Nom</td>
		<td>Format</td>
		<td>Quantité</td>
		<td>Prix</td>
		<td>Actions</td>
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
		<td><?php echo $value[1]; ?></td>
		<td><?php echo formatPrice($prix); ?> CHF</td>
		<td>
			<a href="?p=panier&del=<?php echo $value[0]; ?>&qte=1"><button>-1</button></a>
			<a href="?p=panier&add=<?php echo $value[0]; ?>"><button>+1</button></a>
			<a href="?p=panier&del=<?php echo $value[0]; ?>"><button>Supprimer</button></a>
		</td>
	</tr>
	<?php } ?>
</table>
<p><b>Total: <?php echo formatPrice($prixTotal); ?> CHF</b></p>
