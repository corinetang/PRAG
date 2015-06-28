<?php

	function getQuestion(){
		require('ConfigSQL.php');
		    $add = $bd->prepare("SELECT * FROM Questions q");
			$add->execute();
			$res = $add->fetchAll(PDO::FETCH_ASSOC);

			return $res;
	}#End getFiliere
?>