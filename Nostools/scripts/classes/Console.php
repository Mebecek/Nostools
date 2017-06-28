<?php

	class Console
	{
		private $query;
		private $results;
		
		function __construct()
		{
			$this->query = new Query();
		}
		
		public function spaceString($string)
		{
			return $this->results = explode(" ", $string);
		}
		
		public function count($string)
		{
			return count($string);
		}
		
		private function action()
		{
			
		}
	}
?>