<?php
include('connect.php');
	
	session_start();

	$user_id=$_POST['user_id'];
	$password=$_POST['password'];

	$sql="SELECT * FROM users WHERE email='$user_id' AND password='$password'";
	$result=mysql_query($sql);

	$row=mysql_fetch_assoc($result);
	$count=mysql_num_rows($result);

	if($count==1){
		$activity_update=date("y-m-d h:i:s");
		
		$use_id=$row['user_id'];

		$query="UPDATE login_details SET last_activity='$activity_update', login_time='$activity_update' WHERE user_id='$use_id' AND last_activity='' ";
		$result=mysql_query($query);

		$_SESSION['user_id']=$row['user_id'];
 		$_SESSION['email']=$row['email'];
 		$_SESSION['username']=$row['username'];
 		$_SESSION['pic']=$row['pic'];
 		$_SESSION['password']=$row['password'];

 		

 				$sub_query="INSERT INTO login_details(user_id, username, login_time)VALUES('".$row['user_id']."', '".$row['username']."', '$activity_update')";
 				$ssub_query=mysql_query($sub_query);

 				$query2="SELECT * FROM login_details WHERE user_id = '$use_id' ORDER BY login_details_id DESC";
				$squery2=mysql_query($query2);
				$rows=mysql_fetch_assoc($squery2);

 				$_SESSION['login_details_id']=$rows['login_details_id'];

 		header("location:index.php");
	}
	else
	{
		echo "<script>alert('Incorrect username or Password')</script>";
		echo "<script>window.open('login.php','_self')</script>";
	}


?>