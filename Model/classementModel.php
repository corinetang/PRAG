<?php

require '/kint/Kint.class.php';

function getClassementByChoix($stage,$id_user){
	require("userModel.php");
	require("choixModel.php");
	require('ConfigSQL.php');
	$list_user = getUserByIdStage($stage);
	$list_choix = getChoixByIdStage($stage,$id_user);

	d($list_user);
	d($list_choix);
}#End getClassementByChoix


?>