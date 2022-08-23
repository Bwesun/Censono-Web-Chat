<?php
//index.php
include('connect.php');

session_start();

if(!isset($_SESSION['user_id']))
{
	header("location:login.php");
}



		include('heading.php');

		?>
	<style type="text/css">
	.input-group{
	}
	#user_details, #chat_details{
		height: 360px;
		overflow-y: scroll;
	}
</style>

	<div class="">
		<div class="input-group">
			<span class="input-group-addon"><span class="glyphicon glyphicon-search"></span></span>
			<input type="text" name="search_text" id="search_text" placeholder="Search Users" class="form-control">
		</div>
	</div>
	<br>
	<div class="row">
		<div id="result" class="col-md-6"></div>
	</div>



<div id="user_details" >
	
</div>
<!--
<span class="glyphicon glyphicon-picture"></span>
<i class="fas fa-file"></i>
<i class="fas fa-user-plus"></i>
-->

<?php
include('footer.php');

?>
</div>

</div>




</body>
</html>

<script type="text/javascript">
	$(document).ready(function(){

		fetch_user();

		setInterval(function(){
			fetch_user();
		}, 3000);

	function fetch_user()
	{
		$.ajax({
			url:"fetch_user.php",
			method:"POST",
			success:function(data){
				$('#user_details').html(data);
			}
		})
	}

	});

</script>

<script>
	$(document).ready(function(){
		$('#search_text').keyup(function(){
			var txt= $(this).val();
			if(txt !=''){
				$.ajax({
					url:"fetch.php",
					method:"post",
					data:{search:txt},
					dataType:"text",
					success:function(data)
					{
						$('#result').html(data);
					}
				});
			}
			else
			{
				$('#result').html('');
			}
		});
	});

</script>