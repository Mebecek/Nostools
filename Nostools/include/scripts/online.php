<?php
	include $_SERVER['DOCUMENT_ROOT'] . "/config.php";
	
	if (isset($_POST["closed"]))
	{
		$delete = Query::getInstance()->delete('online', array('user_id', '=', $_SESSION['logged_id']));
	}
?>