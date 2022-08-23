<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<script type="text/javascript" language="javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" language="javascript" src="jquery/jquery.min.js"></script>
	<title>Test of modal</title>
</head>
<body>
<button class="btn btn-info btn-lg" type="button" data-toggle="modal" data-target="#myModal">Open Modal</button>
<!--Modal  -->
<div class="modal fade" role="dialog" id="myModal">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Modal Header</h4>
			</div>
			<div class="modal-body">
				<p>Some test stuffs</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>
		Hello! this is a modal
	</div>
</div>
</body>
</html>
