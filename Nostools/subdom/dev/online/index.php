<?php
	include $_SERVER['DOCUMENT_ROOT'] . "/config.php";
	
	$onlineselect = Query::getInstance()->getall('online');
	$online = $onlineselect->count();
	
	$registredselect = Query::getInstance()->getall('users');
	$registred = $registredselect->count();
	
	$arr = array
	(
		'online' => $online,
		'registred' => $registred
	);
	echo json_encode($arr);
	
	/*
	$url = file_get_contents("http://dev.nostools.cz/online/");
	$json = json_decode($url, true);
	
	echo $json['online'];
	echo $json['registred'];
	*/
?>