
<?php

/*** Affiche la page de connexion ***/
function showConnexion () {
	$presentation = "";
	$identifiant = isset($_POST['identifiant'])?$_POST['identifiant']:"";
	$pass = isset($_POST['pass'])?$_POST['pass']:"";

    require ('View/connexion.tpl');
  
}#End showConnexion

#=======================================================================================================

/*** Affiche la page inscription ***/
function showInscription() {
	require ('Model/filiereModel.php');
	$listFiliere = getFiliere();

    if (!empty($_SESSIONS["user"]["id_Groupe"])){
	   require ('View/inscription.tpl');
    }#End if
    else{
         header("Location: index.php");
    }#End else
}#End showInscription

#=======================================================================================================

/*** Affiche la page de modification des données du profil ***/
function showProfil() {
	require("Model/kint/Kint.class.php");
      if ($_SESSION["user"]["id_Groupe"]){
	   require ('View/formProfil.tpl');
    }#End if
    else {
        header("Location: index.php");
    }#End else
}#End showProfil

#=======================================================================================================

/*** Affiche la page d'accueil d'un utilisateur connecté ***/
function showAccueilConnect() {
    require ('Model/stageModel.php');

    $idUser = $_SESSION['user']['id_user'];
    $Stages = getStagesByUser($idUser);
    if ($_SESSION["user"]["id_Groupe"]){
	   require ('View/pageAccueilConnect.tpl');
    }#End if
    else {
        header("Location: index.php");
    }#End else
}#End showAccueilConnect

#=======================================================================================================

/*** Envoie les donnees de connexion au serveur ***/
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
        }#End if
		else {
            echo('<div class="alert alert-danger" role="alert">
  <a href="index.php" class="alert-link">La connection n\'a pas abouti</a>
</div>');
		}#End else
	}
}#End connexion

#=======================================================================================================

/*** Envoie les données inscription au model ***/
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
  <a href="index.php" class="alert-link">Vous êtes maintenant inscrit !<br> Votre identifiant est: <strong>"'.$nom.'.'.$Prenom.'"<strong><br> Vous pouvez vous connecter en cliquant sur la bannière.</a>
</div>');
	}#End if
	else{
		echo ('<div class="alert alert-danger" role="alert">
  <a href="index.php?control=user&action=showInscription" class="alert-link">Une erreur a empeché votre inscription</a>
</div>');
	}#End else
}#End inscription

#=======================================================================================================

/*** Envoie les données modifiées au model ***/
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
	}#End if

	update_user($_SESSION["user"]["id_user"], $nom, $Prenom, $dateDeNaissance_user, $NbSemestre, $Mail, $Telephone, 1);
}#End profil

#=======================================================================================================

/*** Affiche la page de gestion des utilisateurs ***/
function showUsers() {
	require ('Model/userModel.php');
	$users = getAllUserFiliere();

    require ('Model/filiereModel.php');
    $listFiliere = getFiliere();
    if ($_SESSION["user"]["id_Groupe"] == 3){
	   require ('View/gestionUsers.tpl');
    }#End if
    else {
        header("Location: index.php");
    }#End else
}#End showUsers

#=======================================================================================================

/*** Arrete la session ***/
function deconnexion() {
	session_destroy();
   	header("Location: index.php");
}#End deconnexion

#=======================================================================================================

/*** Envoie les données de suppression au model ***/
function removeUser() {
	$id_user = isset($_POST['id_user'])?$_POST['id_user']:"";
	require ('Model/userModel.php');

	deleteUser($id_user);
}#End removeUser

#=======================================================================================================

/*** Envoie les données de modification au model ***/
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
}#End changeMembre

#=======================================================================================================

/***  ***/
function recupererPassword() {
	$mail_to = isset($_POST['email'])?$_POST['email']:"";
	require ('Model/userModel.php');
	$newpassword = reset_mail($mail_to);
	if ($newpassword) {
		envoiMail($newpassword, $mail_to);
	}#End if
	else {
		echo ('<div class="alert alert-danger" role="alert">
		<a href="index.php?control=user&action=showInscription" class="alert-link">Votre adresse mail est inconnu ! </a>
		</div>');
	}#End else
}#End recupererPassword

#=======================================================================================================

/*** Envoie un mail avec le nouveau mdp à l'utilisateur ***/
function envoiMail($newpassword, $mail_to) {
    $mail_from = 'amandlabeautin@gmail.com';
    //=====Création du header de l'e-mail
    $header = 'From: ' .$mail_from . "\r\n". 
                'Reply-To: ' . $mail_from. "\r\n" .
                'X-Mailer: PHP/' . phpversion();
    
    $subject = "GIRV : Vos identifiants d'accès";
    //==========
	$message = 'Bonjour,
	Voici votre nouveau mot de passe pour vous connecter au site du SIPHIF, vous pourrez modifier votre mot de passe sur votre espace Profil :
	Mot de passe : '.$newpassword.'
	Ne pas répondre à  cet email : message automatique.';
	if(mail($mail_to, $subject, $message, $header)){
		echo('<div class="alert alert-success" role="alert">
		<a href="index.php" class="alert-link">Vous pouvez dàs à présent, vous connecter vec votre nouveau not de passe</a><br> Pensez à le modifier lors de votre connection.
		</div>');
	} #End if
    else {
		echo('<div class="alert alert-danger" role="alert">
		<a href="index.php" class="alert-link">Nous sommes désolé ! Une erreur a empéché l\'envoi du mail !</a>
		</div>');
	}#End else
}#End envoiMail

#=======================================================================================================
?>
