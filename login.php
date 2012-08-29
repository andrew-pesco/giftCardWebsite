	<?php
		include 'databasefunctions.php';
		include 'buildPages.php';
		if(isValidUser($_POST['email_address'],$_POST['password'])==true){
			$_SESSION['loggedin']=true;
			$_SESSION['username']=$_POST['email_address'];
			session_write_close();
			buildMyGiftCards();
		}
	?>