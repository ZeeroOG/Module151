<style>
  .table {
	  min-width: 720px;
	  width: 75%;
	  margin-left: 190px;
  }
  @media (max-width: 1000px) {
	.table {
	  margin: 0;
	}
  }
  .table > div {
	  max-height: 20px;
	  margin-bottom: 5px;
  }
  .table > div > div {
	  overflow: hidden;
	  white-space: nowrap;
	  text-overflow: ellipsis;
	  padding-right: 0;
  }
  #columnNames {

	  font-weight: 700;
	  margin-bottom: 20px;
  }
  .table > .row {
	  border-bottom: 1px solid lightgrey;
  }
  .table a {
	  margin-right: 5px;
  }
  .table .right {
	  text-align: right;
  }
  .table .title {
	  font-size: 30px;
	  text-align: center;
	  border-bottom: none;
	  max-height: 40px;
	  margin-bottom: 30px;
	  font-weight: bold;
  }
</style>
<?php if(isset($_GET['success'])) :?>
	<div class="success">
	<h4>Succès</h4>
	Le film a bien été modifié
	</div>
<?php endif;?>
	
<div class="table">
  <div class="row title">

    <div class="col-xs-12">Liste des films</div>
  </div>
  <div class="row" id="columnNames">
    <div class="col-xs-6">Nom</div>
	<div class="col-xs-1">Durée</div>
	<div class="col-xs-2 right">Date de sortie</div>
	<div class="col-xs-2 col-xs-offset-1">Actions</div>
  </div>
  <?php foreach($listFilms->getFilmList() as $value) :?>
	<div class="row">
	  <div class="col-xs-6"><?=$value['titre']?></div>
	  <div class="col-xs-1"><?=date('G\hi',mktime(0,$value['duree']))?></div>
	  <div class="col-xs-2 right"><?=date('d.m.Y',strtotime($value['sortie']))?></div>
	  <div class="col-xs-2 col-xs-offset-1">
		<a href="?p=showFilm&id=<?=$value['id']?>" title="Afficher le film"><span class="glyphicon glyphicon-film" aria-hidden="true"></span></a>
	    <a href="?p=editFilm&id=<?=$value['id']?>" title="Modifier le film"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
		<a onclick="return confirm('Etes-vous sûr de vouloir supprimer ce film ?');" href="?p=listFilms&removeFilm=true&id=<?=$value['id']?>" title="Supprimer le film"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
	  </div>
	</div>
  <?php endforeach;?>
</div>
