<?php

include('app/model/order.php');

$commande = $panier->getPanier();

if(isset($_POST['panier'], $_POST['livraison'], $_POST['facturation'])) {
	if(verifyOrder($_POST['livraison'], $_POST['facturation'], urldecode($_POST['panier']), $_SESSION['user']->getUserId())) {
		include('app/view/order_resume.php');
	} else {
		include('app/view/order_confirm.php');
	}
} elseif(count($commande) == 0) {
	?>
		<p>
			<b>Votre panier est vide !</b>
		</p>
		<a href="?p=shop">Faites un tour dans la boutique</a>
		<br />
		<br />
	<?php
} else {
	include('app/view/order_confirm.php');
}

?>
