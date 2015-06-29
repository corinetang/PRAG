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

function editMembre(idUser) {
    var libelleQuestion = $("#edit-libelle-" + idQuestion).val();

    $.ajax({
       url : 'index.php?control=question&action=editQuestion',
       type : 'POST',
       data : 'id_question=' + idQuestion + "&libelle_question=" + libelleQuestion
    });
    location.reload();
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
}
