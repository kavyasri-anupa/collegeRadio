<?php
session_start();
$conn=mysqli_connect("localhost","root","","profileUpload");
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php
	   $sql="SELECT * FROM userprofile";
	   $result=mysqli_query($conn,$sql);
	   if (mysqli_num_rows($result)>0) {
	   	  while ($row = mysqli_fetch_assoc($result)){
	   	  	$id=$row['id'];
	   	  	$sqlimg="SELECT * FROM profileimg WHERE userid='$id'";
	   	  	$resultimg=mysqli_query($conn,$sqlimg);
	   	  	while ($rowImg=mysqli_fetch_assoc($resultimg)) {
                 echo"<div>";
                 if ($rowImg['status']==0){
                 	echo "<img src='uploads/profile'".$id.".jpg?".mt_rand().">";
                 }
                 else{
                 	 echo "<img src='default.jpg' alt='profile'>";
                 }
                 echo $row['username'];
                  echo "</div>";
	   	  	}
	   	  }
	   }
	   else{
	   	echo "no users";
	   }
	?>
	<?php
	if (isset($_SESSION['id'])) {
		if($_SESSION['id']==1) {
			echo "you are logged as admin";
		}
		echo"<form action='upload.php' method='POST' enctype='multipart/form-data'>
		<input type='file' name='file'>
		<button type='submit' name='submit'>upload</button>
        </form>";
    }
    else{
        	echo"you are not logged in";
        	echo"<form action='signup.php' method='POST' >
        	<input type='text' name='firstName' placeholder='first name'>
        	<input type='text' name='lastName' placeholder='last name'>
        	<input type='text' name='uid' placeholder='username'>
        	<input type='password' name='pwd' placeholder='password'>
        	<button type='submit' name='signup'>Signup</button>
        	</form>";
        }
	?>
	
    <form action="login.php" method="POST">
    	<button type="submit" name="login">Login</button>
    </form>
    <form action="logout.php" method="POST">
    	<button type="submit" name="logout">Logout</button>
    </form>
   

</body>
</html>