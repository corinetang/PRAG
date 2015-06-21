
<?php


function connexion () {
	
	$presentation = "";

	require ('View/connexion.tpl');
}

function inscription() {
	
	require ('View/inscription.tpl');
}

function ajax_connect () {
	//Récupération des variables saisies dans le formulaire-----------------------------
	$email = isset($_POST['email'])?$_POST['email']:"";
	$pass = isset($_POST['pass'])?$_POST['pass']:"";

	require ('Model/userModel.php');

	//Controle des infos saisies--------------------------------------------------
	if (isset($_POST['Connexion'])){
		if (authentification($email,$pass)) {
			$_SESSION['utilisateur']= $email;	
			echo ($_SESSION['utilisateur']);
		}
		else {echo("KO");}
		}
	}
	else {
		inscription();
	} 
}
?>
