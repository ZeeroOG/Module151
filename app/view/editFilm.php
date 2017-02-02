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
	  
<!-- Titre original -->
		<span class="element">
		<label for="titreOriginal">Titre<span class="required">*</span></label>
		<input type="text" id="titreOriginal" name="titreOriginal" placeholder="Titre original" value="<?=$film->getTitreOriginal()?>" class="form-control" autofocus/>
	  </span>
	  
<!-- Titre francais (facultatif) -->	  
	  <span class="element">
	    <label for="titreTraduit">Titre 2</label>
		<input type="text" id="titreTraduit" name="titreTraduit" placeholder="Titre traduit" value="<?=$film->getTitreTraduit()?>" class="form-control" />
	  </span>
	  
<!-- Durée -->	  
	  <span class="element">
	    <label for="duree">Durée<span class="required">*</span></label>
		<input type="text" id="duree" name="duree" placeholder="Durée (minutes)" value="<?=$film->getDuree()?>" class="form-control" />
	  </span>
	  
<!-- Date de sortie -->	  
	  <span class="element">
	    <label for="dateSortieSuisse">Date de sortie<span class="required">*</span></label>
		<input type="date" id="dateSortieSuisse" name="dateSortieSuisse" placeholder="Date de sortie (yyyy-mm-dd)" value="<?=$film->getDateSortie()?>" class="form-control" />
	  </span>
	  
<!-- Description -->
	  <span class="element">
		<label for="description">Description<span class="required">*</span></label>
		<textarea id="description" name="description" placeholder="Description" rows="4" class="form-control" ><?=$film->getDescription()?></textarea>
	  </span>
	  
<!-- Accord parental -->
	  <span class="element">
		<label for="accordParental">PEGI<span class="required">*</span></label>
		<input type="text" id="accordParental" name="accordParental" placeholder="Accord parental" value="<?=$film->getAccordParental()?>" class="form-control"/>
	  </span>
	  
<!-- Pochette -->
	  <span class="element">
		<label for="pochetteFile">Pochette</label>
		<?=getOldPochette($film->getImage())?>
		<input type="file" id="pochetteFile" name="pochetteFile" placeholder="URL de l'image" accept="image/*"  value="<?=$film->getImage()?>" class="form-control" />
	  </span>
	  
<!-- URL bande annonce -->
	  <span class="element">
		<label for="bandeAnnonceURL">Vidéo</label>
		<input type="text" id="bandeAnnonceURL" name="bandeAnnonceURL" placeholder="URL de la vidéo"  value="<?=$film->getBandeAnnonceURL()?>" class="form-control" />
	  </span>
	  <hr>
	  
<!-- Genres -->
	  <span class="element">
	    <h4>Genres: <span class="required">*</span></h4>
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
	  
<!-- Langues -->
	  <span class="element">
	    <h4>Langues: <span class="required">*</span></h4>
		<?php foreach($film->getLanguesID() as $key => $value):?>
		<input type="hidden" name="oldLangue<?=($key+1)?>" value="<?=$value?>"/>
		<?php endforeach;?>
		<?php foreach($film->getLangues() as $key => $value):?>
		<select name="langue<?=($key+1)?>" id="langue<?=($key+1)?>" class="langues form-control">
		  <option value="NULL">-</option>
		  <?=getHTMLOptions($langues,$value)?>
		</select>
		<?php endforeach;?>
		<button class="btn btn-default btn-block addItem" id="addLangue">+ Ajouter</button>
	  </span>

<!-- Sagas -->
	  <span class="element">
	    <h4>Sagas: <span class="required">*</span></h4>
		<?php foreach($film->getSagasID() as $key => $value):?>
		<input type="hidden" name="oldSaga<?=($key+1)?>" value="<?=$value?>"/>
		<?php endforeach;?>
		<?php foreach($film->getSagas() as $key => $value):?>
		<select name="saga<?=($key+1)?>" id="saga<?=($key+1)?>" class="sagas form-control">
		  <option value="NULL">-</option>
		  <?=getHTMLOptions($sagas,$value)?>
		</select>
		<?php endforeach;?>
		<button class="btn btn-default btn-block addItem" id="addSaga">+ Ajouter</button>
	  </span>
	  
<!-- Societes -->
	  <span class="element">
	    <h4>Sociétés: <span class="required">*</span></h4>
		<?php foreach($film->getSocietesID() as $key => $value):?>
		<input type="hidden" name="oldSociete<?=($key+1)?>" value="<?=$value?>"/>
		<?php endforeach;?>
		<?php foreach($film->getSocietes() as $key => $value):?>
		<select name="societe<?=($key+1)?>" id="societe<?=($key+1)?>" class="societes form-control">
		  <option value="NULL">-</option>
		  <?=getHTMLOptions($societes,$value)?>
		</select>
		<?php endforeach;?>
		<button class="btn btn-default btn-block addItem" id="addSociete">+ Ajouter</button>
	  </span>
	  
<!-- Formats & prix -->
	  <span class="element">
	    <h4>Fromats & prix: <span class="required">*</span></h4>
		<?php foreach($film->getFormatsID() as $key => $value) :?>
		  <input type="hidden" name="oldFormat<?=($key+1)?>" value="<?=$value?>"/>
		<?php endforeach; ?>
		<?php $key = 1; foreach($film->getPrice() as $value) :?>
			<input type="hidden" name="oldPrix<?=$key?>" value="<?=$value['prix']?>"/>
		<?php $key++; endforeach;?>
		<?php $key = 1; foreach($film->getPrice() as $value ) :?>
		<div class="block">
		  <select name="format<?=$key?>" id="format<?=$key?>" class="formats form-control">
		    <option value="NULL">-</option>
		    <?=getHTMLOptions($formats,$value['nom'])?>
		  </select>
		  <input type="text" id="prix<?=$key?>" name="prix<?=$key?>" placeholder="Prix" value="<?=$value['prix']?>" class="prix" /> CHF
		</div>
		<?php $key++; endforeach; ?>
		<button class="btn btn-default btn-block addItem" id="addFormat">+ Ajouter</button>
	  </span>
<!-- Personnes & rôles -->
	  <span class="element">
	    <h4>Personnes & rôles: <span class="required">*</span></h4>
		<?php foreach($film->getPersonnesID() as $key => $value) :?>
		  <input type="hidden" name="oldPersonne<?=($key+1)?>" value="<?=$value?>"/>
		<?php endforeach; ?>
		<?php $key = 1; foreach($film->getGens() as $value) :?>
			<input type="hidden" name="oldRole<?=$key?>" value="<?=$value['role']?>"/>
		<?php $key++; endforeach;?>
		<?php $key = 1; foreach($film->getGens() as $value ) :?>
		<div class="block">
		  <select name="personne<?=$key?>" id="personne<?=$key?>" class="personnes form-control">
		    <option value="NULL">-</option>
		    <?=getHTMLOptions($personnes,$value['nom'])?>
		  </select>
		  <input type="text" id="role<?=$key?>" name="role<?=$key?>" placeholder="Rôle" value="<?=$value['role']?>" class="role" />
		</div>
		<?php $key++; endforeach; ?>
		<button class="btn btn-default btn-block addItem" id="addPersonne">+ Ajouter</button>
	  </span>
	  <span class="element">
	    <input type="submit" class="form-control btn btn-block btn-primary" name="submit" id="submit" value="Enregistrer les modifications"/>
	  </span>
  </div>
</form>
  