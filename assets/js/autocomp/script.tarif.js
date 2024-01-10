// autocompletion
function autocompletTarif() {
	var min_length = 1; // nombre de caractère avant lancement recherche
	var keyword = $('#id_bien').val();  // nom_id fait référence au champ de recherche puis lancement de la recherche grace ajax_refresh_bien
	if (keyword.length >= min_length) {
		$.ajax({
			url: '../../php/ajax/ajax_refresh_tarif.php',
			type: 'POST',
			data: {keyword:keyword},
			success:function(data){
				$('#bien_list_id').show();
				$('#bien_list_id').html(data);
			}
		});
	} else {
		$('#bien_list_id').hide();
	}
}

// Lors du choix dans la liste
function set_item(item, item2) {
	// change input value
	$('#id_bien').val(item);
	$('#id_bien2').val(item2);
	// hide proposition list
	$('#bien_list_id').hide();
}