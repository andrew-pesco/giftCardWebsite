<?php
 
 function isValidUser($username, $password){
 	$mysql_hostname = "localhost";
 	$mysql_user = "root";
 	$mysql_password="pesco316";
 	$mysql_database="discountWebsite"; 	
 	$connection = mysql_connect($mysql_hostname, $mysql_user, $mysql_password) 
 	or die("oops something whent wrong"); 	
 	mysql_select_db($mysql_database); 	
 	$get = mysql_query("SELECT count(*) FROM users WHERE email = '$username' and password = '$password'");	
 	$result = mysql_result($get, 0);
 	
 	if($result != 1){
 		return false;
 	}else{
 		return true;
 	}
 }
 
 function addUser($username, $password, $confirm_password){
 	$mysql_hostname = "localhost";
 	$mysql_user = "root";
 	$mysql_password="pesco316";
 	$mysql_database="discountWebsite";
 	$connection = mysql_connect($mysql_hostname, $mysql_user, $mysql_password) 
 	or die("oops something whent wrong");
 	mysql_select_db($mysql_database);
 	if(strcmp(trim($password), trim($confirm_password))==0){
 		mysql_query("INSERT INTO users VALUES ('$username', '$password')");
 		Print "User Added";
 	}else{
 		Print "The passwords do not match";
 	}
 }
 
 function getUserGiftCards($username){
 	$mysql_hostname = "localhost";
 	$mysql_user= "root";
 	$mysql_password="pesco316";
 	$mysql_database="discountWebsite";
 	$connection= mysql_connect($mysql_hostname, $mysql_user, $mysql_password)
 	or die("oops something whent wrong");
 	mysql_select_db($mysql_database);
 	$result = mysql_query("SELECT * FROM giftCards WHERE email='$username'");
 	return $result;
 }
 
 function getRestaurantInfo($store_id){
 	$mysql_hostname = "localhost";
 	$mysql_user= "root";
 	$mysql_password="pesco316";
 	$mysql_database="discountWebsite";
 	$connection= mysql_connect($mysql_hostname, $mysql_user, $mysql_password)
 	or die("oops something whent wrong");
 	mysql_select_db($mysql_database);
 	$result = mysql_query("SELECT * FROM restaurants WHERE id = $store_id ");
 	return mysql_fetch_array($result);
 }
 
?>