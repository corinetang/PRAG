<?php
	/**** VERIFICATION DU FORMAT ****/


	function verif_nom($nom){
		$patternNom = '#^[[:alnum:]_\-ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ]{2,30}$#';
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

	function verif_nbSemestre($nbSemestre_user){
	
		$patternMdp = '#^[0-9]{1}$#';
		if(!preg_match($patternMdp, $nbSemestre_user) || !is_numeric($nbSemestre_user)){
			return false;
		}
		return false;
	}#End verif_psswd
	
	#=======================================================================================================
	
	function verif_nbTelephone($Telephone){
	
		$patternMdp = '#^[0-9]{10}$#';
		if(!preg_match($patternMdp, $Telephone) || !is_numeric(Telephone)){
			return false;
		}
		return false;
	}#End verif_psswd

	#=======================================================================================================

	/**** AUTHENTIFICATION CLIENT ****/

	function authentification_BD($login, $mdp){ // Fonction privée (ne sert que pour découper le code avec la fonction authentification)
	    require('ConfigSQL.php');

	    $password = sha1($mdp);

	    $result = $bd->prepare("SELECT * FROM user u
	    	LEFT JOIN filiere f ON f.id_filiere = u.id_filiere
	    	WHERE identifiant_user = :identifiant AND mdp_user = :password");
	    $result->bindParam(':identifiant', $login);
	    $result->bindParam(':password', $password);
	    $result->execute();
	    $donnee = $result->fetch(PDO::FETCH_ASSOC);
		$_SESSION['user'] = $donnee;

	    $result->closeCursor();
	    return $donnee;
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
		$password = sha1($mdp);
		$groupe = 1;
		$identifiant_user = create_id($nom,$prenom);
	    $add = $bd->prepare("INSERT INTO user(identifiant_user, nom_user, prenom_user, mdp_user, NbSemestre_user, dateDeNaissance_user, mail_user, numtel_user, id_Filiere,id_Groupe)
							VALUES(:identifiant_user,:nom, :prenom,:mdp, :nbSemestre_user , :dateDeNaissance_user,:email,:Numtel,:id_filiere,:id_groupe)");
	    $add->bindParam(':identifiant_user', $identifiant_user);
	    $add->bindParam(':mdp', $password);
		$add->bindParam(':nom', $nom);
	    $add->bindParam(':prenom', $prenom);
		$add->bindParam(':email', $email);
	    $add->bindParam(':nbSemestre_user', $nbSemestre_user);
	    $add->bindParam(':dateDeNaissance_user', $dateDeNaissance_user);
	    $add->bindParam(':Numtel', $Numtel);
	    $add->bindParam(':id_filiere', $filiere);
	    $add->bindParam(':id_groupe', $groupe); //Par défaut un interne

	    return ($add->execute());
	}#End ajout_BD

	#=======================================================================================================

	function ajout($nom, $Prenom, $Password, $NbSemestre, $dateDeNaissance_user, $Mail, $Telephone,$filiere){
		if(!verif_nom($nom))
			return false;

		if(!verif_nom($Prenom))
			return false;
		/*
		if(!verif_email($Mail))
			return false;
		*/
		if(!verif_psswd($mdp))
			return false;
		
		if(!verif_nbSemestre($NbSemestre))
			return false;

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

	/*** MODIFICATION PROFIL ***/
	function changeProfil($nom_user, $prenom_user, $date_naiss, $nbSemestre, $email, $Telephone, $filiere){

		if(!verif_nom($nom_user))
			return false;
		if(!verif_nom($prenom_user))
			return false;
		if(!verif_email($email))
			return false;


		return update_user();
	}#End change

	#=======================================================================================================

	function update_user($id_user, $nom_user, $prenom_user, $date_naiss, $nbSemestre, $email, $Telephone, $filiere) {
		require('ConfigSQL.php');

	    $add = $bd->prepare("UPDATE user
	    					 SET nom_user = ?,
	    					 prenom_user = ?,
	    					 dateDeNaissance_user = ?,
	    					 NbSemestre_user = ?,
	    					 mail_user = ?,
	    					 numtel_user = ?,
	    					 id_Filiere = ?
	    					 WHERE id_user = ?");


	    $add->bindvalue(1, $nom_user);
	    $add->bindvalue(2, $prenom_user);
	    $add->bindvalue(3, $date_naiss);
	    $add->bindvalue(4, $nbSemestre);
	    $add->bindvalue(5, $email);
	    $add->bindvalue(6, $Telephone);
	    $add->bindvalue(7, $filiere);
		$add->bindvalue(8, $id_user);

	    return ($add->execute());
	}

	#=======================================================================================================

	function update_membre($id_user, $nom_user, $prenom_user, $date_naiss, $nbSemestre, $email, $Telephone, $id_groupe) {
		require('ConfigSQL.php');

	    $add = $bd->prepare("UPDATE user
	    					 SET nom_user = ?,
	    					 prenom_user = ?,
	    					 dateDeNaissance_user = ?,
	    					 NbSemestre_user = ?,
	    					 mail_user = ?,
	    					 numtel_user = ?,
	    					 id_Groupe = ?
	    					 WHERE id_user = ?");


	    $add->bindvalue(1, $nom_user);
	    $add->bindvalue(2, $prenom_user);
	    $add->bindvalue(3, $date_naiss);
	    $add->bindvalue(4, $nbSemestre);
	    $add->bindvalue(5, $email);
	    $add->bindvalue(6, $Telephone);
	    $add->bindvalue(7, $id_groupe);
		$add->bindvalue(8, $id_user);

	    return ($add->execute());
	}


	#=======================================================================================================

	function change_password_BD($password_new){
		require('ConfigSQL.php');
		$hash = sha1($password_new);
	    $add = $bd->prepare("UPDATE user SET mdp_user = :password_new WHERE id_user = :id_user");
	    $add->bindParam(':password_new', $hash);
		$add->bindParam(':id_user', $_SESSION['user']['id_user']);

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
	function getAllUserFiliere(){
		require('ConfigSQL.php');
	    $add = $bd->prepare("SELECT * FROM user u
	    					LEFT JOIN filiere f ON f.id_filiere = u.id_filiere");
		$add->execute();
        $res = $add->fetchAll(PDO::FETCH_ASSOC);
//		$res = $add->fetch();
//		return json_encode($res);
        return $res;
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
			/*$res = $add->fetch();*/
            $res = $add->fetchAll(PDO::FETCH_ASSOC);
			/*return json_encode($res);*/
            return $res;
	}#End of getAllUsers

	#=========================================================================================================

	function getUserByIdStage($id_stage){
		require('configSQL.php');

		$add = $bd->prepare("SELECT * From user u
							JOIN choix c ON u.id_user = c.id_user
							AND c.id_stage = ?
							ORDER BY u.NbSemestre_user DESC, u.RangClassement_user");
	    $add->bindValue(1, $id_stage);
		$add->execute();
		$res = $add->fetch();

		return $res;
	}#End getUserByIdStage

	#=========================================================================================================

	function deleteUser($id_user){
        require('configSQL.php');
        $add = $bd->prepare("DELETE
                             FROM User
                             WHERE id_user = ?");
        $add->bindValue(1, $id_user);

        return ($add->execute());
	}#End deleteUser

?>
