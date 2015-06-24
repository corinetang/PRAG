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
	
	/*$req = "SELECT * FROM user WHERE mail_user ='$email'  AND mpd_user ='$password'";
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
	    $result = $bd->prepare('SELECT * FROM user WHERE identifiant_user = ? AND mdp_user = ?');
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
		/*if(!verif_nom($login))
			return false;

		if(!verif_psswd($mdp))
			return false;*/
		
		if(!authentification_BD($login, $mdp))
			return false;
		
		return true;
	}#End authentification

	#=======================================================================================================
	
	
	/*** INSCRIPTION ***/

	function ajout_BD($nom, $prenom, $mdp, $nbSemestre_user, $dateDeNaissance_user, $email, $Numtel,$filiere){
		require('ConfigSQL.php');
		$identifiant_user = create_id($nom,$prenom);
	    $add = $bd->prepare("INSERT INTO user(identifiant_user, nom_user, prenom_user, mdp_user, NbSemestre_user, dateDeNaissance_user, mail_user, numtel_user, id_Filiere) 
							VALUES(:identifiant_user,:nom, :prenom,:mdp, :nbSemestre_user , :dateDeNaissance_user,:email,:Numtel,:id_filiere)");
	    $add->bindParam(':identifiant_user', $identifiant_user);
	    $add->bindParam(':mdp', $mdp);
		$add->bindParam(':nom', $nom);
	    $add->bindParam(':prenom', $prenom);
		$add->bindParam(':email', $email);
	    $add->bindParam(':nbSemestre_user', $nbSemestre_user);
	    $add->bindParam(':dateDeNaissance_user', $dateDeNaissance_user);
	    $add->bindParam(':Numtel', $Numtel);
	    $add->bindParam(':id_filiere', $filiere);

	    return ($add->execute());
	}#End ajout_BD

	#=======================================================================================================

	function ajout($nom, $Prenom, $Password, $NbSemestre, $dateDeNaissance_user, $Mail, $Telephone,$filiere){
		/*if(!verif_nom($nom))
			return false;
			
		if(!verif_nom($prenom))
			return false;*/
			
		/*if(!verif_email($email))
			return false;	
					
		if(!verif_psswd($mdp))
			return false;*/

		return ajout_BD($nom, $Prenom, $Password, $NbSemestre, $dateDeNaissance_user, $Mail, $Telephone,$filiere);
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
	    $add = $bd->prepare("UPDATE user SET mdp_user = :password_new WHERE id_user = :id_user");
	    $add->bindParam(':password_new', $password_new);
		$add->bindParam(':id_user', $_SESSION['id']);
		
	    return ($add->execute());
	}#End change_password_BD

	#=======================================================================================================
	
	function verif_password_BD($password_act){
		require('ConfigSQL.php');
	    $add = $bd->prepare("SELECT * FROM user WHERE id_user = :idclient AND mdp_user = :password_act");
	    $add->bindParam(':password_act', $password_act);
		$add->bindParam(':id_user', $_SESSION['id']);
		$add->execute();
		if($add->rowCount()==0)
			return false;
		else
			return true;
	}#End verif_password_BD

	#=======================================================================================================

	function getUserFiliere(){
		require('ConfigSQL.php');
	    $add = $bd->prepare("SELECT * FROM filiere f
	    					LEFT JOIN user u ON f.id_filiere = u.id_filiere
	    					AND id_user = :id_user");
	    $add->bindParam(':id_filiere', $password_act);
		$add->bindParam(':id_user', $_SESSION['id']);
		$add->execute();
		$res = $add->fetch();

		return json_encode($res);
	}#End getUserFiliere

	#=========================================================================================================

	function create_id($nom,$prenom){
		require('ConfigSQL.php');
	    $add = $bd->prepare("SELECT count(*) FROM user
	    					 WHERE UPPER(nom_user) = UPPER(:nom)
	    					 AND UPPER(prenom_user) = UPPER(:prenom)");
	    $add->bindParam(':nom', $nom);
	    $add->bindParam(':prenom', $prenom);
	    $add->execute();
	    $res = $add->fetch();
	   
	   #Gestion des identifiants (si homonymes)----------------------------------------------
	    if ($res[0] == 0 ) {
	    	$identifiant_user = strtolower($nom) ."." . strtolower($prenom);
	    } else {
	    	$res[0] = $res[0];
	    	$identifiant_user = strtolower($nom) ."." . strtolower($prenom) . $res[0];
	    }#End If
		
	    return $identifiant_user;

	}#End ofcreate_id

	#=========================================================================================================

	function getAllUsers(){
		require('ConfigSQL.php');
		    $add = $bd->prepare("SELECT * FROM user u");
			$add->execute();
			$res = $add->fetch();

			return json_encode($res);
	}#End of getAllUsers


?>