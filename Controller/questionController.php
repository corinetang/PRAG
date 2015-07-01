
<?php

/*
 * Affiche la page des questions
 */
function showQuestions () {
    require ('Model/questionModel.php');
    $questions = getQuestions();

    require ('View/gestionQuestions.tpl');
}

/*
 * Ajoute une question
 */
function addQuestion () {
    $libelle_question = isset($_POST['libelle_question'])?$_POST['libelle_question']:"";

    require ('Model/questionModel.php');

    setQuestion($libelle_question);
}

/*
 * Supprime une question
 */
function removeQuestion () {
    $id_question = isset($_POST['id_question'])?$_POST['id_question']:"";

    require ('Model/questionModel.php');

    deleteQuestion($id_question);
}

/*
 * Supprime une question
 */
function editQuestion () {
    $id_question = isset($_POST['id_question'])?$_POST['id_question']:"";
    $libelle_question = isset($_POST['libelle_question'])?$_POST['libelle_question']:"";

    require ('Model/questionModel.php');

    updateQuestion($id_question, $libelle_question);
}

function repondre() {
    
    require ('Model/stageModel.php');
    $idStageActuel = getUserStage($_SESSION['user']['id_user']);
    $stageActuel = getStage($idStageActuel);

    require ('Model/questionModel.php');
    $listQuestions = getQuestions();

    require ('Model/evaluationModel.php');
    $Evaluation = getUserStageEval($_SESSION['user']['id_user'], $idStageActuel);

    require ('Model/reponseModel.php');

    foreach ($listQuestions as $question ) {
        $Reponse = getReponseQuestion($question['id_Question'], $Evaluation[0]['id_Evaluation']);
        $id_reponse = $Reponse[0]['id_reponse'];

        $commentaire = isset($_POST['reponse-' . $id_reponse])?$_POST['reponse-' . $id_reponse]:"";

        EnregistrerReponse($id_reponse, $commentaire);
    }
}

?>
