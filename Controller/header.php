<?php
	require(dirname(__FILE__) .'/View/header.tpl');
	if (isset($_SESSION['utilisateur'])) {
		require(dirname(__FILE__) .'/View/menuConnectee.tpl');
	}
	else{
		require(dirname(__FILE__) .'/View/menuVisiteur.tpl');
	}
?>	
		
