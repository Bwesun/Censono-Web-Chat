<?php 
include('connect.php');

session_start();

if(!isset($_SESSION['user_id']))
{
	header("location:../login.php");
}

include('heading.php');
$my_id=$_SESSION['user_id'];



//Count and list Number of Users' message
	$sql="SELECT DISTINCT from_username, from_user_id FROM all_msg_notifications WHERE to_user_id='$my_id' ORDER BY timestamp DESC";
	$result5=mysql_query($sql);				

//echo $my_id;

?>

<div>
	<h3>Chat Conversations</h3>
	<table class="table table-responsive table-condensed table-striped" cellspacing="4" cellpadding="3">
	<?php
	while($rows=mysql_fetch_assoc($result5)){

	?>
		<tr>
		<?php
		$id=$rows['from_user_id'];

		$sql3="SELECT * FROM msg_notifications WHERE from_user_id='$id' AND to_user_id='$my_id' ";
		$result3=mysql_query($sql3);

		$count=mysql_num_rows($result3);
		//echo "$count";
		?>
			<td><a href="chat.php?id=<?php echo $rows['from_user_id']; ?>"><h4><?php echo $rows['from_username'];  ?>    <span class="badge"><?php 
																																if($count>0){
																																	echo "$count";
																																}
																																else{
																																	echo "";
																																}
																																	?></span></h4></a></td>
		</tr>
		<?php
	}
	//Clear the Message Tray


	?>
	</table>
</div>