function showEvaluation(idStage) {
    console.log(idStage);
    $.ajax({
       url : 'index.php?control=stage&action=showEval',
       type : 'POST',
       data : 'id_Stage=' + idStage
    });
}