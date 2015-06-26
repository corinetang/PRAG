<?php

	function getService($id_service){
		require('ConfigSQL.php');
		    $add = $bd->prepare("SELECT * FROM service WHERE id_service = ?");
		    $add->bindvalue(1, $id_service);
			$add->execute();
			$res = $add->fetchAll(PDO::FETCH_ASSOC);

			return $res;
	}#End getService

	#=======================================================================================================

	/*** AJOUT D'UN NOUVEAU SERVICE ***/
	function setService($id_service){
		/*require('ConfigSQL.php');
	    $add = $bd->prepare("INSERT INTO Service(nom_Service) 
	    					 VALUES(:nom_Service)");
	    $add->bindParam(':nom_Service', $nom_Service);

		return ($add->execute());*/
	}#End setService

	#=======================================================================================================

	/*** METTRE A JOUR UN SERVICE ***/
	function updateService($id_service){
		/*require('ConfigSQL.php');
	    $add = $bd->prepare("UPDATE Service 
	    					 SET nom_Service = :nom_Service
	    					 WHERE id_Service = :id_Service");
	    $add->bindParam(':nom_Service', $nom_Service);
	    $add->bindParam(':id_Service', $id_Service);
		
	    return ($add->execute());*/
	}#End updateService

?>