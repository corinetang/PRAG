<?php

/*function connexion_bd() {
	$email = isset($_POST['email'])?$_POST['email']:"tapez votre email";
	$password = isset($_POST['pass'])?$_POST['pass']:"tapez votre pass";
	
	require ('./Model/configSQL.php');
	$link = mysql_connect($hote, $login, $pass)
				or die ("erreur de connexion :" . mysql_error());
			mysql_select_db($bd)
				or die ("erreur d\'acces a la base :" . $bd);
				

	/*$pass_hache = sha1($password); */
	
	/*$req = "SELECT * FROM user WHERE email_user ='$email'  AND mpd_user ='$password'";
	$res = mysql_query ($req, $link)or die ("erreur de requete :" . $req);
	
	if(mysql_num_rows ($res) == 0) {
		return false;
	}
	
	$user = mysql_fetch_assoc($res);
	
	return $user;*/


	/**** VERIFICATION DU FORMAT ****/
	
	
	function verif_nom($nom){
		$patternNom = '#^[[:alnum:]_\-ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ]{3,30}$#';
		return preg_match($patternNom, $nom);
	}#End verif_nom

	#=======================================================================================================
	
	function verif_email($email){
		$patternEmail = '#^[a-zA-Z0-9.]{3,}@[a-z0-9]{2,}\.[a-z]{2,4}$#';
		return preg_match($patternEmail, $email);
	}#End verif_email

	#=======================================================================================================

	function verif_psswd($mdp){
		$patternMdp = '#^[a-zA-Z0-9?_\-]{4,50}$#';
		return preg_match($patternMdp, $mdp);
	}#End verif_psswd

	#=======================================================================================================
	
	function verif_niveau_etude($niveau_etude){
		$pattern_niveau_etude = '#^[a-zA-Z0-9?\-\'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ ]{3,50}$#';
		return preg_match($pattern_niveau_etude, $niveau_etude);
	}#End verif_niveau_etude

	#=======================================================================================================
	
	/**** AUTHENTIFICATION CLIENT ****/

	function authentification_BD($login, $mdp){ // Fonction privée (ne sert que pour découper le code avec la fonction authentification)
	    require('ConfigSQL.php');
	    $result = $bd->prepare('SELECT * FROM user WHERE email_user = ? AND mdp_user = ?');
	    $result->bindvalue(1, $login);
	    $result->bindvalue(2, $mdp);
	    $result->execute();
	    $donnee = $result->fetch();
		$_SESSION['id'] = $donnee['id_user'];
	    $result->closeCursor();
	    return !empty($donnee);
	}#End authentification_BD

	#=======================================================================================================

	function authentification($login, $mdp){
		if(!verif_nom($login))
			return false;

		if(!verif_psswd($mdp))
			return false;
		
		if(!authentification_BD($login, $mdp))
			return false;
		
		return true;
	}#End authentification

	#=======================================================================================================
	
	
	/*** INSCRIPTION ***/

	function ajout_BD($nom, $prenom, $email, $sexe, $login, $mdp, $naiss, $niveau_etude, $ville, $CP, $pays){
	    $add = $bd->prepare("INSERT INTO CLIENT(mdp_user, nom_user, prenom_user, email_user,niveau_etude) 
							VALUES(:mdp, :nom, :prenom, :email, :niveau_etude ");
	    $add->bindParam(':mdp', $mdp);
		$add->bindParam(':nom', $nom);
	    $add->bindParam(':prenom', $prenom);
		$add->bindParam(':email', $email);
	    $add->bindParam(':niveau_etude', $niveau_etude);

	    return ($add->execute());
	}#End ajout_BD

	#=======================================================================================================

	function ajout($nom, $prenom, $email, $sexe, $login, $mdp, $naiss, $niveau_etude, $ville, $CP, $pays){
		if(!verif_nom($nom))
			return false;
			
		if(!verif_nom($prenom))
			return false;
			
		if(!verif_email($email))
			return false;	
					
		if(!verif_psswd($mdp))
			return false;

		return ajout_BD($nom, $prenom, $email, $sexe, $login, $mdp, $naiss, $niveau_etude, $ville, $CP, $pays);
	}#End ajout

	#=======================================================================================================
	
	/*** MODIFICATION MDP ***/
	function change($password_act, $password_new, $password_conf){
		if(!verif_psswd($password_act))
			return false;
			
		if(!verif_psswd($password_new))
			return false;
			
		if(!verif_psswd($password_conf))
			return false;
		
		if(!verif_password_BD($password_act))
			return false;
		
		if($password_new != $password_conf)
			return false;

		return change_password_BD($password_new);
	}#End change

	#=======================================================================================================
	
	
	function change_password_BD($password_new){
		require('ConfigSQL.php');
	    $add = $bd->prepare("UPDATE user SET mdp_user = :password_new WHERE idclient = :id_user");
	    $add->bindParam(':password_new', $password_new);
		$add->bindParam(':idclient', $_SESSION['id']);
		
	    return ($add->execute());
	}#End change_password_BD

	#=======================================================================================================
	
	function verif_password_BD($password_act){
		require('ConfigSQL.php');
	    $add = $bd->prepare("SELECT * FROM user WHERE idclient = :idclient AND mdp_user = :password_act");
	    $add->bindParam(':password_act', $password_act);
		$add->bindParam(':idclient', $_SESSION['id']);
		$add->execute();
		if($add->rowCount()==0)
			return false;
		else
			return true;
	}#End verif_password_BD

	#=======================================================================================================

	






?>