<?php
	session_start();
	ob_start();
	include $_SERVER['DOCUMENT_ROOT'] . "/functions.php";

	/* SETTING */
	$gamename = "NosTools";
	$gamelink = "http://nostools.cz/";
	$gameversion = "1.0";
	$timeoutseconds = 20;
	$key = "6Lf0cQoUAAAAAPTpAA2W8NNTtdbynLsLmGgWetXn";
	$key2 = "6Lf0cQoUAAAAAEmq_BcOjOq9Z-mEgpmgXQfWkpEd"; //html
	
	$marketpp = 5;
	
	$style = $gamelink . "css/style.css";
	$styleslider = $gamelink . "css/slider.css";
	
	$versionlink = $gamelink . "content/updates/";
	
	$menusupport = $gamelink . "content/support/";
	$menuhelp = $gamelink . "content/help/";
	$menulogin = $gamelink . "content/login/";
	$menulogout = $gamelink . "scripts/logout.php";
	$menuregister = $gamelink . "content/registration/";
	$menumarket = $gamelink . "content/market/";
	$menuwarrant = $gamelink . "content/warrant/";
	$menudownload = $gamelink . "content/download/";
