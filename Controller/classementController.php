<?php

function DisplayResultatPreChoix($value=''){
	require('Model/classementModel.php');
	$stage_id    = isset($_POST['stage_id'])?$_POST['stage_id']:"";
	$user_id     = isset($_POST['user_id'])?$_POST['user_id']:"";

	$result = getClassementByPreChoix($stage_id,$user_id);
	echo 'Résultat : ' . $result;
	var_dump($result);
}#End DisplayResultatPreChoix

function CloseVoeux(){
	require('Model/classementModel.php');
	traitementClassement();
	echo ('<div class="alert alert-dismissible alert-info">
	  <button type="button" class="close" data-dismiss="alert">×</button>
	  <strong>Information!</strong> Les voeux sont maintenants cloturés.
	</div>');
}#End CloseVoeux

?>
