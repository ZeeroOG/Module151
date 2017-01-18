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
</style>
<div class="table">
  <div class="row" id="columnNames">
    <div class="col-xs-6">Nom</div>
	<div class="col-xs-1">Durée</div>
	<div class="col-xs-2 right">Date de sortie</div>
	<div class="col-xs-2 col-md-offset-1">Actions</div>
  </div>
  <?php foreach($listFilms->getFilmList() as $value) :?>
	<div class="row">
	  <div class="col-xs-6"><?=$value['titre']?></div>
	  <div class="col-xs-1"><?=date('G:i:s',$value['duree'])?></div>
	  <div class="col-xs-2 right"><?=date('j.n.Y',strtotime($value['sortie']))?></div>
	  <div class="col-xs-2 col-md-offset-1">
	    <a href=".?p=editFilm&id=<?=$value['id']?>" title="Modifier le film"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
		<a href=".?p=listFilms&removeFilm=true&id=<?=$value['id']?>" title="Supprimer le film"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
		<a href=".?p=showFilm&id=<?=$value['id']?>" title="Afficher le film"><span class="glyphicon glyphicon-film" aria-hidden="true"></span></a>
	  </div>
	</div>
  <?php endforeach;?>
</div>