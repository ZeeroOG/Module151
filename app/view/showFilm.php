<style>
	.showFilm {
		width: 100%;
		height: 100%;
	}
	.showFilm img {
		max-width: 300px;
		width: 90%;
		float: left;
		margin-right: 30px;
		margin-bottom: 30px;
	}
	.showFilm-youtube {
		text-align: center;
		margin-top: 30px;
		margin-bottom: 30px;
	}
	.commentaire {
		padding: 2px;
		border: 1px solid black;
		margin-bottom: 3px;
	}
	.commentaire-top {
		border-bottom: 1px solid black;
	}
</style>
<div class="showFilm">
	<img src="img/noimage.jpg" alt="cover" />
	<h2><?php echo $film->getTitreTraduit(); ?></h2>
	<h3><?php echo $film->getTitreOriginal(); ?></h3>
	<p>DVD : <?php echo $film->getDvdPrice(); ?> CHF <button>+ Ajouter au panier</button></p>
	<p>Blu-Ray : <?php echo $film->getBdPrice(); ?> CHF <button>+ Ajouter au panier</button></p>
	<p style="text-align: justify;"><?php echo $film->getDescription(); ?></p>
	<div class="showFilm-youtube">
		<?php $youtube->show(); ?>
	</div>
</div>
<hr />
<div class="commentaires">
	<h3>Commentaires clients</h3>
	<?php while ($comments->fetch()) { ?>
	<div class="commentaire">
		<p class="commentaire-top"><?php echo $comments->getName(); ?> [<?php echo $comments->getUsername(); ?>] // <?php echo $comments->getDateTime(); ?></p>
		<p>
			<?php echo $comments->getComment(); ?>
		</p>
	</div>
	<?php } ?>
</div>
