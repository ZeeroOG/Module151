<!-- Ajout de films -->
<?php echo getHTMLErrors($errors); ?>
<?php echo getHTMLSuccess($_GET); ?>
<form action=".?p=addFilm" method="POST" enctype="multipart/form-data" accept-charset="UTF-8" id="addToDB">
  <div class="form-group">
	  <span class="element">
	    <h3>Ajouter un film</h3>
	  </span>
	  
<!-- Titre original -->
	  <span class="element">
		<label for="titreOriginal">Titre<span class="required">*</span></label>
		<input type="text" id="titreOriginal" name="titreOriginal" placeholder="Titre original" <?=getHTMLElements('titreOriginal',$errors,'form-control') //sert a recup l'ancienne valeur et l'erreur (si erreur il y a)?> autofocus/>
	  </span>
	  
<!-- Titre francais (facultatif) -->
	  <span class="element">
	    <label for="titreTraduit">Titre 2</label>
		<input type="text" id="titreTraduit" name="titreTraduit" placeholder="Titre traduit" <?=getHTMLElements('titreTraduit',$errors,'form-control')?> />
	  </span>
	  
<!-- Durée -->	
	  <span class="element">
	    <label for="duree">Durée<span class="required">*</span></label>
		<input type="text" id="duree" name="duree" placeholder="Durée (minutes)" <?=getHTMLElements('duree',$errors,'form-control')?> />
	  </span>
	  
<!-- Date de sortie -->	
	  <span class="element">
	    <label for="dateSortieSuisse">Date de sortie<span class="required">*</span></label>
		<input type="date" id="dateSortieSuisse" name="dateSortieSuisse" placeholder="Date de sortie (yyyy-mm-dd)" <?=getHTMLElements('dateSortieSuisse',$errors,'form-control')?>/>
	  </span>
	  
<!-- Description -->
	  <span class="element">
		<label for="description">Description<span class="required">*</span></label>
		<textarea id="description" name="description" placeholder="Description" rows="4" <?=getHTMLElements('description',$errors,'form-control')?>><?=((isset($_POST['description']) AND !empty($_POST['description'])) ? htmlspecialchars($_POST['description']) : '')?></textarea>
	  </span>

<!-- Accord parental -->
	  <span class="element">
		<label for="accordParental">PEGI<span class="required">*</span></label>
		<input type="text" id="accordParental" name="accordParental" placeholder="Accord parental" <?=getHTMLElements('accordParental',$errors,'form-control')?>/>
	  </span>
	  
<!-- Pochette -->
	  <span class="element">
		<label for="pochetteFile">Pochette</label>
		<input type="file" id="pochetteFile" name="pochetteFile" placeholder="URL de l'image" accept="image/*" <?=getHTMLElements('pochetteFile',$errors,'form-control')?> />
	  </span>

<!-- URL bande annonce -->
	  <span class="element">
		<label for="bandeAnnonceURL">Vidéo</label>
		<input type="text" id="bandeAnnonceURL" name="bandeAnnonceURL" placeholder="URL de la vidéo" <?=getHTMLElements('bandeAnnonceURL',$errors,'form-control')?> />
	  </span>
	  <hr/>
	  
<!-- Genres -->
	  <span class="element">
	    <h4>Genres: <span class="required">*</span><a href="#" class="insertItem" id="insertGenre">(Ajouter un genre)</a></h4>
		<select name="genre1" id="genre1" class="genres form-control">
		  <option value="NULL">-</option>
		  <?=getHTMLOptions($genres,'genre1')?>
		</select>
		<?php
		  // sert à recupérer les valeurs des autres genres si le formulaire à déjà été précédemment remplis. on skip le 1 car déjà décalré juste au dessus

		  foreach(preg_grep('#^genre.+$#',array_keys($_POST)) as $select_key) { // pour chaque clé du tableau $_POST qui correspond à l'expression régulière:

			if($select_key == 'genre1') continue;//																			on skip le 1
		    echo '<select name="'.$select_key.'" id="'.$select_key.'" class="genres form-control">';//									on crée la balise select en HTML (par rapport à la clé)
			echo '<option value="NULL">-</option>';
			  foreach($genres as $key => $value) {//																		Pour chaque options disponibles:
				  echo '<option value="'.$key.'" '.getHTMLSelected($select_key,$key).'>'.$value.'</option>'.PHP_EOL; }//	  on crée la balise en question et on regarde si c'est celle que l'util. a précédemment choisi
			echo '</select>';//																								on ferme la balise select
		  }//																												A NOTER: c'est la même chose pour les autres lisaison, excepté les 2 dernières
		?>
		<button class="btn btn-default btn-block addItem" id="addGenre">+ Ajouter</button>
	  </span>
	  <hr/>
	  
<!-- Langues -->
	  <span class="element">
	    <h4>Langues: <span class="required">*</span><a href="#" class="insertItem" id="insertLangue">(Ajouter une langue)</a></h4>
	    <select name="langue1" id="langue1" class="langues form-control">
		  <option value="NULL">-</option>
		  <?=getHTMLOptions($langues,'langue1')?>
		</select>
		<?php
		  foreach(preg_grep('#^langue.+$#',array_keys($_POST)) as $select_key) {
			if($select_key == 'langue1') continue;
		    echo '<select name="'.$select_key.'" id="'.$select_key.'" class="langues form-control">';
			echo '<option value="NULL">-</option>';
			  foreach($langues as $key => $value) {
				  echo '<option value="'.$key.'" '.getHTMLSelected($select_key,$key).'>'.$value.'</option>'.PHP_EOL; }
			echo '</select>';
		  }
		?>
		<button class="btn btn-default btn-block addItem" id="addLangue">+ Ajouter</button>
	  </span>
	  <hr/>
	  
<!-- Sagas -->
	  <span class="element">
	    <h4>Sagas: <a href="#" class="insertItem" id="insertSaga">(Ajouter une saga)</a></h4>
	    <select name="saga1" id="saga1" class="sagas form-control">
		  <option value="NULL">-</option>
		  <?=getHTMLOptions($sagas,'saga1')?>
		</select>
		<?php
		  foreach(preg_grep('#^saga.+$#',array_keys($_POST)) as $select_key) {
			if($select_key == 'saga1') continue;
		    echo '<select name="'.$select_key.'" id="'.$select_key.'" class="sagas form-control">';
			echo '<option value="NULL">-</option>';
			  foreach($sagas as $key => $value) {
				  echo '<option value="'.$key.'" '.getHTMLSelected($select_key,$key).'>'.$value.'</option>'.PHP_EOL; }
			echo '</select>';
		  }
		?>
		<button class="btn btn-default btn-block addItem" id="addSaga">+ Ajouter</button>
	  </span>
	  <hr/>
	  
<!-- Societes -->
	  <span class="element">
	    <h4>Sociétés: <span class="required">*</span><a href="#" class="insertItem" id="insertSociete">(Ajouter une société)</a></h4>
	    <select name="societe1" id="societe1" class="societes form-control">
		  <option value="NULL">-</option>
		  <?=getHTMLOptions($societes,'societe1')?>
		</select>
		<?php
		  foreach(preg_grep('#^societe.+$#',array_keys($_POST)) as $select_key) {
			if($select_key == 'societe1') continue;
		    echo '<select name="'.$select_key.'" id="'.$select_key.'" class="societes form-control">';
			echo '<option value="NULL">-</option>';
			  foreach($societes as $key => $value) {
				  echo '<option value="'.$key.'" '.getHTMLSelected($select_key,$key).'>'.$value.'</option>'.PHP_EOL; }
			echo '</select>';
		  }
		?>
		<button class="btn btn-default btn-block addItem" id="addSociete">+ Ajouter</button>
	  </span>
	  <hr/>
	  
<!-- Formats & prix -->
	  <span class="element">
	    <h4>Fromats & prix: <span class="required">*</span><a href="#" class="insertItem" id="insertFormat">(Ajouter un format)</a></h4>
		<div class="block">
		  <select name="format1" id="format1" class="formats form-control">
		    <option value="NULL">-</option>
		    <?=getHTMLOptions($formats,'format1')?>
		  </select>
		  <input type="text" id="prix1" name="prix1" placeholder="Prix" <?=getHTMLElements('prix1',$errors,'prix')?> /> CHF
		</div>
		<?php
		  foreach(preg_grep('#^format.+$#',array_keys($_POST)) as $select_key) {
			if($select_key == 'format1') continue;
		    echo '<div class="block">';//													Ici on ajoute juste une balise div en +
			echo '<select name="'.$select_key.'" id="'.$select_key.'" class="formats form-control">';
			echo '<option value="NULL">-</option>';
			foreach($formats as $key => $value) {
			  echo '<option value="'.$key.'" '.getHTMLSelected($select_key,$key).'>'.$value.'</option>'.PHP_EOL; }
			echo '</select>';
			echo '<input type="text" id="prix'.substr($select_key,6).'" name="prix'.substr($select_key,6).'" placeholder="Prix" '.getHTMLElements('prix'.substr($select_key,6),$errors,'prix').' /> CHF';// et ici on ajoute + récup la valeur du 2e champ (ici le prix)
			echo '</div>';
		  }
		?>
		<button class="btn btn-default btn-block addItem" id="addFormat">+ Ajouter</button>
	  </span>
	  <hr/>
	  
<!-- Personnes & rôles -->
	  <span class="element">
		<h4>Personnes & rôles: <span class="required">*</span><a href="#" class="insertItem" id="insertPersonne">(Ajouter une personne)</a></h4>
		<div class="block">
		  <select name="personne1" id="personne1" class="personnes form-control">
			<option value="NULL">-</option>
		    <?=getHTMLOptions($personnes,'personne1')?>
		  </select>
		  <input type="text" id="role1" name="role1" placeholder="Rôle" <?=getHTMLElements('role1',$errors,'role')?> />
		</div>
		<?php
		  foreach(preg_grep('#^personne.+$#',array_keys($_POST)) as $select_key) {
			if($select_key == 'personne1') continue;
		    echo '<div class="block">';
			echo '<select name="'.$select_key.'" id="'.$select_key.'" class="personnes form-control">';
			echo '<option value="NULL">-</option>';
			foreach($personnes as $key => $value) {
			  echo '<option value="'.$key.'" '.getHTMLSelected($select_key,$key).'>'.$value.'</option>'.PHP_EOL; }
			echo '</select>';
			echo '<input type="text" id="role'.substr($select_key,8).'" name="role'.substr($select_key,8).'" placeholder="Rôle" '.getHTMLElements('role'.substr($select_key,8),$errors,'role').' />';
			echo '</div>';
		  }
		?>
		<button class="btn btn-default btn-block addItem" id="addPersonne">+ Ajouter</button>
	  </span>
	  <hr/>
	  
	   <span class="element">
	    <p><span class="required">*</span> obligatoire</p>
	  </span>
	  <span class="element">
	    <input type="submit" class="form-control btn btn-block btn-primary" name="submit" id="submit" value="Ajouter"/>
	  </span>
		<div id="FullScreenForm"></div>
	</div>
</form>
