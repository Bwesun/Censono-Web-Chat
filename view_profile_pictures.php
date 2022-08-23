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


<div>
	<?php 
	$sql0="SELECT * FROM users WHERE user_id=$auser_id";
	$result0=mysql_query($sql0);
	$row=mysql_fetch_assoc($result0);
	$auser_name=$row['username'];
	$auser_pic=$row['pic'];

	?>
	<h3><?php echo $auser_name; ?>'s Profile Pictures</h3>

	<div class="img-thumbnail table-striped prof" cellpadding="3px" >
		<table width="100%" class="table-striped">
			
			<tr>
				<td style="border-bottom: 1px solid blue; padding-top: 5px; padding-left: 10px;" colspan="2">
					<p><a href="#"><span class="glyphicon glyphicon-bullhorn"></span> Timeline</a> - <a href=""><span class="glyphicon glyphicon-picture"></span> Profile Pictures</a></p>
				</td>
			</tr>
			<tr><td>
				<?php
				$sql="SELECT * FROM profile_pictures WHERE user_id='$auser_id' ORDER BY id DESC ";
				$result=mysql_query($sql);
				$count=mysql_num_rows($result);

				if($count==0){
					echo "<font size='9' color='#ccc'> No pictures found!</font>";
				}else{

				while($rows=mysql_fetch_assoc($result)){


				?>
				<figure class="img-thumbnail">
					<div width="100%">
				<img src="images/<?php echo $rows['pic']; ?>" width="130" class="img-thumbnail" /><br>
				<figcaption>     <?php echo "Upload Date: ".$rows['date'];  ?>     </figcaption>

			<a href='make_profile_picture.php?id=<?php echo $rows['id'];  ?>'><span class="glyphicon glyphicon-picture"></span>   Make Profile Picture</a>
					

				
			</div>
				</figure>


				<?php
					}
				}
				?>
				</td>
			</tr>
		</table>
	</div>
</div>

<?php
include('footer.php');

?>