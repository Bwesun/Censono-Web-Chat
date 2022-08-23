<?php
$connect=mysqli_connect("localhost", "root", "", "tab");


$output='';
$sql="SELECT * FROM contestants WHERE approved='0' AND phone LIKE '%".$_POST['search']."%' OR nickname LIKE '%".$_POST['search']."%'  ";
$result=mysqli_query($connect, $sql);

if(mysqli_num_rows($result)>0)
{
	
	$output .= '<div class="table">
					<table class="table table bordered table-responsive">
						<tr>
							<th>Nickname</th>
							<th>ID</th>
							<th>Phone</th>
							<th>Action</th>
						</tr>
	';
	while($rows=mysqli_fetch_array($result))
	{
		$output .= '
			<tr>
				<td>'.$rows["nickname"].'</td>
				<td>'.$rows["user_id"].'</td>
				<td>'.$rows["phone"].'</td>
				<td><a class="btn btn-info" href="approve.php?id='.$rows["user_id"].'">Approve</a></td>
		';
	}
	echo $output;
}
else
{
	echo 'Data Not Found';
}

?>