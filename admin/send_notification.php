<?php
include('../connect.php');

session_start();



?>
<head>
	<title>Send Notification</title>
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	<style type="text/css">
		div{
			margin: 1% 0% 0% 0%;
			padding: 10px;
			border: 1px solid blue;
			border-radius: 5px;
		}
	</style>
</head>
<body>
<div>
	<?php

	if(isset($_POST['sub'])){

	$to_user_id=$_POST['to_user_id'];
	$notification=$_POST['notification'];
	$title=$_POST['title'];

	$sql2="INSERT INTO notifications(to_user_id, notification, from_who)VALUES('$to_user_id', '$notification', 'Admin') ";
	$result2=mysql_query($sql2);

	$is_new=1;
	$sql3="INSERT INTO all_notifications(to_user_id, notification, from_who, is_new, title)VALUES('$to_user_id', '$notification', 'Admin', '$is_new', '$title') ";
	$result3=mysql_query($sql3);

	if($result2){
		echo "<font color='green'><span><img src='../img/hex.png'></span>Notification Sent Successfully</font>";
	}
	else{
		echo "<font class='btn' color='red'><span><img src='../img/hex.png'></span>Notification Not sent</font>";
	}
	
}

	?>
	<form class="form-group" method="POST">><br>
		<input type="text" name="title" class="form-control" placeholder="Notification Title"><br>
		<textarea placeholder="Enter Notification Body" class="form-control" name="notification"></textarea><br>
		<input type="submit" name="sub" class="btn btn-info" value="Send"> <a href="../admin.php" class="btn btn-danger">Back</a>
	</form>
</div>
</body>
