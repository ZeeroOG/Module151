<?php

setcookie("panier", $panier->exportJSON(), time()+216000);
$panier->syncPanier();

 ?>
