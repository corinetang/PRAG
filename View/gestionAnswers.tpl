<head>
<script type="text/javascript">
    function addAnswer() {
        var block = document.getElementById("blockAnswer").cloneNode(true);
        document.getElementById("answerBDD").appendChild(block);
    }
    
    function missAnswer() {
        $(this).parents("blockAnswer").remove();
    }
    
    function editAnswer() {
        // ENREGISTRE L'ELEMENT DANS LA BASE DE DONNEE
    }
</script>
</head>

<div id="gestionAnswers">
    <h1>Gestion des evaluations</h1>
    <br>
    <form class="form-horizontal" id="Form_Answer">
       <div class="form-group" id="answerBDD"> 
           <!--- AFFICHAGE DES QUESTIONS PRESENTS SUR LA BASE DE DONNEE--->
           </div>
  <div class="form-group" id="blockAnswer">
    <label for="exampleInputEmail1" class="col-sm-3 control-label">Question n°</label>
      <div class="col-sm-7">
          <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Votre Question"></div>
      
      <button type="button" class="btn btn-default btn-lg" onClick="addAnswer()">
  <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
</button>
      <button type="button" class="btn btn-default btn-lg" onClick="missAnswer()">
  <span class="glyphicon glyphicon-minus" aria-hidden="true"></span>
</button>
      <button type="button" class="btn btn-default btn-lg" onClick="editAnswer()">
  <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
</button>
  </div>
    <button type="submit" class="btn btn-primary">Enregistrer</button>
</form>
</div>