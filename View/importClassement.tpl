<head>
	<link rel="stylesheet" type="text/css"
                       href="View/css/importClassement.css"/>
</head>
<div id="InportClassement">
     <h1>Import du classement des internes</h1>
 <div id="instruction">  
        <div class="notice notice-info">
            <strong>Instruction</strong>
            <p>Sélectionnez la filiere</p>
            Choissisez votre fichier <strong>CSV</strong>
        <p>Cliquez sur "Envoyez" le fichier</p>
        </div>
    </div>
  <br>  
<form class="form-horizontal" enctype="multipart/form-data" action="index.php?control=import&action=importerClassement" method="POST">
    <div class="form-group">
         <label for="exampleInputFile">Fichier à importer</label>
            <input name="file" type="file" />
 	</div>
<button type="submit" class="btn btn-primary btn-lg"><i class="glyphicon glyphicon-download-alt"></i> Envoyer le fichier</button>
</form>
    </div>