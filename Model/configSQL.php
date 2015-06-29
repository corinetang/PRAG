<?php
/*$hote="localhost";
$login="root";
$pass="";
$bd="siphif"; */

$hote = "localhost";
$dbName = "siphif";
$username  = "root";
$password = "root";

try {
	$bd = new PDO('mysql:host='. $hote .';dbname=' . $dbName, $username, $password, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
	$bd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

}#End of try
catch(PDOException $e) {
	echo 'ERROR: ' . $e->getMessage();
}#End of catch
?>
