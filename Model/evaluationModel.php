<?php

function getEvaluationByIdStage($id_stage) {
    require('ConfigSQL.php');
    $add = $bd->prepare("SELECT e.id_evaluation, q.libelle_question, r.commentaire_reponse FROM evaluation e
                        LEFT JOIN question_reponse qr ON qr.id_evaluation = e.id_evaluation
                        LEFT JOIN questions q ON q.id_question = qr.id_question
                        LEFT JOIN reponse r ON r.id_reponse = qr.id_reponse
                        WHERE e.id_stage = :id_stage
                        AND e.valide_evaluation = true");
    $add->bindParam(':id_stage', $id_stage);
    $add->execute();
    $res = $add->fetchAll(PDO::FETCH_ASSOC);
    return $res;
}
?>
