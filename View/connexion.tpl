<head>
	<link rel="stylesheet" type="text/css" 
                       href="View/css/connexion.css " /> 
</head>
<div id="wrap"> 
	<div id="connexion-div"  title="Connexion">
	<fieldset>
		<form id="connexion-form" method="post" action="index.php?control=user&action=ajax_connect">
			<div>
				<input type="text" name="identifiant" value="login" class="" placeholder="Identifiant">
				<input type="password" name="pass" value="password" class="" placeholder="Mot de passe">
			</div>
			<input type="submit" value="Connexion" name="Connexion">
			<a href="index.php?control=user&action=inscription">Inscription</a>
			<a href="index.php?control=user&action=recuperation">Mot de passe oubli&eacute ?</a>
			<h5></h5>
		</form>
	</fieldset>
	</div>
</div>
