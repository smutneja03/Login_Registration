<?php
	// 1. Create a database connection
	$dbhost = "localhost"; 
	$dbname = "login_registration"; 
	$dbuser = "root"; 
	$dbpass = "root";
	//making connection to the mysql server 
	$connection = mysql_connect($dbhost, $dbuser, $dbpass) or die("Unable to connect to MySQL");
	//connecting to the database else returning error
	$dbhandle = mysql_select_db($dbname) or die("MySQL Error: " . mysql_error());
		
?>