<?php

	class Files
	{
		private $_error = false;
		private $_filesize = 500000;
		
		public function checkFileExist($file)
		{
			if (!file_exists($file)) {
				return true;
			}
			return false;
		}
		
		public function checkSize($file, $size)
		{
			$this->_filesize = $size;
			if ($file < $size) {
				return true;
			}
			return false;
		}
		
		public function checkFormat($image, $array = array())
		{
			$type = pathinfo($image, PATHINFO_EXTENSION);
			
			if(in_array($type, $array)) {
				return true;
			}
			return false;
		}
		
		public function checkImage($image)
		{
			$check = getimagesize($image);
			if($check !== false) {
				return true;
			}
			return false;
		}
		
		public function checkUpload($file, $targetfile)
		{
			if (move_uploaded_file($file, $targetfile))
			{
				return true;
			}
			return false;
		}
	}

?>