<?php
$str ="abc";
$encrepted_string = md5($str);
echo "Encrepted String: ".$eencrepted_string."<br>";

if(md5($str)==$encrepted_string){
  $decrepted_string = $str;
   echo "Decrepted String: ".$decrepted_string;
}
?>