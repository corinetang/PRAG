<?php


	#=======================================================================================================

	/*** RECUPERE TOUS LES STAGES D'UNE FILIERE ***/
	/*function getStageFiliere($id_Filiere){
		require('ConfigSQL.php');
	    $add = $bd->prepare("SELECT * FROM stage s
	    					 LEFT JOIN filiere f
	    					 WHERE s.id_Filiere = f.id_Filiere
	    					 AND s.id_Filiere = :id_Filiere");
	    $add->bindParam(':id_Filiere', $id_Filiere);
		$add->execute();

		$res = $add->fetch();

		return json_encode($res);
	}*/#End getStageFiliere

	#=======================================================================================================

	/*** RECUPERE UN STAGE ***/
	function getStage($id_Stage){
		require('ConfigSQL.php');
	    $add = $bd->prepare("SELECT * FROM stage s
							LEFT JOIN Service serv ON serv.id_Service = s.id_Service
                            LEFT JOIN Etablissement e ON serv.id_Etablissement = e.id_Etablissement
                            LEFT JOIN DES_Etablissement deseta ON deseta.id_Etablissement = e.id_Etablissement
                            LEFT JOIN DES des ON des.id_DES = deseta.id_DES
	    					 WHERE id_Stage = :id_Stage");
	    $add->bindParam(':id_Stage', $id_Stage);
		$add->execute();

		$res = $add->fetch();

		return json_encode($res);
	}#End getStageFiliere

	#=======================================================================================================

	/*** AJOUT D'UN NOUVEAU STAGE ***/
	function setStage($nbPoste, $maitre_stage, $dateDebut_stage, $dateFin_stage, $id_Filiere, $id_Service){
		require('ConfigSQL.php');
	    $add = $bd->prepare("INSERT INTO stage(NbPoste_stage, maitre_stage, dateDebut_stage, dateFin_stage, id_Filiere, id_Service)
	    					 VALUES(:NbPoste_stage, :maitre_stage, :dateDebut_stage, :dateFin_stage, :id_Filiere, :id_Service)");
	    $add->bindParam(':NbPoste_stage', $nbPoste);
	    $add->bindParam(':maitre_stage', $maitre_stage);
	    $add->bindParam(':dateDebut_stage', $dateDebut_stage);
	    $add->bindParam(':dateFin_stage', $dateFin_stage);
	    $add->bindParam(':id_Filiere', $id_Filiere);
	    $add->bindParam(':id_Service', $id_Service);

		return ($add->execute());
	}#End setStage

	#=======================================================================================================

	/*** METTRE A JOUR UN STAGE ***/
	function updateStage($id_Stage, $nbPoste, $maitre_stage, $dateDebut_stage, $dateFin_stage, $id_Filiere, $id_Service){
		require('ConfigSQL.php');
	    $add = $bd->prepare("UPDATE stage
	    					 SET NbPoste_stage = :nbPoste
	    					 maitre_stage = :maitre_stage
	    					 dateDebut_stage = :dateDebut_stage
	    					 dateFin_stage = :dateFin_stage
	    					 id_Filiere = :id_Filiere
	    					 id_Service = id_Service
	    					 WHERE id_Stage = :id_Stage");
	    $add->bindParam(':NbPoste_stage', $nbPoste);
	    $add->bindParam(':maitre_stage', $maitre_stage);
	    $add->bindParam(':dateDebut_stage', $dateDebut_stage);
	    $add->bindParam(':dateFin_stage', $dateFin_stage);
	    $add->bindParam(':id_Filiere', $id_Filiere);
	    $add->bindParam(':id_Service', $id_Service);
	    $add->bindParam(':id_Stage', $id_Stage);

	    return ($add->execute());
	}#End updateStage

	#=======================================================================================================

	function getStagesByFiliere($idfiliere){
		require('ConfigSQL.php');
	    $add = $bd->prepare("SELECT * FROM stage s
	    					LEFT JOIN filiere f ON f.id_filiere = s.id_Filiere
                            LEFT JOIN Service serv ON serv.id_Service = s.id_Service
                            LEFT JOIN Etablissement e ON serv.id_Etablissement = e.id_Etablissement
                            LEFT JOIN DES_Etablissement deseta ON deseta.id_Etablissement = e.id_Etablissement
                            LEFT JOIN DES des ON des.id_DES = deseta.id_DES
	    					AND s.id_Filiere = :id_Filiere");
	    $add->bindParam(':id_Filiere', $idfiliere);
		$add->execute();
		$res = $add->fetchAll(PDO::FETCH_ASSOC);

		return $res;
	}#End getStageByFiliere

	#========================================================================================================

	function getStagesByFiliereAndUserChoices($idfiliere, $iduser){
		require('ConfigSQL.php');
	    $add = $bd->prepare("SELECT *, c.rang_choix FROM stage s
	    					LEFT JOIN filiere f ON f.id_filiere = s.id_Filiere
							LEFT JOIN Service serv ON serv.id_Service = s.id_Service
                            LEFT JOIN Etablissement e ON serv.id_Etablissement = e.id_Etablissement
                            LEFT JOIN DES_Etablissement deseta ON deseta.id_Etablissement = e.id_Etablissement
                            LEFT JOIN DES des ON des.id_DES = deseta.id_DES
	    					INNER JOIN choix c ON c.id_Stage = s.id_Stage
	    					AND s.id_Filiere = :id_Filiere
	    					AND c.id_user = :id_user
	    					ORDER BY c.rang_choix");
	    $add->bindParam(':id_Filiere', $idfiliere);
	    $add->bindParam(':id_user', $iduser);
		$add->execute();
		$res = $add->fetchAll(PDO::FETCH_ASSOC);

		return $res;
	}

	#==========================================================================================================

	function getStagesByFiliereAndUserNotChoices($idfiliere, $iduser){
		require('ConfigSQL.php');
	    $add = $bd->prepare("SELECT *
							FROM stage a
							LEFT JOIN Service serv ON serv.id_Service = a.id_Service
                            LEFT JOIN Etablissement e ON serv.id_Etablissement = e.id_Etablissement
                            LEFT JOIN DES_Etablissement deseta ON deseta.id_Etablissement = e.id_Etablissement
                            LEFT JOIN DES des ON des.id_DES = deseta.id_DES
							WHERE a.id_Stage NOT IN (SELECT s.id_Stage FROM stage s
							LEFT JOIN filiere f ON f.id_filiere = s.id_Filiere
							INNER JOIN choix c ON c.id_Stage = s.id_Stage
							AND s.id_Filiere = :id_Filiere
							AND c.id_user = :id_user)");

	    $add->bindParam(':id_Filiere', $idfiliere);
	    $add->bindParam(':id_user', $iduser);
		$add->execute();
		$res = $add->fetchAll(PDO::FETCH_ASSOC);

		return $res;
	} #End getStagesByFiliereAndUserNotChoices

#=========================================================================================================

	function getUserStage($id_user){
		require('configSQL.php');

		$add = $bd->prepare("SELECT c.id_Stage From choix c
							JOIN user u ON u.id_user = c.id_user
							WHERE u.id_user = ?
							AND estAccepte_choix = 1");
	    $add->bindValue(1, $id_user);
		$add->execute();
		$res = $add->fetch();

		return $res[0];
	}#End getUserStage


#=======================================================================================================
    function getStagesByUser($idUser){
        require('ConfigSQL.php');
	    $add = $bd->prepare("SELECT * FROM Stage s
	    					LEFT JOIN Choix c ON c.id_Stage = s.id_Stage
                            LEFT JOIN Service serv ON serv.id_Service = s.id_Service
                            LEFT JOIN Etablissement e ON serv.id_Etablissement = e.id_Etablissement
                            LEFT JOIN DES_Etablissement deseta ON deseta.id_Etablissement = e.id_Etablissement
                            LEFT JOIN DES des ON des.id_DES = deseta.id_DES
	    					WHERE c.id_User = :id_User");
	    $add->bindParam(':id_User', $idUser);
		$add->execute();
		$res = $add->fetchAll(PDO::FETCH_ASSOC);

		return $res;
    }#End getStagesByUser
?>
