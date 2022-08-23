<?php
$connect=mysqli_connect("localhost", "root", "", "tab");

session_start();
$id=$_SESSION['user_id'];

$output='';
$sql="SELECT * FROM users WHERE user_id !='$id' AND username LIKE '%".$_POST['search']."%' ";
$result=mysqli_query($connect, $sql);

if(mysqli_num_rows($result)>0)
{
	
	$output .= '<div class="table">
					<table class="table tableresponsive">
						<tr>
						</tr>
	';
	while($rows=mysqli_fetch_array($result))
	{
		$output .= '
			<tr>
				<td><a href="view_profile.php?id='.$rows['user_id'].'" title="View Profile">'.$rows["fullname"].'</a></td>
				<td><a class="btn btn-info btn-xs" href="chat.php?id='.$rows["user_id"].'" title="View Profile">Start Chat</a>   <a class="btn btn-xs btn-success" href="view_profile.php?id='.$rows["user_id"].'">View Profile</td></a>
				</td>
				</tr>
		';
	}
	echo $output;
}
else
{
	echo 'Data Not Found';
}

?>