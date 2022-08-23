<?php
$fname='cyn.jpg';
//$action=unlink('images/'.$fname);
/*
if($action){
	echo $fname." File has been Deleted";
}else{
	echo "Error: File was not Deleted";
}
echo "<br>";*/
$dirname='folder';
/*
$action2=mkdir($dirname);

if($action2){
	echo "Directory Created";
}else{
	echo "Error: Directory not created";
}

$action3=is_dir($dirname);
if($action3)
{
	echo "Directory ".$dirname." Exist";
}else{
	echo "Directory ".$dirname." Does not exist";
}

$action4=rmdir($dirname);

if($action4){
	echo "Directory ".$dirname." has been removed";
}else{
	echo "Error: Directory ".$dirname." was not removed/Deleted";
}*/

$connect=mysql_connect("localhost", "root", "");
if($connect){
	echo "Connection Successful <br>";
}else{
	echo "Erroe: ".mysql_error();
}

$conn=mysql_select_db("vote");
if($connect){
	echo "Databae selection Successful<br>";
}else{
	echo "Erroe: ".mysql_error();
}



$sql = 'CREATE TABLE table_test2 ('
        . ' id INT(6) NOT NULL AUTO_INCREMENT PRIMARY KEY, '
        . ' to_user_id VARCHAR(67) NOT NULL, '
        . ' category VARCHAR(67) NOT NULL'
        . ' )';

if($sql){
	echo "Table created Successful!";
}else{
	echo "Error: Table not created!";
}

?>