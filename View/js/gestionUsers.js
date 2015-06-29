jQuery(document).ready(function (){
    $('#button_edit').click(function(e) {
        var rows = $('#tableau_gestionUsers tbody tr').index(this);
        console.log(rows);
        var index = rows.cells.item(0).innerHTML;
        console.log(index);
    });

    $('#myModal').on('shown.bs.modal', function () {
      $('#myInput').focus()
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
