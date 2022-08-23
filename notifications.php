<?php 
include('connect.php');

session_start();

if(!isset($_SESSION['user_id']))
{
	header("location:../login.php");
}

include('heading.php');
$id=$_SESSION['user_id'];

	


//Count Number of Users' message
				



?>

<div>
	<h3>Notifications</h3>
	<h4>Click on a Notification Title to View!</h4>
	<?php
	$sql="SELECT * FROM all_notifications WHERE to_user_id='$id' ORDER BY id DESC LIMIT 0,10;";
	$result=mysql_query($sql);	
	while($rows=mysql_fetch_assoc($result)){
		$is_new=$rows['is_new'];
		$not=$rows['notification'];
		$title=$rows['title'];

	?>



<div class="panel-group" id="accordion">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h4 class="panel-title">
			<a data-toggle="collapse" data-parent="#accordion"
			href="#<?php echo $rows['id'];?>">
			<?php echo $rows['title']; 
				if($is_new==1){
				echo "   <font class='badge'>New</font>";
				}
				else{
				echo "";
				}
				?>
			</a>
			</h4>
		</div>
		<div id="<?php echo $rows['id'];?>" class="panel-collapse collapse">
			<div class="panel-body">
			<?php echo $rows['notification'];?>
			<h6><em><?php  echo $rows['datetime'];  ?></em></h6>
			</div>
		</div>
	</div>
	<?php
	}
	//Clear the Message Tray


	?>
</div>
</div>



<?php
$sql2="DELETE FROM notifications WHERE to_user_id='$id' ";
$result2=mysql_query($sql2);

$sql3="UPDATE all_notifications SET is_new='0' WHERE to_user_id='$id' ";
$result3=mysql_query($sql3);
?>