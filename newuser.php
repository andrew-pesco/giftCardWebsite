<?php
	include 'databasefunctions.php';
	if(strcmp(trim($_POST['password']),trim($_POST['confirm_password']))==0){
		addUser($_POST['email_address'],$_POST['password'], $_POST['confirm_password'],$_POST['college']);
		setcookie("user",$_POST['email_address'],time()+3600);
		setcookie("password",$_POST['password'],time()+3600);
		setcookie("college",$_POST['college'],time()+3600);
	}else{
		include 'index.php';
	}
			
?>