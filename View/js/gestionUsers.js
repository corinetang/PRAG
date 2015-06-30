jQuery(document).ready(function (){
    $('#myModal').on('shown.bs.modal', function () {
      $('#myInput').focus();
    });
} );

function supprimerMembre(idUser) {
    $("#membre-" + idUser).remove();

    $.ajax({
       url : 'index.php?control=user&action=removeUser',
       type : 'POST',
       data : 'id_user=' + idUser
    });
};

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

   if (nameOk && prenomOk && mailOk && nbSemestreOk) {
	        return true;
   }
   else
   {
      alert("Veuillez remplir correctement tous les champs");
      return false;
   }
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

function editMembre() {
  var membreData = $('#membre-edit').data();
  var idUser = membreData['idUser'];
  var nomUser = $('#membre-nom').val();
  var prenomUser = $('#membre-prenom').val();
  var nbSemestreUser = $('#membre-semestre').val();
  var ddnUser = $('#membre-ddn').val();
  var mailUser = $('#membre-mail').val();
  var numTelUser = $('#membre-telephone').val();

  var groupeUser;
  if (document.getElementById("membre-siphif").checked == true) {
    groupeUser = 2;
  } else {
    groupeUser = 1;
  }

  $.ajax({
     url : 'index.php?control=user&action=changeMembre',
     type : 'POST',
     data : 'IdUser=' + idUser + "&Nom=" + nomUser + "&Prenom=" + prenomUser
     + "&NbSemestre=" + nbSemestreUser + "&Mail=" + mailUser
     + "&Telephone=" + numTelUser +  "&Ddn=" + ddnUser +  "&Groupe=" + groupeUser,
     success: function() {
      location.reload();
     }
  });
}

function initUserModal(idUser, nomUser, prenomUser, nbSemestreUser, ddnUser, mailUser, numTelUser, idGroupe) {
  $('#membre-nom').val(nomUser);
  $('#membre-prenom').val(prenomUser);
  $('#membre-semestre').val(nbSemestreUser);
  $('#membre-ddn').val(ddnUser);
  $('#membre-mail').val(mailUser);
  $('#membre-telephone').val(numTelUser);
  if (idGroupe == 2) {
    document.getElementById("membre-siphif").checked = true;
  } else {
    document.getElementById("membre-siphif").checked = false;
  }
  $('#membre-edit').data('idUser', idUser);
}
