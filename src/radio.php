html>
<?php
if(isset($_POST['submit']))
{
$dbuser="root";
$dbpass="******";
$database="login";
$dbhost="127.0.0.1";
$conn=@mysql_connect($dbhost,$dbuser,$dbpass);
$db_found = mysql_select_db($database, $conn);
if(!$db_found)
{
die('Could not connect'.mysql_error());
}
else{
$q1=$_POST['q1'];
$sql="INSERT into radio"."(q1)"."VALUES"."('$q1')";
$result=mysql_query($sql,$conn);
if(!$result)
{
die('Could not enter data'.mysql_error());
}
echo "Entered data";
mysql_close($conn);
}
}
?>
<body>
<form method="POST" action="<?php $_PHP_SELF ?>">
<input type="radio" name="q1" value="1">1<br>
<input type="radio" name="q1" value="2">2<br>
<input type="radio" name="q1" value="3">3<br>
<input type="submit" name="submit" id="check" value="CHECK">
</form>
</body>
</html>
