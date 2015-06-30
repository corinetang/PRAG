<head>

</head>

<div id="Consultation">
    <h1>Consultation</h1>

    <h2> Filière : <?php echo $filiere[0]['nom_filiere'] ?> </h2>
    <table class="display" id="table_choice">
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
                <button type="button" class="btn btn-default btn-lg btn-choice-move">
                  <span class="glyphicon glyphicon-zoom-in" aria-hidden="true"></span>
                </button>
              </td>
              <td></td>
            </tr>
          <?php } ?>
        </tbody>
    </table>
 <br>
