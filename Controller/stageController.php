
<?php

/*
 * Affiche la page des pré-choix
 */
function showVoeux () {

	if (isset($_SESSION['user'])) {

		// Recuperation du nom de filière
		require ('Model/filiereModel.php');
		$id_filiere = $_SESSION['user']['id_Filiere'];
		$filiere = getFiliereById($id_filiere);

		require ('Model/stageModel.php');
		$stages = getStagesByFiliere($id_filiere);
	}
	require ('View/listVoeux.tpl');
}

function showStages() {

	// if (isset($_SESSION['user'])) {

	// 	// Recuperation du nom de filière
	// 	require ('Model/filiereModel.php');
	// 	$id_filiere = $_SESSION['user']['id_Filiere'];
	// 	$filiere = getFiliereById($id_filiere);

	// 	require ('Model/stageModel.php');
	// 	$idStageActuel = getUserStage($_SESSION['user']['id_user']);
	// 	$stageActuel = getStage($idStageActuel);
	// }

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
    require ('View/consultation.tpl');
}

?>
