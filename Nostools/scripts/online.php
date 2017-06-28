<?php

	include $_SERVER['DOCUMENT_ROOT'] . "/config.php";

	$timestamp = time();

	if (isset($_SESSION['logged_id']))
	{
		$select = Query::getInstance()->get('online', array('user_id', '=', $_SESSION['logged_id']));
		
		if (!$select->count())
		{
			$insert = Query::getInstance()->insert('online', array('user_id' => $_SESSION['logged_id'], 'file' => $_SESSION['last_visited'], 'timestamp' => $timestamp));
		}
	}
	
	$select = Query::getInstance()->getall('online');
	foreach ($select->results() as $data)
	{
		$timee = time() - $data->timestamp;
		if ($timee > 3600)
		{
			$delete = Query::getInstance()->delete('online', array('user_id', '=', $data->user_id));
		}
	}
		
	echo $select->count();
?>