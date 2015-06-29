<?php
function ajoutAnswer($answer){
		require('ConfigSQL.php');
 
	    $add = $bd->prepare("INSERT INTO questions(Libelle_question) 
							VALUES(:Libelle_question)");
	    $add->bindParam(':Libelle_question', $answer);

	    return ($add->execute());
	}#End ajout_BD
?>