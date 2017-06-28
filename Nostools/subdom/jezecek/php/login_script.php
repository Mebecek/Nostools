<?php
	session_start();
	include $_SERVER['DOCUMENT_ROOT'] . "/subdom/jezecek/include/header.php";
	include $_SERVER['DOCUMENT_ROOT'] . "/subdom/jezecek/include/menu.php";
	include $_SERVER['DOCUMENT_ROOT'] . "/subdom/jezecek/include/login_script.php";
	login();
	
		
		/*if(!$result) {
                echo "Wrong username or password!" . "<br>";
                echo "<a href='http://jezecek.nostools.cz/include/login.php'>Try again</a>";
		} 
		else {
				echo "Login successful" . "<br>";
				echo "<a href='http://jezecek.nostools.cz/'>Homepage</a>";
				$_SESSION['username'] = $username;
				$_SESSION['id'] = $data['id'];
		}	
	}
	else {
		echo "Fill all fields!" . "<br>";
		echo "<a href='http://jezecek.nostools.cz/include/login.php'>Try again</a>";
	}*/
	
?>

