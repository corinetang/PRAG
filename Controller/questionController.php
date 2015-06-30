
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
    $id_reponse = isset($_POST['id_reponse'])?$_POST['id_reponse']:"";
    $commentaire = isset($_POST['reponse'])?$_POST['reponse']:"";

    require ('Model/reponseModel.php');

    EnregistrerReponse($id_reponse, $commentaire);
}

?>
