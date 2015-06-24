<?php
session_start ();
require("/View/header.tpl");

$control= isset($_GET['control'])?$_GET['control']:'user';
$action= isset($_GET['action'])?$_GET['action']:'showConnexion';

require ('Controller/' .  $control . 'Controller.php');
$action();

require("/View/footer.tpl");
?>