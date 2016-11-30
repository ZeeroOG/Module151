<!-- Création du formulaire -->
<form action=".?p=DBmanagement" method="POST" accept-charset="UTF-8" id="addToDB">
  <span class="element">
    <h3>Ajouter un film</h3>
  </span>
  <span class="element">
	<label for="titreOriginal">Titre: <span class="required">*</span></label>
	<input type="text" id="titreOriginal" name="titreOriginal" placeholder="Titre original" <?=(empty($titreOriginal) ? '' : 'value="'.$titreOriginal.'" ')?> autofocus required/>
  </span>
  <span class="element">
    <label for="titreOriginal">Titre 2:</label>
	<input type="text" id="titreTraduit" name="titreTraduit" placeholder="Titre traduit" <?=(empty($titreTraduit) ? '' : 'value="'.$titreTraduit.'" ')?> />
  </span>
  <span class="element">
    <label for="titreOriginal">Durée: <span class="required">*</span></label>
	<input type="text" id="duree" name="duree" placeholder="Durée (minutes)" <?=(empty($duree) ? '' : 'value="'.$duree.'" ')?> required/>
  </span>
  <span class="element">
    <label for="titreOriginal">Date de sortie: <span class="required">*</span></label>
	<input type="date" id="dateSortieSuisse" name="dateSortieSuisse" placeholder="Date de sortie" <?=(empty($dateSortieSuisse) ? '' : 'value="'.$dateSortieSuisse.'" ')?> required/>
  </span>
  <span class="element">
	<label for="titreOriginal">Description: <span class="required">*</span></label>
	<input type="textarea" id="description" name="description" placeholder="Description" <?=(empty($description) ? '' : 'value="'.$description.'" ')?> required/>
  </span>
  <span class="element">
	<label for="titreOriginal">PEGI: <span class="required">*</span></label>
	<input type="text" id="accordParental" name="accordParental" placeholder="Accord parental" <?=(empty($accordParental) ? '' : 'value="'.$accordParental.'" ')?> required/>
  </span>
  <span class="element">
	<label for="titreOriginal">Pochette:</label>
	<input type="text" id="pochetteURL" name="pochetteURL" placeholder="URL de l'image" <?=(empty($pochetteURL) ? '' : 'value="'.$pochetteURL.'" ')?> />
  </span>
  <span class="element">
	<label for="titreOriginal">Vidéo:</label>
	<input type="text" id="bandeAnnonceURL" name="bandeAnnonceURL" placeholder="URL de la vidéo" <?=(empty($bandeAnnonceURL) ? '' : 'value="'.$bandeAnnonceURL.'" ')?> />
  </span>
  <hr>
  <span class="element">
    <h4>Genres: <span class="required">*</span><a href="#">(Ajouter un genre)</a></h4>
    <select name="genre1" id="genre1" class="genres">
	  <?php foreach($genres as $key => $value) {
			  echo '<option value="'.$key.'">'.$value.'</option>'.PHP_EOL; } ?>
	</select>
	<button class="addItem" id="addGenre">+ Ajouter</button>
  </span>
  <hr>
  <span class="element">
    <h4>Langues: <span class="required">*</span><a href="#">(Ajouter une langue)</a></h4>
    <select name="langue1" id="langue1" class="langues">
	  <?php foreach($langues as $key => $value) {
			  echo '<option value="'.$key.'">'.$value.'</option>'.PHP_EOL; } ?>
	</select>
	<button class="addItem" id="addLangue">+ Ajouter</button>
  </span>
  <hr>
  <span class="element">
    <h4>Sagas: <span class="required">*</span><a href="#">(Ajouter une saga)</a></h4>
    <select name="saga1" id="saga1" class="sagas">
	  <option value="NULL">-</option>
	  <?php foreach($sagas as $key => $value) {
			  echo '<option value="'.$key.'">'.$value.'</option>'.PHP_EOL; } ?>
	</select>
	<button class="addItem" id="addSaga">+ Ajouter</button>
  </span>
  <hr>
  <span class="element">
    <h4>Sociétés: <span class="required">*</span><a href="#">(Ajouter une société)</a></h4>
    <select name="societe1" id="societe1" class="societes">
	  <?php foreach($societes as $key => $value) {
			  echo '<option value="'.$key.'">'.$value.'</option>'.PHP_EOL; } ?>
	</select>
	<button class="addItem" id="addSociete">+ Ajouter</button>
  </span>
  <span class="element">
    <p>* obligatoire</p>
  </span>
  <span class="element">
    <input type="submit" name="submit" id="submit" value="Ajouter"/>
</form>
