<?php

function getFiliere(){
	require('ConfigSQL.php');
	    $add = $bd->prepare("SELECT * FROM filiere f");
		$add->execute();
		$res = $add->fetch();

		return json_encode($res);
}#End getFiliere
?>