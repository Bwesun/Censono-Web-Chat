<head>
	<title>Update Profile</title>
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<script type="text/javascript" language="javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" language="javascript" src="jquery/jquery.min.js"></script>
	<script type="text/javascript" language="javascript" src="games/tooltip.js"></script>
	<script type="text/javascript" language="javascript" src="games/popover.js"></script>
	<script type="text/javascript" language="javascript" src="games/dropdown.js"></script>
	<script type="text/javascript" language="javascript" src="games/modal.js"></script>
</head>

<body>
<div id="myModal1" class="form-group">
	<div class="modal-dialog">
  <!-- Modal content -->
  <div class="modal-content">
  		<div class="modal-header">
				<a href="my_profile.php" class="close">&times;</a>
				<h4 class="modal-title" id="info">Update Profile</h4>
			</div>
		<div class="modal-body">
<?php
include('connect.php');



if(isset($_POST['sub'])){
	$user=$_POST['user_id'];

	$fname=$_POST['fname'];
	$phone=$_POST['phone'];
	$email=$_POST['email'];
	$dob=$_POST['dob'];
	$gender=$_POST['gender'];
	$ms=$_POST['ms'];
	$bio=$_POST['bio'];

	$sql2 = "UPDATE users SET fullname='$fname', email='$email',phone='$phone', ms='$ms', gender = '$gender', dob = '$dob', bio = '$bio' WHERE `users`.`user_id` = '$user' LIMIT 1;";
	$result2=mysql_query($sql2);
	//echo $sql2;

	if($result2){
		echo "<script>alert('Your Profile has been Updated Successfully!')</script>";
		echo "<script>window.open('my_profile.php','_self')</script>";
		
	}
	else{
		echo "<script>alert('Your Profile was not Updated. Please Try Again!')</script>";
			
	}
}

$user_id=$_GET['id'];
$sql="SELECT * FROM users WHERE user_id='$user_id'";
$result=mysql_query($sql);
$rows=mysql_fetch_assoc($result);


?>
		<form class="form-group" method="post">
				Full Name
				<input type="text" name="fname" class="form-control" value="<?php echo $rows['fullname']; ?>" required><br>
				Phone Number
				<input type="text" name="phone" class="form-control" value="<?php echo $rows['phone']; ?>" required><br>
				Email
				<input type="email" name="email" class="form-control" value="<?php echo $rows['email']; ?>" required><br>
				Date of Birth
				<input type="date" name="dob" class="form-control" value="<?php echo $rows['dob']; ?>" required><br>
				Gender
				<select name="gender" class="form-control" required>
					<option value="<?php echo $rows['gender']; ?>"><?php echo $rows['gender']; ?></option>
					<option value="male">Male</option>
					<option value="female">Female</option>
				</select><br>
				Marital Status
				<select name="ms" class="form-control">
					<option value="<?php echo $rows['ms']; ?>"><?php echo $rows['ms']; ?></option>
					<option value="single">Single</option>
					<option value="married">Married</option>
					<option value="In a Relationship">In a Relationship</option>
				</select><br>

				<textarea name="bio" class="form-control"><?php echo $rows['bio']; ?></textarea><br>
				<input type="hidden" name="user_id" value="<?php echo $rows['user_id']; ?>">
				Username (Note: You cannot change your username)
				<font class="form-control"><?php echo $rows['username']; ?></font>
					<div>
						<input type="submit" class="btn btn-info" name="sub" value="Update">  <a class="btn btn-danger"  href="my_profile.php">Cancel</a>
					</div>
				</form>
			</div>
    
  </div>
  </div>
</div> 

<script type="text/javascript">
			function goBack(){
				window.history.back();
			}
		</script>