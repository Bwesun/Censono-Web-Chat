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
				<legend><i class="fas fa-bullhorn"></i> Notify User</legend>
				<div class="">
		<div class="input-group">
			<span class="input-group-addon"><span class="glyphicon glyphicon-search"></span></span>
			<input type="text" name="search_text" id="search_text" placeholder="Search by User Name" class="form-control">
		</div>
	</div>
	<br>
	<div class="row">
		<div id="result" class="col-md-12"></div>
	</div>
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
						<td>
							<div>
								<form class="form-group" method="POST"><br>
		<input type="hidden" name="to_user_id" value="<?php echo $rows['user_id'];  ?>">
		<input type="text" name="title" class="form-control" placeholder="Notification Title" required><br>
		<textarea placeholder="Enter Notification Body" class="form-control" name="notification" required></textarea><br>
		<input type="submit" name="sub" class="btn btn-info" value="Send">
	</form>
	

</div>
						</td>
					</tr>
<?php
}
?>
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
<script>
	$(document).ready(function(){
		$('#search_text').keyup(function(){
			var txt= $(this).val();
			if(txt !=''){
				$.ajax({
					url:"notify_fetch.php",
					method:"post",
					data:{search:txt},
					dataType:"text",
					success:function(data)
					{
						$('#result').html(data);
					}
				});
			}
			else
			{
				$('#result').html('');
			}
		});
	});

</script>








