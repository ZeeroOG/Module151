<?php if(isset($newPassword)) { ?>
<h3>Nouveau mot de passe :</h3>
<p><b><?php echo $newPassword; ?></b></p>
<a class="btn btn-block btn-primary" href="?p=listUsers">Retour vers la liste des utilisateurs</a>
<?php } else { ?>
<h3>Êtes-vous sûr de vouloir reset le mot de passe de l'utilisateur <?php echo $_GET['username'] ?> ?</h3>
<a class="btn btn-block btn-success" href="?p=resetPassword&username=<?php echo urlencode($_GET['username']) ?>&sure=yes">Oui</a>
<button class="btn btn-block btn-danger" onclick="window.history.back();">Non</button>
<?php } ?>
