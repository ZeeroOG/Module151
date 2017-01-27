 function addEmote(key) {
	var id = "#addCommentaireText";
	var space;

	if(/\s$/.test($(id).val()) || $(id).val() == "") space = "";
	else space = " ";

	$(id).val($(id).val() + space + key);
}
