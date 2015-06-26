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

		return json_encode($res);*/
	}#End getStageFiliere

	#=======================================================================================================

	/*** RECUPERE UN STAGE ***/
	function getStage($id_Stage){
		require('ConfigSQL.php');
	    $add = $bd->prepare("SELECT * FROM stage
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
	    $add->bindParam(':id_Stage', $id_Stage)
		
	    return ($add->execute());
	}#End updateStage

	#=======================================================================================================

	function getStagesByFiliere($idfiliere){
	require('ConfigSQL.php');
	    $add = $bd->prepare("SELECT * FROM stage s
	    					LEFT JOIN filiere f ON f.id_filiere = s.id_Filiere
	    					AND s.id_Filiere = :id_Filiere");
	    $add->bindParam(':id_Filiere', $idfiliere);
		$add->execute();
		$res = $add->fetchAll(PDO::FETCH_ASSOC);

		return $res; 
}#End getStageByFiliere

?>
