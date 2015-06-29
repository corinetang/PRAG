<head>
<script src="View/js/gestionQuestions.js"></script>
</head>

<div id="gestionAnswers">
    <h1>Gestion des evaluations</h1>
    <br>
    <div class="form-group" id="answerBDD">
       <!--- AFFICHAGE DES QUESTIONS PRESENTS SUR LA BASE DE DONNEE -->
      <?php foreach ($questions as $question) { ?>
        <div id= "question-<?php echo $question['id_Question'] ?>" >
          <span id= "question-libelle-<?php echo $question['id_Question'] ?>"><?php echo $question['Libelle_question'] ?></span>
          <button type="button" id="valid-libelle-<?php echo $question['id_Question'] ?>" class="btn btn-default btn-lg valid-edit-button" onClick="validEditAnswer(<?php echo $question['id_Question'] ?>)">
            <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
          </button>
          <button type="button" class="btn btn-default btn-lg" onClick="missAnswer(<?php echo $question['id_Question'] ?>)">
            <span class="glyphicon glyphicon-minus" aria-hidden="true"></span>
          </button>
          <button type="button" class="btn btn-default btn-lg" onClick="editAnswer(<?php echo $question['id_Question']?>, '<?php echo $question['Libelle_question']?>')">
            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
          </button>
        </div>
      <?php } ?>
    </div>

    <h2>Ajout de questions</h2>
    <div class="form-group" id="blockAnswer">
      <div class="col-sm-7" id="question">
        <input type="text" class="form-control" id="newQuestion" placeholder="Votre Question">
        <button type="button" class="btn btn-default btn-lg" onClick="addAnswer()">
          <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
        </button>
      </div>
    </div>
</div>
