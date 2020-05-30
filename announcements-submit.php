<?php
session_start();?>
<?php
$conn=mysqli_connect("localhost","root","","announcements");
if(!$conn){
	die('connection failed:'.mysqli_connect_error());
}

if (isset($_SESSION['username'])) {
if (isset($_POST["post-submit"])){
	$msg=$_POST["announce"];
	$name=$_SESSION['username'];
	$date=date('Y-m-d H:i:s');
	$sql = "UPDATE signuptable SET notice='$msg',date='$date' WHERE username='$name'";
	mysqli_query($conn,$sql);
    mysqli_close($conn);
    header("Location:announcements.php");
}
}
else{

	 header("Location: announcements.php?&error=you must be logged in");
	 exit();
}
if (isset($_POST['editButton'])) {
		$user=$_POST['username'];
		$msg=$_POST['message'];
		if($user===$_SESSION['username']){

     echo "
    <form method='POST' action='announcements-edit.php'>
    	
    	<input type='hidden' name='username'  value='".$user=$_POST['username']."'>"
    	// <input type='hidden' name='date' value='".$_POST['date']."'>
    	."<textarea name='message' rows='8' cols='80'>".$msg."</textarea><br>
    	<button type='submit' name='postButton'>submit</button>
    	</form>";
}
         else{
         	 header("Location:announcements.php?&error=edit");
         	 exit();
         }
}
?>