<html>
<body>
<?php
if(isset($_POST['add']))
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
$tutorial_title=$_POST['tutorial_title'];
$tutorial_author=$_POST['tutorial_author'];
$submission_date=$_POST['submission_date'];
$sql="INSERT into tutorials_tbl"."(tutorials_title,tutorials_author,submission_date)"."VALUES"."('$tutorial_title','$tutorial_author','$submission_date')";
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
<form method="POST" action="<?php $_PHP_SELF ?>">
<table width="600">
<tr>
<td><input type="text" name="tutorial_title" id="tutorial_title"></td>
</tr>
<tr>
<td><input type="text" name="tutorial_author" id="tutorial_author"></td>
</tr>
<tr>
<td><input type="text" name="submission_date" id="submission_date"></td>
</tr>
<tr>
<td width="250"></td>
</tr>
<tr>
<td width="250"></td>
<td><input type="submit" name="add" id="add" value="add tutorial"></td>
</tr>
</table>
</form>
</body>
</html>
