<head>
	<script type="text/javascript" charset="utf8" src="View/js/consultation.js"></script>
	<script src="View/js/libs/jquery-ui.js"></script>
    <link rel="stylesheet" href="View/css/consultation.css">
	<link rel="stylesheet" href="View/css/libs/jquery-ui.css">
</head>

<div id="Consultation">
    <h1>Consultation</h1><br>
	<div id="Filter" class="form-inline">
		<select class="form-control input-sm" id="Filiere">

		</select>
		<select class="form-control input-sm" id="Hopital">

		</select>
		<select class="form-control input-sm" id="Poste">

		</select>
	</div>
    <br>
	<div id="accordion">
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
</div>
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
                <button type="button" class="btn btn-default btn-lg btn-choice-move" onClick="initModalConsulation">
                  <span class="glyphicon glyphicon-zoom-in" aria-hidden="true"></span>
                </button>
              </td>
              <td></td>
            </tr>
          <?php } ?>
        </tbody>
    </table>
 <br>
