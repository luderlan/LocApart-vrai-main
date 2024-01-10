function autocomplet() {
	var min_length = 1; // nombre de caractère avant lancement recherch 
	var keyword = $('#vil_client').val();  // nom_id fait référence au champ de recherche puis lancement de la recherche grace ajax_refresh
	if (keyword.length >= min_length) {
		$.ajax({
			url: '../../php/ajax/ajax_refresh.client.php',
			type: 'POST',
			data: {keyword:keyword},
			success:function(data){
				$('#id_list_ville').show();
				$('#id_list_ville').html(data);
			}
		});
	} else {
		$('#id_list_ville').hide();
	}
}

// Lors du choix dans la liste
function set_item(item, item2) {
	// change input value
	$('#vil_client').val(item);
	$('#id_comm').val(item2);
	// hide proposition list
	$('#id_list_ville').hide();
}
