
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

	require ('View/inscription.tpl');
}

function showProfil() {
	require("Model/kint/Kint.class.php");
	require ('View/formProfil.tpl');

}

function showAccueilConnect() {
    require ('Model/stageModel.php');

    $idUser = $_SESSION['user']['id_user'];
    $Stages = getStagesByUser($idUser);
	require ('View/pageAccueilConnect.tpl');
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
        if($auth){
            header("Location: index.php");
        }
		else {
            echo('<div class="alert alert-danger" role="alert">
  <a href="index.php" class="alert-link">La connection n\'a pas abouti</a>
</div>');
		}
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
	echo ('<div class="alert alert-success" role="alert">
  <a href="index.php" class="alert-link">Vous êtes maintenant inscrit !<br> Votre identifiant est: <strong>VotreNom.VotrePrenom<strong>.<br> Vous pouvez vous connecter en cliquant sur la bannière.</a>
</div>');
	}
	else{
		echo ('<div class="alert alert-danger" role="alert">
  <a href="index.php?control=user&action=showInscription" class="alert-link">Une erreur a empeché votre inscription</a>
</div>');
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
	$users = getAllUserFiliere();

    require ('Model/filiereModel.php');
    $listFiliere = getFiliere();

	require ('View/gestionUsers.tpl');
}

function deconnexion() {
	session_destroy();
   	header("Location: index.php");
}

function removeUser() {
	$id_user = isset($_POST['id_user'])?$_POST['id_user']:"";
	require ('Model/userModel.php');

	deleteUser($id_user);
}

function changeMembre() {
	$idUser                = isset($_POST['IdUser'])?$_POST['IdUser']:"";
	$nom                   = isset($_POST['Nom'])?$_POST['Nom']:"";
	$Prenom                = isset($_POST['Prenom'])?$_POST['Prenom']:"";
	$NbSemestre            = isset($_POST['NbSemestre'])?$_POST['NbSemestre']:"";
	$Mail                  = isset($_POST['Mail'])?$_POST['Mail']:"";
	$Telephone             = isset($_POST['Telephone'])?$_POST['Telephone']:"";
	$dateDeNaissance_user  = isset($_POST['Ddn'])?$_POST['Ddn']:"";
	$groupe  			   = isset($_POST['Groupe'])?$_POST['Groupe']:"";

	require ('Model/userModel.php');
	update_membre($idUser, $nom, $Prenom, $dateDeNaissance_user, $NbSemestre, $Mail, $Telephone, $groupe);
}

function recupererPassword() {
	$mail = isset($_POST['Mail'])?$_POST['Mail']:"";
	
	require ('Model/userModel.php');
	$newpassword = reset_mail($mail);
	if ($newpassword) {
		envoiMail($newpassword, $mail);
	}
	else {
		echo ('<div class="alert alert-danger" role="alert">
		<a href="index.php?control=user&action=showInscription" class="alert-link">Votre adresse mail est inconnu ! </a>
		</div>');
	}
}

function envoiMail($newpassword, $mail) {
	$message = 'Bonjour,
	Voici votre nouveau mot de passe pour vous connecter au site du SIPHIF, vous pourrez modifier votre mot de passe sur votre espace Profil :
	Mot de passe : '.$newpassword.'
	Ne pas répondre à  cet email : message automatique.';
	if($res=mail(''.$mail.'','GIRV : Vos identifiants d\'accès', $message)){
		echo "<script>alert('Mail envoyé');</script>";
	} else {
		echo'Problème à l\'envoie du mail';
	}
}
?>
