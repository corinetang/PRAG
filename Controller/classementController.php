<?php

function DisplayResultatPreChoix($value=''){
	require('Model/classementModel.php');
	$stage_id    = isset($_POST['stage_id'])?$_POST['stage_id']:"";
	$user_id     = isset($_POST['user_id'])?$_POST['user_id']:"";

	$result = getClassementByPreChoix($stage_id,$user_id);
}#End DisplayResultatPreChoix

?>