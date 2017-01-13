<style>
	.table-shop td {
		padding: 15px;
    	text-align: left;
	}

	.table-shop td {
    	border: 1px solid black;
	}
</style>
<table cellspacing="0" cellpadding="0" class="table-shop">
	<tr>
		<!--<td style="width: 60px;">Couverture</td>-->
		<td>Titre</td>
		<td>Date de sortie</td>
		<td>Age requis</td>
		<td>Prix</td>
		<td></td>
	</tr>
	<?php

	foreach ($filmList->getFilmList() as $value) {
		?>
		<tr>
			<!--<td style="text-align: center; padding: 0;"><img style="width: 100%; margin: 0;" src="<?php echo $value['image']; ?>" /></td>-->
			<td><?php echo $value['titre']; ?></td>
			<td><?php echo $value['sortie']; ?></td>
			<td><?php echo $value['age']; ?> ans</td>
			<td>
			<?php
				foreach ($value['prix'] as $key => $value) {
					
				}
			?>
			</td>
			<td><a href="?p=showFilm&id=<?php echo $value['id']; ?>"><button>Afficher</button></a></td>
		</tr>
		<?php
	}

	?>
</table>
