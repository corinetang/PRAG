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
	require ('Model/filiereModel.php');
	
	$listFiliere = getFiliere();
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
			if(importClassement()){
				echo ('<div class="alert alert-dismissible alert-success">
  <button type="button" class="close" data-dismiss="alert">×</button>
  <strong>Bravo!</strong>L\'import s\'est passé avec success. <a href="index.php" class="alert-link"><br>Retour à la page d\'accueil</a>.
</div>');
			}
			else{
				echo ('<div class="alert alert-dismissible alert-danger">
  <button type="button" class="close" data-dismiss="alert">×</button>
  <strong>Mince!</strong> <a href="index.php?control=import&action=showImportClassement" class="alert-link">Un problème est survenu lors de l\'import du fichier. </a> Réessayez ! .
</div>');
			}
		}
		else{
			die("Vous ne devriez pas être là");
		}#End elseif
}

/*
 * Import du fichier stage côté serveur
 */
function importerStage() {
		$Filiere = isset($_POST['Filiere'])?$_POST['Filiere']:"";
	
		// UPLOAD DU FICHIER CSV, vérification et insertion en BASE
		if($_FILES["file"]["type"] != "application/vnd.ms-excel"){
			die("Ce n'est pas un fichier de type .csv");
		}#End if

		elseif(is_uploaded_file($_FILES['file']['tmp_name'])){
			require('Model/importModel.php');
			if(importStages($Filiere)) {
				echo ('<div class="alert alert-dismissible alert-success">
			  <button type="button" class="close" data-dismiss="alert">×</button>
			  <strong>Bravo!</strong>L\'import s\'est passé avec success. <a href="index.php" class="alert-link"><br>Retour à la page d\'accueil</a>.
			</div>');
			}else {
			echo ('<div class="alert alert-dismissible alert-danger">
			  <button type="button" class="close" data-dismiss="alert">×</button>
			  <strong>Mince!</strong> <a href="index.php?control=import&action=showImportStage" class="alert-link">Un problème est survenu lors de l\'import du fichier. </a> Réessayez ! .
			</div>');
			}
			}#End if
		else{
			die("Vous ne devriez pas être là");
		}#End elseif
}

?>
