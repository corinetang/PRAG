<?php

function connexion_bd() {
	$email = isset($_POST['email'])?$_POST['email']:"tapez votre email";
	$password = isset($_POST['pass'])?$_POST['pass']:"tapez votre pass";
	
	require ('./Model/configSQL.php');
	$link = mysql_connect($hote, $login, $pass)
				or die ("erreur de connexion :" . mysql_error());
			mysql_select_db($bd)
				or die ("erreur d\'acces a la base :" . $bd);
				

	/*$pass_hache = sha1($password); */
	
	$req = "SELECT * FROM user WHERE email_user ='$email'  AND mpd_user ='$password'";
	$res = mysql_query ($req, $link)or die ("erreur de requete :" . $req);
	
	if(mysql_num_rows ($res) == 0) {
		return false;
	}
	
	$user = mysql_fetch_assoc($res);
	
	return $user;	
}



?>