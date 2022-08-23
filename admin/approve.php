<?php
include('../connect.php');

$id=$_GET['id'];

$sql2="SELECT * FROM contestants WHERE user_id=$id ";
$result2=mysql_query($sql2);
$rows=mysql_fetch_assoc($result2);
$check=$rows['approved'];

if($check==1){
	echo "<script>alert('Alert: ".$rows['nickname']." Have already been Approved!')</script> ";
	echo "<script>window.open('approve_contest.php','_self')</script>";
}
else{
	$sql="UPDATE contestants SET approved='1' WHERE user_id='$id' ";
	$result=mysql_query($sql);

	if($result){
		echo "<script>alert('Alert: ".$rows['nickname']." is now Approved!')</script> ";
		echo "<script>window.open('approve_contest.php','_self')</script>";
	}
	else{
		echo "<script>alert('Approval Unsuccessful!')</script> ";
		echo "<script>window.open('approve_contest.php','_self')</script>";
	}
}

?>
<title>Approve Contest Success Report</title>