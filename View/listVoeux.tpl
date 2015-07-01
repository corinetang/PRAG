<head>
    <script src="View/js/listVoeux.js" id="myscript"></script>
    <script link rel="stylesheet" type="text/css" href="View/css/libs/jquery.dataTables.css"></script>
	<script link rel="stylesheet" type="text/css" href="View/css/libs/dataTables.bootstrap.css"></script>
    <script type="text/javascript" charset="utf8" src="View/js/libs/jquery.dataTables.js"></script>
	<script type="text/javascript" charset="utf8" src="View/js/libs/dataTables.bootstrap.js"></script>
</head>

<div id="listVoeux">
    <h1>Choix des stages</h1><span id="userId" style="display:none;"><?php echo $_SESSION['user']['id_user'] ?></span>
    <br>
    <h2> Filière : <?php echo $filiere[0]['nom_filiere'] ?> </h2>
    <table class="table table-striped table-bordered" cellspacing="0"  id="table_choice_user">
        <thead>
			<tr>
				<th>ID</th>
				  <th>DES</th>
				  <th>Etablissement</th>
				  <th>Service</th>
				  <th>Nombre de poste</th>
				  <th></th>
			</tr>
        </thead>
        <tbody>
          <?php foreach ($stages as $stage) { ?>
            <tr id="stage-<?php echo $stage['id_Stage'] ?>" >
              <td class="stage-id"><?php echo $stage['id_Stage'] ?></td>
              <td class="stage-des"><?php echo $stage['libelle_DES'] ?></td>
              <td class="stage-etablissement"><?php echo $stage['nom_etablissement'] ?></td>
              <td class="stage-service"><?php echo $stage['nom_service'] ?></td>
              <td class="stage-nb-poste"><?php echo $stage['NbPoste_stage'] ?></td>
              <td>
                <?php if ($is_after_acceptable == false) { ?>
                  <button type="button" class="btn btn-success btn-lg btn-choice-move" onclick="choiceMove(<?php echo $stage['id_Stage'] ?>, <?php echo $_SESSION['user']['id_user'] ?>)">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                  </button>
                <?php } ?>
              </td>
            </tr>
          <?php }; ?>
        </tbody>
    </table><br>

    <?php if (isset($_SESSION['prechoix'])) { ?>
      <div style="margin-left:auto;margin-right:auto;">
        <?php if ($_SESSION['prechoix'] == 1) { ?>
          Préchoix Accepté
        <?php } else { ?>
          Préchoix refusé
        <?php } ?>
      </div>
    <?php } ?>

    <h2> Stage selectionnés </h2>
    <table class="table table-striped" id="table-result">
      <thead>
	  <tr>
        <th>Rang</th>
        <th>Id</th>
        <th>DES</th>
        <th>Etablissement</th>
        <th>Service</th>
        <th>Nombre de poste</th>
        <?php if ($is_after_acceptable == true) { ?>
          <th>Accepté</th>
        <?php }else { ?>
          <th></th>
          <th></th>
        <?php } ?>
		</tr>
      </thead>
      <tbody id="sortable">
        <?php foreach ($choosenStages as $choosenStage) { ?>
          <tr id="<?php echo $choosenStage['id_Stage'] ?>">
            <td class="stage-rank"><?php echo $choosenStage['rang_choix'] ?></td>
            <td class="stage-id"><?php echo $choosenStage['id_Stage'] ?></td>
            <td class="stage-des"><?php echo $choosenStage['libelle_DES'] ?></td>
            <td class="stage-etablissement"><?php echo $choosenStage['nom_etablissement'] ?></td>
            <td class="stage-service"><?php echo $choosenStage['nom_service'] ?></td>
            <td class="stage-nb-poste"><?php echo $choosenStage['NbPoste_stage'] ?></td>
            <?php if ($is_after_acceptable == true) { ?>
            <td>
              <?php if ($choosenStage['estAccepte_choix'] == '1') { ?>
                accepté
              <?php } else { ?>
                refusé
              <?php } ?>
            </td>
            <?php }else { ?>
            <td>
              <button type="button" class="btn btn-default btn-lg btn-choice-move" onclick="resultMove(<?php echo $choosenStage['id_Stage'] ?>, <?php echo $_SESSION['user']['id_user'] ?>)">
                <span class="glyphicon glyphicon-minus" aria-hidden="true"></span>
              </button>
            </td>
            <td>
              <form method="post" action="index.php?control=stage&action=showVoeux">
                <input type="hidden" class="btn btn-info" name="stage_id" value="<?php echo $choosenStage['id_Stage'] ?>"> 
                <input type="hidden" class="btn btn-info" name="user_id" value="<?php echo $_SESSION['user']['id_user'] ?>"> 
                <input type="submit" class="btn btn-info" value="Préchoix"/>
              </form>
            </td>
            <?php } ?>
          </tr>
        <?php } ?>
         </tbody>
    </table>
</div>
	<script>
        $(document).ready(function() {
            $('#table_choice_user').dataTable({ 
				 "columns": [
					null,
					null,
					{ "orderDataType": "dom-text" },
					{ "orderDataType": "dom-text", "type": "numeric" },
					{ "orderDataType": "dom-select" },
					{ "orderDataType": "dom-checkbox" }
				  ]
			});
		});	
    </script>