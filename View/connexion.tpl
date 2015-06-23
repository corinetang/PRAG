
<div> 
	<div  id="dialog-form"  title="Connexion">
	<fieldset>
		<form id="f1" method="post" action="index.php?control=user&action=ajax_connect">
			<div class="col-sm-12">
				<input type="text" name="email" value="<?php echo $email ?>" class="col-sm-6" placeholder="Identifiant">
				<input type="password" name="pass" value="<?php echo $pass ?>" class="col-sm-6" placeholder="Mot de passe">
			</div>
			<input type="submit" value="Connexion" name="Connexion">
			<a href="index.php?control=user&action=inscription">Inscription</a>
			<a href="index.php?control=user&action=recuperation">Mot de passe oubli&eacute ?</a>
			<h5></h5>
		</form>
	</fieldset>
	</div>
</div>
