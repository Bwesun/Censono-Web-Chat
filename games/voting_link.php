<?php
//voting link
$connect=mysqli_connect("localhost", "root", "", "tab");

$user_id=$_GET['id'];

		$sql3="SELECT * FROM contestants WHERE user_id='$user_id' ";
		$result3=mysqli_query($connect, $sql3);
		$rows=mysqli_fetch_assoc($result3);
		$vote=$rows['no_of_vote'];
		//echo $sql3."<br>";

		//echo " number of votes ".$vote."<br>";

		$new_vote_no=$vote+1;
		//echo $sql3;

		//echo " initial no: ".$vote."<br>";

		//echo  " new no: ".$new_vote_no."<br>";
		$sql4="UPDATE contestants SET no_of_vote=$new_vote_no WHERE user_id='$user_id' ";
		$result4=mysqli_query($connect, $sql4);

		//echo $sql4;

		echo "<script>alert('You have successfully casted your vote!')</script>";
		echo "<script>window.open('../index.php','_self')</script>";



?>
<title>External Voter</title>