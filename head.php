<!DOCTYPE html>
<html>
<head>

	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="fontawesome/css/all.css">
	<script type="text/javascript" language="javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" language="javascript" src="jquery/jquery.min.js"></script>
	<script type="text/javascript" language="javascript" src="games/dropdown.js"></script>
	<script type="text/javascript" language="javascript" src="games/collapse.js"></script>
	<script type="text/javascript" language="javascript" src="games/popover.js"></script>


	<title>Censono</title>
	<style type="text/css">
		body{
			background-color: #66CCCC;

		}
		.main_div{
			background-color: #FFFFCC;
			border-radius: 5px;
			padding: 10px;
			border-left: 3px solid orange;
			border-right: 3px solid orange;
		}
		a{
			text-decoration: none;
		}
		a:hover{
			color:green;
		}
		#pp{
			position: ;
			top: 2%;
			left: 20%;
		}
		.badge{
			background-color: red;
		}
		#par{
			padding-left: 7px;
		}
		#notif{
			color: grey;
		}
	</style>
</head>
<?php
session_start();

if(!isset($_SESSION['user_id']))
{
	header("location:../login.php");
}
include('connect.php') ;
$id=$_SESSION['user_id'];

$sql_query="SELECT * FROM users WHERE user_id='$id' ";
$sql_que=mysql_query($sql_query);
$res=mysql_fetch_assoc($sql_que);
//echo $sql_query;
//<i class="fas fa-user"></i> <!-- uses solid style -->
  //<i class="far fa-user"></i> <!-- uses regular style -->
  //<i class="fal fa-user"></i> <!-- uses light style -->
  ?>
<body>
<div class="main_div">
	<h2 align="center"><img src="images/logo.png" width="60" class="img-circle">Censono  </h2>
	<div width="100%">
		

			
	
		
			
	

		</div>
		<script type="text/javascript">
			function goBack(){
				window.history.back();
			}
		</script>









<style type="text/css">
	.btn{
		width: 100%;
	}
	#id{
		background-color: white;
		border-left: 1px solid #ccc;
		opacity: 0.9;
	}
	#id:hover{
		opacity: 1.0;
	}
	#tr{
		
	}
	table{
		border: 1px solid #66CCCC;
		border-radius: 5px;
	}

</style>



<table width="100%" >
	<tr id="tr">
		<td><a href="index.php" class="btn " id="id" role="link"> <span class="glyphicon glyphicon-home"></span> </td>
		<td><a href="index.php" class="btn" id="id" role="link"> <i class="fas fa-users"></i> </td>
			<?php
				//Count Number of Users' message

				$sql="SELECT DISTINCT from_username FROM msg_notifications WHERE to_user_id='".$_SESSION['user_id']."' ";
				$result=mysql_query($sql);

				$rows=mysql_fetch_assoc($result);
				$count=mysql_num_rows($result);
				



				?>
		<td><a href="messages.php" class="btn" id="id" role="link"> <i class="fas fa-comment"></i> <span class="badge btn-success" style="background-color: red;">  <?php 
																																if($count>0){
																																	echo "$count";
																																}
																																else{
																																	echo "</span></a></td>";
																																}
																																	?>
				<?php
				$sql4="SELECT * FROM notifications WHERE to_user_id='".$_SESSION['user_id']."' ";
				$result4=mysql_query($sql4);

				$rows4=mysql_fetch_assoc($result4);
				$count4=mysql_num_rows($result4);
				?>

		<td><a href="notifications.php" class="btn " id="id" role="link" > <span class="glyphicon glyphicon-bell"></span>  <span class="badge btn-success"><?php 
																																if($count4>0){
																																	echo "$count4";
																																}
																																else{
																																	echo "</span>";
																																}
																																	?>
																																</a>
																															</td>
		<td><a class="btn " id="id" role="link" onclick="goBack()" title="Go to Previous Page"><span class="glyphicon glyphicon-arrow-left"></span> </a></td>
		<td><a href="logout.php" id="id" class="btn" role="link" title="Log Out"><span class="glyphicon glyphicon-log-out"></span>  </a></td>
		
	</tr>
</table>