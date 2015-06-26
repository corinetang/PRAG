<?php

	function getEtablissement($id_Etablissement){
		require('ConfigSQL.php');
		    $add = $bd->prepare("SELECT * FROM etablissement WHERE id_Etablissement = ?");
		    $add->bindvalue(1, $id_Etablissement);
			$add->execute();
			$res = $add->fetchAll(PDO::FETCH_ASSOC);

			return $res;
	}#End getService

	#=======================================================================================================

	/*** AJOUT D'UN NOUVEAU SERVICE ***/
	function setEtablissement($id_Etablissement){
		/*require('ConfigSQL.php');
	    $add = $bd->prepare("INSERT INTO Etablissement(nom_Etablissement) 
	    					 VALUES(:nom_Etablissement)");
	    $add->bindParam(':nom_Etablissement', $nom_Etablissement);

		return ($add->execute());*/
	}#End setEtablissement

	#=======================================================================================================

	/*** METTRE A JOUR UN SERVICE ***/
	function updateEtablissement($id_Etablissement){
		/*require('ConfigSQL.php');
	    $add = $bd->prepare("UPDATE Etablissement 
	    					 SET nom_Etablissement = :nom_Etablissement
	    					 WHERE id_Etablissement = :id_Etablissement");
	    $add->bindParam(':nom_Etablissement', $nom_Etablissement);
	    $add->bindParam(':id_Etablissement', $id_Etablissement);
		
	    return ($add->execute());*/
	}#End updateEtablissement

?>