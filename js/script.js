// script utilisé pour le formulaire d'ajout/modification dans la DB
$("#addToDB").on("click", ".addItem", function() {
	// on déclare les variables
	var $default = '';
	var $add = '';
	var $count = '';
	var $name = '';
	// on récupère les infos utiles pour dupliquer l'élément
	switch(this.id) {
		case 'addGenre':
			var $default = $("#genre1").clone();
			var $add = $("#addGenre").clone();
			var $count = $('.genres').length;
			var $name= 'Genre';
			break;
		case 'addLangue':
			var $default = $("#langue1").clone();
			var $add = $("#addLangue").clone();
			var $count = $('.langues').length;
			var $name= 'Langue';
			break;
		case 'addSaga':
			var $default = $("#saga1").clone();
			var $add = $("#addSaga").clone();
			var $count = $('.sagas').length;
			var $name= 'Saga';
			break;
		case 'addSociete':
			var $default = $("#societe1").clone();
			var $add = $("#addSociete").clone();
			var $count = $('.societes').length;
			var $name= 'Societe';
			break;
	}
	// on incrémente de 1
	$count++;
	//on change le +Ajouter par le nouvel élément et on met le +Ajouter à la fin
		$('#add'+$name).replaceWith(
			'<select name="'+$name.toLowerCase()+$count+'" id="'+$name.toLowerCase()+$count+'" class="'+$name.toLowerCase()+'s">'+$default.html()+'</select>'+
			'<a href="#" class="addItem" id="add'+$name+'">'+$add.html()+'</a>');
});