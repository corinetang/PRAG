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
                                 LEFT JOIN Question_Reponse q ON r.id_reponse = q.id_reponse
                                 WHERE q.id_Question = ?");
            $add->bindvalue(1, $id_Question);
            $add->execute();
            $res = $add->fetchAll(PDO::FETCH_ASSOC);

            //si les tables n'existent pas, on les crée
            if (!$res) {

                $add = $bd->prepare("INSERT INTO Reponse VALUES ()");
                $add->execute();
                $id_Reponse = $bd->lastInsertId();

                $add = $bd->prepare("INSERT INTO Question_Reponse (id_Evaluation, id_Question, id_reponse) VALUES(?, ?, ?)");
                $add->bindvalue(1, $id_Evaluation);
                $add->bindvalue(2, $id_Question);
                $add->bindvalue(3, $id_Reponse);
                $add->execute();

                return -1;
            } else {
                return $res;
            }
    }

    /*** METTRE A JOUR UNE QUESTION ***/
    function EnregistrerReponse($id_Reponse, $commentaire_reponse){
        require('ConfigSQL.php');
        $add = $bd->prepare("UPDATE Reponse
                             SET commentaire_reponse = ?
                             WHERE id_Reponse = ?");
        $add->bindValue(1, $commentaire_reponse);
        $add->bindValue(2, $id_Reponse);

        return ($add->execute());
    }#End updateQuestion

?>

