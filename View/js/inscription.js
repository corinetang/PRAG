jQuery(function () {
    $("#ValidationPassword").focusout(function () {
        var passwordVal  = $("#Password").val();
        var checkVal     = $("#ValidationPassword").val();
        
        if (passwordVal !== checkVal) {
            $("#error-password").removeAttr('style');
            /*jQuery(<div/>, {id : 'ValidationPassword', class: 'form-group has-error', text: 'Attention : Votre mot de passe et votre confirmation de mot de passe sont différents'}).appendTo("#error-password");*/
        }
        else {
            $("#error-password").css('display', 'none');
        }
    });
    
    $(document).ready(function() {
    $('.input-group input[required], .input-group textarea[required], .input-group select[required]').on('keyup change', function() {
		var $form = $(this).closest('form'),
            $group = $(this).closest('.input-group'),
			$addon = $group.find('.input-group-addon'),
			$icon = $addon.find('span'),
			state = false;
            
    	if (!$group.data('validate')) {
			state = $(this).val() ? true : false;
		}else if ($group.data('validate') == "email") {
			state = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/.test($(this).val())
		}else if($group.data('validate') == 'phone') {
			state = /^[(]{0,1}[0-9]{3}[)]{0,1}[-\s\.]{0,1}[0-9]{3}[-\s\.]{0,1}[0-9]{4}$/.test($(this).val())
		}else if ($group.data('validate') == "length") {
			state = $(this).val().length >= $group.data('length') ? true : false;
		}else if ($group.data('validate') == "number") {
			state = !isNaN(parseFloat($(this).val())) && isFinite($(this).val());
		}

		if (state) {
				$addon.removeClass('danger');
				$addon.addClass('success');
				$icon.attr('class', 'glyphicon glyphicon-ok');
		}else{
				$addon.removeClass('success');
				$addon.addClass('danger');
				$icon.attr('class', 'glyphicon glyphicon-remove');
		}
        
        if ($form.find('.input-group-addon.danger').length == 0) {
            $form.find('[type="submit"]').prop('disabled', false);
        }else{
            $form.find('[type="submit"]').prop('disabled', true);
        }
	});
    
    $('.input-group input[required], .input-group textarea[required], .input-group select[required]').trigger('change');
});
   
   
});

function espace(champ) {
	var ch = champ.value;
	if(ch.length == ch.split(" ").length){
   return true;
	}
}

function valideForm(f) {
	var nameOk = verifName(f.Nom);
	var prenomOk = verifName(f.Prenom);
	var mailOk = verifMail(f.mail);
	var nbSemestreOk = verifNbSemestre(f.NbSemestre);
	var passwordOK = verifPassword(f.Password);
	var passwordConfirmOK = verifPassword(f.ValidationPassword);
   
   if(f.Password.value != f.ValidationPassword.value) {
	alert("Vos mots de passe ne sont pas identiques");
		return false
   }
   else if (!nameOk && !prenomOk && !mailOk && !nbSemestreOk && !passwordOK && !passwordConfirmOK) {
		alert("Veuillez remplir correctement tous les champs");
	    return false;
   }
    return true;
}
	
function verifName(champ) {
	if(champ.value.length <2 || champ.value == '' || espace(champ.value)) {
		surligne(champ, true);
		alert('Votre nom doit comporter au minimum 2 caracteres');
		return false;
	}
	else{ 
		return true;
	} 
}

function verifPassword(champ){
	var password = champ.value;
	if(password.length <4 ){
		surligne(champ, true);
		alert('Votre mot de passe doit contenir entre 4 et 50 caractères !');
		return false;
	}
	return true;
}

function verifNbSemestre(champ) {
	var NbSemestre = parseInt(champ.value);
	if (isNaN(NbSemestre) || NbSemestre < 0 || NbSemestre > 7 || NbSemestre == '') {
		surligne(champ, true);
		alert('Le nombre de semestre doit etre compris entre 1 et 7');
		return false;
	}
	else
		return true;
}

function verifMail(champ)
{
   var regex = /^[a-zA-Z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$/;
   if(!regex.test(champ.value) || champ.value =='')
   {
	   surligne(champ, true);
      alert('Veuillez entrer une adresse mail valide');
      return false;
   }
   else
   {
      return true;
   }
} 

function verifNumTel(champ)
{
   var tel = parseInt(champ.value);
   if(isNaN(tel) || tel != 10)
   {
	   surligne(champ, true);
      alert('Veuillez entrer votre numero à 10 choffres');
      return false;
   }
   else
   {
      return true;
   }
}

function surligne(champ, erreur)
{
   if(erreur)
      champ.style.backgroundColor = "#fba";
   else
      champ.style.backgroundColor = "";
}


