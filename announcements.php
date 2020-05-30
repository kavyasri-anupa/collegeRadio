<?php
date_default_timezone_set('Asia/Kolkata');
session_start();
$_SESSION['previous']=basename($_SERVER['PHP_SELF']);
$conn=mysqli_connect("localhost","root","","announcements");
if(!$conn){
	die('connection failed:'.mysqli_connect_error());
}
?><!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
	<meta name="description">
	<meta name=viewport content="width-device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="announcements.css">
</head>
<body>
	<?php
	if(isset($_GET['error'])){
			if($_GET['error']=="nouser"){
				echo' <script>alert("invalid username or email")</script>';
			}
			
			else if($_GET['error']=="wrongpassword"){
				echo '<script>alert("recheck password")</script>';
			}
			else if($_GET['error']=="you must be logged in"){
				echo '<script>alert("you must be logged in")</script>';
			}
			else if($_GET['error']=='edit'){
				echo"<script>alert('you are not allowed to edit others data')</script>";
			}
			else if($_GET['error']=='delete'){
				echo"<script>alert('you are not allowed to delete others data')</script>";
			}
			
		}
		else if(isset($_GET['login'])){
			if($_GET['login']=="success"){
				echo '<script>alert("login success")</script>';
			}

		}
	?>
	
<?php	 
if(isset($_SESSION['userid'])){
	echo'<form method="POST" action="announcements-logout.php"><button type="submit" name="logout" class="btn btn-primary">Log out</button></form>'; 	
 }
 else {
 	echo'
  <!-- Button to Open the Modal -->
 <form method="POST" action="announcements-login.php">
<div class="container">
  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
    Login
  </button>

  <!-- The Modal -->
  <div class="modal" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Login</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          <form>
          	<input type="text" name="userid" placeholder="enter username or email" required>
          	<input type="password" name="pwd" placeholder="enter password" required>
          </form>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary" name="Login-submit">Login</button>
        </div>
        
      </div>
    </div>
  </div>
</form>';}

?>
  <a href="announcements-signup.php"> <button type="button" class="btn btn-primary" name="Signup-btn">Signup</button></a>  
</div>
</header>
 <?php
echo"<div class='alert alert-info'><strong>Note:</strong>This page is to publish only official notice .So no student is allowed to publish here</div>";?>
    <form action="announcements-submit.php" method="POST" class="text-bottom
    ">
    	<textarea name="announce" rows="4" cols="80"></textarea>
    	<input type="hidden" name="date">
    <button type="submit" name="post-submit">Submit</button></form>
	<div>
		<?php
		getPosts($conn);
		?>
<?php
function getPosts($conn){
  	$query="SELECT * FROM signuptable";
  	$result=mysqli_query($conn,$query);
  	if(mysqli_num_rows($result)>0){
  	while ($row=mysqli_fetch_assoc($result)) {
  		$msg=$row['notice'];
      if(!($msg==='')){
  		echo "<div class='post-box'><p>";
  		echo $row['username']."<br>";
  		echo $row['date']."<br>";
  		echo $row['notice']."<br>";
  		echo "</p>
  		<form class='deletePost' method='POST' action='".deletePost($conn)."'>
  		<input type='hidden' name='username'  value='".$user=$row['username']."'>
  		<button name='DeleteButton' class='delete'>Delete</button>
  		</form>
  		 <form method='POST' action='announcements-submit.php'>
    	<input type='hidden' name='username'  value='".$user=$row['username']."'>
    	<input type='hidden' name='message'  value='".$row['notice']."'>"
    	    	."<button type='submit' name='editButton' class='edit'>Edit</button>
    	</form>";
  		echo "</form><hr></div>";
  	}
  }
}
}
function deletePost($conn){
	if(isset($_POST['DeleteButton'])){
		$user=$_POST['username'];	
		 if($user===$_SESSION['username']){
		  $sql="UPDATE signuptable set notice='This post was deleted' WHERE username='$user'";
		 $result=$conn->query($sql);
		  	header("Location:announcements.php");
		  $conn->close();
	    
    }
      else{
           header("Location:announcements.php?&error=delete");
           exit();
         } 
} 
}?>
</body>
</html>