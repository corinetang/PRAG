<?php
/*
 * Affiche la page Admin gestion des evaluation
 */
function showAnswers() {
	require ('Model/questionModel.php');
	
	$questions = getQuestion();
	require ('View/gestionAnswers.tpl');
}

function addAnswer(){
    if(isset($_POST['valider'])){
        $answers = array();
            
            foreach($_POST as $index=>$valeur){
                if ($index!='valider'){
                    $anwsers[$index] = isset($_POST['answerMultiple[]'])?$_POST['answerMultiple[]']:"";
                    var_dump($anwsers[$index]);
                }
            }
        
    
    require ('Model/evaluationModel.php');
    foreach($answers as $answer){
        ajoutAnswer($answer); 
        }
    echo "<div class=\"alert alert-success\" role=\"alert\">Vos questions ont bien été ajoutées</div>";
        sleep(5); 
//	else{
//		echo "<div class=\"alert alert-danger\" role=\"alert\">Une erreur a empêché votre inscription</div>";
//        sleep(5); 
//	}
}
}
?>
