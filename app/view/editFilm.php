<!-- modofication du formulaire -->
<style>
#oldImage {
	display: block;
}
#oldImage span {
	*float: left;
}
#oldImage img {
	margin: 7px;
	max-width: 150px;
	max-height: 150px;
	float: left;
}
</style>
<form action=".?p=editFilm" method="POST" enctype="multipart/form-data" accept-charset="UTF-8" id="addToDB">
  <div class="form-group">
	  <span class="element">
	    <h3>Modifier un film</h3>
	  </span>
		<span class="element">
		<label for="titreOriginal">Titre<span class="required">*</span></label>
		<input type="text" id="titreOriginal" name="titreOriginal" placeholder="Titre original" value="<?=$film->getTitreOriginal()?>" class="<?=getHTMLClasses($errors,'titreOriginal','form-control')?>" autofocus/>
	  </span>
	  <span class="element">
	    <label for="titreTraduit">Titre 2</label>
		<input type="text" id="titreTraduit" name="titreTraduit" placeholder="Titre traduit" value="<?=$film->getTitreTraduit()?>" class="<?=getHTMLClasses($errors,'titreTraduit','form-control')?>" />
	  </span>
	  <span class="element">
	    <label for="duree">Durée<span class="required">*</span></label>
		<input type="text" id="duree" name="duree" placeholder="Durée (minutes)" value="<?=$film->getDuree()?>" class="<?=getHTMLClasses($errors,'duree','form-control')?>" />
	  </span>
	  <span class="element">
	    <label for="dateSortieSuisse">Date de sortie<span class="required">*</span></label>
		<input type="date" id="dateSortieSuisse" name="dateSortieSuisse" placeholder="Date de sortie (yyyy-mm-dd)" value="<?=$film->getDateSortie()?>" class="<?=getHTMLClasses($errors,'dateSortieSuisse','form-control')?>"/>
	  </span>
	  <span class="element">
		<label for="description">Description<span class="required">*</span></label>
		<textarea id="description" name="description" placeholder="Description" rows="4" class="<?=getHTMLClasses($errors,'description','form-control')?>"><?=$film->getDescription()?></textarea>
	  </span>
	  <span class="element">
		<label for="accordParental">PEGI<span class="required">*</span></label>
		<input type="text" id="accordParental" name="accordParental" placeholder="Accord parental" value="<?=$film->getAccordParental()?>" class="<?=getHTMLClasses($errors,'accordParental','form-control')?>"/>
	  </span>
	  <span class="element">
		<label for="pochetteFile">Pochette</label>
		<?=getOldPochette($film->getImage())?>
		<input type="file" id="pochetteFile" name="pochetteFile" placeholder="URL de l'image" accept="image/*"  value="<?=$film->getImage()?>" class="<?=getHTMLClasses($errors,'pochetteFile','form-control')?>" />
	  </span>
	  <span class="element">
		<label for="bandeAnnonceURL">Vidéo</label>
		<input type="text" id="bandeAnnonceURL" name="bandeAnnonceURL" placeholder="URL de la vidéo"  value="<?=$film->getBandeAnnonceURL()?>" class="<?=getHTMLClasses($errors,'bandeAnnonceURL','form-control')?>" />
	  </span>
	  <hr>
	  <span class="element">
	    <h4>Genres: <span class="required">*</span><a href="#" class="insertItem" id="insertGenre">(Ajouter un genre)</a></h4>
		<?php foreach($film->getGenresID() as $key => $value):?>
		<input type="hidden" name="oldGenre<?=($key+1)?>" value="<?=$value?>"/>
		<?php endforeach;?>
		<?php foreach($film->getGenres() as $key => $value):?>
		<select name="genre<?=($key+1)?>" id="genre<?=($key+1)?>" class="genres form-control">
		  <option value="NULL">-</option>
		  <?=getHTMLOptions($genres,$value)?>
		</select>
		<?php endforeach;?>
		<button class="btn btn-default btn-block addItem" id="addGenre">+ Ajouter</button>
	  </span>
  </div>
</form>
  