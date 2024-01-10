// autocompletion
function autocomplet() {
	var min_length = 1; // nombre de caractère avant lancement recherch 
	var keyword = $('#vil_bien').val();  // nom_id fait référence au champ de recherche puis lancement de la recherche grace ajax_refresh
	if (keyword.length >= min_length) {
		$.ajax({
			url: '../../php/ajax/ajax_refresh_bien_aj_ville.php',
			type: 'POST',
			data: {keyword:keyword},
			success:function(data){
				$('#aj_ville').show();
				$('#aj_ville').html(data);
			}
		});
	} else {
		$('#aj_ville').hide();
	}
}

// Lors du choix dans la liste
function set_item(item_aj,item2_aj) {
	// change input value
	$('#vil_bien').val(item_aj);
	$('#codeP_bien').val(item2_aj);
	// hide proposition list
	$('#aj_ville').hide();
}