<head>
  <link rel="stylesheet" type="text/css"
                       href="View/css/listVoeux.css " />
    <script type="text/javascript" src="View/js/listVoeux.js"></script>
        <script link rel="stylesheet" type="text/css" href="View/css/libs/jquery.dataTables.css"></script>
    <script type="text/javascript" charset="utf8" src="View/js/libs/jquery.dataTables.js"></script>
</head>

<div id="listVoeux">
    <h1>Choix des stages</h1><span id="userId" style="display:none;"><?php echo $_SESSION['user']['id_user'] ?></span>
    <br>
    <h2> Filière : <?php echo $filiere[0]['nom_filiere'] ?> </h2>
    <table class="display" id="table_choice">
        <thead>
            <tr>
          <th>Id</th>
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
              <td><?php echo $stage['id_Stage'] ?></td>
              <td>DES</td>
              <td>Etablissement</td>
              <td>Service</td>
              <td><?php echo $stage['NbPoste_stage'] ?></td>
              <td>
                <button type="button" class="btn btn-default btn-lg btn-choice-move" onclick="choiceMove(<?php echo $stage['id_Stage'] ?>, <?php echo $_SESSION['user']['id_user'] ?>)">
                  <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                </button>
              </td>
              <td></td>
            </tr>
          <?php } ?>
        </tbody>
    </table>
 <br>

    <h2> Stage selectionnés </h2>
    <table class="table table-striped" id="table-result">
      <thead>
        <th>Rang</th>
        <th>Id</th>
        <th>DES</th>
        <th>Etablissement</th>
        <th>Service</th>
        <th>Nombre de poste</th>
        <th></th>
        <th></th>
      </thead>
      <tbody id="sortable">
        <?php foreach ($choosenStages as $choosenStage) { ?>
          <tr id="<?php echo $choosenStage['id_Stage'] ?>">
            <td class="stage-rank"><?php echo $choosenStage['rang_choix'] ?></td>
            <td class="stage-id"><?php echo $choosenStage['id_Stage'] ?></td>
            <td class="stage-des">DES</td>
            <td class="stage-etablissement">Etablissement</td>
            <td class="stage-service">Service</td>
            <td class="stage-nb-poste"><?php echo $choosenStage['NbPoste_stage'] ?></td>
            <td>
              <button type="button" class="btn btn-default btn-lg btn-choice-move" onclick="choiceMove(<?php echo $choosenStage['id_Stage'] ?>, <?php echo $_SESSION['user']['id_user'] ?>)">
                <span class="glyphicon glyphicon-minus" aria-hidden="true"></span>
              </button>
            </td>
            <td><a ref=#><button type="button" class="btn btn-info"> Resultat</button></td>
          </tr>
        <?php } ?>
      </tbody>
    </table>
</div>
    <script>
        $(document).ready(function () {
    $('#table_choice').DataTable();
} );
    </script>
