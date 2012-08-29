<?php	
	function buildMyGiftCards(){
		Print "<html>";
		Print "<head>";
			Print "<link href=\"bootstrap/css/bootstrap.userpage.css\" rel=\"stylesheet\">";
		Print "</head>";
		include 'header.php';
		Print "<body>";
			$giftCards = getUserGiftCards($_SESSION['username']);
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
	    session_write_close();
	}
	
		function buildGiftCardStore(){
		Print "<html>";
		Print "<head>";
			Print "<link href=\"bootstrap/css/bootstrap.userpage.css\" rel=\"stylesheet\">";
		Print "</head>";
		include 'header.php';
		Print "<body>";
		Print "</body>";
	    Print "</html>";
	    session_write_close();
	}
?>