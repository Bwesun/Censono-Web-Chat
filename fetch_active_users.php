<?php
include('connect.php');
session_start();
$use_id=$_SESSION['user_id'];
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
	
</style>

<div>
			<h2>Active Users</h2>
			<table width="80%" cellpadding="3" cellspacing="3" class="table-hover">
				<tr class="active">
				<th align="left">Name</th>
				<th align="center">Status</th>
				<th align="center">Action</th>
				</tr>
				<?php
				
				$sql="SELECT DISTINCT username, user_id FROM login_details WHERE last_activity='' AND user_id !='$use_id' ORDER BY login_details_id DESC";
				$result=mysql_query($sql);

				while($rows=mysql_fetch_assoc($result)){
				
				?>
				<tr>
				<?php
				$id=$rows['user_id'];
				?>

					<td id="td"><?php echo $rows['username'];   ?></td>

					<td id="td" align="left">
					<?php
					
						echo "
						<button id='online'>Online</button>
						";
					?>
					</td>

					<td id="td" align="center"><a class="btn btn-info" href="chat.php?id=<?php echo "$id"; ?>">Start Chat</a></td>
					
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
	
	