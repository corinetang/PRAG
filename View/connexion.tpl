
<div> 
	<div  id="dialog-form"  title="Connexion">
	<fieldset>
		<form id="f1" method="post" action="index.php?control=user&action=ajax_connect">
			<br>
			<input type="text" name="email" value="<?php echo $email ?>" class="text ui-widget-content ui-corner-all" placeholder="Identifiant">
			<br>
			<input type="password" name="pass" value="<?php echo $pass ?>" class="text ui-widget-content ui-corner-all" placeholder="Mot de passe">
			<br><br>
			<input type="submit" value="Connexion" name="Connexion">
			<a href="index.php?control=userController&action=inscription">Inscription</a>
			<a href="index.php?control=userController&action=recuperation">Mot de passe oubli&eacute ?</a>
			<h5></h5>
		</form>
	</fieldset>
	</div>
</div>
