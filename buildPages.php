<?php	
	function buildMyGiftCards(){
		Print "<html>";
		Print "<head>";
			Print "<link href=\"twitter-bootstrap-320b75d/docs/assets/css/bootstrap.userpage.css\" rel=\"stylesheet\">";
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
				Print "<link href=\"twitter-bootstrap-320b75d/docs/assets/css/bootstrap.userpage.css\" rel=\"stylesheet\">";
				Print "<script type=\"text/javascript\" src=\"twitter-bootstrap-320b75d/docs/assets/js/jquery.js\"></script>"; 
				Print "<script type=\"text/javascript\" src=\"twitter-bootstrap-320b75d/docs/assets/js/bootstrap-dropdown.js\"></script>"; 
			Print "</head>";
			Print"<div class=\"navbar\">";
			Print "<div class=\"navbar-inner\">";
			Print "<a class=\"brand\">BREEZ</a>";
			Print "<ul class=\"nav\">";
				Print "<li><a href=\"myGiftCards.php\">My Gift Cards</a></li>";
				Print "<li class=\"active\"><a href=\"giftCardStore.php\">Gift Card Store</a><li>";
				Print "<li><a href=\"logout.php\">Sign Out</a></li>";
			Print "</ul>";
		Print "</div>";
		Print "</div>";
			Print "<body>";
			Print  "<div class=\"btn-group\">";
                Print"<button class=\"btn dropdown-toggle\" data-toggle=\"dropdown\">".$defaultCollege."<span class=\"caret\"></span></button>";
                Print "<ul class=\"dropdown-menu\">";
                  Print "<li><a href=\"giftCardStore.php?college=Columbia%20University\">Columbia University</a></li>";
                  Print "<li><a href=\"giftCardStore.php?college=Harvard%20College\">Harvard College</a></li>";
             Print  "</ul>";
             Print "</div>";
             print "<br />";
			$stores = getStoresNearCollege($defaultCollege);
			while($store = mysql_fetch_array($stores)){
				$restaurantInfo = getRestaurantInfo($store['store_id']);
				Print "<li class=\"well span4\">";
							Print "<div href=\"#\" class=\"thumbnail\">";
								Print "<img src=".$restaurantInfo['pic_path'].">";
								Print "<h3>".$restaurantInfo['name']."</h3>";
							Print "</div>";
				Print "</li>";	
			}
				
			Print "</body>";
	    	Print "</html>";
		}
?>