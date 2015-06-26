<form enctype="multipart/form-data" action="index.php?control=import&action=importerStage" method="POST">
	<p>
	<div class="form-group">
		<label for="Filiere" class="col-sm-3 control-label">Filiere</label>
        <div class="col-sm-9">
                <select class ="form-control" name="Filiere">
                <?php foreach ($listFiliere as $filiere) { ?>
                        <option value=<?php echo utf8_decode($filiere['id_Filiere']) ?>> <?php echo utf8_decode($filiere['nom_filiere']) ?> </option>
                <?php } ?>
        	</select>
        </div>
     <input name="file" type="file" />
 	</p>
	<p>
		<input type="submit" value="Envoyez le fichier" />
	</p>
</form>
