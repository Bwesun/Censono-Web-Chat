<?php
//COOKIES

$expire=time()+60*60*24*30;

//Name, Value and Expiration of the cookie
setcookie("user_id", "censono.com.ng", $expire);

echo $_COOKIE['user_id'];




?>