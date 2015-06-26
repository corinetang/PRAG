<?php

/*
 * Affiche la page de import classement
 */
function showImportClassement() {
	require ('Model/filiereModel.php');
	$listFiliere = getFiliere();
	require ('View/importClassement.tpl');
}

/*
 * Affiche la page de import stage
 */
function showImportStage() {	
	require ('View/importStage.tpl');
}

/*
 * Import du fichier classement côté serveur
 */
function importerClassement() {

	// UPLOAD DU FICHIER CSV, vérification et insertion en BASE
		if($_FILES["file"]["type"] != "application/vnd.ms-excel"){
			die("Ce n'est pas un fichier de type .csv");
		}#End if

		elseif(is_uploaded_file($_FILES['file']['tmp_name'])){
			require('Model/importModel.php');
			importClassement();
		}
		else{
			die("Vous ne devriez pas être là");
		}#End elseif
}

/*
 * Import du fichier stage côté serveur
 */
function importerStage() {
		// UPLOAD DU FICHIER CSV, vérification et insertion en BASE
		if($_FILES["file"]["type"] != "application/vnd.ms-excel"){
			die("Ce n'est pas un fichier de type .csv");
		}#End if

		elseif(is_uploaded_file($_FILES['file']['tmp_name'])){
			require('Model/importModel.php');
			importStages();
		}
		else{
			die("Vous ne devriez pas être là");
		}#End elseif
}

?>
