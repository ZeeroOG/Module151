<form action="?p=order" method="post">
	<!-- Livraison -->
	<h3>Adresse de livraison</h3>
	<select name="livraison" class="form-control">
		<option value="0">Choisir...</option>
		<?php foreach (getAdresses($_SESSION['user']->getUserId()) as $value) { ?>
			<option value="<?=$value['id']?>"><?=$value['nom']?> - <?=$value['rue']?> <?=$value['numero']?> - <?=$value['npa']?> <?=$value['ville']?></option>
		<?php } ?>
	</select>
	<br />

	<!-- Facturation -->
	<h3>Adresse de facturation</h3>
	<select name="facturation" class="form-control">
		<option value="0">Choisir...</option>
		<?php foreach (getAdresses($_SESSION['user']->getUserId()) as $value) { ?>
			<option value="<?=$value['id']?>"><?=$value['nom']?> - <?=$value['rue']?> <?=$value['numero']?> - <?=$value['npa']?> <?=$value['ville']?></option>
		<?php } ?>
	</select>
	<br />

	<!-- Panier -->
	<h3>Panier</h3>
	<table class="table table-striped">
		<tr style="font-weight: bold;">
			<td>Nom</td>
			<td>Format</td>
			<td>Quantité</td>
			<td>Prix unitaire</td>
			<td>Prix</td>
		</tr>
		<?php
		$prixTotal = 0;
		foreach ($commande as $value) {
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
				<?php echo $value[1]; ?>
			</td>
			<td><?php echo formatPrice($data['prix']); ?> CHF</td>
			<td><?php echo formatPrice($prix); ?> CHF</td>
		</tr>
		<?php } ?>
	</table>
	<br />

	<!-- Envoyer panier -->
	<input type="hidden" name="panier" value="<?=urlencode($panier->exportJSON())?>">

	<!-- Confimer -->
	<h3>
		<b>Total: <?php echo formatPrice($prixTotal); ?> CHF</b>
		<input style="float: right;" class="btn btn-md btn-primary" type="submit" name="submit" value="Confirmer">
	</h3>
</form>
