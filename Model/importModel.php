<?php
	require '/kint/Kint.class.php';
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

			//d($_FILES);
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
				addEtablissement($etablissement);
				addService($service);
				addDesEtablissement($des,$etablissement);
				addStage($service,$chef,$poste);
				searchFiliere($_FILES['file']['name']);
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
	#===================================================================================================

	function addEtablissement($etablissement){
		require('configSQL.php');

	    $add = $bd->prepare("	INSERT IGNORE INTO etablissement
	    						SET nom_etablissement = :etablissement");
	    $add->bindParam(':etablissement', $etablissement);
		$add->execute();

		$res = $bd->prepare("	DELETE etablissement 
								FROM etablissement 
								LEFT OUTER JOIN 
								( SELECT MIN(id_Etablissement) as id 
									FROM etablissement 
									GROUP BY nom_etablissement 
								) AS table_1 ON etablissement.id_Etablissement = table_1.id 
								WHERE table_1.id IS NULL");
		$res->execute();

	}#End addDes
	#===================================================================================================

	function addDesEtablissement($des, $etablissement){
		require('configSQL.php');
		$add = $bd->prepare("SELECT id_DES From des WHERE libelle_DES = ?");
	    $add->bindValue(1, $des);
		$add->execute();
		$res = $add->fetch();
		$idDes = $res[0];

		$add2 = $bd->prepare("SELECT id_Etablissement From etablissement WHERE nom_Etablissement = ?");
	    $add2->bindValue(1, $etablissement);
		$add2->execute();
		$res2 = $add2->fetch();
		$idEtablissement = $res2[0];

	    $add3 = $bd->prepare("	INSERT IGNORE INTO des_etablissement(id_DES,id_Etablissement)
	    						VALUES  (?,?) ");
	    $add3->bindValue(1, $idDes);
	    $add3->bindValue(2, $idEtablissement);
		$add3->execute();

	}#End addDesEtablissement

	#===================================================================================================

	function addStage($service,$chef,$poste){
		require('configSQL.php');
		$add = $bd->prepare("SELECT id_Service From service WHERE nom_service = ?");
	    $add->bindValue(1, $service);
		$add->execute();
		$res = $add->fetch();
		$idService = $res[0];

		//echo $service . ":" . $idService . ' - ';

		$add2 = $bd->prepare("	INSERT INTO stage(NbPoste_stage,maitre_stage,id_Service)
	    						VALUES (?,?,?)");
	    $add2->bindValue(1, $poste);
	   	$add2->bindValue(2, $chef);
	    $add2->bindValue(3, $idService);
		$add2->execute();
	}#End addStage

	#===================================================================================================

	function searchFiliere($namefiliere){
		require('configSQL.php');
		$add = $bd->prepare("SELECT * From filiere");
		$add->execute();

		while ($res = $add->fetch(PDO::FETCH_ASSOC)) {
			if (strpos($namefiliere, $res['nom_filiere'])) {
				addFiliere($res['nom_filiere']);
			}#End If
		}#End while
	}#End searchFiliere

	#===================================================================================================

	function addFiliere($nomFiliere){
		require('configSQL.php');

		$add = $bd->prepare("SELECT id_Filiere From filiere WHERE nom_filiere = ?");
	    $add->bindValue(1, $nomFiliere);
		$add->execute();
		$res = $add->fetch();
		$idFiliere = $res[0];

		$add2 = $bd->prepare("INSERT IGNORE INTO stage(id_Filiere)
	    						VALUES  (?) ");
	    $add2->bindValue(1, $idFiliere);
		$add2->execute();
	}#End addFiliere
?>