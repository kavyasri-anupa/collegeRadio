<?php
$Conn=mysqli_connect('localhost', 'root', '', 'userpost');
if(!$Conn){
	die('connection failed:'.mysqli_connect_error());
}
?>