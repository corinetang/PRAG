<?php
session_start ();
require("/Controller/header.php");

$control= isset($_GET['control'])?$_GET['control']:'user';
$action= isset($_GET['action'])?$_GET['action']:'connexion';

require ('Controller/' .  $control . 'Controller.php');
$action();
?>