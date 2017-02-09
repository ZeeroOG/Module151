<!-- Derniers films sortis -->
<h3><i class="glyphicon glyphicon-certificate"></i> Nouveautés</h3>
<table class="table table-striped" style="text-align: center;">
	<tr>
	<?php foreach ($newFilms as $key => $film): ?>
		<td style="width: 20%;">
			<a href="?p=showFilm&id=<?=$film['id']?>">
				<img src="<?=$film['image']?>" alt="<?=$film['titre']?>" style="height: 150px;" />
				<br />
				<b><?=$film['titre']?></b>
			</a>
		</td>
	<?php endforeach; ?>
	</tr>
</table>

<!-- Les favoris -->
<h3><i class="glyphicon glyphicon-heart"></i> Les favoris</h3>
<table class="table table-striped" style="text-align: center;">
	<tr>
	<?php foreach ($favFilms as $key => $film): ?>
		<td style="width: 20%;">
			<a href="?p=showFilm&id=<?=$film['id']?>">
				<img src="<?=$film['image']?>" alt="<?=$film['titre']?>" style="height: 150px;" />
				<br />
				<b><?=$film['titre']?></b>
			</a>
		</td>
	<?php endforeach; ?>
	</tr>
</table>

<!-- Les plus populaires -->
<h3><i class="glyphicon glyphicon-fire"></i> Les plus populaires</h3>
<table class="table table-striped" style="text-align: center;">
	<tr>
	<?php foreach ($popFilms as $key => $film): ?>
		<td style="width: 20%;">
			<a href="?p=showFilm&id=<?=$film['id']?>">
				<img src="<?=$film['image']?>" alt="<?=$film['titre']?>" style="height: 150px;" />
				<br />
				<b><?=$film['titre']?></b>
			</a>
		</td>
	<?php endforeach; ?>
	</tr>
</table>
