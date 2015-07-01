<?php

function getClassementByPreChoix($stage,$id_user){
	require("userModel.php");
	require("choixModel.php");
	require('ConfigSQL.php');
	$list_user =  getUserByIdStage($stage); // Récupère la liste des users ayant pour stage $stage
	//$list_choix = getChoixByIdStage($stage,$id_user);
	$nbPlacesStage = getNbPlaces($stage);

	$valid = false;

	for ($i=0;$i < count($list_user) and $valid == false; $i++) {
		$row = $list_user[$i];
		#Si la moyenne d'un autre interne est plus élevée et que l'interne n'est pas celui connecté
		if (($row['id_user'] != $_SESSION['user']['id_user']) ) {
			$nbPlacesStage--;
		} else {
			if ($nbPlacesStage > 0) {
				$valid = true;
			}#End if
		}#End if
	}

	return $valid;

}#End getClassementByPreChoix

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

function setNbPlaces($id_stage, $new_nbplaces){
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
							ORDER BY NbSemestre_user DESC,RangClassement_user");
		$add->execute();
		$res = $add->fetchAll(PDO::FETCH_ASSOC);

		return $res;
}#getListeClassmentFinal

#===============================================================================================

function traitementClassement(){
	require('choixModel.php');
	$liste = getListeClassmentFinal();


	for ($i=0; $i < count($liste) ; $i++) {
		//d($liste);
		$rang = getRangByUser($liste[$i]['id_user']);
		$estAccepte = false;
		for ($j=0; $j < count($rang) and $estAccepte == false; $j++) {
			//d($rang);
			$nbPlacesStage = getNbPlaces($rang[$j]['id_Stage']);
			if ( $nbPlacesStage > 0) {
				$estAccepte = true;
				setNbPlaces($rang[$j]['id_Stage'],$nbPlacesStage-1);
				estAccepte($liste[$i]['id_user'],$rang[$j]['id_Stage']);
			}#end if
		}#End for
	}#End for

}#End traitementClassement

#===============================================================================================

function estAccepte($id_user,$id_stage){
	require('configSQL.php');

	$add = $bd->prepare("UPDATE choix
						SET estAccepte_choix = 1
						WHERE id_user = ?
						AND id_Stage = ?");
	$add->bindValue(1, $id_user);
	$add->bindValue(2, $id_stage);

	$add->execute();
}#End estAccepte

?>
