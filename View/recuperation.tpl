<head>
    <link rel="stylesheet" type="text/css" href="View/css/recuperation.css " />
</head>
<div> 
    <h1>Mot de passe oublié ?</h1><br>
    <div id="block">
    <p>Sur cette page, vous pourrez récupere votre mot de passe en nous inscrivant votre adresse mail utilisé lors de votre inscription<p>
	<div id="dialog-form"  title="Recuperation">
	<fieldset>
		<form class="form-horizontal" id="f1" method="post" action="index.php?control=user&action=ajax_connect">
                <div class="form-group">
                    <label for="Nom" class="col-sm-3 control-label">Votre adresse mail</label>
                    <div class="col-sm-5">
                        <input type="email" class="form-control" name="email" placeholder="Email">
                    </div>
                </div>
			<div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-primary">Envoyer</button>
    </div>
		</form>
	</fieldset>
	</div>
</div>
        </div>
    </div>
