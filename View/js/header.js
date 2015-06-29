/*
 * Initialize le header avec la gestion des roles
 */
function initializeHeader(idRole) {
	if (idRole === 3) { // Admin
		$('ul.utilisateur-option').removeClass('hide-option');

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
		$('li.stage-consultation-option').removeClass('hide-option');
	}
    else{ // Visiteur
    	$('li.accueil-option').removeClass('hide-option');
    }
}

jQuery(function(){
	$( ".change-at-focus" ).mouseover(function() {
  		$(this).css('background-color','#75b9e7' );
	});

	$( ".change-at-focus" ).mouseleave(function() {
  		$(this).css('background-color','#3498db' );
	});
});

$(document).ready(function(){
    $(".dropdown").hover(            
        function() {
            $('.dropdown-menu', this).not('.in .dropdown-menu').stop( true, true ).slideDown("fast");
            $(this).toggleClass('open');        
        },
        function() {
            $('.dropdown-menu', this).not('.in .dropdown-menu').stop( true, true ).slideUp("fast");
            $(this).toggleClass('open');       
        }
    );
});
