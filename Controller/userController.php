
<?php


function connexion () {
	$presentation = "";
	$identifiant = isset($_POST['identifiant'])?$_POST['identifiant']:"";
	$pass = isset($_POST['pass'])?$_POST['pass']:"";

	require ('View/connexion.tpl');
}

function inscription() {
	
	require ('View/inscription.tpl');
}

function recuperation() {
	$identifiant = isset($_POST['identifiant'])?$_POST['identifiant']:"";
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
		else {
		/*echo("KO");*/
	}
	}
	/*else {
		ajout('','',$identifiant,$pass,'');
	} */
}

function ajax_inscription() {
	$nom = isset($_POST['Nom'])?$_POST['Nom']:"";
	$Prenom = isset($_POST['Prenom'])?$_POST['Prenom']:"";
	$NbSemestre = isset($_POST['NbSemestre'])?$_POST['NbSemestre']:"";
	$Mail = isset($_POST['Mail'])?$_POST['Mail']:"";
	$Password = isset($_POST['Password'])?$_POST['Password']:"";
	$ValidationPassword = isset($_POST['ValidationPassword'])?$_POST['ValidationPassword']:"";
	$Telephone = isset($_POST['Telephone'])?$_POST['Telephone']:"";
	//$Filiere = isset($_POST['Filiere'])?$_POST['Filiere']:"";
	$filiere = 1;
	$dateDeNaissance_user = '13/05/1994';


	require ('Model/userModel.php');

	ajout($nom, $Prenom, $Password, $NbSemestre, $dateDeNaissance_user, $Mail, $Telephone,$filiere);

}

?>
