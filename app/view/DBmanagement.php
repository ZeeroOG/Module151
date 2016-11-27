<!-- Création du formulaire -->
<form action="." method="SET" accept-charset="UTF-8" id="addToDB">
  <span class="element">
    <h3>Ajouter un film</h3>
  </span>
  <span class="element">
	<input type="text" id="titreOriginal" name="titreOriginal" placeholder="Titre original" <?=(empty($titreOriginal) ? '' : 'value="'.$titreOriginal.'" ')?> autofocus required/>
	<span class="required">*</span>
  </span>
  <span class="element">
    <input type="text" id="titreTraduit" name="titreTraduit" placeholder="Titre traduit" <?=(empty($titreTraduit) ? '' : 'value="'.$titreTraduit.'" ')?> />
  </span>
  <span class="element">
    <input type="text" id="duree" name="duree" placeholder="Durée (minutes)" <?=(empty($duree) ? '' : 'value="'.$duree.'" ')?> required/>
	<span class="required">*</span>
  </span>
  <span class="element">
    <input type="date" id="dateSortieSuisse" name="dateSortieSuisse" placeholder="Date de sortie" <?=(empty($dateSortieSuisse) ? '' : 'value="'.$dateSortieSuisse.'" ')?> required/>
	<span class="required">*</span>
  </span>
  <span class="element">
	<input type="textarea" id="description" name="description" placeholder="Description" <?=(empty($description) ? '' : 'value="'.$description.'" ')?> required/>
	<span class="required">*</span>
  </span>
  <span class="element">
	<input type="text" id="accordParental" name="accordParental" placeholder="Accord parental" <?=(empty($accordParental) ? '' : 'value="'.$accordParental.'" ')?> required/>
	<span class="required">*</span>
  </span>
  <span class="element">
	<input type="text" id="pochetteURL" name="pochetteURL" placeholder="URL de l'image" <?=(empty($pochetteURL) ? '' : 'value="'.$pochetteURL.'" ')?> />
  </span>
  <span class="element">
	<input type="text" id="bandeAnnonceURL" name="bandeAnnonceURL" placeholder="URL de la vidéo" <?=(empty($bandeAnnonceURL) ? '' : 'value="'.$bandeAnnonceURL.'" ')?> />
  </span>
  <span class="element">
    <h4>Genres <span class="required">*</span></h4>
    <select name="genres" id="genres">
	  <?php foreach($genres as $key => $value) {
			  echo '<option value="'.$key.'">'.$value.'</option>'.PHP_EOL; } ?>
	</select>
  </span>
  <span class="element">
    <p>* obligatoire</p>
  </span>
</form>
	
	