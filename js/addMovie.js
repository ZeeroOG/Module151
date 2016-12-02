// script utilisé pour le formulaire d'ajout/modification dans la DB
$("#addToDB").on("click", ".addItem", function() {
	// on déclare les variables
	
	var $default = '';
	var $add = '';
	var $count = '';
	var $name = '';
	var $next = ''; //optional
	var $prev = ''; //optional
	
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
		case 'addFormat':
			var $default = $("#format1").clone();
			var $add = $('#addFormat').clone();
			var $count = $('.formats').length;
			var $name = 'Format';
			var $prev = '<div class="block">';
			var $next = '<input type="text" class="prix" id="prix'+$count+'" name="prix'+$count+'" placeholder="Prix" required/> CHF</div>';
			break;
		case 'addPersonne':
			var $default = $("#personne1").clone();
			var $add = $('#addPersonne').clone();
			var $count = $('.personnes').length;
			var $name = 'Personne';
			var $prev = '<div class="block">';
			var $next = '<input type="text" class="role" id="role'+$count+'" name="role'+$count+'" placeholder="Rôle" required/></div>';
			break;
			
	}
	// on incrémente de 1
	$count++;
	//on change le +Ajouter par le nouvel élément et on met le +Ajouter à la fin
		$('#add'+$name).replaceWith(
			$prev+'<select name="'+$name.toLowerCase()+$count+'" id="'+$name.toLowerCase()+$count+'" class="'+$name.toLowerCase()+'s">'+$default.html()+'</select>'+
			$next+'<button class="addItem" id="add'+$name+'">'+$add.html()+'</button>');
});