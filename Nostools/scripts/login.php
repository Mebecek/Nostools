<?php
	include $_SERVER['DOCUMENT_ROOT'] . "/config.php";
	
	$user = new User();
	$user->login($_POST['name'], $_POST['password']);
	
?>