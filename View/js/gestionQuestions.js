window.onload = function() {
    $('.valid-edit-button').hide();
}

function addAnswer() {
    var libelleQuestion = $('#newQuestion').val();
    $.ajax({
       url : 'index.php?control=question&action=addQuestion',
       type : 'POST',
       data : 'libelle_question=' + libelleQuestion
    });
    location.reload();
}

function missAnswer(idQuestion) {
    $("#question-" + idQuestion).remove();

    $.ajax({
       url : 'index.php?control=question&action=removeQuestion',
       type : 'POST',
       data : 'id_question=' + idQuestion
    });
}

function editAnswer(idQuestion, libelleQuestion) {
     var $input = $('<input>', {
            id: "edit-libelle-" + idQuestion,
            val: libelleQuestion,
            type: 'text'
        });
    $('#question-libelle-' + idQuestion).replaceWith($input);
    $('#valid-libelle-' + idQuestion).show();
}

function validEditAnswer(idQuestion) {
    var libelleQuestion = $("#edit-libelle-" + idQuestion).val();

    $.ajax({
       url : 'index.php?control=question&action=editQuestion',
       type : 'POST',
       data : 'id_question=' + idQuestion + "&libelle_question=" + libelleQuestion
    });
    location.reload();
}
