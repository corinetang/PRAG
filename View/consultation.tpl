<head>
	<script type="text/javascript" charset="utf8" src="View/js/consultation.js"></script>
	<script src="View/js/libs/jquery-ui.js"></script>
    <link rel="stylesheet" href="View/css/consultation.css">
	<link rel="stylesheet" href="View/css/libs/jquery-ui.css">
</head>

<div id="Consultation">
<<<<<<< HEAD
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
	  <h3>Section 1</h3>
		  <div>
				<p>
				Mauris mauris ante, blandit et, ultrices a, suscipit eget, quam. Integer
				ut neque. Vivamus nisi metus, molestie vel, gravida in, condimentum sit
				amet, nunc. Nam a nibh. Donec suscipit eros. Nam mi. Proin viverra leo ut
				odio. Curabitur malesuada. Vestibulum a velit eu ante scelerisque vulputate.
				</p>
		  </div>
    </div>
</div>
=======
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
>>>>>>> 3519951a000d1c48ed717a4add1d956190121073
