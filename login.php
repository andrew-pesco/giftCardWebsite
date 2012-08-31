	<?php
		include 'databasefunctions.php';
		include 'buildPages.php';
		if(isValidUser($_POST['email_address'],$_POST['password'])==true){
			$college = getCollege($_POST['email_address']);
			setcookie("user",$_POST['email_address'],time()+3600);
			setcookie("password",$_POST['password'],time()+3600);
			setcookie("college",$college['college'],time()+3600);
			Print "<html>";
			Print "<head>";
				Print "<link href=\"twitter-bootstrap-320b75d/docs/assets/css/bootstrap.userpage.css\" rel=\"stylesheet\">";
			Print "</head>";
			Print"<div class=\"navbar\">";
			Print "<div class=\"navbar-inner\">";
			Print "<a class=\"brand\">BREEZ</a>";
			Print "<ul class=\"nav\">";
				Print "<li class=\"active\"><a href=\"myGiftCards.php\">My Gift Cards</a></li>";
				Print "<li><a href=\"giftCardStore.php\">Gift Card Store</a><li>";
				Print "<li><a href=\"logout.php\">Sign Out</a></li>";
			Print "</ul>";
		Print "</div>";
		Print "</div>";
			Print "<body>";
				$giftCards = getUserGiftCards($_POST['email_address']);
 				Print "<ul class=\"thumbnails\">";
 				while ($giftCard = mysql_fetch_array($giftCards)){
					$restaurantInfo = getRestaurantInfo($giftCard['store_id']);
						Print "<li class=\"well span4\">";
							Print "<div href=\"#\" class=\"thumbnail\">";
								Print "<img src=".$restaurantInfo['pic_path'].">";
								Print "<h3>".$restaurantInfo['name']."</h3>";
								Print "<div class=\"progress progress-striped\">";
  									Print "<div class=\"bar\" style=\"width:".(100*$giftCard['current_amt']/$giftCard['purchase_amt'])."%;\"></div>";
								Print "</div>";
								Print "<p>balance: ".$giftCard['current_amt']."$</p>";
							Print "</div>";
						Print "</li>";	
				}
			Print "</ul>";
			Print "</body>";
	    Print "</html>";
		}
	?>