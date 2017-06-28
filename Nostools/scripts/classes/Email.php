<?php
	class Email
	{
		private $_message;
		private $_headers;
		
		private function formEmail($title, $body)
		{
			return $message = "
			<html>
				<head>
					<title>" . $title . "</title>
				</head>
				<body>
					" . $body . "
				</body>
			</html>
			";
		}
		
		private function headersEmail($from)
		{
			$headers = "MIME-Version: 1.0" . "\r\n";
			$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

			$headers .= "From: <" . $from . ">" . "\r\n";
			
			return $headers;
		}
		
		public function sendEmail($sub, $email, $title, $body, $from)
		{
			$this->_message = $this->formEmail($title, $body);
			$this->_headers = $this->headersEmail($from);

			mail($email, $sub, $this->_message, $this->_headers);
		}
	}
?>