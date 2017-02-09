<?php

include('app/model/adminOrders.php');

$commandes = getCommandes();

include('app/view/adminMenu.php');
include('app/view/adminOrders.php');

?>
