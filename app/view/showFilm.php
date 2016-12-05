<style>
	.showFilm {
		width: 100%;
	}
	.showFilm-top {
		min-height: 370px;
	}
	.showFilm img {
		width: 300px;
		margin-left: 30px;
		margin-bottom: 30px;
		float: right;
	}
	.showFilm-left {
		/*width: 400px;*/
	}
	.showFilm-left, .showFilm-right {
		/*display: inline-block;*/
	}
	.showFilm-youtube {
		text-align: center;
		margin-top: 30px;
		margin-bottom: 30px;
	}
	.showFilm-price {
		border-spacing: 5px;
    	border-collapse: separate;
		font-family: 'Roboto', sans-serif;
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
	}
	#addCommentaire {
		height: 200px;
	}
	#addCommentaireText {
		width: 90%;
		height: 97%;
		resize: none;
		float: left;
		text-align: justify;
	}
	#addCommentaireButton {
		width: 9%;
		height: 100%;
		float: right;
	}
</style>
<div class="showFilm">
	<div class="showFilm-top">
		<div class="showFilm-left">
			<img src="img/noimage.jpg" alt="cover" />
		</div>
		<div class="showFilm-right">
			<div id="showFilm-titreTraduit">
				<?php echo $film->getTitreTraduit(); ?>
			</div>
			<div id="showFilm-titreOriginal">
				<?php echo $film->getTitreOriginal(); ?>
			</div>
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
			<div class="showFilm-notes">Note de la communauté : <b><span><?php echo $film->getNote(); ?></span>/10</b> [<?php echo $film->getNbVotes(); ?> vote(s)]</div>
			<p class="showFilm-desc"><?php echo $film->getDescription(); ?></p>
		</div>
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
		<form id="addCommentaire" action="?p=showFilm&id=<?php echo $film->getFilmId(); ?>#lastComment" method="post">
			<textarea id="addCommentaireText" name="text"></textarea>
			<input id="addCommentaireButton" value="Poster" type="submit">
		</form>
		<script>
			var addEmote = function(key) {
				var id = "#addCommentaireText";
				var space;

				if(/\s$/.test($(id).val()) || $(id).val() == "") space = "";
				else space = " ";

				$(id).val($(id).val() + space + key);
			}
		</script>
		<div id="addEmotes" style="margin-top: 10px;">
			Insérez des smileys :
			<?php
			foreach ($emotes as $key => $emote) {
					$key = "':" . $key . ":'";
					echo '<img onClick="addEmote(' . $key . ')" style="margin: 2px;" src="img/emotes/' . $emote . '" height="20" width="20" />';
				}
			?>
		</div>
		<?php } else { ?>
			<p>Vous devez être connecté pour poster des commentaires.</p>
		<?php } ?>
	</div>
</div>
