<?php

	class Status
	{
		public function onlineStatus()
		{
			$timestamp = time();
			$timeout = $timestamp - $timeoutseconds;

			if (isset($_SESSION['logged_id']))
			{
				$select = Query::getInstance()->get('online', array('user_id', '=', $_SESSION['logged_id']));
				
				if (!$select->count())
				{
					$insert = Query::getInstance()->insert('online', array('user_id' => $_SESSION['logged_id'], 'file' => $_SERVER['PHP_SELF'], 'timestamp' => $timestamp));
				}
			}
			$select = Query::getInstance()->getall('online');
			return $select;
		}
		
		public function registeredStatus()
		{
			$select = Query::getInstance()->get('users', array('active', '=', 1));
			return $select;
		}
		
		public function serverStatus($ip, $port)
		{
			$fp = @fsockopen($ip, $port);
		
			if ($fp) {
				echo "<font color='green'>ONLINE</font>";
			} else { 
				echo "<font color='red'>OFFLINE</font></a>";
			}
		}
	}

?>