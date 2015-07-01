<head>
    <script src="View/js/formProfil.js"></script>
    <link rel="stylesheet" type="text/css" href="View/css/formProfil.css " />
</head>
<div>
	<div id="formulaire_Profil">
 	<h1>Mon profil</h1>
	<div id="dialog-form"  title="Profil">
		<fieldset>
            <br>
			<form class="form-horizontal" method="post" id="profil" action="index.php?control=user&action=profil" enctype="multipart/form-data" onsubmit="return valideForm(this)">
			<fieldset>
				<legend>MODIFIER SES DONNEES PERSONNELLES</legend><br>
<!--                NOM-->
                <div class="form-group">
                    <label for="Nom" class="col-md-4 control-label">Nom</label>
                    <div class="col-md-4">
                        <input type="text" class="form-control input-md" name="Nom" value=<?php echo $_SESSION["user"]["nom_user"]; ?>>
                    </div>
                </div>
                <div class="alert alert-danger" style="display:none;" id="error-nom">Attention : Votre nom doit comporter au minimun 2 caractères</div>

<!--                PRENOM-->
                <div class="form-group">
                    <label for="Prenom" class="col-md-4 control-label">Pr&eacute;nom</label>
                    <div class="col-md-4">
                        <input type="text" class="form-control input-md" name="Prenom" value=<?php echo $_SESSION["user"]["prenom_user"]; ?>>
                    </div>
                </div>
                <div class="alert alert-danger" style="display:none;" id="error-nom">Attention : Votre prénom doit comporter au minimun 2 caractères</div>

<!--                DATE DE NAISSANCE-->
                <div class="form-group">
                    <label for="Ddn" class="col-md-4 control-label">Date de naissance</label>
                    <div class="col-md-4">
                        <input type="date" class="form-control input-md" name="Ddn" value=<?php echo $_SESSION["user"]["dateDeNaissance_user"]; ?>>
                    </div>
                </div>
                <div class="form-group">
                    <label for="NbSemestre" class="col-md-4 control-label">Nombre de semestre</label>
                    <div class="col-md-4">
                        <input type="text" class="form-control input-md" name="NbSemestre" onblur="verifNbSemestre(this)" placeholder="Nombre de Semestre Valides" value=<?php echo $_SESSION["user"]["NbSemestre_user"]; ?>>
                    </div>
                </div>

<!--                ADRESSE EMAIL-->
                <div class="form-group">
                    <label for="inputEmail3" class="col-md-4 control-label">Email</label>
                    <div class="col-md-4">
                        <input type="email" class="form-control input-md" id="inputEmail3" name="mail" onblur="verifMail(this)" placeholder="Adresse Email" value=<?php echo $_SESSION["user"]["mail_user"]; ?>>
                    </div>
                </div>

<!--                ANCIEN PASSWORD-->
                <div class="form-group">
                    <label for="Password" class="col-md-4 control-label">Ancien Mot de passe</label>
                    <div class="col-md-4">
                        <input type="password" class="form-control input-md" id="oldPassword" name="oldPassword" placeholder="Ancien Mot de passe">
                     </div>
                </div>

<!--                NOUVEAU PASSWORD-->
                 <div class="form-group">
                    <label for="Password" class="col-md-4 control-label">Nouveau Mot de passe</label>
                    <div class="col-md-4">
                        <input type="password" class="form-control input-md" id="Password" name="Password" placeholder="Nouveau Mot de passe">
                     </div>
                </div>
                <div class="alert alert-danger" style="display:none;" id="error-password">Attention : Votre mot de passe et votre confirmation de mot de passe sont différents</div>

<!--                CONFIRMATION DU NOUVEAU MOT DE PASSE-->
                <div class="form-group">
                    <label for="ValidationPassword" class="col-md-4 control-label">Confirmation de votre nouveau Mot de passe</label>
                    <div class="col-md-4">
                        <input type="password" class="form-control input-md" id="ValidationPassword" name="ValidationPassword" placeholder="Confirmez votre mot de passe">
                     </div>
                </div>

<!--                NUMERO DE TELEPHONE-->
                <div class="form-group">
                    <label for="Telephone" class="col-md-4 control-label">T&eacute;l&eacute;phone</label>
                    <div class="col-md-4">
                        <input type="text" class="form-control input-md" name="Telephone" onblur="verifNumTel(this)" value=<?php echo $_SESSION["user"]["numtel_user"]; ?>>
                    </div>
                </div>
 		<div class="alert alert-danger" style="display:none;" id="error-telephone">Attention : Votre numéro de téléphone doit comporter 10 chiffres</div>
 
<!--                FILIERE-->
                <div class="form-group">
				<label for="Filiere" class="col-md-4 control-label">Filière</label>
				<div class="col-md-4">
                    <select class ="form-control input-md" name="Filiere">
					<option>Biologie</option>
					<option>IPR</option>
					<option>Pharmacie</option>
				</select>
                    </div>
                </div>
               <div class="form-group">
				<div class="col-lg-10 col-lg-offset-2">
				<a href="index.php" role="button" class="btn btn-default lg">Cancel</a>
                <button type="submit" class="btn btn-primary lg" value="submit" name="submit-profil" id="submit-profil"> Modifier profil </button>
				</div>
			</div>
		</fieldset>
	</form>
	</div>
</div>
