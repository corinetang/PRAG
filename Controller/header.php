<?php
	require('/View/header.tpl');
	if (isset($_SESSION['user'])) {
		require('/View/menuConnectée.tpl');
	}
	else{
		require('/View/menuVisiteur.tpl');
	}
?>	
		
