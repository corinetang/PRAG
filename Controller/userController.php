
<?php


function connexion () {
	$presentation = "";
	$email = isset($_POST['identifiant'])?$_POST['identifiant']:"";
	$pass = isset($_POST['pass'])?$_POST['pass']:"";

	require ('View/connexion.tpl');
}

function inscription() {
	
	require ('View/inscription.tpl');
}

function recuperation() {
	$email = isset($_POST['email'])?$_POST['email']:"";
	require ('View/recuperation.tpl');
}

function ajax_connect () {
	//Récupération des variables saisies dans le formulaire-----------------------------
	$identifiant = isset($_POST['identifiant'])?$_POST['identifiant']:"";
	$pass = isset($_POST['pass'])?$_POST['pass']:"";

	require ('Model/userModel.php');

	//Controle des infos saisies--------------------------------------------------
	if (isset($_POST['Connexion'])){
		if (authentification($identifiant,$pass)) {
			$_SESSION['utilisateur']= $identifiant;	
			echo ($_SESSION['utilisateur']);
		}
		else {echo("KO");}
	}
	else {
		ajout('','',$identifiant,$pass,'');
	} 
}

?>
