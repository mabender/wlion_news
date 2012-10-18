<?php
	
	//$user = "798007_wlion";
	//$password = "Asnasna123";
	$host = "localhost";
	//$database = "mikeabender_zxq_wlion";
	$user = "root";
	$password = "asnasna";
	$database = "wlion_news";
	
	$link = mysql_connect( $host, $user, $password) or die( mysql_error() );
	mysql_select_db($database) or die ( mysql_error() );
?>