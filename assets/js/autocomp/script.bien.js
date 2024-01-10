// autocompletion
function autocompletBien() {
	var min_length = 1; // nombre de caractère avant lancement recherche
	var keyword = $('#id_type_bien').val();  // nom_id fait référence au champ de recherche puis lancement de la recherche grace ajax_refresh_bien
	if (keyword.length >= min_length) {
		$.ajax({
			url: '../../php/ajax/ajax_refresh_bien.php',
			type: 'POST',
			data: {keyword:keyword},
			success:function(data){
				$('#type_li	st_id').show();
				$('#type_list_id').html(data);
			}
		});
	} else {
		$('#type_list_id').hide();
	}
}

// Lors du choix dans la liste
function set_item(item, item2) {
	// change input value
	$('#id_type_bien').val(item);
	$('#id_type_bien2').val(item2);
	// hide proposition list
	$('#type_list_id').hide();
}