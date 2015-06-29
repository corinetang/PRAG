<?php

require '/kint/Kint.class.php';

function getClassementByChoix($stage,$id_user){
	require("userModel.php");
	require("choixModel.php");
	require('ConfigSQL.php');
	$list_user = getUserByIdStage($stage);
	$list_choix = getChoixByIdStage($stage,$id_user);
	$nbPlacesStage = getNbPlaces($stage) ;

	d($list_user);
	d($list_choix);

	$row = $list_user;

	do {  
		#Si la moyenne d'un autre interne est plus élevée et que l'interne n'est pas celui connecté
		if (($row['id_user'] != $_SESSION['user']['id_user']) and ($row['moyenneClassement_user'] > $_SESSION['user']['moyenneClassement_user']) ) {
			$nbPlacesStage--;
		}#End if
	} while($row = $list_user->fetch);

	if ($nbPlacesStage <= 0) {
		return false;
	}#End if

	return true;
}#End getClassementByChoix

#===============================================================================================

function getNbPlaces($id_stage){
	require('configSQL.php');

		$add = $bd->prepare("SELECT NbPoste_stage From stage
							WHERE id_Stage = ?");
	    $add->bindValue(1, $id_stage);
		$add->execute();
		$res = $add->fetch();

		return $res[0];
}#End 


?>