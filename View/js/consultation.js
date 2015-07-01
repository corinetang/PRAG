
 // $(function() {
 //    $( "#accordion" ).accordion({
 //      event: "click hoverintent"
 //    });
 //  });

 jQuery(document).ready(function (){
    $('#myModal').on('shown.bs.modal', function () {
      $('#myInput').focus();
    });
} );

function initModalConsulation(evaluations) {
  var lastId = evaluations[0][0]['id_evaluation'];
  var nbEval = 1;
  $('#evaluations-stage').append("<span><strong> EVALUATION N°" + nbEval + "</strong></span><br>");
  for (var i = 0; i < evaluations[0].length; i++) {
    if (lastId != evaluations[0][i]['id_evaluation']) {
      nbEval += 1;
      lastId = evaluations[0][i]['id_evaluation'];
      $('#evaluations-stage').append("<br>");
      $('#evaluations-stage').append("<span><strong> EVALUATION N°" + nbEval + "</strong></span><br>");
    }
    $('#evaluations-stage').append("<table><tr><strong>" + evaluations[0][i]['libelle_question']
      + "</strong></tr><br><tr>" + evaluations[0][i]['commentaire_reponse'] + "</tr><br></table>" );

  }

}
