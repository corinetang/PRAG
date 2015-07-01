<head>
	<script type="text/javascript" charset="utf8" src="View/js/consultation.js"></script>
	<script src="View/js/libs/jquery-ui.js"></script>
    <link rel="stylesheet" href="View/css/consultation.css">
	<link rel="stylesheet" href="View/css/libs/jquery-ui.css">
</head>
<div id="Consultation">
    <h1>Consultation</h1><br>

 <table class="table table-striped table-hover" cellspacing="0" id="table_consultation">
          <thead>
              <tr>
                  <th>DES</th>
                  <th>Etablissement</th>
                  <th>Service</th>
                  <th>Nombre de poste</th>
                  <th></th>
              </tr>
          </thead>
          <tbody>
            <?php foreach ($stages as $stage) { ?>
              <tr>
                <td><?php echo $stage['libelle_DES'] ?></td>
                <td><?php echo $stage['nom_etablissement'] ?></td>
                <td><?php echo $stage['nom_service'] ?></td>
                <td><?php echo $stage['NbPoste_stage'] ?></td>
                <td>
                  <button type="button" class="btn btn-default btn-lg btn-choice-move" data-toggle="modal" data-target="#modal-stage" onClick='initModalConsulation(<?php echo json_encode($stage['evaluation']); ?>)'>
                    <span class="glyphicon glyphicon-zoom-in" aria-hidden="true"></span>
                  </button>
                </td>
              </tr>
            <?php } ?>
          </tbody>
      </table>

<div class="modal fade" id="modal-stage" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Evaluation du stage</h4>
      </div>
      <div class="modal-body">
        <fieldset>
        <div id="evaluations-stage"></div>
        </fieldset>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
        <button type="button" id="membre-edit" class="btn btn-primary">Sauvegarder</button>
      </div>
    </div>
  </div>
</div>
</div>
    <script>
        $(document).ready(function() {
            $('#table_consultation').DataTable();
        });
    </script>
