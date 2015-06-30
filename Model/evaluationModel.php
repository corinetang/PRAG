<?php

function getUserStageEval($id_user, $id_Stage) {

	require('ConfigSQL.php');
	$add = $bd->prepare("SELECT * FROM Evaluation e
						 LEFT JOIN User_Evaluation u ON u.id_Evaluation = e.id_Evaluation
						 WHERE e.id_Stage = ? AND u.id_user = ?");
	$add->bindvalue(1, $id_Stage);
	$add->bindvalue(2, $id_user);
	$add->execute();
	$res = $add->fetchAll(PDO::FETCH_ASSOC);

	//si les tables n'existent pas, on les crée
	if (!$res) {

        $add = $bd->prepare("INSERT INTO Evaluation (id_Stage) VALUES(?)");
        $add->bindvalue(1, $id_Stage);
		$add->execute();
		$id_Evaluation = $bd->lastInsertId();

		$add = $bd->prepare("INSERT INTO User_Evaluation (id_Evaluation, id_user) VALUES(?, ?)");
		$add->bindvalue(1, $id_Evaluation);
		$add->bindvalue(2, $id_user);
		$add->execute();

		return -1;
    } else {
        return $res;
    }

}

// function getUserEvaluations($id_user) {

// 	require('ConfigSQL.php');
// 	$add = $bd->prepare("SELECT * FROM User_Evaluation u WHERE id_user = ?");
// 	$add->bindvalue(1, $id_user);
// 	$add->execute();
// 	$res = $add->fetchAll(PDO::FETCH_ASSOC);

// 	return $res;

// }

?>
