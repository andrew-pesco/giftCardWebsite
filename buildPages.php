<?php	
	function buildMyGiftCards(){
		Print "<html>";
		Print "<head>";
			Print "<link href=\"bootstrap/css/bootstrap.userpage.css\" rel=\"stylesheet\">";
		Print "</head>";
		include 'header.php';
		Print "<body>";
			$giftCards = getUserGiftCards($_COOKIE['user']);
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
	
		function buildGiftCardStore($defaultCollege){
			Print "<html>";
			Print "<head>";
				Print "<link href=\"bootstrap/css/bootstrap.userpage.css\" rel=\"stylesheet\">";
			Print "</head>";
			include 'header.php';
			Print "<body>";
			Print "<div class=\"btn-group\">";
				Print "<button class=\"btn">".$defaultCollege."</button>";
				Print "<button class=\"btn dropdown-toggle\" data-toggle=\"dropdown\">";
					Print "<span class=\"caret\"></span>";
				Print "</button>";
				Print "<ul class=\"dropdown-menu\">";
					"<li><a href=\"giftCardStore.php?college=Columbia%20University\">Columbia University</a></li>";
					"<li><a href=\"giftCardStore.php?college=Harvard\"></a>Harvard</li>";
				Print "</ul>";
			Print "</div>";
			Print "</body>";
	    	Print "</html>";
		}
?>