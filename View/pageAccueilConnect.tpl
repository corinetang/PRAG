<head>
    <script src="View/js/pageAccueilConnect.js"></script>
    <link rel="stylesheet" type="text/css" href="View/css/pageAccueilConnect.css" />
</head>
<div id='pageAccueilConnect'>  
    <h1>Bonjour<STRONG> <?php echo $_SESSION["user"]["prenom_user"] ?> ! </STRONG></h1><br>
    <div class="list-group" id="AffichageStage">
        <legend>Ici, la liste de vos stages fait au sein du SIPHIF</legend>
           <?php if ($Stages == null) { ?>
       <div class="alert alert-info" role="alert"><h3>Désolé ! </h3>Vous n'avez pas de stage à votre actif !</div>
       <?php  }
        else{
            foreach ($Stages as $stage) { ?>
<!--      <h3><span class="list-group-item disabled" id="AffichageStage1">Sur votre stage</span></h3>-->
        <div id="informationStage1">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h3 class="panel-title">Votre stage</h3>
                </div>
                <div class="panel-body">
                    <id>
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
                    </id>
                </div>
            </div>
        </div>
    <br>
    <?php } } ?>
    </div>
</div>
</nav>