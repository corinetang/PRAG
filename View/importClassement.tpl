<div id="InportClassement">
<h1>Import du classement des internes</h1>
<form enctype="multipart/form-data" action="index.php?control=import&action=importerClassement" method="POST">
	 <div class="form-group">
	 	<select class ="form-control" name="Filiere">
                <?php foreach ($listFiliere as $filiere) { ?>
                        <option value=<?php echo utf8_decode($filiere['id_Filiere']) ?>> <?php echo utf8_decode($filiere['nom_filiere']) ?> </option>
                <?php } ?>
        	</select>
         <label for="exampleInputFile">Fichier à importer</label>
            <input name="file" type="file" />
         <p class="help-block">Example block-level help text here.</p>
 	</div>
	 <button type="submit" class="btn btn-primary">Envoyer le fichier</button>
</form>
    </div>
