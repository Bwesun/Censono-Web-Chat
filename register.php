<head>
	<title>Sign Up</title>
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<script type="text/javascript" language="javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" language="javascript" src="jquery/jquery.min.js"></script>
	<script type="text/javascript" language="javascript" src="games/tooltip.js"></script>
	<script type="text/javascript" language="javascript" src="games/popover.js"></script>
	<script type="text/javascript" language="javascript" src="games/dropdown.js"></script>
	<script type="text/javascript" language="javascript" src="games/modal.js"></script>
</head>

<body>
<div id="myModal" class="form-group">
	<div class="modal-dialog">
  <!-- Modal content -->
  <div class="modal-content">
  		<div class="modal-header">
				<a href="login.php" class="close">&times;</a>
				<h4 class="modal-title" id="info">Sign Up</h4>
			</div>
		<div class="modal-body">
		<?php
		include('connect.php');
		if(isset($_POST['sub'])){

			$fname=$_POST['fname'];//Full name
			$phone=$_POST['phone'];
			$email=$_POST['email'];
			$dob=$_POST['dob'];//Date of Birth
			$gender=$_POST['gender'];
			$ms=$_POST['ms'];//Marital Status
			$user=$_POST['user'];//Username
			$pass=$_POST['pass'];//password

			$sql=" SELECT * FROM users WHERE username='$user' ";
			$result=mysql_query($sql);

			if($email==''){
				echo "<script>alert('You did not enter your Email! Please Enter your email!')</script>";
				echo "<script>window.open('register.php','_self')</script>";
			}

			$count=mysql_num_rows($result);

			if($count>0){
				echo "<script>alert('The Username ".$user." has already been taken! Try another Username')</script>";
				echo "<script>window.open('register.php','_self')</script>";
			}
			else{
				$sql2=" SELECT * FROM users WHERE email='$email' ";
				$result2=mysql_query($sql2);

				$count2=mysql_num_rows($result2);
				if($count>0){
					echo "<script>alert('The Email ".$email." has already been taken! Use another Email')</script>";
					echo "<script>window.open('register.php','_self')</script>";
				}
				else{
					$sql3="INSERT INTO users(email, fullname, phone, username, password, gender, ms, dob)VALUES('$email', '$fname', '$phone', '$user', '$pass', '$gender', '$ms', '$dob')";
					$result3=mysql_query($sql3);

					if($result3){
						echo "<script>alert('Sign Up Successful! Your Username is your Email: (".$email.") and password is: (".$pass.") You can now login')</script>";
						echo "<script>window.open('login.php','_self')</script>";
					}
					else{
						echo "<script>alert('Error: Sign Up failed due to an error. Please Try again!')</script>";
					}
				}
			}


		}

////correct or check about the date of birth




		?>
				<p>Please fill the spaces below to Register and start using the Platform </p>
				<form class="form-group" method="post">
				<input type="text" name="fname" class="form-control" placeholder="Enter Fullname  " required><br>
				<input type="text" name="phone" class="form-control" placeholder="Enter Phone Number  " required><br>
				<input type="email" name="email" class="form-control" placeholder="Enter Email  " required><br>
				<input type="date" name="dob" class="form-control" placeholder="Enter Date of Birth  " ><br>
				<select name="gender" class="form-control" required>
					<option value="">-----Select Gender-----</option>
					<option value="male">Male</option>
					<option value="female">Female</option>
				</select><br>
				<select name="ms" class="form-control">
					<option value="">-----Select Marital Status-----</option>
					<option value="single">Single</option>
					<option value="married">Married</option>
				</select><br>

				<input type="text" name="user" class="form-control" placeholder="Choose Username" required><br>
				<input type="text" name="pass" class="form-control" placeholder="Choose Password (Not less than 6 characters)" required><br>
					<div>
						<input type="submit" class="btn btn-info" name="sub" value="Submit">  <input type="reset" value="Clear" name="" class="btn btn-success">  <a class="btn btn-danger" href="login.php">Cancel</a>
					</div>
				</form>
			</div>
    
  </div>
  </div>
</div> 

</body>