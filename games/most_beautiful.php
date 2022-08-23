<?php
include('../connect.php');

session_start();

if(!isset($_SESSION['user_id']))
{
	header("location:../login.php");
}


include('head.php');


if(isset($_POST['sub1'])){
	$for_who_user_id=$_POST['optionsRadios'];
	$voter_user_id=$_SESSION['user_id'];
	$voter_username=$_SESSION['username'];
	$category='beautiful';

	$sql="SELECT * FROM voted_users WHERE voter_user_id=$voter_user_id AND category='beautiful' ";
	$result=mysql_query($sql);
	$rw=mysql_fetch_assoc($result);
	//The voter's user name
	$vouname=$rw['voter_username'];

	$count=mysql_num_rows($result);

	if($count>=1){
		echo "<script>alert('Sorry ".$vouname."! You cannot vote more than once!')</script>";
		echo "<script>window.open('most_beautiful.php','_self')</script>";
	}
	else{

		$sql2="INSERT INTO voted_users(for_who_user_id, voter_user_id, voter_username, category)VALUES('$for_who_user_id', '$voter_user_id', '$voter_username', '$category') ";
		$result2=mysql_query($sql2);

		$sql3="SELECT * FROM contestants WHERE user_id='$for_who_user_id' AND category='$category' ";
		$result3=mysql_query($sql3);
		$rows=mysql_fetch_assoc($result3);
		$vote=$rows['no_of_vote'];

		$new_vote_no=$vote+1;
		//echo $sql3;

		//echo " initial no: ".$vote."";

		//echo  " new no: ".$new_vote_no."";
		$sql4="UPDATE contestants SET no_of_vote=$new_vote_no WHERE user_id='$for_who_user_id' AND category='$category' ";
		$result4=mysql_query($sql4);

		echo "<script>alert('You have successfully casted your vote!')</script>";
	}


	



}
?>
<style type="text/css">
	.wrapper1{
		background-color: 
	}
</style>
	<div class="wrapper1 btn-default">
		<button type="button" class="btn btn-default" title="Hint" style="padding: 10px;
		margin: 1%;"
		data-container="body" data-toggle="popover" data-placement="bottom"
		data-content="<?php include('text.txt'); ?>Start by Casting your vote to the most Beautiful Among the underlisted!">
		Click Me for Info
		</button>
		<script>
		$(function ()
		{ $("[data-toggle='popover']").popover();
		});
		</script>





		<div  style="padding: 10px;">
			<h3>Who is the Most Beautiful?</h3>
			<div class="img-thumbnail" width="100%">
			<form method="post">
				<div class="radio">
				<?php
				$sql="SELECT * FROM contestants WHERE approved='1' ORDER BY id ASC ";
				$result=mysql_query($sql);

				while($rows=mysql_fetch_assoc($result)){



				?>
					<label>
					<input type="radio" name="optionsRadios" id="optionsRadios2"
					value="<?php echo $rows['user_id'];  ?>"><br>
					<figure>
						<img src="images/<?php echo $rows['pic']; ?>" class="img-thumbnail" width="250">
						<figcaption>Nickname: <?php echo $rows['nickname'];  ?> <br><a href="../chat.php?id=<?php echo $rows['user_id'] ?>" class="btn btn-info">Chat</a> 
							<?php 
							$user_id=$rows['user_id'];
							$sql0="SELECT * from contestants WHERE user_id='$user_id' ";
							$result0=mysql_query($sql0);
							$rw=mysql_fetch_assoc($result0);
							$nov=$rw['no_of_vote'];//Nomber Of Votes

							?>
							<span class="badge" style="background-color: white; color: black;" > <h5><span class="glyphicon glyphicon-thumbs-up" ></span>  <?php echo "$nov"; ?></h5> </span> </figcaption>
					</figure>
					</label>

				<?php
					}
				?>

				</div>
				<div>
					<button  type="submit" name="sub1" class="form-control btn btn-info"><span class="glyphicon glyphicon-send"></span>  Submit </button>
				</div>
				</form>
			</div>

		</div>
</div>


<?php

include('foot.php');

?>
<title>Censono Games - Most Beautiful</title>