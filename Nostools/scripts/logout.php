<?php
	include $_SERVER['DOCUMENT_ROOT'] . "/config.php";
	
	$user = new User();
	$user->logout();
	
	if ($user->lastVisited() != false)
	{
		$_SESSION['lastvisited'] = $user->lastVisited();
	}
?>