<?php
$uname = "";
$pword = "";
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
	$pword = $_POST['password'];

	$uname = htmlspecialchars($uname);
	$pword = htmlspecialchars($pword);

	$user_name = "root";
	$pass_word = "******";
	$database = "login";
	$server = "127.0.0.1";

	$db_handle =@mysql_connect($server, $user_name, $pass_word);
	$db_found = mysql_select_db($database, $db_handle);

	if ($db_found) {

		$uname = quote_smart($uname, $db_handle);
		$pword = quote_smart($pword, $db_handle);

		$SQL = "SELECT * FROM login WHERE L1 =$uname AND L2 =$pword";
		$result = mysql_query($SQL);
		$num_rows = mysql_num_rows($result);
		if ($result) {
			if ($num_rows > 0) {
				if($uname="kghospitalcbe"&&$pword="coimbatore"){
				session_start();
				$_SESSION['login'] = "1";
				header ("Location: aa.php");}
else
				if($uname="psghospitalcbe"&&$pword="psgcbe"){
				session_start();
				$_SESSION['login'] = "1";
				header("Location:page1.php");}
			}
			else {
				session_start();
				$_SESSION['login'] = "";
				echo $errorMessage = "Error logging on";
			}	
		}
		else {
			$errorMessage = "Error logging on";
		}

	mysql_close($db_handle);

	}

	else {
		$errorMessage = "Error logging on";
	}

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
<img src="icon.png">
CHECKDOC
</div>
<h3>
<FORM id="login" NAME ="form1" METHOD ="POST" ACTION ="home.php" align="center">
Username<INPUT TYPE = 'TEXT' Name ='username'  value="<?php print $uname;?>" maxlength="20"><br>
Password<INPUT TYPE = 'PASSWORD' Name ='password'  value="<?php print $pword;?>" maxlength="16"><br>
<P align = center>
<INPUT TYPE = "Submit" Name = "Submit1"  VALUE = "Login">
</P></h3>

</FORM>

<footer id="foot01"></footer>
</div>
<script src="script.js"></script>
</body>
</html>
