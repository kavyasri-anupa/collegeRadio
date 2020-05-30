<?php
session_start();
if (isset($_POST['login'])) {
	$_SESSION['id']=1;
	header("Location:indexUpload.php");
}