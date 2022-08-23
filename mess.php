<?php
$mess='Hello my name is innocent joshua';
$encmess=md5($mess);
echo $encmess;

$decmess=md5($encmess);

?>