
<?php

/*
 * Affiche la page des pré-choix
 */
function showVoeux() {

	if (isset($_SESSION['user'])) {

		// Recuperation du nom de filière
		require ('Model/filiereModel.php');
		$id_filiere = $_SESSION['user']['id_Filiere'];
		$filiere = getFiliereById($id_filiere);

		require ('Model/stageModel.php');
		$stages = getStagesByFiliereAndUserNotChoices($id_filiere, $_SESSION['user']['id_user']);
		$choosenStages = getStagesByFiliereAndUserChoices($id_filiere, $_SESSION['user']['id_user']);
	}

	require ('View/listVoeux.tpl');
}

function enregistrerVoeu() {
	$stage_id    = isset($_POST['stage_id'])?$_POST['stage_id']:"";
	$user_id     = isset($_POST['user_id'])?$_POST['user_id']:"";
	$rank        = isset($_POST['rank'])?$_POST['rank']:"";

	require ('Model/choixModel.php');
	setChoix(false, $rank, $user_id, $stage_id);
} 

function retirerVoeu() {
	$user_id     = isset($_POST['user_id'])?$_POST['user_id']:"";
	$stage_id    = isset($_POST['stage_id'])?$_POST['stage_id']:"";

	require ('Model/choixModel.php');
	removeChoix($user_id, $stage_id);
}

function updateRankVoeu() {
	$user_id     = isset($_POST['user_id'])?$_POST['user_id']:"";
	$stage_id    = isset($_POST['stage_id'])?$_POST['stage_id']:"";
	$rank        = isset($_POST['rank'])?$_POST['rank']:"";

	require ('Model/choixModel.php');
	updateRank($user_id, $stage_id, $rank);
}

?>
