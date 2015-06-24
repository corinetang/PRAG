
/*
 * Initialize le header avec la gestion des roles
 */ 
function initializeHeader(idRole) {
	/*
	utilisateur-option
	admin-option
	stage-option
	stage-voeux-option
	stage-consultation-option
	stage-evaluation-option
	accueil-option
	profil-option
	*/
	console.log("idRole", idRole);
	if (idRole === 3) { // Admin
		$('ul.utilisateur-option').removeClass('hide-option');
		$('li.accueil-option').removeClass('hide-option');
		$('li.admin-option').removeClass('hide-option');
		$('li.profil-option').removeClass('hide-option');
	}
	if (idRole === 2) { // Adhérent
		$('ul.utilisateur-option').removeClass('hide-option');
		$('li.profil-option').removeClass('hide-option');
		$('li.stage-option').removeClass('hide-option');
		$('li.stage-voeux-option').removeClass('hide-option');
		$('li.stage-consultation-option').removeClass('hide-option');
		$('li.stage-evaluation-option').removeClass('hide-option');	
	}
	if (idRole === 1) { // Interne
		$('ul.utilisateur-option').removeClass('hide-option');
		$('li.profil-option').removeClass('hide-option');
		$('li.stage-option').removeClass('hide-option');
		$('li.stage-voeux-option').removeClass('hide-option');		
	}
}