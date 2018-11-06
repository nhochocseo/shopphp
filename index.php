<?php
	session_start();
	include_once("database.php");
	include_once("controllers/frontend/controller.php");
	$spcontroller = new Controller();
	$spcontroller->handling(); 
?>