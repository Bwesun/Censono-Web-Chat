<?php
//index.php
include('connect.php');



session_start();

if(!isset($_SESSION['admin_id']))
{
	header("location:../admin.php");
}

$auser_id=$_GET['id'];

		include('head.php');

		?>
<style type="text/css">
	.prof{
		width: 100%;
	}
	#info{
		padding-left: 10px;
	}
	table tr th{
		border-bottom: 3px solid #CCC;
		border-right: 1px solid #FFFFFF;
	}
	table tr td{
		border-bottom: 1px solid #FFFFFF;
	}
	#td{
		border-bottom: 1px solid #ccc;
	}
	#input{
		padding: 9px 14px 9px 14px;
		border-radius: 4px;
	}
	td span{
		color:blue;
		font-weight: bold;
		font-size: 14px;
	}
</style>

<?php
$use_id=$_GET['id'];

$sql="SELECT * FROM users WHERE user_id='$auser_id' ";
$result=mysql_query($sql);
$rows=mysql_fetch_assoc($result);
?>

<div>
	<h2><?php echo $rows['username']; ?>'s Profile</h2>

	<div class="img-thumbnail table-striped prof" cellpadding="3px" >
		<table width="100%" class="table-striped">
			<tr>
<div class="responsive" align="center">
  <div class="img">
    <a target="_blank" href="../images/<?php echo $rows['pic']; ?>">
      <img src="../images/<?php echo $rows['pic'] ;?>" alt="<?php echo $rows['fullname']; ?>" class="img-thumbnail img-responsive" title="Click to View Full Size" width="200">
    </a>
  </div>
</div>
<br>
			</tr>
			<tr>
			</tr>
			<tr>
				<td style="padding-top: 5px;" colspan="2"><span id="info">Bio</span><br><p id="info"> <?php echo $rows['bio'] ;?></p></td>
			</tr>
			<tr>
				<td colspan="2"><span id="info">Name</span><br><p id="info"> <?php echo $rows['fullname'] ;?></p></td>
			</tr>
			<tr>
				<td colspan="2"><span id="info">Phone Number</span><br><p id="info"> <?php echo $rows['phone'] ;?></p></td>
			</tr>
			<tr>
				<td colspan="2"><span id="info">Email</span><br> <p id="info"><?php echo $rows['email'] ;?></p></td>
			</tr>
			<tr>
				<td colspan="2"><span id="info">Marital Status</span><br> <p id="info"><?php echo $rows['ms'] ;?></p></td>
			</tr>
			<tr>
				<td><span id="info">Username</span><br><p id="info"><?php echo $rows['username'] ?></p></td>
			</tr>
			<tr>
				<td colspan="2">
				<form method="post">
					<input type="hidden" name="user_id" value="<?php echo $rows['user_id'] ;?>">
					<button role="submit" type="submit" name="sub_del" value="Delete Profile" class="btn btn-danger"><font color="white"> <span class="glyphicon glyphicon-trash"></span></font>  Delete User</button>  
				</form>
			</td>
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
			</tr>
		</table>
	</div>
</div>

<?php
include('footer.php');

?>