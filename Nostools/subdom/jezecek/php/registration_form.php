<?php
	session_start();
	require $_SERVER['DOCUMENT_ROOT'] . "/subdom/jezecek/include/header.php";
	include $_SERVER['DOCUMENT_ROOT'] . "/subdom/jezecek/include/menu.php";
	include $_SERVER['DOCUMENT_ROOT'] . "/subdom/jezecek/include/registration_form.php";
	include $_SERVER['DOCUMENT_ROOT'] . "/subdom/jezecek/functions.php";
	
	registration();
?>