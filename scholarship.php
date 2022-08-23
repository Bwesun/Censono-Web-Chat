<head>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<style type="text/css">
		.col-md-4{
			-webkit-box-shadow: 0px 0px 52px 0px rgba(0,0,0,0.55);
-moz-box-shadow: 0px 0px 52px 0px rgba(0,0,0,0.55);
box-shadow: 0px 0px 52px 0px rgba(0,0,0,0.55);
border-radius: 10px;
		}
		input:hover{
			box-shadow: 0px 0px 52px 0px rgba(0,0,0,0.2);
		}
	</style>
</head>

<body>
<div class="col-md-3"></div>
<div class="col-md-4">
	<fieldset>
		<legend>Moskewitz Scholarship Scheme</legend>
		Fill the Details Below Correctly (Note: Every Field is important)
	<form method="post" class="form-group">
<input type="text" class="form-control" name="name" placeholder="Enter Fullname (Surname First)"><br>
<input type="radio" name="gender" value="Male">Male  <input type="radio" name="gender" value="Female"> Female<br>
<input type="date" name="dob" class="form-control"><br>
<input type="text" class="form-control" name="regnum" placeholder="Enter Institute's Registration Number"><br>
<input type="text" class="form-control" name="phone" placeholder="Enter Phone Number"><br>
<input type="email" class="form-control" name="email" placeholder="Enter Active Email"><br>
Residential Address (including state)
<textarea name="address" class="form-control" placeholder="">
	
</textarea><br>
<input type="text" class="form-control" name="course" placeholder="course of Study"><br>
<input type="text" class="form-control" name="school" placeholder="Enter Institution"><br>
<input type="text" class="form-control" name="Referal ID" placeholder="Referal ID"><br>

<div>
	<input type="submit" name="sub" value="Submit" class="btn btn-success"> <input type="reset" value="Reset" class="btn btn-warning"> <a href="http://www.whogohost.com" class="btn btn-info">Cancel</a>
</div>
</form></fieldset>
</div>


</body>

<?php
if(isset($_POST['sub'])){
	$name=$_POST['name'];
	$gender=$_POST['gender'];
	$dob=$_POST['dob'];
	$regnum=$_POST['regnum'];
	$phone=$_POST['phone'];
	$email=$_POST['email'];
	$address=$_POST['address'];
	$course=$_POST['course'];
	$school=$_POST['school'];
	$ref=$_POST['ref'];

	$date=date("d/m/y");


// the message
$msg = "Name: '$name' \n gender: '$gender' \n dob: '$dob' \n regnum: '$regnum' \n phone: '$phone' \n Email: '.$email.' \n address: '.$address.' \n course: '$course' \n school: '$school' \n ref: '$ref' \n date of App: '$date' \n Name: 'OK. Thumbs Up'";

// use wordwrap() if lines are longer than 70 characters
//$msg = wordwrap($msg,70);

// send email
mail("maturinnocent@gmail.com","New Incoming Request",$msg);

echo "<script>alert('Your Scholarship Request has been submitted Successfully with the Email: (".$email.") and Name is: (".$Name."). We will Get back to you if u have been offered the scholarship. Thank you! Warmest Regards!')</script>";


echo "<script>window.open('login.php','_self')</script>";
}
?>