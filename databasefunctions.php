<?php
 
 function isValidUser($username, $password){
 	$url=parse_url(getenv("CLEARDB_DATABASE_URL"));
 	$mysql_hostname = $url["host"];
 	$mysql_user = $url["user"];
 	$mysql_password= $url["pass"];
 	$mysql_database= substr($url["path"],1); 	
 	$connection = mysql_connect($mysql_hostname, $mysql_user, $mysql_password) 
 	or die("oops something went wrong"); 	
 	mysql_select_db($mysql_database); 	
 	$get = mysql_query("SELECT count(*) FROM users WHERE email = '$username' and password = '$password'");	
 	$result = mysql_result($get, 0);
 	if($result != 1){
 		return false;
 	}else{
 		return true;
 	}
 }
 
 function addUser($username, $password, $confirm_password,$college){
 	$url=parse_url(getenv("CLEARDB_DATABASE_URL"));
 	$mysql_hostname = $url["host"];
 	$mysql_user = $url["user"];
 	$mysql_password= $url["pass"];
 	$mysql_database= substr($url["path"],1); 
 	$connection = mysql_connect($mysql_hostname, $mysql_user, $mysql_password) 
 	or die("oops something went wrong");
 	mysql_select_db($mysql_database);
 	mysql_query("INSERT INTO users VALUES ('$username', '$password','$college')");
 }
 
 function getUserGiftCards($username){
 	$url=parse_url(getenv("CLEARDB_DATABASE_URL"));
 	$mysql_hostname = $url["host"];
 	$mysql_user = $url["user"];
 	$mysql_password= $url["pass"];
 	$mysql_database= substr($url["path"],1); 
 	$connection= mysql_connect($mysql_hostname, $mysql_user, $mysql_password)
 	or die("oops something went wrong");
 	mysql_select_db($mysql_database);
 	$result = mysql_query("SELECT * FROM giftCards WHERE email='$username'");
 	return $result;
 }
 
 function getRestaurantInfo($store_id){
 	$url=parse_url(getenv("CLEARDB_DATABASE_URL"));
 	$mysql_hostname = $url["host"];
 	$mysql_user = $url["user"];
 	$mysql_password= $url["pass"];
 	$mysql_database= substr($url["path"],1); 
 	$connection= mysql_connect($mysql_hostname, $mysql_user, $mysql_password)
 	or die("oops something went wrong");
 	mysql_select_db($mysql_database);
 	$result = mysql_query("SELECT * FROM stores WHERE store_id = $store_id ");
 	return mysql_fetch_array($result);
 }
 
 function getStoresNearCollege($college){
 	$url=parse_url(getenv("CLEARDB_DATABASE_URL"));
 	$mysql_hostname = $url["host"];
 	$mysql_user = $url["user"];
 	$mysql_password= $url["pass"];
 	$mysql_database= substr($url["path"],1); 
 	$connection= mysql_connect($mysql_hostname, $mysql_user, $mysql_password)
 	or die("oops something went wrong");
 	mysql_select_db($mysql_database);
 	$result = mysql_query("SELECT * FROM collegeStores WHERE collegeName='$college'");
 	return $result;
 }
 
  function getColleges(){
 	$url=parse_url(getenv("CLEARDB_DATABASE_URL"));
 	$mysql_hostname = $url["host"];
 	$mysql_user = $url["user"];
 	$mysql_password= $url["pass"];
 	$mysql_database= substr($url["path"],1); 
 	$connection= mysql_connect($mysql_hostname, $mysql_user, $mysql_password)
 	or die("oops something went wrong");
 	mysql_select_db($mysql_database);
 	$result = mysql_query("SELECT DISTINCT collegeName FROM collegeStores");
 	return $result;
 }
 
   function getCollege($username){
 	$url=parse_url(getenv("CLEARDB_DATABASE_URL"));
 	$mysql_hostname = $url["host"];
 	$mysql_user = $url["user"];
 	$mysql_password= $url["pass"];
 	$mysql_database= substr($url["path"],1); 
 	$connection= mysql_connect($mysql_hostname, $mysql_user, $mysql_password)
 	or die("oops something went wrong");
 	mysql_select_db($mysql_database);
 	$result = mysql_query("SELECT * FROM users WHERE email='$username'");
 	return mysql_fetch_array($result);
 }
 
 
?>