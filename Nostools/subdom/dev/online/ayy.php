<?php

	$url = file_get_contents("http://dev.nostools.cz/online/");
	$json = json_decode($url, true);
	
	echo $json['online'];
	echo $json['registred'];

?>