
	
<div> 
	<div  id="dialog-form"  title="Connexion">
	<fieldset>
		<form id="f1" method="post" action="index.php?control=user&action=ajax_connect">
			<br>
			<label for="email">Email</label>
			<input type="text" name="email" value="<?php echo $email ?>" class="text ui-widget-content ui-corner-all" placeholder="Tapez votre adresse electronique">
			<br><br>
			<label for="password">Password</label>
			<input type="password" name="pass" value="<?php echo $pass ?>" class="text ui-widget-content ui-corner-all" placeholder="Tapez votre mot de passe">
			<br><br>
			<input type="submit" value="Connexion">
			<input type="submit" value="Inscription">
			<h5></h5>
		</form>
	</fieldset>
	</div>
</div>
