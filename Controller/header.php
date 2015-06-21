<?php
	require('/View/header.tpl');
	if (isset($_SESSION['utilisateur'])) {
		require('/View/menuConnectée.tpl');
	}
	else{
		require('/View/menuVisiteur.tpl');
	}
?>	
		
