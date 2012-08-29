	<?php
		include 'databasefunctions.php';
		include 'buildPages.php';
		if(isValidUser($_POST['email_address'],$_POST['password'])==true){
			setcookie("user",$_POST['email_address'],time()+3600);
			setcookie("password",$_POST['password'],time()+3600);
			include 'myGiftCards.php';
		}
	?>