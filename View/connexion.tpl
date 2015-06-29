<head>
	<link rel="stylesheet" type="text/css" 
                       href="View/css/connexion.css " /> 
    <script src="View/js/connexion.js"></script>
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
  <div class="col-md-4"><a href="index.php?control=user&action=showInscription" >Inscription</a></div>
  <div class="col-md-1"></div>
  <div class="col-md-7"><a href="#myModal" data-toggle="modal" data-target="#myModal" class="Modal">Mot de passe oubli&eacute ?</a></div>
</div>
		</form>
	</fieldset>
	</div>
    
    <!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Récupérer votre mot de passe</h4>
      </div>
        <fieldset>
		<form class="form-horizontal" id="f1" method="post" action="index.php?control=user&action=envoiMail">
      <div class="modal-body">
       	
                <div class="form-group">
                    <label for="Nom" class="col-sm-4 control-label">Votre adresse mail</label>
                    <div class="col-sm-5">
                        <input type="email" class="form-control" name="email" placeholder="Email">
                    </div>
                </div>
        </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
         <button type="submit" class="btn btn-primary">Envoyer</button>
      </div>
            		</form>
	</fieldset>
    </div>
  </div>
</div>
</div>
