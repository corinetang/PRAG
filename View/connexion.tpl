<head>
	<link rel="stylesheet" type="text/css" 
                       href="View/css/connexion.css " /> 
</head>
<div id="wrap"> 
    <div class="row">
    <img src="view/css/images/logo.jpg" alt="Logo du SIPHIF" class="img-rounded">
    </div>
	<div id="connexion-div"  title="Connexion">
	<fieldset>
		<form class="form-signin" method="post" action="index.php?control=user&action=connexion">
			<div>
				<input type="text" name="identifiant" class="form-control" placeholder="Identifiant" required autofocus>
                <br>
                <label for="inputPassword" class="sr-only">Mot de passe</label>
				<input type="password" id="inputPassword" name="pass" class="form-control" placeholder="Mot de passe" required>
			</div>
            <br>
            <button class="btn btn-lg btn-primary btn-block" type="submit" value="Connexion" name="Connexion">Connexion</button>
<div class="row">
  <div class="col-md-4"><a href="index.php?control=user&action=showInscription">Inscription</a></div>
  <div class="col-md-1"></div>
  <div class="col-md-7"><a href="index.php?control=user&action=recuperation">Mot de passe oubli&eacute ?</a></div>
</div>
		</form>
	</fieldset>
	</div>
</div>
