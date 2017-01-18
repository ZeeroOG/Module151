<style>
  #importDB {
	width: 350px;
	margin: 0 auto;
  }
  #importDB > h3 {
	width: 100%;
	text-align: center;
  }
  #importDB > div {
	width: 100%;
	padding: 5px;
  }
  #importDB #file {
	width: 100%;
  }
  #importDB #send {
	width: 100%;
	margin-top: 20px;
  }
  #errors {
	  font-size: 17px;
	  padding-left: 10px;
	  background-color: rgba(255, 128, 128, .3);
	  color: red;
  }
  #success {
	  font-size: 17px;
	  padding-left: 10px;
	  background-color: rgba(128, 255, 128, .3);
	  color: green;
  }
</style>
<div id="errors">
  <?php foreach($errors as $line) {
	  echo $line.'<br/>';
  }?>
</div>
<?php if(isset($_POST['send']) AND empty($errors)) :?>
<div id="success">
  La base de donnée à été mise à jour !
</div>
<?php endif; ?>
<form action=".?p=importDB" method="POST" enctype="multipart/form-data" accept-charset="UTF-8" id="importDB">
  <h3>Importer un fichier .sql</h3>
  <div>
    <input type="file" id="file" name="file" accept=".sql"/>
  </div>
  <div>
    <input type="checkbox" id="eraseBefore" name="eraseBefore" checked/>
	<label for="eraseBefore">Supprimer les données et déjà présentes</label>
  </div>
  <div>
    <input type="submit" id="send" name="send" value="Importer" class="btn btn-primary"/>
  </div>
 </form>