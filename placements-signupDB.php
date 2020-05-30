<?php
$conn=mysqli_connect("localhost","root","","placements");
if(!conn){
	die('connection failed:'.mysqli_connect_error());
}
?><?php
if (isset($_POST["signup-submit"])){
	$uid=$_POST["Username"];
	$email=$_POST["email"];
	$pwd=$_POST["password"];
	$re_pwd=$_POST["re-password"];
	// $rollno=$_POST["Rollno"];

    if (!filter_var($email,FILTER_VALIDATE_EMAIL) && !preg_match("/^([a-zA-Z0-9]*$/",$uid)) {
		header("Location:placements-signup.php?error=invalidemailUsername");
		exit();
	}
	else if (!filter_var($email,FILTER_VALIDATE_EMAIL)) {
		header("Location:placements-signup.php?error=invalidemail&Username=".$uid);
		exit();
	}
	else if (!preg_match("/^[a-zA-Z0-9]*$/",$uid)) {
		header("Location:placements-signup.php?error=invaliduid&email=".$email);
		exit();
	}
	// else if (!(strlen($rollno)=10)) {
	// 	header("Location:placements-signup.php?error=invalidrollno&email=".$email);
	// 	exit();
	// }
	// else if (!preg_match("/^[1-9A-Z0-9]*$/",$rollno)) {
	// 	header("Location:placements-signup.php?error=invalidrollno&email=".$email);
	// 	exit();
	// }
	else if(!$pwd === $re_pwd){
		header("Location:placements-signup.php?error=password&Username=".$uid."&email=".$email);
		exit();
	}
	else{
		$sql= "SELECT username FROM signuptable WHERE username=?";
		if (!$sql) {
			echo "table not seleted";
			# code...
		}
		$stmt=mysqli_stmt_init($conn);
		if(!mysqli_stmt_prepare($stmt,$sql)){
			header("Location:placements-signup.php?error=sqlerror");
		exit();
		}
		else{
			mysqli_stmt_bind_param($stmt, "s", $uid);
			mysqli_stmt_execute($stmt);
			mysqli_stmt_store_result($stmt);
			$count= mysqli_stmt_num_rows($stmt);
			if ($count>0) {
				header("Location:placements-signup.php?error=usernametaken&email=".$uid);
		        exit();
			}
			else{
				$sql = "INSERT INTO signuptable (username, email, password) VALUES(?,?,?)";
				$stmt=mysqli_stmt_init($conn);
				if (!$sql) {
					echo "not inserted";
					# code...
				}
		        if(!mysqli_stmt_prepare($stmt,$sql)){
			        header("Location:placements-signup.php?error=sqlerror");
		            exit();
			    }
			    else{
			    	$crypt=password_hash($pwd, PASSWORD_DEFAULT);
			        mysqli_stmt_bind_param($stmt, "sss", $uid, $email, $crypt);
			        mysqli_stmt_execute($stmt); 
			        header("Location:placements.php?signup=success");
		            exit();  

		        }

	        }

        }
}
mysqli_stmt_close($stmt);
mysqli_close($conn);
}
else{
	header("Location: placements-signup.php");
		exit();
}
?>