<?php
include('connect.php');

include('heading.php');
$id=$_GET['id'];

if(isset($_POST['submit'])){
	$date=date("d/m/y");
	$pic=$_POST['pic'];
		$filename=$_FILES['pic']['name'];
		move_uploaded_file($_FILES['pic']['tmp_name'], "images/".$_FILES['pic']['name']);

	$sql="UPDATE users SET pic='$filename'  WHERE user_id='$id' ";
	$result=mysql_query($sql);


	if($result){
		$sql2="INSERT INTO profile_pictures(pic, date, user_id)VALUES('$filename', '$date', '$id') ";
		$result2=mysql_query($sql2);

	echo "<script>alert('Profile Picture upload was Successful!')</script>";
	echo "<script>window.open('my_profile.php','_self')</script>";
	}
	else{
		echo "<script>alert('Error: Upload Unsuccessful!')</script>";
	echo "<script>window.open('my_profile.php','_self')</script>";
	}
}

?>
<title>Update Profile Picture</title>
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<style type="text/css">

</style>

<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<script type="text/javascript" language="javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" language="javascript" src="jquery/jquery.min.js"></script>

<div id="main-content" align="center" class="row">
	<div class="col-md-4"></div>
	<div align="center" class="col-md-4">
		
	<form enctype="multipart/form-data" class="form-group" method="post">

		<input type="file" name="pic" class="form-control"><br>
		<button type="submit" name="submit" value="Upload" class="btn btn-info"><span id="info" class="glyphicon glyphicon-upload"></span> Upload</button> <a class="btn btn-info" onclick="goBack()">Back</a>

	</form>

	</div>
</div>


<script type="text/javascript">
			function goBack(){
				window.history.back();
			}
		
</script>
