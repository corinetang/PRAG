<head>
	<link rel="stylesheet" type="text/css"
                       href="View/css/importStage.css" />
</head>
<div id="InportStage">
     <h1>Import de la liste des stages</h1>
    <div id="instruction">
        <div class="notice notice-info">
            <strong>Instruction</strong>
            <p>Sélectionnez la filiere</p>
            Choissisez votre fichier <strong>CSV</strong>
        <p>Cliquez sur "Envoyez" le fichier</p>
        </div>
    </div>
<br>
<form class="form-horizontal" enctype="multipart/form-data" action="index.php?control=import&action=importerStage" method="POST">
	<div class="form-group">
		<label for="Filiere" class="col-sm-3 control-label">Filiere</label>
        <div class="col-sm-9">
                <select class ="form-control" name="Filiere">
                <?php foreach ($listFiliere as $filiere) { ?>
                        <option value=<?php echo utf8_decode($filiere['id_Filiere']) ?>> <?php echo $filiere['nom_filiere'] ?> </option>
                <?php } ?>
        	</select>
        </div>
    </div>
    <div class="form-group">
        <label for="exampleInputFile">Fichier à importer</label>
     <input name="file" type="file" />
 	</div>
    <button type="submit" class="btn btn-primary btn-lg"><i class="glyphicon glyphicon-download-alt"></i> Envoyer le fichier</button>
</form>
</div>
