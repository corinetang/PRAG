
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
	
	/*require ('Model/filiereModel.php');
	$listFiliere = getFiliere();*/
	/*var_dump(json_decode($listFiliere));
	var_dump($listFiliere);exit;*/

	require ('View/inscription.tpl');
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
	$groupe_user           = isset($_POST['Groupe'])?$_POST['Groupe']:"";

	require ('Model/userModel.php');

	ajout($nom, $Prenom, $Password, $NbSemestre, $dateDeNaissance_user, $Mail, $Telephone,$filiere);

}

/*function getListFilieres() {
	require ('Model/userModel.php');

	$listFiliere = getFiliere();

	return $listFiliere;
}*/

function showUsers() {
	require ('Model/userModel.php');
	$jsonUsers = getAllUsers();
	require ('View/gestionUsers.tpl');
} 

?>
