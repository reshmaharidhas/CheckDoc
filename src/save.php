<?php
session_start();
$user_name = "root";
	$pass_word = "******";
	$database = "login";
	$server = "127.0.0.1";

	$db_handle = mysql_connect($server, $user_name, $pass_word);
	$db_found = mysql_select_db($database, $db_handle);
$q1=$_POST['q1'];
mysql_query("INSERT INTO radio(q1) values ('$q1')");
mysql_close($db_handle);
?>
