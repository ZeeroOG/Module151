<style>
	.showFilm {
		width: 100%;
	}
	.showFilm-top {
		min-height: 370px;
	}
	.showFilm img {
		width: 300px;
		height: px;
		float: left;
		margin-right: 30px;
		margin-bottom: 30px;
	}
	.showFilm-youtube {
		text-align: center;
		margin-top: 30px;
		margin-bottom: 30px;
	}
	.showFilm-price {
		text-align: center;
	}
	.commentaires {
		width: 75%;
		margin-left: auto;
		margin-right: auto;
	}
	.commentaire {
		/*padding: 0 10px;
		border: 1px solid black;*/
		margin-bottom: 3px;
		display: block;
		width: 100%;
		min-height: 100px;
		/*background-color: white;*/
	}
	.commentaire-left, .commentaire-right {

	}
	.commentaire-left {
		width: 39%;
		float: left;
	}
	.commentaire-text {
		text-align: justify;
	}
	.commentaire-right {
		width: 59%;
		float: right;
	}
</style>
<div class="showFilm">
	<div class="showFilm-top">
		<img src="img/noimage.jpg" alt="cover" />
		<h2><?php echo $film->getTitreTraduit(); ?></h2>
		<h3><?php echo $film->getTitreOriginal(); ?></h3>
		<table class="showFilm-price">
			<tr>
				<td>DVD</td>
				<td><?php echo $film->getDvdPrice(); ?></td>
				<td>CHF</td>
				<td><button>+ Ajouter au panier</button></td>
			</tr>
			<tr>
				<td>Blu-Ray</td>
				<td><?php echo $film->getBdPrice(); ?></td>
				<td>CHF</td>
				<td><button>+ Ajouter au panier</button></td>
			</tr>
		</table>
		<p style="text-align: justify;"><?php echo $film->getDescription(); ?></p>
	</div>
	<br />
	<hr />
	<div class="showFilm-youtube">
		<h3>Bande d'annonce</h3>
		<?php $youtube->show(); ?>
	</div>
</div>
<hr />
<div class="commentaires">
	<h3>Commentaires des clients</h3>
	<?php while ($comments->fetch()) { ?>
	<hr />
	<div class="commentaire">
		<div class="commentaire-left">
			<p><?php echo $comments->getName(); ?> <!--[<?php echo $comments->getUsername(); ?>]--></p>
			<p><?php echo $comments->getDateTime(); ?></p>
		</div>
		<div class="commentaire-right">
			<div class="commentaire-text"><?php for($i = 0; $i < 10; $i++) { echo $comments->getComment() . " "; } ?></div>
	</div>
	<?php } ?>
</div>
