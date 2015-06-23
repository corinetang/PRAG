<?php

	function getFiliere(){
		require('ConfigSQL.php');
		    $add = $bd->prepare("SELECT * FROM filiere f");
			$add->execute();
			$res = $add->fetch();

			return json_encode($res);
	}#End getFiliere

	#=======================================================================================================

	/*** AJOUT D'UNE NOUVELLE FILIERE ***/
	function setFiliere($nom_filiere){
		require('ConfigSQL.php');
	    $add = $bd->prepare("INSERT INTO filiere(nom_filiere) 
	    					 VALUES(:nom_filiere)");
	    $add->bindParam(':nom_filiere', $nom_filiere);

		return ($add->execute());
	}#End setFiliere

	#=======================================================================================================

	/*** METTRE A JOUR UNE FILIERE ***/
	function updateFiliere($id_Filiere, $nom_filiere){
		require('ConfigSQL.php');
	    $add = $bd->prepare("UPDATE filiere 
	    					 SET nom_filiere = :nom_filiere
	    					 WHERE id_Filiere = :id_Filiere");
	    $add->bindParam(':nom_filiere', $nom_filiere);
	    $add->bindParam(':id_Filiere', $id_Filiere);
		
	    return ($add->execute());
	}#End updateFiliere

?>
?>