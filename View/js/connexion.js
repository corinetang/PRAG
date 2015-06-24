function connection() {
	$.ajax({
		url : $('#f1').attr('action'),  /*action="index.php?control=user&action=connect"*/
		type : $('#f1').attr('method'), /*method="POST"*/
		data : $('#f1').serialize(), /*paramétrage de la requète  : sérialisation des valeurs saisies dans le formulaire*/
		dataType : 'html', /*type de retour html ou simplement texte*/
		success : marquerOK, /*référence à la fonction marquerOK*/
		error : marquerErr
	});
	return false; /*pour éviter la soumission automatique fait par le navigateur puisque fait en ajax*/
}