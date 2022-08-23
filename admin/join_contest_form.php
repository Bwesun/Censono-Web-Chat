<?php
include('head.php');

session_start();

if(!isset($_SESSION['user_id'])){
	header("location:../login.php");
}




?>
<style type="text/css">
	#form{
		width: 70%;
	}
</style>

<div class="container">
<h3>Contestant Form</h3>
	<div id="form">
		<form method="post" action="join_contest_form_ac.php" enctype="multipart/form-data" class="form-group" width="20">
			<input type="text" name="nickname" class="form-control responsive" placeholder="Enter Nickname"><br>
			<input type="number" name="age" class="form-control responsive" placeholder="Enter Age"><br>
			<input type="text" name="phone" placeholder="Enter Currently used Phone Number" class="form-control"><br>
			<select name="category" class="form-control" required>
				<option value="">----- Select Contest Category------</option>
				<option value="beautiful">
					Most Beautiful
				</option>
				<option value="handsome">
					Most Handsome
				</option>
			</select><br>
			<input type="file" name="pic" class="form-control"><br>
		<div align="center">
			<input type="submit" name="sub" value="Submit" class="btn btn-success">          <input type="reset" name="reset" value="Clear" class="btn btn-danger">
		</div>

		</form>
	</div>
	
</div>
<title>Join Contest Registration Form</title>