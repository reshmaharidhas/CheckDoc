<?PHP
$uname = "";
$pword = "";
$errorMessage = "";
$num_rows = 0;

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

	$uLength = strlen($uname);
	$pLength = strlen($pword);

	if ($uLength >= 10 && $uLength <= 20) {
		$errorMessage = "";
	}
	else {
		$errorMessage = $errorMessage . "Username must be between 10 and 20 characters" . "<BR>";
	}

	if ($pLength >= 8 && $pLength <= 16) {
		$errorMessage = "";
	}
	else {
		$errorMessage = $errorMessage . "Password must be between 8 and 16 characters" . "<BR>";
	}

	
	if ($errorMessage == "") {

	$user_name="root";
	$pass_word = "******";
	$database = "login";
	$server = "127.0.0.1";

	$db_handle = mysql_connect($server, $user_name, $pass_word);
	$db_found = mysql_select_db($database, $db_handle);

	if ($db_found) {

		$uname = quote_smart($uname, $db_handle);
		$pword = quote_smart($pword, $db_handle);

	
		$SQL = "SELECT * FROM login WHERE L1 =$uname";
		$result = mysql_query($SQL);
		$num_rows = mysql_num_rows($result);

		if ($num_rows > 0) {
			$errorMessage = "Username already taken";
		}
		
		else {

			$SQL = "INSERT INTO login (L1,L2) VALUES ($uname,$pword)";

			$result = mysql_query($SQL);

			mysql_close($db_handle);


			session_start();
			$_SESSION['login'] = "1";

			header ("Location: page1.php");

		}

	}
	else {
		$errorMessage = "Database Not Found";
	}




	}

}


?>

	<html>
	<head>
	<title>Basic Login Script</title>


	</head>
	<body>


<FORM NAME ="form1" METHOD ="POST" ACTION ="signup.php">

Username: <INPUT TYPE = 'TEXT' Name ='username'  value="<?PHP print $uname;?>" maxlength="20">
Password: <INPUT TYPE = 'TEXT' Name ='password'  value="<?PHP print $pword;?>" maxlength="16">

<P>
<INPUT TYPE = "Submit" Name = "Submit1"  VALUE = "Register">


</FORM>
<P>

<?PHP print $errorMessage;?>

</body>
</html>
