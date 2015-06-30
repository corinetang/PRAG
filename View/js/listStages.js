jQuery(document).ready(function (){    
    $('#myModal').on('shown.bs.modal', function () {
      $('#myInput').focus()
    });
} );

function enregistrer(id_reponse) {

	var reponse = JSON.parse(id_reponse);

	for (var i = reponse.length - 1; i >= 0; i--) {
		reponse[i]['id_reponse'] 
	};
	// var reponse = $('#reponse-' + id_reponse).val();
	// console.log('id_reponse', id_reponse);
	// console.log('reponse', reponse);
	// $.ajax({
	// 	url: 'index.php?control=question&action=repondre',
	// 	type: 'POST',
	// 	data: 'id_reponse=' + id_reponse +'&reponse=' + reponse
	// });
};