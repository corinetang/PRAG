<head>
    <script src="View/js/inscription.js"></script>
    <link rel="stylesheet" type="text/css" href="View/css/inscription.css " />
</head>

<!-- TODO : Faire les contrôles sur TOUT LES CHAMPS par rapport au format et au fait que le champ ne doit pas être VIDE !!!!! -->
<div id="inscription">
     <h1>Inscrivez-vous dès maintenant !</h1>
    <br>
	<div id="dialog-form"  title="Inscription">
			<form class="form-horizontal" method="post" id="inscription" action="index.php?control=user&action=inscription" enctype="multipart/form-data" onsubmit="return valideForm(this)">
                	<fieldset>
                <div class="form-group">
                    <label for="Nom" class="col-md-4 control-label">Nom</label>
                    <div class="col-md-4">
                        <input type="text" class="form-control input-md" name="Nom" onblur="verifName(this)">
                    </div>
                </div>

                 <!--- PRENOM -->
                <div class="form-group">
                    <label for="Prenom" class="col-md-4 control-label">Pr&eacute;nom</label>
                    <div class="col-md-4">
                        <input type="text" class="form-control input-md" name="Prenom" onblur="verifName(this)">
                    </div>
                </div>

                 <!--- DATE DE NAISSANCE -->
                <div class="form-group">
                    <label for="Ddn" class="col-md-4 control-label">Date de naissance</label>
                    <div class="col-md-4">
                        <input type="date" class="form-control input-md" name="Ddn">
                    </div>
                </div>

                 <!--- NOMBRE DE SEMESTRE -->
                <div class="form-group">
                    <label for="NbSemestre" class="col-md-4 control-label">Nombre de semestre</label>
                    <div class="col-md-4">
                        <input type="text" class="form-control input-md" name="NbSemestre" placeholder="Nombre de Semestre Valides" onblur="verifNbSemestre(this)">
                    </div>
                </div>

                 <!--- E-MAIL -->
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-4 control-label">Email</label>
                    <div class="col-md-4">
                        <input type="email" class="form-control input-md" id="inputEmail3" name="mail" placeholder="Adresse Email" onblur="verifMail(this)">
                    </div>
                </div>

                 <!--- MOT DE PASSE -->
                 <div class="form-group">
                    <label for="Password" class="col-md-4 control-label">Mot de passe</label>
                    <div class="col-md-4">
                        <input type="password" class="form-control input-md" id="Password" name="Password" placeholder="Password">
                     </div>
                </div>
                <div class="alert alert-danger" style="display:none;" id="error-password">Attention : Votre mot de passe et votre confirmation de mot de passe sont différents</div>

                 <!--- MOT DE PASSE -->
                <div class="form-group">
                    <label for="ValidationPassword" class="col-md-4 control-label">Confirmation de votre Mot de passe</label>
                    <div class="col-md-4">
                        <input type="password" class="form-control input-md" id="ValidationPassword" name="ValidationPassword" placeholder="Confirmez votre mot de passe">
                     </div>
                </div>

                 <!--- TELEPHONE -->
                <div class="form-group">
                    <label for="Telephone" class="col-md-4 control-label">T&eacute;l&eacute;phone</label>
                    <div class="col-md-4">
                        <input type="text" class="form-control input-md" name="Telephone" onblur="verifNumTel(this)">
                    </div>
                </div>

                 <!--- FILIERE -->
                <div class="form-group">
				<label for="Filiere" class="col-md-4 control-label">Filiere</label>
                    <div class="col-md-4">
                         <select class ="form-control " name="Filiere">
                            <?php foreach ($listFiliere as $filiere) { ?>
                                <option value=<?php echo utf8_decode($filiere['id_Filiere']) ?>> <?php echo $filiere['nom_filiere'] ?> </option>
                            <?php } ?>
        				</select>
                    </div>
                </div>

             <!--- BUTTON -->
                <button type="submit" class="btn btn-primary" value="submit" name="submit-inscription" id="submit-inscription"> Inscription </button>
			</form>
		</fieldset>
	</div>
</div>
