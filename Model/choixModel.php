<?php

	function getChoix($id_Choix){
		require('ConfigSQL.php');
		    $add = $bd->prepare("SELECT * FROM Choix WHERE id_Choix = ?");
		    $add->bindvalue(1, $id_Choix);
			$add->execute();
			$res = $add->fetchAll(PDO::FETCH_ASSOC);

			return $res;
	}#End getChoix

	#=======================================================================================================

	/*** AJOUT D'UN NOUVEAU Choix ***/
	function setChoix($estAccepte_choix, $rang_choix, $id_user, $id_Stage){
		require('ConfigSQL.php');
	    $add = $bd->prepare("INSERT INTO Choix(estAccepte_choix, rang_choix, id_user, id_Stage) 
	    					 VALUES(?,?,?,?)");
	    $add->bindValue(1, $estAccepte_choix);
	    $add->bindValue(2, $rang_choix);
	    $add->bindValue(3, $id_user);
	    $add->bindValue(4, $id_Stage);

		return ($add->execute());
	}#End setChoix

	#=======================================================================================================

	/*** METTRE A JOUR UN Choix ***/
	function updateChoix($id_Choix, $estAccepte_choix, $rang_choix, $id_user, $id_Stage){
		require('ConfigSQL.php');
	    $add = $bd->prepare("UPDATE Choix 
	    					 SET estAccepte_choix = ?,
	    					 rang_choix = ?,
	    					 id_user = ?,
	    					 id_Stage = ?
	    					 WHERE id_Choix = ?");
	    $add->bindValue(1, $estAccepte_choix);
	    $add->bindValue(2, $rang_choix);
	    $add->bindValue(3, $id_user);
	    $add->bindValue(4, $id_Stage);
	    $add->bindValue(5, $id_Choix);
		
	    return ($add->execute());
	}#End updateChoix

?>