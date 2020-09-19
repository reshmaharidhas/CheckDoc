<?php
function btn($radioname){
if(isset($_POST['status'])){
if(isset($_POST['radsubmit']))
{
$sq="UPDATE doctors SET doctors.avail=$radioname WHERE Docid=$db_field['Docid']";
$res=mysql_query($sq,$db_handle);
}
}
}
?>
