<?php
	include $_SERVER['DOCUMENT_ROOT'] . "/config.php";
?>
<!DOCTYPE html>
	<html xmlns='http://www.w3.org/1999/xhtml' lang='cs-CZ'>
		<head>
			<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
			<meta name='viewport' content='width=device-width, initial-scale=1.0' />
			<meta name='description' content='NosTools' />
			<meta name='keywords' content='Nostale, obchod, prodám, vyměním, ručky' />
			<meta name='author' content='Plavecké areály' />
			<title><?php echo $gamename; ?></title>
			<link rel="shortcut icon" href="<?php //echo $gamelink; ?>/favicon.ico" type="image/x-icon">
			<link rel='stylesheet' href='http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css'>
			<link rel='stylesheet' href='<?php echo $style; ?>' type='text/css' />
			<link rel='stylesheet' href='<?php echo $styleslider; ?>' type='text/css' />
			<link href='https://fonts.googleapis.com/css?family=Passion+One' rel='stylesheet' type='text/css'>
			<link href='https://fonts.googleapis.com/css?family=Oxygen' rel='stylesheet' type='text/css'>
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
			<!--<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.15.0/jquery.validate.min.js"></script>-->
			<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
			<script src="http://www.nostools.cz/js/loading.js"></script>
			<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">
			<script src='https://www.google.com/recaptcha/api.js'></script>
			<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
			<link href="http://nostools.cz/css/lightbox.css" rel="stylesheet">
			<script src="http://nostools.cz/js/lightbox.js"></script>
			<?php
				$_SESSION['last_visited'] = $_SERVER['HTTP_REFERER'];
				include $_SERVER['DOCUMENT_ROOT'] . "/js/notifications.js";
			?>
		</head>