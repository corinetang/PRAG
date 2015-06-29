<?php

function getUserStageEval($id_user, $id_Stage) {

	require('ConfigSQL.php');
	$add = $bd->prepare("SELECT * FROM Evaluation e
						 LEFT JOIN User_Evaluation u ON u.id_user = e.id_user
						 WHERE id_Stage = ?");
	$add->bindvalue(1, $id_Stage);
	$add->execute();
	$res = $add->fetchAll(PDO::FETCH_ASSOC);

	return $res;

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
