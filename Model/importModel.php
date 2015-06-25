<?php
	
	#=======================================================================================================

	/*** IMPORTE LE CLASSEMENT EN CV ET MET A JOUR LES USERS ***/
	function importClassement(){


		// CONNEXION à la base //
		require('configSQL.php');

			
			//Process the CSV file
			$handle = fopen($_FILES['file']['tmp_name'], "r");
			$data = fgetcsv($handle, 1000, ";"); //Remove if CSV file does not have column headings
			while (($data = fgetcsv($handle, 1000, ";")) !== FALSE) {
				$nom = $data[0];
				$prenom = $data[1];
				$dateN = $data[2];
				$classement = $data[3];

				$date = explode("/", $dateN);

				$newDate = $date[2] . "-" . $date[1] . "-" .  $date[0];


				echo $nom . "-" . $prenom. "-" . $newDate. "-" . $classement;
				
				$add = $bd->prepare('UPDATE user
									SET RangClassement_user = ?
									WHERE nom_user = ? 
									AND prenom_user= ?
									AND dateDeNaissance_user=?');
				
				$add->bindValue(2, $nom);
				$add->bindValue(3, $prenom);
				$add->bindValue(4, $newDate); 
				$add->bindValue(1, $classement);

				$add->execute();
			}#End while
	}#End importClassement

	#===================================================================================================


	function importStages(){
		// CONNEXION à la base //
		require('configSQL.php');

			
			//Process the CSV file
			$handle = fopen($_FILES['file']['tmp_name'], "r");
			$data = fgetcsv($handle, 1000, ";"); //Remove if CSV file does not have column headings
			while (($data = fgetcsv($handle, 1000, ";")) !== FALSE) {
				$des = $data[0];
				$etablissement = $data[2];
				$service = $data[3];
				$chef = $data[4];
				$poste = $data[5];
				
				addDes($des);

				addService($service);

			}#End while

	}#End importStages

	#===================================================================================================

	function addDes($des){
		require('configSQL.php');

	    $add = $bd->prepare("	INSERT IGNORE INTO des
	    						SET libelle_DES = :des");
	    $add->bindParam(':des', $des);
		$add->execute();

		$res = $bd->prepare("	DELETE des 
								FROM des 
								LEFT OUTER JOIN 
								( SELECT MIN(id_DES) as id 
									FROM des 
									GROUP BY libelle_DES 
								) AS table_1 ON des.id_DES = table_1.id 
								WHERE table_1.id IS NULL");
		$res->execute();

	}#End addDes

	#===================================================================================================

	function addService($service){
		require('configSQL.php');

	    $add = $bd->prepare("	INSERT IGNORE INTO service
	    						SET nom_service = :service");
	    $add->bindParam(':service', $service);
		$add->execute();

		$res = $bd->prepare("	DELETE service 
								FROM service 
								LEFT OUTER JOIN 
								( SELECT MIN(id_Service) as id 
									FROM service 
									GROUP BY nom_service 
								) AS table_1 ON service.id_Service = table_1.id 
								WHERE table_1.id IS NULL");
		$res->execute();


	}#End addService

?>