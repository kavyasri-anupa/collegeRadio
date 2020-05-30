<?php
$conn=mysqli_connect("localhost","root","","announcements");
if(!$conn){
	die('connection failed:'.mysqli_connect_error());
}
?>
<?php
if (isset($_POST["Login-submit"])){
	$uid=$_POST["userid"];
	$pwd=$_POST["pwd"];
	$sql="SELECT * FROM signuptable WHERE username=? OR email=?;";
	$stmt=mysqli_stmt_init($conn);
	if(!mysqli_stmt_prepare($stmt,$sql)){
			header("Location: index.php?error=sqlerror");
		    exit();
	}
	else{
		mysqli_stmt_bind_param($stmt, "ss", $uid,$uid);
		mysqli_stmt_execute($stmt);
		$result=mysqli_stmt_get_result($stmt);
		if($row=$result->fetch_assoc()){
         
            if(password_verify($pwd, $row["password"])){
            	session_start();
            	$_SESSION['userid'] = $row["userid"];
            	$_SESSION['username'] = $row["username"];
            	header("Location: announcements.php?login=success");
		        exit();

            }
            else{
             	
		        echo "<script>alert('wrongpassword')</script>";
		        header("Location: announcements.php?error=wrongpassword");
		         exit();
            }
		}
		else{
		echo"<script>alert('no user')</script>";
			header("Location: announcements.php?error=nouser");
		 exit();
		}
	}

}
else{
	header("Location: announcements.php");
		exit();
}
		
?>