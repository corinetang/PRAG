<div> 
	<div  id="dialog-form"  title="Inscription">
		<fieldset>
			<form method="post" id="inscription" action= "index.php?control=user&action=inscription" enctype="multipart/form-data">
				<p>login <input name="login" type="text" placeholder="Alphab&eacute;tique"required/></p>
				<p>Adresse email <input name="mail" type="email" placeholder="Adresse email" required/></p>  
				<p>Mot de passe <input name="Mdp" type="password" maxlength="10" required/></p>
				<p>V&eacuterificaton du mot de passe <input name="Verification" type="password" required/></p>
				<br>
				<input type="submit" value="Inscrire" name="Inscrire" />
			</form>
		</fieldset>
	</div>
</div>