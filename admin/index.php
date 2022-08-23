<?php
include('connect.php');

session_start();

if(!isset($_SESSION['admin_id']))
{
	header("location:../admin.php");
}


include('head.php');

?>
<body>
	<style type="text/css">
		.panel-heading{
		}
	</style>


		<fieldset>
				<legend><i class="fas fa-users"></i> Users</legend>
				<div  style="background-color: white;">
				<table class="table table-striped table-condensed">
					<tr>
						<th>S/N</th>
						<th>Name</th>
						<th>Username</th>
						<th>Email</th>
						<th>Phone Number</th>
						<th>Profile Picture</th>
						<th></th>
					</tr>
<?php
$sql="SELECT * FROM users";
$result=mysql_query($sql);
$count=mysql_num_rows($result);
$i=1;
while($rows=mysql_fetch_assoc($result)){

?>
					<tr>
						<td><?php echo $i++; ?></td>
						<td><?php echo $rows['fullname']; ?></td>
						<td><?php echo $rows['username']; ?></td>
						<td><?php echo $rows['email']; ?></td>
						<td><?php echo $rows['phone']; ?></td>
						<td><img src="../images/<?php echo $rows['pic']; ?>" width="100"></td>
						<form method="post">
						<td><a href="view_profile.php?id=<?php echo $rows['user_id'];  ?>" class="btn btn-success"> <span class="glyphicon glyphicon-open"></span>  View Profile</a> 
							
								<input type="hidden" name="user_id" value="<?php echo $rows['user_id'] ;?>">
								<button role="submit" type="submit" name="sub_del" class="btn btn-danger">  <span class="glyphicon glyphicon-trash"></span>  Delete User</button>
							</form>
						</td>
					</tr>
<?php
}
?>
<?php
if(isset($_POST['sub_del'])){
	$user_id=$_POST['user_id'];

	$sql="DELETE FROM users WHERE user_id='$user_id' ";
	$result=mysql_query($sql);

	if($result){
		echo "<script>alert('User Deleted Successful!')</script>";
		echo "<script>window.open('index.php', '_self')</script>";
	}else{
		echo "<script>alert('ERROR: User Not Deleted!')</script>";
		echo "<script>window.open('index.php', '_self')</script>";
	}
}

?>
<tr>
	<td colspan="4"><h2><strong>Total No. of Users: <?php echo $count; ?></strong></h2></td>
</tr>
				</table>

</div>
			</fieldset>


		

</body>

		



<?php

include('foot.php');

?>









