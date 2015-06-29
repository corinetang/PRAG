
<?php

/*
 * Affiche la page de connexion
 */
function showConnexion () {
	$presentation = "";
	$identifiant = isset($_POST['identifiant'])?$_POST['identifiant']:"";
	$pass = isset($_POST['pass'])?$_POST['pass']:"";

	require ('View/connexion.tpl');

}

/*
 * Affiche la page inscription
 */
function showInscription() {

	require ('Model/filiereModel.php');
	$listFiliere = getFiliere();

	/*var_dump($listFiliere);exit;*/

	require ('View/inscription.tpl');
}

function showProfil() {
	require("Model/kint/Kint.class.php");
	require ('View/formProfil.tpl');
}

function showAccueilConnect() {
	require ('View/pageAccueilConnect.tpl');
}


/*
 * Affiche la page de recuperation de mot de passe
 */
function recuperation() {
	$identifiant = isset($_POST['identifiant'])?$_POST['identifiant']:"";
	require ('View/recuperation.tpl');
}

/*
 * Envoie les donnees de connexion au serveur
 */
function connexion () {
	//Récupération des variables saisies dans le formulaire-----------------------------
	$identifiant = isset($_POST['identifiant'])?$_POST['identifiant']:"";
	$pass = isset($_POST['pass'])?$_POST['pass']:"";

	require ('Model/userModel.php');

	//Controle des infos saisies--------------------------------------------------
	if (isset($_POST['Connexion'])) {
		$auth = authentification_BD($identifiant,$pass);
        header("Location: http://localhost:8888/PRAG/index.php");
	}
}

/*
 * Envoie les donnees inscription au model
 */
function inscription() {
	$nom                   = isset($_POST['Nom'])?$_POST['Nom']:"";
	$Prenom                = isset($_POST['Prenom'])?$_POST['Prenom']:"";
	$NbSemestre            = isset($_POST['NbSemestre'])?$_POST['NbSemestre']:"";
	$Mail                  = isset($_POST['Mail'])?$_POST['Mail']:"";
	$Password              = isset($_POST['Password'])?$_POST['Password']:"";
	$ValidationPassword    = isset($_POST['ValidationPassword'])?$_POST['ValidationPassword']:"";
	$Telephone             = isset($_POST['Telephone'])?$_POST['Telephone']:"";
	$Filiere               = isset($_POST['Filiere'])?$_POST['Filiere']:"";
	$dateDeNaissance_user  = isset($_POST['Ddn'])?$_POST['Ddn']:"";

    require ('Model/userModel.php');

	if (ajout($nom, $Prenom, $Password, $NbSemestre, $dateDeNaissance_user, $Mail, $Telephone,$Filiere)) {
		echo "<div class=\"alert alert-success\" role=\"alert\">Votre inscription a bien été prise en compte</div>";
		header('Location: index.php');
	}
	else{
		echo "<div class=\"alert alert-danger\" role=\"alert\">Une erreur a empêché votre inscription</div>";
		header('Location: index.php');
	}

}

function profil() {
	$nom                   = isset($_POST['Nom'])?$_POST['Nom']:"";
	$Prenom                = isset($_POST['Prenom'])?$_POST['Prenom']:"";
	$NbSemestre            = isset($_POST['NbSemestre'])?$_POST['NbSemestre']:"";
	$Mail                  = isset($_POST['Mail'])?$_POST['Mail']:"";
	$OldPassword		   = isset($_POST['oldPassword'])?$_POST['oldPassword']:"";
	$NewPassword           = isset($_POST['Password'])?$_POST['Password']:"";
	$ValidationPassword    = isset($_POST['ValidationPassword'])?$_POST['ValidationPassword']:"";
	$Telephone             = isset($_POST['Telephone'])?$_POST['Telephone']:"";
	$filiere 			   = isset($_POST['Filiere'])?$_POST['Filiere']:"";
	$dateDeNaissance_user  = isset($_POST['Ddn'])?$_POST['Ddn']:"";
	$groupe_user           = isset($_POST['Groupe'])?$_POST['Groupe']:"";

	$_SESSION["user"]["nom_user"] = $nom;
	$_SESSION["user"]["prenom_user"] = $Prenom;
	$_SESSION["user"]["NbSemestre_user"] = $NbSemestre;
	$_SESSION["user"]["mail_user"] = $Mail;
	$_SESSION["user"]["numtel_user"] = $Telephone;
	$_SESSION["user"]["dateDeNaissance_user"] = $dateDeNaissance_user;


	require ('Model/userModel.php');

	if ($NewPassword != "" && $OldPassword != "" && $NewPassword == $ValidationPassword) {
		change_password_BD($NewPassword);
		$_SESSION["user"]["mdp_user"] = $NewPassword;
	}

	update_user($_SESSION["user"]["id_user"], $nom, $Prenom, $dateDeNaissance_user, $NbSemestre, $Mail, $Telephone, 1);


}

function showUsers() {
	require ('Model/userModel.php');
	$jsonUsers = getAllUsers();
	require ('View/gestionUsers.tpl');
}

function deconnexion() {
	session_destroy();
   	header("Location: index.php");
}
?>
