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
				$att0 = $data[0];
				$att1 = $data[1];
				$att2 = $data[2];
				$att3 = $data[3];

				echo $att0 . "-" . $att1. "-" . $att2. "-" . $att3;
				
				$add = $bd->prepare('UPDATE user
									SET RangClassement_user = ?
									WHERE nom_user = ? 
									AND prenom_user= ?');
				
				$add->bindValue(2, $att0);
				$add->bindValue(3, $att1);
				//$add->bindValue(4, strtotime($att2)); AND dateDeNaissance_user=?
				$add->bindValue(1, $att3);

				$add->execute();
				var_dump($add);

				//echo " : " . $b . "     -     ";
			}#End while
	}

?>