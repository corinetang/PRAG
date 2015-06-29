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
