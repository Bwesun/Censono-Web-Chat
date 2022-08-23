<?php
$connect=mysqli_connect("localhost", "root", "", "tab");

session_start();

$output='';
$sql="SELECT * FROM users WHERE username LIKE '%".$_POST['search']."%' ";
$result=mysqli_query($connect, $sql);

if(mysqli_num_rows($result)>0)
{

while($rows=mysqli_fetch_assoc($result)){

?>
<table class="table table-striped">
					<tr>
						<td><?php echo $rows['fullname']; ?></td>
						<td><?php echo $rows['username']; ?></td>
						<td><?php echo $rows['email']; ?></td>
						<td><?php echo $rows['phone']; ?></td>
						<form class="form-group" method="POST">
							<input type="hidden" name="to_user_id" value="<?php echo $rows['user_id'];  ?>">
						<td><input type="text" name="title" class="form-control" placeholder="Notification Title" required</td>
						<td><textarea placeholder="Enter Notification Body" class="form-control" name="notification" required></textarea></td>
						<td><input type="submit" name="sub" class="btn btn-info btn-sm" value="Send"> </td>
						<td>
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
						</td>
	</form>
					</tr>

<?php
}

?>

</table>
<?php 
}

else
{
	echo 'Data Not Found';
}

?>

