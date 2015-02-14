<?php 
	$hostname = "hostname";
	$username = "username";
	$password = "pass";
	$database = "database";

	$con = mysql_connect($hostname, $username, $password);
	mysql_select_db($database, $con) or 
		die ("Não for possível conectar ao banco");

	mysql_query("SET NAMES 'utf8'", $con);	
?>
