<head>
    <script src="View/js/formProfil.js"></script>
    <link rel="stylesheet" type="text/css" href="View/css/formProfil.css " />
</head>
<div> 
	<div id="dialog-form"  title="Profil">
		<fieldset>
            <h1>Modification des données</h1>
            <br>
			<form class="form-horizontal" method="post" id="profil" action="index.php?control=user&action=profil" enctype="multipart/form-data">
<!--                NOM-->
                <div class="form-group">
                    <label for="Nom" class="col-sm-5 control-label">Nom</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control input-md" name="Nom" value=<?php echo $_SESSION["user"]["nom_user"]; ?>>
                    </div>
                </div>
                
<!--                PRENOM-->
                <div class="form-group">
                    <label for="Prenom" class="col-sm-5 control-label">Pr&eacute;nom</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control input-md" name="Prenom" value=<?php echo $_SESSION["user"]["prenom_user"]; ?>>
                    </div>
                </div>
                
<!--                DATE DE NAISSANCE-->
                <div class="form-group">
                    <label for="Ddn" class="col-sm-5 control-label">Date de naissance</label>
                    <div class="col-sm-7">
                        <input type="date" class="form-control input-md" name="Ddn" value=<?php echo $_SESSION["user"]["dateDeNaissance_user"]; ?>>
                    </div>
                </div>
                
<!--                NOMBRE SEMESTRE-->
                <div class="form-group">
                    <label for="NbSemestre" class="col-sm-5 control-label">Nombre de semestre</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control input-md" name="NbSemestre" placeholder="Nombre de Semestre Valides" value=<?php echo $_SESSION["user"]["NbSemestre_user"]; ?>>
                    </div>
                </div>
                
<!--                ADRESSE EMAIL-->
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-5 control-label">Email</label>
                    <div class="col-sm-7">
                        <input type="email" class="form-control input-md" id="inputEmail3" name="Email" placeholder="Adresse Email" value=<?php echo $_SESSION["user"]["mail_user"]; ?>>
                    </div>
                </div>
                
<!--                ANCIEN PASSWORD-->
                <div class="form-group">
                    <label for="Password" class="col-sm-5 control-label">Ancien Mot de passe</label>
                    <div class="col-sm-7">
                        <input type="password" class="form-control input-md" id="oldPassword" name="oldPassword" placeholder="Ancien Mot de passe">
                     </div>
                </div>
                
<!--                NOUVEAU PASSWORD-->
                 <div class="form-group">
                    <label for="Password" class="col-sm-5 control-label">Nouveau Mot de passe</label>
                    <div class="col-sm-7">
                        <input type="password" class="form-control input-md" id="Password" name="Password" placeholder="Nouveau Mot de passe">
                     </div>
                </div>
                <div class="alert alert-danger" style="display:none;" id="error-password">Attention : Votre mot de passe et votre confirmation de mot de passe sont différents</div>
                
<!--                CONFIRMATION DU NOUVEAU MOT DE PASSE-->
                <div class="form-group">
                    <label for="ValidationPassword" class="col-sm-5 control-label">Confirmation de votre nouveau Mot de passe</label>
                    <div class="col-sm-7">
                        <input type="password" class="form-control input-md" id="ValidationPassword" name="ValidationPassword" placeholder="Confirmez votre mot de passe">
                     </div>
                </div>
                
<!--                NUMERO DE TELEPHONE-->
                <div class="form-group">
                    <label for="Telephone" class="col-sm-5 control-label">T&eacute;l&eacute;phone</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control input-md" name="Telephone" value=<?php echo $_SESSION["user"]["numtel_user"]; ?>>
                    </div>
                </div>
                
<!--                FILIERE-->
                <div class="form-group">
				<label for="Filiere" class="col-sm-5 control-label">Filiere</label>
				<div class="col-sm-7">
                    <select class ="form-control input-md" name="Filiere">
					<option>Biologie</option>
					<option>IPR</option>
					<option>Pharmacie</option>
				</select>
                    </div>
                </div>
                <br>
                <button type="submit" class="btn btn-primary lg" value="submit" name="submit-profil" id="submit-profil"> Modifier profil </button>
			</form>
		</fieldset>
	</div>
</div>