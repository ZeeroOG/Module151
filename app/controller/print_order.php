<?php
	if(!isset($_GET['order'])) header('location: .?p=home');
	include('app/model/orders.php');
	$commandes = getCommandes($_SESSION['user']->getUserId());
	$commande = NULL;
	foreach($commandes as $value) {
		if($value['numero'] == $_GET['order'])
			$commande = $value;
	}
	include('app/view/print_order.php');	
?>