<?php
//Logout
include('connect.php');

session_start();

$login_details_id=$_SESSION['login_details_id'];

$current_timestamp=strtotime(date('Y-m-d H:i:s') .'-10 second');
$current=date('Y-m-d H:i:s' , $current_timestamp);



$sql="UPDATE login_details SET last_activity='$current'  WHERE login_details_id='$login_details_id' ";
$result=mysql_query($sql);

echo "<script>window.open('real_log.php','_self')</script>";



?>