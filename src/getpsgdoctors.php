<?php
$database="login";
$con=@mysql_connect("127.0.0.1","root","******");
$dbfound=mysql_select_db($database,$con);
$sql="SELECT DocName,DocDesignation,DocSpecialization,DocExp,avail FROM psgdoctors";
$result=mysql_query($sql);
while($e=mysql_fetch_assoc($result))
{
$output[]=$e;
}
print(json_encode($output));
mysql_close($con);
?>
