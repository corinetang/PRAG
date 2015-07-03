<?php

	function getDES($id_DES){
		require('ConfigSQL.php');
		    $add = $bd->prepare("SELECT * FROM DES WHERE id_DES = ?");
		    $add->bindvalue(1, $id_DES);
			$add->execute();
			$res = $add->fetchAll(PDO::FETCH_ASSOC);

			return $res;
	}#End getDES

#=======================================================================================================

	function getIdDES($id_Etablissement){
		require('ConfigSQL.php');
		    $add = $bd->prepare("SELECT * FROM DES_ETABLISSEMENT WHERE id_Etablissement = ?");
		    $add->bindvalue(1, $id_Etablissement);
			$add->execute();
			$res = $add->fetchAll(PDO::FETCH_ASSOC);

			return $res;
	}#End getIdDES
	#=======================================================================================================

	/*** AJOUT D'UN NOUVEAU DES ***/
	function setDES($libelle_DES){
		require('ConfigSQL.php');
	    $add = $bd->prepare("INSERT INTO DES(libelle_DES) 
	    					 VALUES(:libelle_DES)");
	    $add->bindParam(':libelle_DES', $libelle_DES);
	    $add->bindParam(':id_DES', $id_DES);

		return ($add->execute());
	}#End setDES
	#=======================================================================================================

	/*** METTRE A JOUR UN DES ***/
	function updateDES($id_DES, $libelle_DES){
		require('ConfigSQL.php');
	    $add = $bd->prepare("UPDATE DES 
	    					 SET libelle_DES = :libelle_DES
	    					 WHERE id_DES = :id_DES");
	    $add->bindParam(':id_DES', $id_DES);
	    $add->bindParam(':libelle_DES', $libelle_DES);
		
	    return ($add->execute());
	}#End updateDES

?>