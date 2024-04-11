<?php
include("connection.php");
if(isset($_REQUEST['id']))
{
$a=$_REQUEST['id'];
mysql_query("delete from allocation where allid='$a'");
}
header("location:allocation.php");
?>