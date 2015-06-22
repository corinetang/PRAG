<?php
	require('/View/header.tpl');
	if (isset($_SESSION['utilisateur'])) {
		require('/View/menuConnectee.tpl');
	}
	else{
		require('/View/menuVisiteur.tpl');
	}
?>	
		
