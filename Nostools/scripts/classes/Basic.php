<?php

	class Basic
	{
		private $_error = false;
		
		public function recaptchaCheck()
		{
			include $_SERVER['DOCUMENT_ROOT'] . "/config.php";
			
			$url = 'https://www.google.com/recaptcha/api/siteverify';
			$privatekey = $key;
			$something = file_get_contents($url."?secret=" . $privatekey . "&response=".$_POST['g-recaptcha-response']."&remoteip=". $_SERVER['REMOTE_ADDR']);
			$data= json_decode($something);
			
			if(isset($data->success) AND $data->success == true)
			{
				return true;
			}
			return false;
		}
		
		public function makeDirectory($dirname)
		{
			if(!is_dir($dirname))
			{
				mkdir($dirname, 0755, true);
				return true;
			}
			return false;
		}
		
		public function success($text)
		{
			$string = "<div class='alert alert-success alert-dismissable drop-shad'>
			<a href='#' class='close' data-dismiss='alert' aria-label='close'>×</a>" . $text . "</div>";
			return $string;
		}
		
		public function info($text)
		{
			$string = "<div class='alert alert-info alert-dismissable drop-shad'>
			<a href='#' class='close' data-dismiss='alert' aria-label='close'>×</a>" . $text . "</div>";
			return $string;
		}
		
		public function warning($text)
		{
			$string = "<div class='alert alert-warning alert-dismissable drop-shad'>
			<a href='#' class='close' data-dismiss='alert' aria-label='close'>×</a>" . $text . "</div>";
			return $string;
		}
		
		public function danger($text)
		{
			$string = "<div class='alert alert-danger alert-dismissable drop-shad'>
			<a href='#' class='close' data-dismiss='alert' aria-label='close'>×</a>" . $text . "</div>";
			return $string;
		}
		
		public function flash($session)
		{
			$temp = $_SESSION[$session];
			unset($_SESSION[$session]);
			return $temp;
		}
		
		public function checkErrors()
		{
			if (isset($_SESSION['login_error']))
			{
				echo $this->danger($this->flash('login_error'));
			}
			
			if (isset($_SESSION['login_true']))
			{
				echo $this->success($this->flash('login_true'));
			}
		}
		
		public function redirect($url)
		{
			return header("Location: $url");
		}
		
		public function alert($msg)
		{
			echo "<script type='text/javascript'>alert('" . $msg . "');</script>";
		}
	}

?>