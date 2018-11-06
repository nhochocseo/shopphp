<?php
	session_start();
	define('ROOT', dirname(dirname(__FILE__))); 
	include_once(ROOT."/database.php");
	include_once("controllers/backend/controller.php");
	$spcontroller = new Controller();
	$spcontroller->handling(); 
?>