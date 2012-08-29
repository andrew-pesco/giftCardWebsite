<?php
	include 'databasefunctions.php';
	addUser($_POST['email_address'],$_POST['password'], $_POST['confirm_password']);
?>