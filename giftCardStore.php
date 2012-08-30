<?php
	include 'buildPages.php';
	include 'databasefunctions.php';
	if(isset($_GET['college'])){
		buildGiftCardStore($_GET['college']);
	}else{
		buildGiftCardStore($_COOKIE['college']);
	}
?>