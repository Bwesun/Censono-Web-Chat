<?php
include('connect.php');

session_start();

$user_id=$_SESSION['user_id'];

$id=$_GET['id'];
//echo "id is: ".$id."<br>";
$sql2="SELECT * FROM profile_pictures WHERE id='$id' ";
$result2=mysql_query($sql2);

$row=mysql_fetch_assoc($result2);
//echo "New pic is:".$row['pic'];
$new_pic=$row['pic'];
//echo "<br>New pic is: ".$new_pic."<br>";

$sql="UPDATE users SET pic='$new_pic' WHERE user_id='$user_id' ";
$result=mysql_query($sql);
//echo "user id ".$user_id;
if($result){
	echo "<script>alert('Profile Picture updated Successfully!')</script>";
	echo "<script>window.open('my_profile.php','_self')</script>";
}else{
	echo "<script>alert('Error: Profile Picture updated unsuccessfully!')</script>";
	echo "<script>window.open('my_profile.php','_self')</script>";
}



?>