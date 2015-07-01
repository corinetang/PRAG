
<?php

/*
 * Affiche la page des pré-choix
 */
function showVoeux() {

	if(isset($_POST['stage_id']) && isset($_POST['user_id'])) {
		require('Model/classementModel.php');
		$stage_id    = isset($_POST['stage_id'])?$_POST['stage_id']:"";
		$user_id     = isset($_POST['user_id'])?$_POST['user_id']:"";

		$result = getClassementByPreChoix($stage_id,$user_id);
		$_SESSION['prechoix'] = $result;
	}
	else {
		require ('Model/choixModel.php');
	}
	if (isset($_SESSION['user'])) {

		// Recuperation du nom de filière
		require ('Model/filiereModel.php');
		$id_filiere = $_SESSION['user']['id_Filiere'];
		$filiere = getFiliereById($id_filiere);

		require ('Model/stageModel.php');
		$stages = getStagesByFiliereAndUserNotChoices($id_filiere, $_SESSION['user']['id_user']);
		$choosenStages = getStagesByFiliereAndUserChoices($id_filiere, $_SESSION['user']['id_user']);

		$is_after_acceptable = isAfterAcceptable();
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

/*
 * Affiche la page des évaluations
 */
function showStages() {

	require('Model/kint/Kint.class.php');

	if (isset($_SESSION['user'])) {

		// Recuperation du nom de filière
		require ('Model/filiereModel.php');
		$id_filiere = $_SESSION['user']['id_Filiere'];
		$filiere = getFiliereById($id_filiere);

		require ('Model/stageModel.php');
		$idStageActuel = getUserStage($_SESSION['user']['id_user']);
		$stageActuel = getStage($idStageActuel);

		require ('Model/questionModel.php');
		$listQuestions = getQuestions();

		require ('Model/evaluationModel.php');
		$Evaluation = getUserStageEval($_SESSION['user']['id_user'], $idStageActuel);

		require ('Model/reponseModel.php');
	}

	require ('View/listStages.tpl');
}

function showEval() {

	require('Model/kint/Kint.class.php');

	// if (isset($_SESSION['user'])) {

	// 	// Recuperation du nom de filière
	// 	require ('Model/filiereModel.php');
	// 	$id_filiere = $_SESSION['user']['id_Filiere'];
	// 	$filiere = getFiliereById($id_filiere);

	// 	require ('Model/stageModel.php');
	// 	$idStageActuel = getUserStage($_SESSION['user']['id_user']);
	// 	$stageActuel = getStage($idStageActuel);
	// }

	// $id_stage = isset($_POST['id_Stage'])?$_POST['id_Stage']:"";



	require ('View/formEval.tpl');

}

/*
 * Affiche la page des consultation
 */
function showConsultation() {
	require ('Model/filiereModel.php');
	$id_filiere = $_SESSION['user']['id_Filiere'];
	$filiere = getFiliereById($id_filiere);

	require ('Model/stageModel.php');
	$stages = getStagesByFiliereWithEvaluation($id_filiere);

	for ($i = 0 ; $i < count($stages); $i++) {
		$libelleEval = 'evaluation';
		$evaluation = getEvaluationByIdStage($stages[$i]["id_Stage"]);

		$stages[$i][$libelleEval] = array();
		array_push($stages[$i][$libelleEval], $evaluation);
	}

	require ('View/consultation.tpl');
}

?>
