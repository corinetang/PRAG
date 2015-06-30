<head>
  <!-- <link rel="stylesheet" type="text/css" 
                       href="View/css/listStages.css " />  -->
  <script src="View/js/listStages.js"></script>
</head>

<div id="listStages">

    <h1> Stage Actuel </h1>

    <?php $stage = json_decode($stageActuel);?> 


    <table class="table table-striped" id="table-result">
      <thead>
        <th>Id</th>
        <th>DES</th>
        <th>Etablissement</th>
        <th>Service</th>
        <th></th>
        <th></th>
      </thead>
      <tbody>
          
          <tr>
            <td class="stage-id"> <?php echo $stage->{'id_Stage'}?> </td>
            <td class="stage-des"> </td>
            <td class="stage-etablissement">Etablissement</td>
            <td class="stage-service">Service</td>
            <td>
                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#myModal" id="button_edit">
                <span class="glyphicon glyphicon-zoom-in" aria-hidden="true"></span>
              </button>
            </td>
            <td></td>
          </tr>
      </tbody>
    </table>


    <!-- modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Evaluation du Stage</h4>
      </div>
      <div class="modal-body">
        <fieldset>
      <form class="form-horizontal" >

            <?php 
            d($listQuestions);
            d($Evaluation);
            foreach ($listQuestions as $Question) { ?>
              <div class="form-group">
                    <label for="Question" class="col-sm-3 control-label"> <?php echo $Question['Libelle_question'] ?> </label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="<?php getReponseQuestion($Question['id_Question'], $Evaluation['id_Evaluation']) ?>">
                    </div>
              </div>
            <?php } ?>

      </form>
    </fieldset>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal" onClick="">Annuler</button>
        <button type="button" class="btn btn-primary">Enregistrer</button>
        <button type="button" class="btn btn-primary">Enregistrer et Valider</button>
      </div>
    </div>
  </div>
</div>

    <h1>Liste des Stages Effectués</h1>
    
    <table class="table table-striped" id="table-choice">
        <thead>
          <th>Id</th>
          <th>DES</th>
          <th>Etablissement</th>
          <th>Service</th>
          <th></th>
        </thead>
        <tbody>
            <tr>
              <td class="stage-id">id_stage</td>
              <td class="stage-des">DES</td>
              <td class="stage-etablissement">Etablissement</td>
              <td class="stage-service">Service</td>
              <td>
                <button type="button" class="btn btn-default btn-lg btn-choice-move">
                  <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                </button>
              </td>
              <td></td>
            </tr>
        </tbody>
    </table><br>

    
</div>