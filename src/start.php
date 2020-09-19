<?php
$uname = "";
$errorMessage = "";
function quote_smart($value, $handle) {
   if (get_magic_quotes_gpc()) {
       $value = stripslashes($value);
   }
   if (!is_numeric($value)) {
       $value = "'" . mysql_real_escape_string($value, $handle) . "'";
   }
   return $value;
}
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
	$uname = $_POST['username'];
	$uname = htmlspecialchars($uname);
	$user_name = "root";
	$pass_word = "******";
	$database = "login";
	$server = "127.0.0.1";
	$db_handle =@mysql_connect($server, $user_name, $pass_word);
	$db_found = mysql_select_db($database, $db_handle);	
}
?>
<html>
<head>
<title>CHECKDOC</title>
<link href="site.css" rel="stylesheet">
</head>
<body>
<nav id="nav01"></nav>
<div id="main">
<div id="name">
<img src="icon.png" height="100" width="100">
CHECKDOC
</div>
<center>
<p id="start">
<img src="hospital.jpg" align="left"><br>
<a href="home.php">KG HOSPITAL</a><br>
<a href="loginkmch.php">KMCH HOSPITAL</a><br>
<a href="loginpsg.php">PSG HOSPITAL</a><br>
<a href="logineye.php">EYE FOUNDATION</a><br>
<a href="loginrex.php">REX HOSPITAL</a><br>
<a href="loginkuppuswamynaidu.php">KUPPUSWAMY NAIDU HOSPITAL</a><br>
<a href="loginkalpana.php">KALPANA HOSPITAL</a><br>
<a href="loginlavanya.php">LAVANYA HOSPITAL</a><br>
<a href="loginvenugopal.php">VENUGOPAL HOSPITAL</a><br>
<a href="loginkurinji.php">KURINJI HOSPITAL</a><br>
<a href="loginganga.php">GANGA HOSPITAL</a><br>
<a href="loginsriramakrishna.php">SRI RAMAKRISHNA HOSPITAL</a><br>
</p></center><br>
<footer id="foot01"></footer>
</div>
<script src="script6.js"></script>
</body>
</html>
