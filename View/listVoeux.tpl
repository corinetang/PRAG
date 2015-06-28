<head>
  <link rel="stylesheet" type="text/css" 
                       href="View/css/listVoeux.css " /> 
  <script type="text/javascript" src="View/js/listVoeux.js"></script>
</head>

<div id="listVoeux">
    <h1>Choix des stages</h1>
    <br>
    <h2> Filière : <?php echo $filiere[0]['nom_filiere'] ?> </h2>
    <table class="table table-striped" id="table-choice" class="display" cellspacing="0" width="100%">
        <thead>
          <th>Id</th>
          <th>DES</th>
          <th>Etablissement</th>
          <th>Service</th>
          <th>Nombre de poste</th>
          <th></th>
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
                <button type="button" class="btn btn-default btn-lg btn-choice-move">
                  <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                </button>
              </td>
              <td></td>
            </tr>
          <?php } ?>
        </tbody>
    </table><br>

    <h2> Stage selectionnés </h2>
    <table class="table table-striped" id="table-result">
      <thead>
        <th>Id</th>
        <th>DES</th>
        <th>Etablissement</th>
        <th>Service</th>
        <th>Nombre de poste</th>
        <th></th>
        <th></th>
      </thead>
      <tbody>
      </tbody>
    </table>
</div>