<?php
	session_start();
	include_once("database.php");
	include_once("controllers/backend/controller.php");
	$spcontroller = new Controller();
	$spcontroller->handling(); 
?>