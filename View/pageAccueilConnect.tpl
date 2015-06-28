<head>
    <script src="View/js/pageAccueilConnect.js"></script>
    <link rel="stylesheet" type="text/css" href="View/css/pageAccueilConnect.css" />
</head>
<div id='pageAccueilConnect'>
    <h1>Bonjour <?php echo $_SESSION["user"]["prenom_user"] ?> ! </h1><br>
    <div class="list-group" id="AffichageStage">
           <?php if ($Stages == null) { ?>
        <div class="alert alert-info" role="alert">Vous n'avez pas de stages à votre actif !</div>
       <?php  }
        else{
        foreach ($Stages as $stage) { ?>
      <h3><span class="list-group-item disabled" id="AffichageStage1">Information sur votre dernier stage</span></h3>
        <div id="informationStage1">
            <dl id="DESStage">
                <dt>DES</dt>
                <dd>bla bla bla</dd>
            </dl>
            <dl id="etablissementStage">
                <dt>Etablissement</dt>
                <dd>bla bla bla</dd>
            </dl>
            <dl id="serviceStage">
                <dt>Service</dt>
                <dd><?php echo $stage['nom_service'] ?></dd>
            </dl>
                </id>
        </div>
    <br>
    <?php } } ?>
    </div>
</div>
