<style>
	.showFilm {
		width: 100%;
	}
	.showFilm-top {
		min-height: 430px;
	}
	.showFilm img {
		width: 300px;
		height: 400px;
		margin-left: 30px;
		margin-bottom: 30px;
		float: right;
	}
	.showFilm-youtube {
		text-align: center;
		margin-top: 30px;
		margin-bottom: 30px;
	}
	.commentaires {
		width: 75%;
		margin-left: auto;
		margin-right: auto;
	}
	.commentaire {
		margin-bottom: 3px;
		display: block;
		width: 100%;
		min-height: 100px;
	}
	.commentaire-left, .commentaire-right {
		display: inline-block;
		vertical-align: middle;
		margin: 10px 0;
	}
	.commentaire-left {
		width: 200px;
		text-align: center;
	}
	.commentaire-text {
		text-align: justify;
		font-family: 'Source Serif Pro', sans-serif;
		font-size: 18px;
	}
	.commentaire-right {
		font-family: 'Roboto', sans-serif;
		font-size: 18px;
	}
	.showFilm-notes {
		margin-top: 10px;
		margin-bottom: 10px;
		font-size: 16px;
	}
	.showFilm-notes span {
		font-size: 20px;
	}
	#showFilm-titreOriginal {
		font-size: 25px;
		color: #808591;
		font-weight: bold;
		margin-bottom: 20px;
		font-family: 'Roboto', sans-serif;
	}
	#showFilm-titreTraduit {
		font-family: 'Roboto', sans-serif;
		font-size: 30px;
		font-weight: bold;
		margin-bottom: 5px;
	}
	.showFilm-desc {
		text-align: justify;
		font-family: 'Source Serif Pro', sans-serif;
		font-size: 18px;
		margin-top: 30px;
	}
	#addCommentaireText {
		height: 100px;
		resize: none;
		text-align: justify;
	}
	h3, h4 {
		font-weight: bold;
	}
	#back {
		cursor: pointer;
	}
</style>
<span id="film"></span>
<a id="back" onclick="window.history.back();"><i class="glyphicon glyphicon-chevron-left"></i> Retour vers la liste des films</a><hr />
<div class="showFilm">
	<div class="showFilm-top">
		<div class="showFilm-left">
			<img src="<?php echo $film->getImage(); ?>" alt="cover" />
		</div>
		<div class="showFilm-right">
			<div style="min-height: 400px;">
				<?php if(isset($_GET['panier']) AND $_GET['panier'] == 'ok') { ?>
				<div class="alert alert-success alert-dismissible" role="alert">
					<button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
					<strong>Succés !</strong> Le film a été ajouté à votre <a href="?p=panier&return=1">panier</a>.
				</div>
				<?php } ?>
				<div id="showFilm-titreTraduit">
					<?php
						if($film->getTitreTraduit() == NULL) echo $film->getTitreOriginal();
						else echo $film->getTitreTraduit();
					?>
				</div>
				<div id="showFilm-titreOriginal"><?php if($film->getTitreTraduit() != NULL) echo $film->getTitreOriginal(); ?></div>
				<div class="showFilm-notes">
					Date de sortie : <b style="margin-left: 10px; margin-right: 5px;"><?php echo date('d.m.Y', strtotime($film->getDateSortie())); ?></b>
				</div>
				<div class="showFilm-notes">
					Age minimal requis : <b style="margin-left: 10px; margin-right: 5px;"><span><?php if($film->getAccordParental() != 0) { echo $film->getAccordParental() . " ans"; } else { echo "Tout public"; } ?></span></b>
				</div>
				<div class="showFilm-notes">
					Note de la communauté : <b style="margin-left: 10px; margin-right: 5px;"><span><?php if($film->getNote() != NULL) { echo $film->getNote(); } else { echo "?"; } ?></span>/10</b> [<?php if($film->getNbVotes() != NULL) { echo $film->getNbVotes(); } else { echo "0"; } ?> vote(s)]
					<?php if(isset($vote)) { ?>
						<form style="margin-top: 10px;" action="?p=showFilm&id=<?=$film->getFilmId()?>" method="post">
							Votre note :&nbsp;&nbsp;&nbsp;
							<select class="btn-sm" name="vote">
								<option value="0">Choisir...</option>
								<?php

								for($i = 1; $i < 11; $i++)
								{
									?><option value="<?=$i?>"<?php if($vote->hasVoted() == true AND $vote->getVote() == $i) echo " selected"; ?>><?=$i?></option><?php
								}

								?>
							</select>
							<input class="btn btn-sm btn-primary" type="submit" name="submit" value="Voter !" />
						</form>
					<?php } ?>
				</div>
				<hr />
				<p class="showFilm-desc"><?=$film->getDescription()?></p>
			</div>
			<hr />
			<!-- Détails -->
			<div style="max-width: 400px;">
				<!-- Droite -->
				<div style="float: right; max-width: 400px;">
					<!-- Genres -->
					<h4>Genre(s)</h4>
					<ul>
					<?php foreach($film->getGenres() as $genre) { ?>
							<li><?=$genre?></li>
					<?php } ?>
					</ul>

					<!-- Sociétés -->
					<h4>Société(s)</h4>
					<ul style="max-width: 400px;">
						<?php foreach($film->getSocietes() as $societe) { ?>
							<li><?=$societe?></li>
						<?php } ?>
					</ul>
				</div>

				<!-- Langues -->
				<h4>Langue(s)</h4>
				<ul style="max-width: 400px;">
					<?php foreach($film->getLangues() as $langue) { ?>
						<li><?=$langue?></li>
					<?php } ?>
				</ul>

				<!-- Contributeurs -->
				<h4>Contributeur(s)</h4>
				<ul>
					<?php if($film->getPrice() == NULL) { ?>
						<li style="font-weight: bold;">Indisponible</li>
					<?php } else {
						foreach($film->getGens() as $personne) { ?>
							<li><b><?=$personne['nom']?></b> (<?=$personne['role']?>)</li>
					<?php }
					} ?>
				</ul>
			</div>
		</div>
	</div>
	<hr />

	<!-- Prix -->
	<div class="showFilm-youtube">
		<h3>Prix</h3>
		<table class="table" id="prix" style="max-width: 500px; margin-left: auto; margin-right: auto;">
			<?php if($film->getPrice() == NULL) { ?>
			<tr>
				<td style="font-weight: bold;">Indisponible</td>
			</tr>
			<?php } else {
				foreach($film->getPrice() as $numero_article => $data)
				{
					?>
					<tr>
						<td><?php echo $data['nom']; ?></td>
						<td style="text-align: center;"><b><?php echo formatPrice($data['prix']); ?> CHF</b></td>
						<td style="text-align: right;"><a class="btn btn-primary" href="?p=panier&add=<?=$numero_article?>&callback=<?=urlencode('?p=showFilm&id=' . $film->getFilmId() . '&panier=ok#film')?>"><i class="glyphicon glyphicon-shopping-cart"></i>&nbsp;&nbsp;Ajouter au panier</a></td>
					</tr>
					<?php
				}
			} ?>
		</table>
	</div>

	<!-- Bande annonce -->
	<?php if($film->getBandeAnnonceURL() != NULL) { ?>
	<hr />
	<div class="showFilm-youtube">
		<h3>Bande d'annonce</h3>
		<?php $youtube->show(); ?>
	</div>
	<?php } ?>
</div>
<hr />
<div class="commentaires">
	<h3>Commentaires des clients</h3>
	<?php

	if($comments->isEmpty() == true) echo "<p>Aucun commentaire, soyez le premier !</p>";

	while ($comments->fetch()) { ?>
	<hr />
	<div class="commentaire">
		<div class="commentaire-left">
			<p><?php echo $comments->getName(); ?></p><!--[<?php echo $comments->getUsername(); ?>]-->
			<p><?php echo $comments->getDateTime(); ?></p>
		</div>
		<div class="commentaire-right">
			<div class="commentaire-text">
				<?php echo $comments->getComment(); ?>
			</div>
		</div>
	</div>
	<?php } ?>
	<hr />
	<div class="commentaire" id="lastComment">
		<?php if(isset($_SESSION['user'])) { ?>
		<h3>Poster un commentaire</h3>
		<?php

		if($commentFail != NULL) {
			echo '<p style="color: red;">' . $commentFail . '</p>';
		}

		?>
		<form id="addCommentaire" action="?p=showFilm&id=<?php echo $film->getFilmId(); ?>" method="post">
			<textarea id="addCommentaireText" class="form-control" name="text" placeholder="Commentaire..."><?php echo $commentText; ?></textarea>
			<input type="hidden" name="id-captcha" value="<?php echo $captchaId; ?>">
			<div id="addEmotes" style="margin-top: 10px;">
				Insérez des smileys :
				<?php
				foreach ($emotes as $key => $emote) {
						$key = "':" . $key . ":'";
						echo '<img onClick="addEmote(' . $key . ')" style="margin: 2px;" src="img/emotes/' . $emote . '" height="20" width="20" />';
					}
				?>
			</div>
			<div style="margin: 10px 0; width: 100%; text-align: center;">
				<img src="<?php echo $captcha->getImage(); ?>" />
				<input style="width: 300px; margin-left: auto; margin-right: auto;" type="text" name="captcha" placeholder="Captcha..." class="form-control">
			</div>
			<input class="btn btn-block btn-danger" id="addCommentaireButton" value="Poster" type="submit">
		</form>
		<?php } else { ?>
			<p>Vous devez être connecté pour poster des commentaires.</p>
		<?php } ?>
	</div>
</div>
