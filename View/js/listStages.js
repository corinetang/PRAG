// jQuery(document).ready(function (){    
//     $('#myModal').on('shown.bs.modal', function () {
//       $('#myInput').focus()
//     });
// } );

function enregistrer(id_reponse, commentaire_reponse) {

	var ids = JSON.parse(id_reponse);
	var commentaires = JSON.parse(commentaire_reponse);

	for (var i = ids.length - 1; i >= 0; i--) {
		var id = ids[i]['id_reponse'];
		var comm = commentaires[i];
		console.log(id);
		console.log(comm);
		$.ajax({
			url: 'index.php?control=question&action=repondre',
			type: 'POST',
			data: 'id_reponse=' + id +'&reponse=' + comm
		});

	};
	// var reponse = $('#reponse-' + id_reponse).val();
	// console.log('id_reponse', id_reponse);
	// console.log('reponse', reponse);
	// $.ajax({
	// 	url: 'index.php?control=question&action=repondre',
	// 	type: 'POST',
	// 	data: 'id_reponse=' + id_reponse +'&reponse=' + reponse
	// });
}