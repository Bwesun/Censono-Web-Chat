<?php 
include('connect.php');
$id=$_GET['id'];

$sql="DELETE FROM profile_pictures WHERE id='$id' ";
$result=mysql_query($sql);

if($result){
	echo "<script>alert('Photo Deleted Successfully!')</script>";
	echo "<script>window.open('my_profile_pictures.php','_self')</script>";
}else{
	echo "<script>alert('Photo was not Deleted!')</script>";
	echo "<script>window.open('my_profile_pictures.php','_self')</script>";
}


?>