<?php
//login
include('connect.php');

session_start();


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
	<link rel="stylesheet" type="text/css" href="bootstrap.min.css">
	<script type="text/javascript" language="javascript" src="jquery/jquery.min.js"></script>
	<script type="text/javascript" language="javascript" src="js/bootstrap.min.js"></script>
	<title>User Login</title>
</head>
<body>
	<div align="center" class="col-md-12">
<form method="post" action="login_ac.php">
					<div class="form-group">
					<table>
						<tr>
							<td colspan="2" align="center"><img src="log.jpg" width="300"></td>
						</tr>
						<tr>
							<td><span class="glyphicon glyphicon-user"></span></td>
							<td  align="center"><input type="text" name="user_id" placeholder="Enter Email" class="form-control" required ><br></td>
						</tr>
						<tr>
							<td><span class="glyphicon glyphicon-lock"></span></td>
							<td  align="center"><input type="password" name="password" placeholder="Enter Password" class="form-control" required /><br></td>
						</tr>
						<tr>
							<td colspan="2" align="center"><button type="submit" align="center" name="login" class="btn btn-info"><span class="glyphicon glyphicon-log-in"></span>    Login</button><br><br>Don't have an Account?  <a href="register.php" class="">Sign Up</a> Here</td>
						</tr>
					</table>
					</div>
				</form>

</div>


</body>
</html>