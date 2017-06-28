<?php

	spl_autoload_register(function ($class_name) {
		include $_SERVER['DOCUMENT_ROOT'] . "/scripts/classes/" . $class_name . '.php';
	});
	
	$userexpired = User::expired($_SESSION['time'], 3600);
	$userexpired;
