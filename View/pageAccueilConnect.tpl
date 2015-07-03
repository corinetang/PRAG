<head>
    <script src="View/js/pageAccueilConnect.js"></script>
    <link rel="stylesheet" type="text/css" href="View/css/pageAccueilConnect.css" />
</head>

<div id='pageAccueilConnect'>  
    <h1>Bonjour<STRONG> <?php echo ucfirst ($_SESSION["user"]["prenom_user"]) ?> ! </STRONG></h1><br>
    <div class="list-group" id="AffichageStage">
        <legend>LISTE DE VOS STAGES FAITS AU SEIN DE LA SIPHIF</legend>
          <?php if ($Stages == null) { ?>
		   <div class="panel panel-warning">
		  <div class="panel-heading">
			<h3 class="panel-title">Votre stage</h3>
		</div>
		  <div class="panel-body">
			Vous n'avez pas de stage à votre actif !
		  </div>
		</div>
        <?php } else{
            foreach ($Stages as $stage) { ?>
        <div id="informationStage1">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h3 class="panel-title">Votre stage</h3>
                </div>
                <div class="panel-body">
                  <table width = "100%">
                    <id>
                        <td width="50%">
                            <dl id="DESStage">
                                <dt>DES</dt>
                                <dd><?php echo $stage['libelle_DES'] ?></dd>
                            </dl>
                            <dl id="etablissementStage">
                                <dt>Etablissement</dt>
                                <dd><?php echo $stage['nom_etablissement'] ?></dd>
                            </dl>
                            <dl id="serviceStage">
                                <dt>Service</dt>
                                <dd><?php echo $stage['nom_service'] ?></dd>
                            </dl>
                        </td>
						<td width = "50%">
							<dl id="maitreStageStage">
								<dt>Maitre de Stage</dt>
								<dd><?php  if (is_null($stage['maitre_stage'] )) {
                                        echo ('Non renseigné');
                                    }echo $stage['maitre_stage'] 
                                ?></dd>
							</dl>
							<dl id="dateDebutStage">
								<dt>Date de début du stage</dt>
								<dd><?php if (is_null($stage['dateFin_stage'] )) {
									echo ('Non renseigné');
								}echo $stage['dateDebut_stage'];
							 ?></dd>
							</dl>
							<dl id="dateFinStage">
								<dt>Date de fin du stage</dt>
								<dd><?php if (is_null($stage['dateFin_stage'] )) {
										echo ('Non renseigné');
									}echo $stage['dateFin_stage'];
								 ?></dd>
							</dl>
						</td>
                    </id>
					</table>
                </div>
            </div>
        </div>
    <br>
    <?php } } ?>
    </div>
</div>
</nav>
