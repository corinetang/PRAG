<div> 
	<div id="dialog-form"  title="Inscription">
		<fieldset>
			<form class="form-horizontal" method="post" id="inscription" action= "index.php?control=user&action=ajax_inscription" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="Nom" class="col-sm-2 control-label">Nom</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="Nom">
                    </div>
                </div>
                <div class="form-group">
                    <label for="Prenom" class="col-sm-2 control-label">Pr&eacute;nom</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="Prenom">
                    </div>
                </div>
                <div class="form-group">
                    <label for="NbSemestre" class="col-sm-2 control-label">Nombre de semestre</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="NbSemestre" placeholder="Nombre de Semestre Valides">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
                    <div class="col-sm-5">
                        <input type="email" class="form-control" id="inputEmail3" name="Email" placeholder="Adresse Email">
                    </div>
                </div>
                 <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label">Mot de passe</label>
                    <div class="col-sm-5">
                        <input type="password" class="form-control" id="inputPassword3" name="Password" placeholder="Password">
                     </div>
                </div>
                <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label">Confirmation de votre Mot de passe</label>
                    <div class="col-sm-5">
                        <input type="password" class="form-control" id="inputPassword3" name="ValidationPassword" placeholder="Confirmez votre mot de passe">
                     </div>
                </div>
                <div class="form-group">
                    <label for="Telephone" class="col-sm-2 control-label">T&eacute;l&eacute;phone</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="Telephone">
                    </div>
                </div>
                <div class="form-group">
				<label for="Filiere" class="col-sm-2 control-label">Filiere</label>
				<div class="col-sm-5">
                    <select class ="form-control col-sm-5" name="Filiere">
					<option>Biologie</option>
					<option>IPR</option>
					<option>Pharmacie</option>
				</select>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary" value="Inscription" name="Inscription"> Inscription </button>
			</form>
		</fieldset>
	</div>
</div>