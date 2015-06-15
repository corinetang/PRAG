
<?php
function connexion () {
	$email = isset($_POST['email'])?$_POST['email']:"";
	$pass = isset($_POST['pass'])?$_POST['pass']:"";
	$presentation = "";

	require ('View/connexion.tpl');
}

function ajax_connect () {
	require ('Model/userModel.php');
	if ($utilisateur = connexion_bd()) {
		$_SESSION['utilisateur']= $utilisateur;	

		echo ($_SESSION['utilisateur']);
		}
	else {echo("KO");}
}
?>