<?php

	class Pagination
	{
		private $_query;
		private $_basic;
		
		private $_perpage;
		private $_table;
		private $_countpages;
		private $_offset;
		
		function __construct($table, $perpage)
		{
			$this->_table = $table;
			$this->_perpage = $perpage;
			
			$this->_query = new Query();
			$this->_basic = new Basic();
		}
		
		public function getData()
		{
			$sql= $this->_query->getall($this->_table);
			return $sql->count();
		}
		
		private function checkPagenum()
		{
			$this->_countpages = ceil($this->getData() / $this->_perpage);
			
			if ($_GET['page'] <= $this->_countpages)
			{
				if (is_numeric($_GET['page']))
				{
					return true;
				}
			}
			return false;
		}
		
		public function getDataPerPage()
		{
			$this->_countpages = ceil($this->getData() / $this->_perpage);
			
			if (isset($_GET['page']))
			{
				if ($this->checkPagenum())
				{
					$this->_offset = ($_GET['page'] - 1) * $this->_perpage;
				
					$sql = $this->_query->query("SELECT * FROM $this->_table ORDER BY id DESC LIMIT $this->_perpage OFFSET $this->_offset");
					
				} else {
					$this->_basic->redirect("http://nostools.cz/");
				}
			} else {
				$sql = $this->_query->query("SELECT * FROM $this->_table ORDER BY id DESC LIMIT $this->_perpage");
			}
			return $sql;
		}
		
		private function checkPageset()
		{
			if (isset($_GET['page']))
			{
				return true;
			}
			return false;
		}
		
		private function getPages()
		{
			$this->_countpages = ceil($this->getData() / $this->_perpage);

			$url = explode('?', $_SERVER['REQUEST_URI'], 2);
			
			if ($this->checkPageset())
			{
				$x = $_GET['page'];
			} else {
				$x = 1;
			}
				
			$string .= "<li class='active'><a href='" . $url[0] . "?page=" . $x . "'>" . $x . "</a></li>";
			
			return $string;
		}
		
		public function getPagi()
		{
			$url = explode('?', $_SERVER['REQUEST_URI'], 2);
			$this->_countpages = ceil($this->getData() / $this->_perpage);

			if ($this->checkPageset())
			{
				$next = $_GET['page'] + 1;
				$prev = $_GET['page'] - 1;
			} else {
				$next = 1 + 1;
				$prev = 1;
			}
			
			if ($_GET['page'] != 1)
			{
				if ($this->checkPageset())
				{
					$left = "<li>
							  <a href='" . $url[0] . "?page=" . $prev . "' aria-label='Previous'>
								<span aria-hidden='true'>Předchozí</span>
							  </a>
							</li>";
					$fullleft = "<li>
								  <a href='" . $url[0] . "?page=1' aria-label='Previous'>
									<span aria-hidden='true'>&laquo;</span>
								  </a>
								</li>";
				}
			}
			
			if ($_GET['page'] != $this->_countpages)
			{
				$right = "<li>
						  <a href='" . $url[0] . "?page=" . $next . "' aria-label='Next'>
							<span aria-hidden='true'>Další</span>
						  </a>
						</li>";
				$fullright = "<li>
							  <a href='" . $url[0] . "?page=" . $this->_countpages . "' aria-label='Next'>
								<span aria-hidden='true'>&raquo;</span>
							  </a>
							</li>";
			}
			
			if ($this->_countpages > 1)
			{
				echo 
				"<nav>
					<ul class='pagination'>"
					. $fullleft .
					""
					. $left .
					"" 
					 . $this->getPages() . 
					""
					. $right .
					""
					. $fullright .
					"</ul>
				</nav>";
			}
		}
	}

?>