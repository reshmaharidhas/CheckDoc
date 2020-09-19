<html>
<head>
<title>Basic Login Script</title>
<link href="site.css" rel="stylesheet">
</head>
<body>
<nav id="nav02"></nav>
<?php
session_start();
if (!(isset($_SESSION['login']) && $_SESSION['login'] != '')) {
	header ("Location: login3.php");
}
$user_name="root";
$password="******";
$database="login";
$server="127.0.0.1";
$db_handle=@mysql_connect($server,$user_name,$password);
$db_found=mysql_select_db($database,$db_handle);
echo "<B><CENTER>KG HOSPITAL</CENTER></B>";
if($db_found)
{
$SQL="SELECT*FROM doctors";
$result=mysql_query($SQL);
while($db_field=mysql_fetch_assoc($result)){
print "<h1></h1>";
print $db_field['DocName']."<br>";
print $db_field['DocDesignation']."<br>";
print $db_field['DocSpecialization']."<br>";
}
mysql_close($db_handle);
}
else
{
print "DB NOT FOUND";
mysql_close($db_handle);
}
?>
<P><A HREF = page2.php>Log out</A>
<footer id="foot01"></footer>
<script src="script2.js"></script>
</body>
</html>
