<?php
include('connect.php');
session_start();

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
	.btn-info{
		color: black;
		padding: 5px 10px 5px 10px;
		border-radius: 4px;
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
	
</style>

<div class="row">
	<div class="col-md-6">
			
			<table width="100%" cellpadding="3" cellspacing="3" class="table  table-striped table-responsive">
				<tr>
				<th>
					<h5>
						<?php
						$sql="SELECT * FROM login_details WHERE last_activity='' AND user_id !='".$_SESSION['user_id']."' ";
						$result=mysql_query($sql);
						$counter=mysql_num_rows($result);
						?>
						<b>Active Users  (<?php echo $counter;  ?>)</b>
					</h5>
				</th>
				</tr>
				<?php
				

				while($rows=mysql_fetch_assoc($result)){
				
				?>
				<tr>
				<?php
					$use_id=$rows['user_id'];
					$is_type=$rows['is_type'];
				?>
					<td id="td"><a href="chat.php?id=<?php echo $rows['user_id']; ?>"><?php echo $rows['username'];  ?> </a>

					
					<?php
					$sql2="SELECT last_activity FROM login_details WHERE user_id='$use_id' ORDER BY login_details_id DESC";
					$result2=mysql_query($sql2);
					$row=mysql_fetch_assoc($result2);

					$current_timestamp=strtotime(date('Y-m-d H:i:s') .'-10 second');
					$current_timestamp=date('Y-m-d H-i-s' , $current_timestamp);

					$last_activity=$row['last_activity'];
						//echo "<td>";
					if(empty($last_activity)){
						echo "
						<span class='badge' id='online'> </span>
						";
					}
					elseif($last_activity<$current_timestamp){
						echo "
						<span class='badge' id='offline'> </span>
						";
					}
					else{
						echo "
						<span class='badge' id='offline'> </span>
						";
					}//echo "</td>";

					?><a class="btn-info" href="chat.php?id=<?php echo $rows['user_id']; ?>">Start Chat</a></td>

					<script type="text/javascript">
						

					</script>
					<?php
					//confirm('Successful');
					//<input type="button" value="Close Window" onClick="javascript:self.open('login.php');">
					?>
				</tr>
				<?php
				}
				?>
			</table>
			</div>

<div class="col-md-6">
	<?php
	$my_id=$_SESSION['user_id'];



//Count and list Number of Users' message
	$sql="SELECT DISTINCT from_username, from_user_id FROM all_msg_notifications WHERE to_user_id='$my_id' ORDER BY timestamp DESC";
	$result5=mysql_query($sql);				

//echo $my_id;

?>
	<h4>Recent Messages</h4>
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



		</div>
		</div>
	<?php
	mysql_close();
	