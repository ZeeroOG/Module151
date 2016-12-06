<!-- Création du formulaire -->
<?php echo getHTMLErrors($errors); ?>
<?php echo getHTMLSuccess($_GET); ?>
<form action=".?p=addFilm" method="POST" accept-charset="UTF-8" id="addToDB">
  <span class="element">
    <h3>Ajouter un film</h3>
  </span>
  <span class="element">
	<label for="titreOriginal">Titre: <span class="required">*</span></label>
	<input type="text" id="titreOriginal" name="titreOriginal" placeholder="Titre original" <?=getHTMLElements('titreOriginal',$errors) //sert a recup l'ancienne valeur et l'erreur?> autofocus/>
  </span>
  <span class="element">
    <label for="titreTraduit">Titre 2:</label>
	<input type="text" id="titreTraduit" name="titreTraduit" placeholder="Titre traduit" <?=getHTMLElements('titreTraduit',$errors)?> />
  </span>
  <span class="element">
    <label for="duree">Durée: <span class="required">*</span></label>
	<input type="text" id="duree" name="duree" placeholder="Durée (minutes)" <?=getHTMLElements('duree',$errors)?> />
  </span>
  <span class="element">
    <label for="dateSortieSuisse">Date de sortie: <span class="required">*</span></label>
	<input type="date" id="dateSortieSuisse" name="dateSortieSuisse" placeholder="Date de sortie (yyyy-mm-dd)" <?=getHTMLElements('dateSortieSuisse',$errors)?>/>
  </span>
  <span class="element">
	<label for="description">Description: <span class="required">*</span></label>
	<input type="textarea" id="description" name="description" placeholder="Description" <?=getHTMLElements('description',$errors)?> />
  </span>
  <span class="element">
	<label for="accordParental">PEGI: <span class="required">*</span></label>
	<input type="text" id="accordParental" name="accordParental" placeholder="Accord parental" <?=getHTMLElements('accordParental',$errors)?>/>
  </span>
  <span class="element">
	<label for="pochetteURL">Pochette:</label>
	<input type="text" id="pochetteURL" name="pochetteURL" placeholder="URL de l'image" <?=getHTMLElements('pochetteURL',$errors)?> />
  </span>
  <span class="element">
	<label for="bandeAnnonceURL">Vidéo:</label>
	<input type="text" id="bandeAnnonceURL" name="bandeAnnonceURL" placeholder="URL de la vidéo" <?=getHTMLElements('bandeAnnonceURL',$errors)?> />
  </span>
  <hr>
  <span class="element">
    <h4>Genres: <span class="required">*</span><a href="#" class="insertItem" id="insertGenre">(Ajouter un genre)</a></h4>
	<select name="genre1" id="genre1" class="genres">
	  <?=getHTMLOptions($genres,'genre1')?>
	</select>
	<?php
	  // sert à recupérer les valeurs des autres genres si le formulaire à déjà été précédemment remplis. on skip le 1 car déjà décalré juste au dessus

	  foreach(preg_grep('#^genre.$#',array_keys($_POST)) as $select_key) { // pour chaque clé du tableau $_POST qui correspond à l'expression régulière:

		if($select_key == 'genre1') continue;//																			on skip le 1
	    echo '<select name="'.$select_key.'" id="'.$select_key.'" class="genres">';//									on crée la balise select en HTML (par rapport à la clé)
		  foreach($genres as $key => $value) {//																		Pour chaque options disponibles:
			  echo '<option value="'.$key.'" '.getHTMLSelected($select_key,$key).'>'.$value.'</option>'.PHP_EOL; }//	  on crée la balise en question et on regarde si c'est celle que l'util. a précédemment choisi
		echo '</select>';//																								on ferme la balise select
	  }//																												A NOTER: c'est la même chose pour les autres lisaison, excepté les 2 dernières
	?>
	<button class="addItem" id="addGenre">+ Ajouter</button>
  </span>
  <hr>
  <span class="element">
    <h4>Langues: <span class="required">*</span><a href="#" class="insertItem" id="insertLangue">(Ajouter une langue)</a></h4>
    <select name="langue1" id="langue1" class="langues">
	  <?=getHTMLOptions($langues,'saga1')?>
	</select>
	<?php
	  foreach(preg_grep('#^langue.$#',array_keys($_POST)) as $select_key) {
		if($select_key == 'langue1') continue;
	    echo '<select name="'.$select_key.'" id="'.$select_key.'" class="langues">';
		  foreach($langues as $key => $value) {
			  echo '<option value="'.$key.'" '.getHTMLSelected($select_key,$key).'>'.$value.'</option>'.PHP_EOL; }
		echo '</select>';
	  }
	?>
	<button class="addItem" id="addLangue">+ Ajouter</button>
  </span>
  <hr>
  <span class="element">
    <h4>Sagas: <a href="#" class="insertItem" id="insertSaga">(Ajouter une saga)</a></h4>
    <select name="saga1" id="saga1" class="sagas">
	  <option value="NULL">-</option>
	  <?=getHTMLOptions($sagas,'saga1')?>
	</select>
	<?php
	  foreach(preg_grep('#^saga.$#',array_keys($_POST)) as $select_key) {
		if($select_key == 'saga1') continue;
	    echo '<select name="'.$select_key.'" id="'.$select_key.'" class="sagas">';
		  foreach($sagas as $key => $value) {
			  echo '<option value="'.$key.'" '.getHTMLSelected($select_key,$key).'>'.$value.'</option>'.PHP_EOL; }
		echo '</select>';
	  }
	?>
	<button class="addItem" id="addSaga">+ Ajouter</button>
  </span>
  <hr>
  <span class="element">
    <h4>Sociétés: <span class="required">*</span><a href="#" class="insertItem" id="insertSociete">(Ajouter une société)</a></h4>
    <select name="societe1" id="societe1" class="societes">
	  <?=getHTMLOptions($societes,'societe1')?>
	</select>
	<?php
	  foreach(preg_grep('#^societe.$#',array_keys($_POST)) as $select_key) {
		if($select_key == 'societe1') continue;
	    echo '<select name="'.$select_key.'" id="'.$select_key.'" class="societes">';
		  foreach($societes as $key => $value) {
			  echo '<option value="'.$key.'" '.getHTMLSelected($select_key,$key).'>'.$value.'</option>'.PHP_EOL; }
		echo '</select>';
	  }
	?>
	<button class="addItem" id="addSociete">+ Ajouter</button>
  </span>
  <hr>
  <span class="element">
    <h4>Fromats & prix: <span class="required">*</span><a href="#" class="insertItem" id="insertFormat">(Ajouter un format)</a></h4>
	<div class="block">
	  <select name="format1" id="format1" class="formats">
	    <?=getHTMLOptions($formats,'format1')?>
	  </select>
	  <input type="text"  id="prix1" name="prix1" placeholder="Prix" <?=getHTMLElements('prix1',$errors,'prix')?> /> CHF
	</div>
	<?php
	  foreach(preg_grep('#^format.$#',array_keys($_POST)) as $select_key) {
		if($select_key == 'format1') continue;
	    echo '<div class="block">';//													Ici on ajoute juste une balise div en +
		echo '<select name="'.$select_key.'" id="'.$select_key.'" class="formats">';
		foreach($formats as $key => $value) {
		  echo '<option value="'.$key.'" '.getHTMLSelected($select_key,$key).'>'.$value.'</option>'.PHP_EOL; }
		echo '</select>';
		echo '<input type="text" id="prix'.substr($select_key,-1).'" name="prix'.substr($select_key,-1).'" placeholder="Prix" '.getHTMLElements('prix'.substr($select_key,-1),$errors,'prix').' /> CHF';// et ici on ajoute + récup la valeur du 2e champ (ici le prix)
		echo '</div>';
	  }
	?>
	<button class="addItem" id="addFormat">+ Ajouter</button>
  </span>
  <hr>
  <span class="element">
    <h4>Personnes & rôles: <span class="required">*</span><a href="#" class="insertItem" id="insertPersonne">(Ajouter une personne)</a></h4>
	<div class="block">
	  <select name="personne1" id="personne1" class="personnes">
	    <?=getHTMLOptions($personnes,'personne1')?>
	  </select>
	  <input type="text" id="role1" name="role1" placeholder="Rôle" <?=getHTMLElements('role1',$errors,'role')?> />
	</div>
	<?php
	  foreach(preg_grep('#^personne.$#',array_keys($_POST)) as $select_key) {
		if($select_key == 'personne1') continue;
	    echo '<div class="block">';
		echo '<select name="'.$select_key.'" id="'.$select_key.'" class="personnes">';
		foreach($personnes as $key => $value) {
		  echo '<option value="'.$key.'" '.getHTMLSelected($select_key,$key).'>'.$value.'</option>'.PHP_EOL; }
		echo '</select>';
		echo '<input type="text" id="role'.substr($select_key,-1).'" name="role'.substr($select_key,-1).'" placeholder="Rôle" '.getHTMLElements('role'.substr($select_key,-1),$errors,'role').' />';
		echo '</div>';
	  }
	?>
	<button class="addItem" id="addPersonne">+ Ajouter</button>
  </span>
  <hr>
   <span class="element">
    <p><span class="required">*</span> obligatoire</p>
  </span>
  <span class="element">
    <input type="submit" name="submit" id="submit" value="Ajouter"/>
	<div id="FullScreenForm"></div>
</form>
