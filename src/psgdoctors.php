<html>
<head>
<link href="site.css" rel="stylesheet">
</head>
<body bgcolor="#FF3366">
<nav id="nav02"></nav>
<?php
session_start();
$user_name="root";
$password="******";
$database="login";
$server="127.0.0.1";
$radioname="";
$db_handle=@mysql_connect($server,$user_name,$password);
$db_found=mysql_select_db($database,$db_handle);
echo "<B><CENTER>PSG HOSPITAL</CENTER></B>";
if($db_found)
{
$SQL="SELECT * FROM psgdoctors";
$result=mysql_query($SQL);
while($db_field=mysql_fetch_assoc($result)){
?>
<h1></h1>
<p><?php echo $db_field['Docid'];?></p>
<p><?php echo $db_field['DocName'];?></p>
<p><?php echo $db_field['DocDesignation'];?></p>
<form action="#" method="POST"><input type="radio" name="r" value="yes">Avail<input type="radio" name="r" value="no">N/A<input type="submit" name="radsubmit" value="Change"></form>
<?php
if(isset($_POST['radsubmit']))
{
$id=$db_field['Docid'];
$r=$_POST['r'];
$sq="UPDATE doctors SET avail='$r' WHERE Docid='$id'";
$res=mysql_query($sq,$db_handle);
}
}
mysql_close($db_handle);
}
else
{
print "DB NOT FOUND";
mysql_close($db_handle);
}
?>
<footer id="foot01"></footer>
<script src="script3.js"></script>
</body>
</html>
