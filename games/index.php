<?php
include('connect.php');

session_start();

if(!isset($_SESSION['user_id']))
{
	header("location:../login.php");
}


include('head.php');

?>
<body>
	<style type="text/css">
		.panel-heading{
		}
	</style>



		<div class="container">
			<div class="jumbotron btn-info">
			<h1>Welcome to Censono Games page!</h1>
			<p>Are you ready for the Contest!</p>
			<p><a class="btn btn-primary btn-lg" role="button"data-toggle="collapse" data-parent="#accordion"
				href="#collapseThree">
			GET STARTED</a> <a href="join_contest_form.php" class="btn btn-lg btn-success">JOIN CONTEST</a>
			</p>

		<button type="button" class="btn btn-default" title="Hint"
		data-container="body" data-toggle="popover" data-placement="bottom"
		data-content="Click the GET STARTED button to know how to start using this platform. Or click the JOIN CONTEST button to register as a Contestant">
		Click Me for Info
		</button>
		<script>
		$(function ()
		{ $("[data-toggle='popover']").popover();
		});
		</script>
			</div>
		</div>
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- Incent Ad1 -->
<ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-1343370464889032"
     data-ad-slot="1592092546"
     data-ad-format="auto"
     data-full-width-responsive="true"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>


		<div class="panel panel-default">
			<div class="panel-heading">
				<h4 class="panel-title">
				<a data-toggle="collapse" data-parent="#accordion"
				href="#collapseThree">
				HOW TO GET STARTED >>>Click to View<<<
				</a>
				</h4>
			</div>
			<div id="collapseThree" class="panel-collapse collapse">
				<div class="panel-body">
					<ul>
						<li>Click from the MENUs which game you prefer.</li>
						<li>Select your preffered photo.</li>
						<li>Click on the Submit Button to send your vote.</li>
					</ul>
					If you want to be among contestants; 
					<li>
					Register your details by clicking <a href="join_contest_form.php">HERE</a> or click JOIN CONTEST button link beside the  GET STRATED BUTTON</li>
					<li>Fill the Form</li>
					<li>Upload your desired picture which you will like to use for the contest</li>
					<li>Click the SUBMIT button to submit your Contestant form</li>.
					<li>Wait for a Success Notification via your <b>Censono</b> account</li>
					<li>then, YOU ARE GOOD TO GO >>></li>
				</div>
			</div>
		</div>

</body>

		



<?php

include('foot.php');

?>









