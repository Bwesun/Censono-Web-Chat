<?php
//login
include('connect.php');

session_start();

if(isset($_SESSION['admin_id'])){
	header("location:admin/index.php");
}


?>


<!DOCTYPE html>
<html>
<head>
<style type="text/css">
	ody{
		margin: 0% 15% 0% 15%;
	}
	
	form-group{
		border: 3px solid orange;
		padding: 10px;
		display: block;
		border-radius: 10px;
		position: absolute;
		
	}
	input{
		border:0px;
		outline: none;
	}
	
</style>
<link rel="stylesheet" type="text/css" href="bootstrap.css">
<link rel="stylesheet" type="text/css" href="fontawesome/css/all.css">
	<link rel="stylesheet" type="text/css" href="bootstrap.min.css">
	<script type="text/javascript" language="javascript" src="jquery/jquery.min.js"></script>
	<script type="text/javascript" language="javascript" src="js/bootstrap.min.js"></script>
	<title>User Login</title>
</head>
<body>
	<div align="center" class="col-md-12">
<form method="post">
					<div class="form-group">
					<table>
						<tr>
							<td colspan="2" align="center"><img src="log.jpg" width="300"><br>
								<h1><i class="fas fa-cogs"></i></h1>
								<h3> Admin Control Panel</h3></td>
						</tr>
						<tr>
							<td><span class="glyphicon glyphicon-user"></span></td>
							<td  align="center"><input type="text" name="username" placeholder="Enter username" class="form-control" required ><br></td>
						</tr>
						<tr>
							<td><span class="glyphicon glyphicon-lock"></span></td>
							<td  align="center"><input type="password" name="password" placeholder="Enter Password" class="form-control" required /><br></td>
						</tr>
						<tr>
							<td colspan="2" align="center"><button type="submit" align="center" name="sub_login" class="btn btn-info"><span class="glyphicon glyphicon-log-in"></span>    Login</button></td>
						</tr>
					</table>
					</div>
				</form>

</div>


</body>
</html>

<?php
if(isset($_POST['sub_login'])){
include('connect.php');
	
	session_start();

	$username=$_POST['username'];
	$password=$_POST['password'];

	$sql="SELECT * FROM admin WHERE username='$username' AND password='$password'";
	$result=mysql_query($sql);

	
	$count=mysql_num_rows($result);

	if($count==1){
		$row=mysql_fetch_assoc($result);

		$_SESSION['admin_id']=$row['id'];
 		$_SESSION['username']=$row['username'];
 		$_SESSION['password']=$row['password'];

 		echo "<script>window.open('admin/index.php','_self')</script>";
	}
	else
	{
		echo "<script>alert('Incorrect username or Password')</script>";
		echo "<script>window.open('admin.php','_self')</script>";
	}

}
?>