<?php
include('connect.php');

session_start();

if(!isset($_SESSION['user_id']))
{
	header("location:login.php");
}
?>
<html>
<head>
	<title>Censono Games</title>
<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
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
			margin-left: 20%;
			margin-right: 20%;
			background-color:  #66CCCC;
		}
		#main{
			background-color: #FFFFCC;
			padding: 10px;
			border-radius: 10px;
			margin-top: 1%;
		}
	</style>
</head>
<body>
<div id="main" class="main-content">

<p>Tabs With Dropdown Example</p>
<ul class="nav nav-tabs">
<li class="active"><a href="#">Home</a></li>
<li><a href="#">SVN</a></li>
<li><a href="#">iOS</a></li>
<li><a href="#">VB.Net</a></li>
<li class="dropdown">
<a class="dropdown-toggle" data-toggle="dropdown" href="#">
Java <span class="caret"></span>
</a>
<ul class="dropdown-menu">
	<li><a href="#">Swing</a></li>
	<li><a href="#">jMeter</a></li>
	<li><a href="#">EJB</a></li>
	<li class="divider"></li>
	<li><a href="#">Separated link</a></li>
</ul>
</li>
<li><a href="#">PHP</a></li>
</ul>

Tool tip


<h4>Tooltip examples for anchors</h4>
This is a <a href="#" class="tooltip-test" data-toggle="tooltip"
title="Tooltip on left">
Default Tooltip
</a>.
This is a <a href="#" class="tooltip-test" data-toggle="tooltip"
data-placement="left" title="Tooltip on left">
Tooltip on Left
</a>.
This is a <a href="#" data-toggle="tooltip" data-placement="top"
title="Tooltip on top">
Tooltip on Top
</a>.
This is a <a href="#" data-toggle="tooltip" data-placement="bottom"
title="Tooltip on bottom">
Tooltip on Bottom
</a>.
This is a <a href="#" data-toggle="tooltip" data-placement="right"
title="Tooltip on right">
Tooltip on Right
</a>
<br>
<h4>Tooltip examples for buttons</h4>
<button type="button" class="btn btn-default" data-toggle="tooltip"
title="Tooltip on left">
Default Tooltip
</button>
<button type="button" class="btn btn-default" data-toggle="tooltip"
data-placement="left" title="Tooltip on left">
Tooltip on left
</button>
<button type="button" class="btn btn-default" data-toggle="tooltip"
data-placement="top" title="Tooltip on top">
Tooltip on top
</button>
<button type="button" class="btn btn-default" data-toggle="tooltip"
data-placement="bottom" title="Tooltip on bottom">
Tooltip on bottom
</button>
<button type="button" class="btn btn-default" data-toggle="tooltip"
data-placement="right" title="Tooltip on right">
Tooltip on right
</button>
<script>
$(function () { $("[data-toggle='tooltip']").tooltip(); });
</script>



PopOver
<div class="container" style="padding: 100px 50px 10px;" >
<button type="button" class="btn btn-default" title="Popover title"
data-container="body" data-toggle="popover" data-placement="left"
data-content="Some content in Popover on left">
Popover on left
</button>
<button type="button" class="btn btn-primary" title="Popover title"
data-container="body" data-toggle="popover" data-placement="top"
data-content="Some content in Popover on top">
Popover on top
</button>
<button type="button" class="btn btn-success" title="Popover title"
data-container="body" data-toggle="popover" data-placement="bottom"
data-content="Some content in Popover on bottom">
Popover on bottom
</button>
<button type="button" class="btn btn-warning" title="Popover title"
data-container="body" data-toggle="popover" data-placement="right"
data-content="Some content in Popover on right">
Popover on right
</button>
</div>
<script>
$(function ()
{ $("[data-toggle='popover']").popover();
});
</script>
</div>


Alert Plugin
<h3>Alert messages to demonstrate alert() method </h3>
<div id="myAlert" class="alert alert-success">
<a href="#" class="close" data-dismiss="alert">&times;</a>
<strong>Success!</strong> the result is successful.
</div>
<div id="myAlert" class="alert alert-warning">
<a href="#" class="close" data-dismiss="alert">&times;</a>
<strong>Warning!</strong> There was a problem with your
network connection.
</div>
<script type="text/javascript">
$(function(){
$(".close").click(function(){
$("#myAlert").alert();
});
});
</script>




Collapse
<div class="panel-group" id="accordion">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h4 class="panel-title">
			<a data-toggle="collapse" data-parent="#accordion"
			href="#collapseOne">
			Click me to exapand. Click me again to collapse.Section 1
			</a>
			</h4>
		</div>
		<div id="collapseOne" class="panel-collapse collapse in">
			<div class="panel-body">
			Nihil anim keffiyeh helvetica, craft beer labore wes anderson
			cred nesciunt sapiente ea proident. Ad vegan excepteur butcher
			vice lomo.
			</div>
		</div>
	</div>
	
	<div class="panel panel-default">
	<div class="panel-heading">
	<h4 class="panel-title">
	<a data-toggle="collapse" data-parent="#accordion"
	href="#collapseTwo">
	Click me to exapand. Click me again to collapse.Section 2
	</a>
	</h4>
	</div>
	<div id="collapseTwo" class="panel-collapse collapse">
	<div class="panel-body">
	Nihil anim keffiyeh helvetica, craft beer labore wes anderson
	cred nesciunt sapiente ea proident. Ad vegan excepteur butcher
	vice lomo.
	</div>
	</div>
	</div>
	<div class="panel panel-default">
	<div class="panel-heading">
	<h4 class="panel-title">
	<a data-toggle="collapse" data-parent="#accordion"
	href="#collapseThree">
	Click me to exapand. Click me again to collapse.Section 3
	</a>
	</h4>
	</div>
	<div id="collapseThree" class="panel-collapse collapse">
	<div class="panel-body">
	Nihil anim keffiyeh helvetica, craft beer labore wes anderson
	cred nesciunt sapiente ea proident. Ad vegan excepteur butcher
	vice lomo.
	</div>
	</div>
	</div>
</div>




Carousel
<div id="myCarousel" class="carousel slide">
<!-- Carousel indicators -->
<ol class="carousel-indicators">
<li data-target="#myCarousel" data-slide-to="0"
class="active"></li>
<li data-target="#myCarousel" data-slide-to="1"></li>
<li data-target="#myCarousel" data-slide-to="2"></li>
</ol>
<!-- Carousel items -->
<div class="carousel-inner">
<div class="item active">
<img src="slide1.jpg" alt="First slide">
</div>
<div class="item">
<img src="slide2.jpg" alt="Second slide">
</div>
<div class="item">
<img src="slide3.jpg" alt="Third slide">
</div>
</div>
<!-- Carousel nav -->
<a class="carousel-control left" href="#myCarousel"
data-slide="prev">&lsaquo;</a>
<a class="carousel-control right" href="#myCarousel"
data-slide="next">&rsaquo;</a>
<!-- Controls buttons -->
<div style="text-align:center;">
<input type="button"  value="Play"><button class="btn start-slide glyphicons glyphicons-play"></button>
<input type="button" class="btn pause-slide" value="Pause">
<input type="button" class="btn prev-slide" value="Previous">
<input type="button" class="btn next-slide" value="Next">
<input type="button" class="btn slide-one" value="Slide 1">
<input type="button" class="btn slide-two" value="Slide 2">
<input type="button" class="btn slide-three" value="Slide 3">
</div>
</div>
<script>
$(function(){
// Initializes the carousel
$(".start-slide").click(function(){
$("#myCarousel").carousel('cycle');
});
// Stops the carousel
$(".pause-slide").click(function(){
$("#myCarousel").carousel('pause');
});
// Cycles to the previous item
$(".prev-slide").click(function(){
$("#myCarousel").carousel('prev');
});
// Cycles to the next item
$(".next-slide").click(function(){
$("#myCarousel").carousel('next');
});
// Cycles the carousel to a particular frame
$(".slide-one").click(function(){
$("#myCarousel").carousel(0);
});
$(".slide-two").click(function(){
$("#myCarousel").carousel(1);
});
$(".slide-three").click(function(){
$("#myCarousel").carousel(2);
});
});
</script>



Jumbotron
<div class="container">
<div class="jumbotron">
<h1>Welcome to landing page!</h1>
<p>This is an example for jumbotron.</p>
<p><a class="btn btn-primary btn-lg" role="button">
Learn more</a>
</p>
</div>
</div>



Pager
<ul class="pager">
<li class="previous"><a href="#">&larr; Older</a></li>
<li class="next"><a href="#">Newer &rarr;</a></li>
</ul>


BreadCrumb
<ol class="breadcrumb">
<li><a href="#">Home</a></li>
<li><a href="#">2013</a></li>
<li class="active">November</li>
</ol>



Non-nav links
<nav class="navbar navbar-default" role="navigation">
<div class="navbar-header">
<a class="navbar-brand" href="#">TutorialsPoint</a>
</div>
<div>
<p class="navbar-text navbar-right">Signed in as
<a href="#" class="navbar-link">Thomas</a>
</p>
</div>
</nav>
</div>



Buttons in Navbar
<nav class="navbar navbar-default" role="navigation">
<div class="navbar-header">
<a class="navbar-brand" href="#">TutorialsPoint</a>
</div>
<div>
<form class="navbar-form navbar-left" role="search">
<div class="form-group">
<input type="text" class="form-control" placeholder="Search">
</div>
<button type="submit" class="btn btn-default">Submit Button</button>
</form>
<button type="button" class="btn btn-default navbar-btn">
Navbar Button
</button>
</div>
</nav>


Navbar
<nav class="navbar navbar-default" role="navigation">
	<div class="navbar-header">
		<button type="button" class="navbar-toggle" data-toggle="collapse"
		data-target="#example-navbar-collapse">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button>
		<a class="navbar-brand" href="#">TutorialsPoint</a>
	</div>
	<div class="collapse navbar-collapse" id="example-navbar-collapse">
		<ul class="nav navbar-nav">
			<li class="active"><a href="#">iOS</a></li>
			<li><a href="#">SVN</a></li>
			<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown">
				Java <b class="caret"></b>
				</a>
				<ul class="dropdown-menu">
					<li><a href="#">jmeter</a></li>
					<li><a href="#">EJB</a></li>
					<li><a href="#">Jasper Report</a></li>
					<li class="divider"></li>
					<li><a href="#">Separated link</a></li>
					<li class="divider"></li>
					<li><a href="#">One more separated link</a></li>
				</ul>
			</li>
		</ul>
	</div>
</nav>


Tabular Navigation
<p>Tabs Example</p>
<ul class="nav nav-tabs">
<li class="active"><a href="#">Home</a></li>
<li><a href="#">SVN</a></li>
<li><a href="#">iOS</a></li>
<li><a href="#">VB.Net</a></li>
<li><a href="#">Java</a></li>
<li><a href="#">PHP</a></li>
</ul>






</body>
</html>