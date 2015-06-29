<?php

require '/kint/Kint.class.php';

function getClassementByChoix($stage,$id_user){
	require("userModel.php");
	require("choixModel.php");
	require('ConfigSQL.php');
	$list_user =   ($stage);
	$list_choix = getChoixByIdStage($stage,$id_user);
	$nbPlacesStage = getNbPlaces($stage) ;

	d($list_user);
	d($list_choix);

	$row = $list_user;

	do {  
		#Si la moyenne d'un autre interne est plus élevée et que l'interne n'est pas celui connecté
		if (($row['id_user'] != $_SESSION['user']['id_user']) and ($row['RangClassement_user'] > $_SESSION['user']['RangClassement_user']) ) {
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
}#End getNbPlaces

#===============================================================================================

function setNbPlaces($id_stage, $new_nbplaces)[
	require('configSQL.php');

	$add = $bd->prepare("UPDATE Stage 
						SET NbPoste_stage = ?
						WHERE id_Stage = ?");
	$add->bindValue(1, $new_nbplaces);
	$add->bindValue(2, $id_stage);

	$add->execute();
}#End setNbPlaces

#===============================================================================================

function getListeClassmentFinal(){
	require('configSQL.php');

		$add = $bd->prepare("SELECT NbSemestre_user,RangClassement_user,id_user 
							From user u
							GROUP BY NbSemestre_user,RangClassement_user,id_user
							ORDER BY NbSemestre_user,RangClassement_user");
	    $add->bindValue(1, $id_stage);
		$add->execute();
		$res = $add->fetch();

		return $res;
}#getListeClassmentFinal

#===============================================================================================


?>