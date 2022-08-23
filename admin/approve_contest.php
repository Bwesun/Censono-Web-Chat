<?php
include('../connect.php');
?>
<head>
	<title>Approve Contest</title>
	<style type="text/css">
	.input-group{
		width: 50%;
	}
	 #result{
	 	width: 50%;
	 }
	 .container{
	 	margin:1% 30% 0% 20%;
	 }
</style>
<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="fontawesome/css/all.css">
	<script type="text/javascript" language="javascript" src="../js/bootstrap.min.js"></script>
	<script type="text/javascript" language="javascript" src="../jquery/jquery.min.js"></script>
</head>
<body>
<div class="container">
	<br />
	<h4 align="left">Search Users</h4>
	<div class="form-group">
		<div class="input-group">
			<span class="input-group-addon"><span class="glyphicon glyphicon-search"></span> Search</span>
			<input type="text" name="search_text" id="search_text" placeholder="Search by Username" class="form-control">
		</div>
	</div>
	<br>
	<div id="result"></div>
	<a href="../admin.php" class="btn btn-info">Go Back</a>
</div>


</body>

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