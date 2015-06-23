<div> 
	<div  id="dialog-form"  title="Inscription">
		<fieldset>
			<form method="post" id="inscription" action= "index.php?control=user&action=ajax_inscription" enctype="multipart/form-data">
				<label for="Nom">Nom</label>
				<input type="text" name="Nom" value=""><br>
				<label for="Prenom">Prenom</label>
				<input type="text" name="Prenom" value=""><br>
				<label for="NbSemestre">Nb Semestre</label>
				<input type="text" name="NbSemestre" value=""><br>
				<label for ="mail">Email</label> 
				<input type="mail" name="Mail" value="Adresse mail"><br>
				<label for="Password">Mot de passe</label>
				<input type="password" name="Password" placeholder="Tapez votre mot de passe"><br>
				<label for="ValidationPassword">Confirmation Mot de passe</label>
				<input type="password" name="ValidationPassword" placeholder="confirmez votre mot de passe"><br>
				<label for="Telephone">Telephone</label>
				<input type="text" name="Telephone"><br>
				<label for="Filiere">Filiere</label>
				<select name="Filiere">
					<option>Biologie</option>
					<option>IPR</option>
					<option>Pharmacie</option>
				</select><br>
				<input type="submit" value="Inscription" name="Inscription" />
			</form>
		</fieldset>
	</div>
</div>