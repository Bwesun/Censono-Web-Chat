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
<div id="user_details">
	
</div>
<?php
include('footer.php');

?>
</div>

</div>




</body>
</html>
<script type="text/javascript">
	$(document).ready(function(){

		fetch_active_user();

		setInterval(function(){
			fetch_active_user();
		}, 2000);

	function fetch_active_user()
	{
		$.ajax({
			url:"fetch_active_users.php",
			method:"POST",
			success:function(data){
				$('#user_details').html(data);
			}
		})
	}

	});

</script>