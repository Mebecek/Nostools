<?php

	class Offer
	{
		private $_query;
		private $_user;
		private $_basic;
		private $_token;
		private $_files;
		
		private $_error = false;
		private $_redi = "http://nostools.cz/content/market/";
		private $_data = array();
		
		function __construct()
		{
			$this->_query = Query::getInstance();
			$this->_user = new User();
			$this->_basic = new Basic();
			$this->_token = new Token();
			$this->_files = new Files();
		}
		
		public function is_owner($id)
		{
			if ($this->_user->is_loggedin())
			{
				$sql = $this->_query->getall('market');
				
				foreach ($sql->results() as $results)
				{
					if ($id == $_SESSION['logged_id'])
					{
						return true;
					}
				}
			}
			return false;
		}
		
		public function showNewOffer()
		{
			if ($this->_user->is_loggedin())
			{
				include $_SERVER['DOCUMENT_ROOT'] . "/include/post/showpost.php";
			} else {
				include $_SERVER['DOCUMENT_ROOT'] . "/include/post/dshowpost.php";
			}
		}
		
		public function deleteOffer($postid)
		{
			if (isset($_POST['deleteoffer']))
			{
				if ($this->_user->is_loggedin())
				{
					if ($this->_token->checkToken($_SESSION['csrf'], $_POST['csrf']))
					{
						$sql = $this->_query->delete('market', array('id', '=', $postid));
						$_SESSION['login_true'] = "Příspěvek byl úspěšně smazán";
						$this->_query->redirect($this->_redi);
					}
				}
			}
		}
		
		public function editOffer($postid)
		{
			if (isset($_POST['editoffer']))
			{
				if ($this->_user->is_loggedin())
				{
					if ($this->_token->checkToken($_SESSION['csrf'], $_POST['csrf']))
					{
						$this->_query->redirect("http://nostools.cz/content/market/index.php?edit=" . $postid);
					}
				}
			}
		}
		
		public function makeOffer($content)
		{
			$time = time();
			
			foreach ($this->_user->getInfo($_SESSION['logged_id'])->results() as $owner)
			{
				$postauthor = $owner->nickname;
			}
			
			if (isset($_POST['addpost']))
			{
				if ($this->_user->is_loggedin())
				{
					if (!empty($_POST['title']))
					{
						if (!empty($_POST['content']))
						{
							if ($this->_token->checkToken($_SESSION['csrf'], $_POST['csrf']))
							{
								$sql = $this->_query->insert('market', array('time' => $time, 'user_id' => $_SESSION['logged_id'], 'title' => $_POST['title'], 'preview' => $_POST['content'], 'content' => $_POST['content'], 'date' => date('Y-m-d H:i:s'), 'edit' => ''));
								
								if ($sql)
								{
									$sql2 = $this->_query->get('market', array('time', '=', $time));
									foreach ($sql2->results() as $data)
									{
										$dirname = $_SERVER['DOCUMENT_ROOT'] . "/users/profiles/" . strtolower($postauthor) . "/posts/images/" . $data->id;
										if ($this->_basic->makeDirectory($dirname) == false)
										{
											$this->_error = true;
										}
									
										foreach ($_FILES["file-1"]["tmp_name"] as $key => $tmp_name)
										{
											$file_name = $_FILES["file-1"]["name"][$key];
											$file_tmp = $_FILES["file-1"]["tmp_name"][$key];
											
											$temp = explode(".", $file_name);
											$uplfile = round(microtime(true)) . '.' . end($temp);
											
											if ($this->_files->checkFormat($dirname . "/" . $file_name, array("png", "gif")))
											{
												if ($this->_files->checkUpload($file_tmp, $dirname . "/" . $file_name))
												{
													array_push($this->_data, $file_name);
												} else {
													$this->_error = true;
													$_SESSION['login_error'] = "Chyba při nahrávání souboru";
												}
											} else {
												$this->_error = true;
												$_SESSION['login_error'] = "Soubor nebyl nahrán, nepodporovaný typ souboru";
											}
										}
										
										
										if ($this->_error != true)
										{
											if (count($this->_data) > 0)
											{
												$sql3 = $this->_query->insert('market_images', array('post_id' => $data->id, 'images' => serialize($this->_data)));
												
												if ($sql3)
												{
													$_SESSION['login_true'] = "Příspěvek byl úspěšně přidán";
												}
											} else {
												$_SESSION['login_true'] = "Příspěvek byl úspěšně přidán";
											}
										} else {
											$sql = $this->_query->delete('market', array('id', '=', $data->id));
										}
									}
								}
							}
						}
					}
				}
			}
			return $this->_query->redirect($this->_redi);
		}
		
		public function getOffers()
		{
			return $this->_query->query('SELECT * FROM market ORDER BY id DESC');
		}
		
		public function getOffersImages($postid)
		{
			return $this->_query->get('market_images', array('post_id', '=', $postid));
		}
		
		public function getEditOffer($id)
		{
			$sql = $this->_query->get('market', array('id', '=', $id));
			
			return $sql;
		}
	}
?>