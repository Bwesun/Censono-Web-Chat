<?php
//Time test
$date11='19-07-28 09:17:42 - 20 seconds';

$date21=date("y-m-d h:i:s");
// Declare and define two dates 

$date1 = strtotime($date11);  

$date2 = strtotime($date21);  

  
// Formulate the Difference between two dates 

$diff = abs($date2 - $date1);  

echo "Date11: ".$date1."<br>";
echo "<br>";
echo "Date2: ".$date2."<br>";
echo "Diff:  ".$diff;
?>