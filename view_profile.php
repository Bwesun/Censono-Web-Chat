<?php
//index.php
include('connect.php');



session_start();

if(!isset($_SESSION['user_id']))
{
	header("location:login.php");
}

$auser_id=$_GET['id'];

		include('heading.php');

		?>




<style type="text/css">
	#online{
		padding:4px;
		background-color: #33CC00;
		border-radius: 5px;
	}
	#offline{
		padding:4px;
		background-color: #FF3300;
		border-radius: 5px;
	}
	#chat{
		text-decoration: none;
		background-color: #FF9900;
		padding: 5px;
		border-radius: 4px;
		border:1px solid orange;
	}
	#chat:hover{
		color:;
		background-color: #FF9900;
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
	.prof{
		width: 100%;
	}
	#info{
		padding-left: 10px;
	}
</style>
<?php
$use_id=$_SESSION['user_id'];

$sql="SELECT * FROM users WHERE user_id='$auser_id' ";
$result=mysql_query($sql);
$rows=mysql_fetch_assoc($result);
?>

<div>
	<h2><?php echo $rows['username']; ?>'s Profile</h2>

	<div class="img-thumbnail table-striped prof" cellpadding="3px" >
		<table width="100%" class="table-striped">
			<tr>
				<td colspan="2" align="center"><img src="images/<?php echo $rows['pic'] ;?>" width="200" class="img-thumbnail img-responsive"><br>
			</tr>
			<tr>
				<td style="border-bottom: 1px solid blue; padding-top: 5px; padding-left: 10px;" colspan="2">
					<p><a href="#"><span class="glyphicon glyphicon-bullhorn"></span>   Timeline</a>    <a href="view_profile_pictures.php?id=<?php echo $auser_id; ?>"><span class="glyphicon glyphicon-picture"></span>    View Profile Pictures</a></p>
				</td>
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
		</table>
	</div>
</div>

<?php
include('footer.php');

?>