<?php
	include 'databasefunctions.php';
	addUser($_POST['email_address'],$_POST['password'], $_POST['confirm_password']);
	setcookie("user",$_POST['email_address'],time()+3600);
	setcookie("password",$_POST['password'],time()+3600);
	include 'buildPages.php';
	buildMyGiftCards();
?>