<?php
$host="127.0.0.1";
$username="root";
$password="******";
$db_name="test";
$tbl_name="test_mysql";
@mysql_connect($host,$username,$password);
mysql_select_db($db_name);
$sql="UPDATE test_mysql SET test_mysql.name='$name',test_mysql.lastname='$lastname',test_mysql.email='$email' WHERE test_mysql.id='$id'";
$result=mysql_query($sql);
if($result){
echo "Successful";
echo "<br>";
}
else
{
echo "Error";
}
?>
