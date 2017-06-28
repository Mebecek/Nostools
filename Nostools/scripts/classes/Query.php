<?php
	class Query
	{
		private $db;
		private $db_server = "wm126.wedos.net";
		private $db_user = "a141246_ntools";
		private $db_pass = "LhLddR6W";
		private $db_name = "d141246_ntools";

		private static $_instance = null;
		private $_query;
		private $_error = false;
		private $_results;
		private $_count = 0;

		function __construct()
		{
			try {
				$this->db = new PDO(
				"mysql:host=" . $this->db_server . ";dbname=" . $this->db_name, $this->db_user, $this->db_pass,
				array(
				PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
				PDO::MYSQL_ATTR_INIT_COMMAND => "SET CHARACTER SET utf8"
				)
				);
				//$this->db->setAttribute( PDO::ATTR_EMULATE_PREPARES, false );
			} catch(PDOException $e) {
				echo $e->getMessage();
			}
		}
		
		public static function getInstance()
		{
			if (!isset(self::$_instance))
			{
				self::$_instance = new Query;
			}
			return self::$_instance;
		}
		
		public function query($sql, $params = array())
		{
			$this->_error = false;
			
			if ($this->_query = $this->db->prepare($sql))
			{
				$x = 1;
				if (count($params))
				{
					foreach ($params as $param)
					{
						$this->_query->bindValue($x, $param);
						$x++;
					}
				}
				
				if ($this->_query->execute())
				{
					$this->_results = $this->_query->fetchAll(PDO::FETCH_OBJ);
					$this->_count = $this->_query->rowCount();
				} else {
					$this->_error = true;
				}
			}
			
			return $this;
		}
		
		private function action($action, $table, $where = array())
		{
			if (count($where) === 3)
			{
				$operators = array('=', '>', '<', '>=', '<=', 'all');
				
				$field 		= $where[0];
				$operator	= $where[1];
				$value		= $where[2];
				
				if (in_array($operator, $operators))
				{
					if ($operator == 'all')
					{
						$sql = "{$action} FROM {$table} WHERE {$field} {$operator} ?";
					}
					
					$sql = "{$action} FROM {$table} WHERE {$field} {$operator} ?";
					
					if (!$this->query($sql, array($value))->error())
					{
						return $this;
					}
				}
			}
			
			return false;
		}
		
		public function get($table, $where)
		{
			return $this->action('SELECT *', $table, $where);
		}
		
		public function getall($table)
		{
			$sql = "SELECT * FROM {$table}";
			
			if (!$this->query($sql, array($value))->error())
			{
				return $this;
			}
		}
		
		public function delete($table, $where)
		{
			return $this->action('DELETE', $table, $where);
		}
		
		public function insert($table, $fields = array())
		{
			$keys = array_keys($fields);
			$values = '';
			$x = 1;
			
			foreach($fields as $field)
			{
				$values .= '?';
				if ($x < count($fields))
				{
					$values .= ', ';
				}
				$x++;
			}
			
			$sql = "INSERT INTO $table (`" . implode('`, `', $keys) . "`) VALUES ({$values})";
			
			if (!$this->query($sql, $fields)->error())
			{
				return true;
			}
		
			return false;
		}
		
		public function update($table, $where, $id, $fields)
		{
			$set = '';
			$x = 1;
			
			foreach ($fields as $name => $value)
			{
				$set .= "{$name} = ?";
				if ($x < count($fields))
				{
					$set .= ', ';
				}
				$x++;
			}
			
			$sql = "UPDATE {$table} SET {$set} WHERE {$where} = {$id}";
			
			if (!$this->query($sql, $fields)->error())
			{
				return true;
			}
			
			return false;
		}
		
		public function results()
		{
			return $this->_results;
		}
		
		public function first()
		{
			return $this->_results()[0];
		}
		
		public function error()
		{
			return $this->_error;
		}
		
		public function count()
		{
			return $this->_count;
		}
		
		public function redirect($url)
		{
			return header("Location: $url");
		}
	}
?>