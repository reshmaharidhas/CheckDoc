<?php
$host_name="127.0.0.1";
$user_name="root";
$password="******";
$database="login";
@mysql_connect($host_name,$user_name,$password);
mysql_select_db($database);
?>
<html>
<body>
<table>
<tr>
<th>ID</th>
<th>First Name</th>
<th>Last Name</th>
<th>Phone Number</th>
</tr>
<?php
$updatequery="UPDATE mytable SET FName='james',LName='martin',phone='8********1' WHERE ID='1'";
mysql_query($updatequery);
$query=mysql_query("select*from mytable");
while($row=mysql_fetch_array($query))
{
?>
<tr>
<td><?php echo $row['ID'];?></td>
<td><?php echo $row['FName'];?></td>
<td><?php echo $row['LName'];?></td>
<td><?php echo $row['phone'];?></td>
</tr>
<?php
}
?>
</table>
</body>
</html>
