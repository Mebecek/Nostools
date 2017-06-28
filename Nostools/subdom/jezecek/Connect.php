<?php
    session_start();
	//include $_SERVER['DOCUMENT_ROOT'] . "/subdom/jezecek/functions.php";
	
	/*GLOBALS*/
	 $site = "Music Charts"; //nazev webu
	
	/*CONNECT*/
	  define("dbserver", "wm126.wedos.net");
	  define("dbuser", "a141246_jezecek");
	  define("dbpass", "Gnh8tgrR");
	  define("dbname", "d141246_jezecek");
	  
	  $db = new PDO(
	  "mysql:host=" .dbserver. ";dbname=" .dbname,dbuser,dbpass,
	  array(
	  PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
	  PDO::MYSQL_ATTR_INIT_COMMAND => "SET CHARACTER SET utf8"
	  )
	  );
    
    
?>
