<head>
	<link rel="stylesheet" type="text/css" 
                       href="View/css/connexion.css " /> 
</head>
<div id="wrap"> 
	<div id="connexion-div"  title="Connexion">
	<fieldset>
		<form class="form-signin" method="post" action="index.php?control=user&action=ajax_connect">
			<div>
				<input type="text" name="identifiant" value="Identifiant" class="form-control" placeholder="Identifiant" required autofocus>
                <br>
                <label for="inputPassword" class="sr-only">Mot de passe</label>
				<input type="password" id="inputPassword" name="pass" value="password" class="form-control" placeholder="Mot de passe" required>
			</div>
            <br>
            <button class="btn btn-lg btn-primary btn-block" type="submit" value="Connexion" name="Connexion">Connexion</button>
            <div class="row">
  <div class="col-md-4"><a href="index.php?control=import&action=inscription">Inscription</a></div>
  <div class="col-md-1"></div>
  <div class="col-md-7"><a href="index.php?control=import&action=recuperation">Mot de passe oubli&eacute ?</a></div>
</div>
		</form>
	</fieldset>
	</div>
</div>
