<?php
    function getQuestions(){
        require('ConfigSQL.php');
            $add = $bd->prepare("SELECT * FROM Questions");
            $add->execute();
            $res = $add->fetchAll(PDO::FETCH_ASSOC);

            return $res;
    }#End getQuestions

    #=======================================================================================================

    /*** AJOUT D'UNe NOUVELLE QUESTION ***/
    function setQuestion($libelle_question){
        require('ConfigSQL.php');
        $add = $bd->prepare("INSERT INTO Questions(Libelle_question)
                             VALUES(?)");
        $add->bindValue(1, $libelle_question);

        return ($add->execute());
    }#End setQuestion

    #=======================================================================================================

    /*** METTRE A JOUR UNE QUESTION ***/
    function updateQuestion($id_Question, $libelle_question){
        require('ConfigSQL.php');
        $add = $bd->prepare("UPDATE Questions
                             SET Libelle_question = ?
                             WHERE id_Question = ?");
        $add->bindValue(1, $libelle_question);
        $add->bindValue(2, $id_Question);

        return ($add->execute());
    }#End updateQuestion

    #=======================================================================================================

    /*** SUPPRIME UNE QUESTION ***/
    function deleteQuestion($id_Question){
        require('ConfigSQL.php');
        $add = $bd->prepare("DELETE
                             FROM Questions
                             WHERE id_Question = ?");
        $add->bindValue(1, $id_Question);

        return ($add->execute());
    }#End deleteQuestion
?>

