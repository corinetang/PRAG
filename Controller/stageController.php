
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

?>
