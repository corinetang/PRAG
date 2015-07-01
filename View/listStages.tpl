<head>
  <link rel="stylesheet" type="text/css"
                       href="View/css/listStages.css " />
</head>

<div id="listStages">

    <h1> Stage Actuel </h1>

    <?php $stage = json_decode($stageActuel);?>


    <table class="table table-striped" id="table-result">
      <thead>
        <th>DES</th>
        <th>Etablissement</th>
        <th>Service</th>
        <th></th>
        <th></th>
      </thead>
      <tbody>
          <tr>
            <td class="stage-des"><?php echo $stage->{'libelle_DES'} ?></td>
            <td class="stage-etablissement"><?php echo $stage->{'nom_etablissement'} ?></td>
            <td class="stage-service"><?php echo $stage->{'nom_service'} ?></td>
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
      <form class="form-horizontal" method="POST" action="index.php?control=question&action=repondre">

            <?php
            foreach ($listQuestions as $Question) { ?>
              <div class="form-group">
                    <?php $Reponse = getReponseQuestion($Question['id_Question'], $Evaluation[0]['id_Evaluation']);
                    ?>
                    <label for="Question" class="col-sm-3 control-label"> <?php echo $Question['Libelle_question']; ?> </label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="reponse-<?php echo $Reponse[0]['id_reponse']; ?>" value=<?php echo $Reponse[0]['commentaire_reponse']; ?>>
                    </div>
              </div>
            <?php } ?>

            <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal" >Annuler</button>
        <button type="submit" class="btn btn-primary">Enregistrer</button>
      </div>
      </form>
    </fieldset>
      </div>

    </div>
  </div>
</div>
</div>
