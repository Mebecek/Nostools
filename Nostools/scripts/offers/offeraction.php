<?php
	include $_SERVER['DOCUMENT_ROOT'] . "/config.php";
	
	$offer = new Offer();
	$user = new User();
	
	$offer->deleteOffer($_POST['offerid']);
	$offer->editOffer($_POST['offerid']);
?>