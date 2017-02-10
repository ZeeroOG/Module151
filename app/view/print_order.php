<script>
	$(document).ready(function() {
		window.print();
	});
</script>
<div id="order">
  <h4> Commande: </h4>
  <label for="numero" class="order_item">Numéro: </label><span id="numero"><?=$commande['numero']?></span><br/>
  <label for="livr" class="order_item">Adresse de livraison: </label><span id="livr"><?=$commande['livr']?></span><br/>
  <label for="fact" class="order_item">Adresse de facturation: </label><span id="fact"><?=$commande['fact']?></span><br/>
  <label for="etat" class="order_item">Etat: </label><span id="etat"><?=$commande['etat']?></span><br/>
  <label for="panier" class="order_item"><h3>Panier: </h3></label><br/>
  <div id="panier">
<?php foreach ($commande['panier'] as $key => $item): ?>
  <span><?=$item['qte']?>x - <?=getNomArticle($item['id'])?></span><br/>
<?php endforeach; ?>
  </div>
  <label for="prix">Prix: </label><span id="prix"><?=$commande['prix']?></span>
</div>
