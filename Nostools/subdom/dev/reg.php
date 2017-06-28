<?php
	include $_SERVER['DOCUMENT_ROOT'] . "/config.php";
	
	$unfound = false;
	
	if (isset($_POST['console']))
	{
		$select = Query::getInstance()->get('users', array('id', '=', '7'));

		foreach ($select->results() as $admin)
		{
			echo "<b>[" . $admin->nickname . "]#</b> ";
		}
		
		$string = explode(" ", $_POST['console']);
		$count = count($string);
		
		if (strtolower($string[0]) == "ban")
		{
			if ($string[1] != "")
			{
				$select = Query::getInstance()->get('users', array('nickname', '=', $string[1]));
				if ($select->count())
				{
					foreach ($select->results() as $user)
					{
						$ban = Query::getInstance()->update('users_info', 'user_id', $user->id, array(
										'isblock' => 1
									));
						if ($ban)
						{
							echo "User " . $string[1] . " banned successfully!";
						}
					}
				} else {
					$unfound = true;
				}
			}
		}
		
		if ($unfound)
		{
			$unfoundmsg = "User not found!";
		}
		
		/*switch ($string)
		{
			case $string[0]:
				echo $_SERVER['REMOTE_ADDR'];
				break;
			case "show users":
				$select = Query::getInstance()->getall('users');
				echo $select->count() . " users registred";
				break;
			case "show online":
				$select = Query::getInstance()->getall('online');
				echo $select->count();
				break;
			case $string[0]:
				echo "y";
				break;
			default:
				echo "„" . strtolower($_POST['console']) . "“ command not found!";
		}*/
	}

?>