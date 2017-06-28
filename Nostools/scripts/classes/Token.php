<?php

	class Token
	{
		public function generateToken()
		{
			if (function_exists('mcrypt_create_iv'))
			{
				$token = bin2hex(mcrypt_create_iv(32, MCRYPT_DEV_URANDOM));
			} else {
				$token = bin2hex(openssl_random_pseudo_bytes(32));
			}
			return $token;
		}
		
		public function checkToken($servertoken, $scripttoken)
		{
			if (hash_equals((string)$servertoken, $scripttoken))
			{
				return true;
			}
			return false;
		}
	}
?>