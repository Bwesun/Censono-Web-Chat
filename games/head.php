<?php
include('connect.php');

session_start();




?>
<head>
<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="fontawesome/css/all.css">
	<script type="text/javascript" language="javascript" src="../js/bootstrap.min.js"></script>
	<script type="text/javascript" language="javascript" src="../jquery/jquery.min.js"></script>
	<script type="text/javascript" language="javascript" src="tooltip.js"></script>
	<script type="text/javascript" language="javascript" src="popover.js"></script>
	<script type="text/javascript" language="javascript" src="alert.js"></script>
	<script type="text/javascript" language="javascript" src="collapse.js"></script>
	<script type="text/javascript" language="javascript" src="carousel.js"></script>
	<script type="text/javascript" language="javascript" src="dropdown.js"></script>
	<style type="text/css">
		body{
			margin-left: 5%;
			margin-right: 5%;
		}
		.nav-tabs{
			background-color: #FFFF99;
			margin-top: 1%;
			border: 1px solid #FFFF66;FF9933
		}
		#content{
			background-color: ;
			border: 2px solid #FFCC66;
			border-radius: 6px;
		}
		#profile{
			position: fixed;
			top: 20px;
			left: 82%;
			width: 60%
		}
		#wrapper{
			background-color: #FFFFCC;
		}
		.navbar{
		}
	</style>
</head>

<body>
<div id="wrapper">
	<div style="padding: 10px 0px 0px 10px;">
		<h2 class=""><font color="grey"><a href="../index.php"><img src="../images/logo.png" width="100" class="img-circle img-thumbnail"></a> Censono Games </font></h2>
	</div>
		<nav class="navbar navbar-default" role="navigation">
	<div class="navbar-header">
		<button type="button" class="navbar-toggle" data-toggle="collapse"
		data-target="#example-navbar-collapse">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button>
	</div>
	<div class="collapse navbar-collapse" id="example-navbar-collapse">
		<ul class="nav navbar-nav">
			<li><a href="index.php">Home</a></li>
			<li><a href="most_beautiful.php">Most Beautiful</a></li>
			<li><a href="most_handsome.php">Most Handsome</a></li>
			<li><a href="#">Beauty Queen</a></li>
			<li><a href="#">Handsome King</a></li>
			<li><a href="#">Feedback</a></li>
			<li><a href="#">About</a></li>
		</ul>
	</div>
</nav>
				

				<div id="profile" class="img-thumbnail"><img src="../images/<?php echo $_SESSION['pic'];  ?>" width="50"><br>Logged in as <a href="../my_profile.php"><?php echo $_SESSION['username']; ?></a><br><a class="btn btn-info" href="../index.php" data-toggle="tooltip" data-placement="bottom" title="Go back to the Chat Platform" onclick="goBack()">&larr; Back </a>      <a href="../logout.php" class="btn btn-warning" data-toggle="tooltip" data-placement="bottom" title="Log out of the whole Platform"><span class="glyphicon glyphicon-log-out"></span>    Logout</a> </div>
				<script>
				$(function () { $("[data-toggle='tooltip']").tooltip(); });
				</script>

			<script type="text/javascript">
			function goBack(){
				window.history.back();
			}
		</script>
		</div>
	<div id="content">