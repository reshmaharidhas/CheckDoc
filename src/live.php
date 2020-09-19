<html>
<head>
<title>
Change Status
</title>
<link href="site.css" rel="stylesheet">
</head>
<body>
<nav id="nav02"></nav>
<?php
$docid= "";
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
	$docid= $_POST['docid'];

	$docid= htmlspecialchars($docid);

	$user_name = "root";
	$pass_word = "******";
	$database = "login";
	$server = "127.0.0.1";

	$db_handle =@mysql_connect($server, $user_name, $pass_word);
	$db_found = mysql_select_db($database, $db_handle);
	if ($db_found) {

		$SQL = "SELECT*FROM doctors WHERE Docid=$docid";
		$result = mysql_query($SQL,$db_handle);
		if($row=mysql_fetch_array($result,MYSQL_ASSOC))
		{
		echo "Doctor name:{$row['DocName']}<br>"."Designation:{$row['DocDesignation']}<br>";
		}

	mysql_close($db_handle);

	}

	else {
		$errorMessage = "Error logging on";
	}
}
?>
<center>
<div id="main">
<form id="view" action="live.php" method="POST">
<input type="text" name="docid" value="<?php print $docid;?>">
<INPUT TYPE = "Submit" Name = "view"  VALUE = "View">
</form>
</div>
</center>
<footer id="foot01"></footer>
<script src="script2.js"></script>
</body>
</html>
