<?php
session_start ();
$control= isset($_GET['control'])?$_GET['control']:'user';
$action= isset($_GET['action'])?$_GET['action']:'connexion';

require ('Controller/' .  $control . 'Controller.php');
$action();
?>