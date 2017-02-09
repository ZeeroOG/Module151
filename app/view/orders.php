<script>
	var expandOrder = function(id) {
		if($('#order-' + id).css('display') == 'none') {
			$('#order-' + id).css('display', 'table-row');
			$('#text-' + id).html('moins');
			$('#chevron-' + id).removeClass('glyphicon-chevron-down');
			$('#chevron-' + id).addClass('glyphicon-chevron-up');
		} else {
			$('#order-' + id).css('display', 'none');
			$('#text-' + id).html('plus');
			$('#chevron-' + id).removeClass('glyphicon-chevron-up');
			$('#chevron-' + id).addClass('glyphicon-chevron-down');
		}
	}
</script>
<table class="table table-striped">
	<tr style="font-weight: bold;">
		<td>Numéro de commande</td>
		<td>Etat</td>
		<td>Prix</td>
		<td></td>
	</tr>
	<?php foreach ($commandes as $key => $commande): ?>
	<tr>
		<td><?=$commande['numero']?></td>
		<td><?=$commande['etat']?></td>
		<td><?=formatPrice($commande['prix'])?> CHF</td>
		<td>
			<a onclick="expandOrder('<?=$commande['numero']?>');">
				<i id="chevron-<?=$commande['numero']?>" class="glyphicon glyphicon-chevron-down"></i> Afficher <span id="text-<?=$commande['numero']?>">plus</span>
			</a>
		</td>
	</tr>
	<tr id="order-<?=$commande['numero']?>" style="display: none;">
		<td colspan="4">
			<b>Commande numéro :</b> <?=$commande['numero']?><br />
			<b>Livraison :</b> <?=$commande['livr']?><br />
			<b>Facturation :</b> <?=$commande['fact']?><br />
			<b>Prix :</b> <?=formatPrice($commande['prix'])?> CHF<br />
			<b>Panier :</b><br />
			<ul>
				<?php foreach ($commande['panier'] as $key => $item): ?>
					<li><?=$item['qte']?>x - <?=getNomArticle($item['id'])?></li>
				<?php endforeach; ?>
			</ul>
		</td>
	</tr>
	<?php endforeach; ?>
</table>
<?php if (count($commandes) < 1): ?>
<center>
	<b>Vous n'avez pas encore effectué de commande.</b>
</center>
<?php endif; ?>
