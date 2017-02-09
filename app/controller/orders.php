<?php

include('app/model/orders.php');

$commandes = getCommandes($_SESSION['user']->getUserId());

include('app/view/orders.php');

?>
