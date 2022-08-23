<?php
include('../connect.php');

session_start();

$user_id=$_SESSION['user_id'];
$nickname=$_POST['nickname'];
$pic=$_POST['pic'];
		$filename=$_FILES['pic']['name'];
		move_uploaded_file($_FILES['pic']['tmp_name'], "images/".$_FILES['pic']['name']);	
$age=$_POST['age'];
$no_of_vote=1;
$phone=$_POST['phone'];
$category=$_POST['category'];
$approved=1;

$sql4="SELECT * FROM contestants WHERE user_id='$user_id' and category='$category' ";
$result4=mysql_query($sql4);

if(mysql_num_rows($result4)>0){
	echo "<script>alert('Sorry ".$_SESSION['username']."! You cannot contest twice at the same time!')</script> ";
	echo "<script>window.open('index.php','_self')</script>";
}
else{


	$sql="INSERT INTO contestants(user_id, nickname, pic, age, no_of_vote, phone, category, approved)VALUES('$user_id', '$nickname', '$filename', '$age', '$no_of_vote', '$phone', '$category', '$approved')  ";
	$result=mysql_query($sql);

		$to_user_id=$user_id;
		$notification='Dear Censono User, your contest application form has been submitted! Please kindly wait for your verification Notification';
		$title='Contest Registration Success!';

		$sql2="INSERT INTO notifications(to_user_id, notification, from_who)VALUES('$to_user_id', '$notification', 'Censono Games') ";
		$result2=mysql_query($sql2);

		$is_new=1;
		$sql3="INSERT INTO all_notifications(to_user_id, notification, from_who, is_new, title)VALUES('$to_user_id', '$notification', 'Censono Games', '$is_new', '$title') ";
		$result3=mysql_query($sql3);

	//echo $sql;

	if($result){
		echo "<script>alert('You have been added to the Contestants List! Your Unique ID is: ".$user_id."    Wait for the information you gave to be confirmed!')</script> <br>";
		echo "Your Voting Link is: <font color='blue'>https://www.censono.com.ng/games/voting_link.php?id=".$user_id." </font><br>Copy the link and use it to get more votes from other social media platforms. <br> To learn how to use it, <a href='#'>Click Here</a><br> <a href='most_beautiful.php'>Go Back</a> ";
	}
	else{
		echo "<script>alert('Your Action was not completed, please check the details you gave, and try again!')</script>";
		echo "<script>window.open('join_contest_form.php','_self')</script>";
	}
}

?>
<title>Join Contest</title>
<body style="padding:20px; border:2px solid blue; border-radius: 10px;">
	
</body>