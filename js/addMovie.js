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
			var $next = '<input type="text" class="prix" id="prix'+($count + 1)+'" name="prix'+($count + 1)+'" placeholder="Prix" /> CHF</div>';
			break;
		case 'addPersonne':
			var $default = $("#personne1").clone();
			var $add = $('#addPersonne').clone();
			var $count = $('.personnes').length;
			var $name = 'Personne';
			var $prev = '<div class="block">';
			var $next = '<input type="text" class="role" id="role'+($count + 1)+'" name="role'+($count + 1)+'" placeholder="Rôle" /></div>';
			break;

	}
	// on incrémente de 1
	$count++;
	//on change le +Ajouter par le nouvel élément et on met le +Ajouter à la fin
		$('#add'+$name).replaceWith(
			$prev+'<select class="form-control '+$name.toLowerCase()+'s" name="'+$name.toLowerCase()+$count+'" id="'+$name.toLowerCase()+$count+'">'+$default.html().replace('selected','')+'</select>'+
			$next+'<button class="btn btn-default btn-block addItem" id="add'+$name+'">'+$add.html()+'</button>');
});

//sert a afficher/cacher le formulaire pour l'ajout de genres/langues/formats/...
$('.insertItem').click(function() {
	$id = $(this).attr('id');
	$('body').css('overflow','hidden');
	$('#FullScreenForm').css('visibility', 'visible');
	$('#FullScreenForm').append('<div><h4>'+$(this).text().slice(1,-1)+'</h4><label for="'+$id+'">Nom:</label><input type="text" id="'+$id+'" name="'+$id+'"/><button type="button" id="cancel">Annuler</button><input type="submit" name="submitItem" value="Ajouter"/></div>');
});
$('#FullScreenForm').on('click','#cancel', function() {
	$('body').css('overflow','visible');
	$('#FullScreenForm').contents().remove();
	$('#FullScreenForm').css('visibility', 'hidden');
});
