<?php

    function getEvalReponses($id_Evaluation) {
        require('ConfigSQL.php');
            $add = $bd->prepare("SELECT * FROM Reponse r 
                                 LEFT JOIN Question_Reponse q ON r.id_Reponse = q.id_Reponse
                                 WHERE q.id_Evaluation = ?");
            $add->bindvalue(1, $id_Evaluation);
            $add->execute();
            $res = $add->fetchAll(PDO::FETCH_ASSOC);

            return $res;
    }


    //récupérer réponse à la question
    function getReponseQuestion($id_Question, $id_Evaluation) {
        require('ConfigSQL.php');
            $add = $bd->prepare("SELECT * FROM Reponse r 
                                 LEFT JOIN Question_Reponse q ON r.id_Reponse = q.id_Reponse
                                 WHERE q.id_Question = ?");
            $add->bindvalue(1, $id_Question);
            $add->execute();
            $res = $add->fetchAll(PDO::FETCH_ASSOC);

            //si les tables n'existent pas, on les crée
            if (!$res) {

                $add = $bd->prepare("INSERT INTO Reponse");
                $add->execute();
                $id_Reponse = $bd->lastInsertId();

                $add = $bd->prepare("INSERT INTO User_Evaluation (id_Evaluation, id_Question, id_Reponse) VALUES(?, ?, ?)");
                $add->bindvalue(1, $id_Evaluation);
                $add->bindvalue(2, $id_Question);
                $add->bindvalue(2, $id_Reponse);
                $add->execute();

                return -1;
            } else {
                return $res;
            }
    }


    // function getQuestions(){
    //     require('ConfigSQL.php');
    //         $add = $bd->prepare("SELECT * FROM Questions");
    //         $add->execute();
    //         $res = $add->fetchAll(PDO::FETCH_ASSOC);

    //         return $res;
    // }#End getQuestions

    // #=======================================================================================================

    // /*** AJOUT D'UNe NOUVELLE QUESTION ***/
    // function setQuestion($libelle_question){
    //     require('ConfigSQL.php');
    //     $add = $bd->prepare("INSERT INTO Questions(Libelle_question)
    //                          VALUES(?)");
    //     $add->bindValue(1, $libelle_question);

    //     return ($add->execute());
    // }#End setQuestion

    // #=======================================================================================================

    // /*** METTRE A JOUR UNE QUESTION ***/
    // function updateQuestion($id_Question, $libelle_question){
    //     require('ConfigSQL.php');
    //     $add = $bd->prepare("UPDATE Questions
    //                          SET Libelle_question = ?
    //                          WHERE id_Question = ?");
    //     $add->bindValue(1, $libelle_question);
    //     $add->bindValue(2, $id_Question);

    //     return ($add->execute());
    // }#End updateQuestion

    // #=======================================================================================================

    // /*** SUPPRIME UNE QUESTION ***/
    // function deleteQuestion($id_Question){
    //     require('ConfigSQL.php');
    //     $add = $bd->prepare("DELETE
    //                          FROM Questions
    //                          WHERE id_Question = ?");
    //     $add->bindValue(1, $id_Question);

    //     return ($add->execute());
    // }#End deleteQuestion
?>

