<?php
	
	class User
	{
		private $query;
		private $basic;
		private $token;
		private $errors;
		private $ex;
		
		function __construct()
		{
			$this->query = new Query();
			$this->basic = new Basic();
			$this->token = new Token();
		}
	 
	    public function is_loggedin()
	    {
			if (isset($_SESSION['logged_id']))
			{
				return true;
			}
		}
	   
	    public static function expired($time)
		{
			if (isset($_SESSION['logged_id']))
			{
				if (time() - $_SESSION['time'] > $time)
				{
					header('Location: http://nostools.cz/scripts/logout.php');
				} else {
					$_SESSION['time'] = time();
					return true;
				}
			}
		}
		
		public function logout()
		{
			$onlinedestroy = Query::getInstance()->delete('online', array('user_id', '=', $_SESSION['logged_id']));
			unset($_SESSION['logged_id']);
			$this->redirect("http://nostools.cz/content/login/");
		}
		
		public function password($password)
		{
			$password = $password.$_SERVER['SERVER_NAME'];
			$hashed = sha1($password);
			$done = substr($hashed, 0, -3);
			return $done;
		}
		
		public function redirect($url)
		{
			return header("Location: $url");
		}
		
		public function lastVisited()
		{
			if (isset($_SESSION['last_visited']))
			{
				return true;
			}
			return false;
		}
		
		public function getInfo($id)
		{
			$sql = Query::getInstance()->get('users', array('id', '=', $id));
			return $sql;
		}
		
		public function login($username, $password)
		{
			$redi = "http://nostools.cz/content/login/";
			$redirect = "http://nostools.cz/";
			
			if (isset($_SESSION['last_visited']))
			{
				$redirect = $_SESSION['last_visited'];
			}
			
			if (isset($_POST['logbutton']))
			{
				if (!empty($username))
				{
					if (!empty($password))
					{
						if ($this->token->checkToken($_SESSION['csrf'], $_POST['csrf']))
						{
							if ($this->basic->recaptchaCheck())
							{
								$login = Query::getInstance()->get('users', array('username', '=', $username));
								if ($login->count())
								{
									foreach ($login->results() as $loginuser)
									{
										$hashpw = $loginuser->password;
										$postpw = $this->password($password);
										if ($hashpw == $postpw)
										{
											if ($loginuser->active == 1)
											{
												$login2 = Query::getInstance()->get('users_info', array('user_id', '=', $loginuser->id));
												foreach ($login2->results() as $loginuser2)
												{
													if ($loginuser2->isblock == 0)
													{
														$_SESSION['logged_id'] = $loginuser->id;
														$addonline = Query::getInstance()->insert('online', array('user_id' => $_SESSION['logged_id']));
														$_SESSION['time'] = time();
														$this->redirect($redirect);
														unset($_SESSION['last_visited']);
													} else {
														$_SESSION['login_error'] = "Váš účet je zablokován!";
														$this->redirect($redi);
													}
												}
											} else {
												$_SESSION['login_error'] = "Váš účet ještě nebyl aktivován";
												$this->redirect($redi);
											}
										} else {
											$_SESSION['login_error'] = "Špatné heslo nebo jméno";
											$this->redirect($redi);
										}
									}
								} else {
									$_SESSION['login_error'] = "Špatné heslo nebo jméno";
									$this->redirect($redi);
								}
							} else {
								$_SESSION['login_error'] = "Chybné ověření Google Recaptcha";
								$this->redirect($redi);
							}
						}
					} else {
						$_SESSION['login_error'] = "Zadejte heslo";
						$this->redirect($redi);
					}
				} else {
					$_SESSION['login_error'] = "Zadejte přihlašovací jméno";
					$this->redirect($redi);
				}
			} else {
				$this->redirect($redi);
			}
		}
		
		public function verify()
		{
			if (isset($_GET['email']) && isset($_GET['token']))
			{
				$getvals = Query::getInstance()->get('users', array('email', '=', htmlspecialchars($_GET['email'])));
				foreach ($getvals->results() as $vals)
				{
					if ($vals->active == 0)
					{
						$token = $vals->token;
						if ($_GET['token'] == $token)
						{
							$activation = Query::getInstance()->update('users', 'id', $vals->id, array(
								'active' => 1
							));
							
							if ($activation)
							{
								echo "<font color='green'>Váš účet byl aktivován!</font>";
								$dirname = $_SERVER['DOCUMENT_ROOT'] . "/users/profiles/" . strtolower($vals->nickname). "/posts/images";
								if(!is_dir($dirname))
								{
									mkdir($dirname, 0755, true);
								}
							}
						}
					} else {
						echo "<font color='#7F0000'>Váš účet je již aktivován</font><br>";
						echo "<p>Pokud máte problémy s účtem, kontaktujte <a href='mailto:support@nostools.cz'>support@nostools.cz</a></p>";
					}
				}
			} else {
				echo "<font color='#7F0000'>Žádné informace nebyly nalezeny</font>";
			}
		}
		
		public function changePassword($old, $repeat, $new)
		{
			$redi = $_SERVER['PHP_SELF'];
			
			if (!empty($old))
			{
				if (!empty($repeat))
				{
					if (!empty($new))
					{
						if ($old == $repeat)
						{
							if ($old != $new)
							{
								
							} else {
								$_SESSION['chp_on'] = "Nové heslo nemůže být stejné jako staré heslo";
								$this->redirect($redi);
							}
						} else {
							$_SESSION['chp_or'] = "Heslo znovu musí být stejné jako staré heslo";
							$this->redirect($redi);
						}
					} else {
						$_SESSION['chp_new'] = "Zadejte nové heslo";
						$this->redirect($redi);
					}
				} else {
					$_SESSION['chp_repeat'] = "Zadejte heslo znovu";
					$this->redirect($redi);
				}
			} else {
				$_SESSION['chp_old'] = "Zadejte staré heslo";
				$this->redirect($redi);
			}
		}
	}
?>