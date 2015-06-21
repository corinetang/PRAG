<html>
<head>
	<link rel="stylesheet" type="text/css" 
                       href="View/css/connexion.css " /> 
	<link rel="stylesheet" href="http://cdn.leafletjs.com/leaflet-0.7.2/leaflet.css" />
	<!-- <style>  #f1 {display:none;border:1px green solid;width:4em; height:7em;}   </style>-->
	<script type="text/javascript" src="V/js/jquery.js"></script> 
	<script src="//code.jquery.com/jquery-1.9.1.js"></script>
	<script src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
	<script type="text/javascript" src="V/js/page.js"></script>
	<script src="http://cdn.leafletjs.com/leaflet-0.7.1/leaflet.js"></script>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
</head>
<body >
	
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
			<input type="submit" value="Valider">
			<h5></h5>
		</form>
	</fieldset>
	</div>
</div>


</body>
</html>
