<?php
	include $_SERVER['DOCUMENT_ROOT'] . "/config.php";
	
	$offer = new Offer();
	$offer->makeOffer($_POST['content']);
?>