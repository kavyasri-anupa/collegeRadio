<?php
date_default_timezone_set('Asia/Kolkata');
session_start();
if(isset($_SESSION['previous'])){
  if(basename($_SERVER['PHP_SELF'])){
    unset($_SESSION['username']);
  }
}

$conn=mysqli_connect("localhost","root","","placements");
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
  <link rel="stylesheet" type="text/css" href="placements.css">
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
      else if($_GET['error']=='remove'){
        echo"<script>alert('you are not allowed to remove others profile')</script>";
      }
			
		}
		else if(isset($_GET['login'])){
			if($_GET['login']=="success"){
				echo '<script>alert("login success")</script>';
			}

		}
    else if(isset($_GET['account'])){
      if($_GET['login']=="loggedout"){
        echo '<script>alert("you are logged out")</script>';
      }
    }
	?>
	
<?php	 
if(isset($_SESSION['userid'])){
	echo'<form method="POST" action="placements-logout.php"><button type="submit" name="logout" class="btn btn-primary">Log out</button></form>'; 	
 }
 else {
 	echo'
  <!-- Button to Open the Modal -->
 <form method="POST" action="placements-login.php">
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
  <a href="placements-signup.php"> <button type="button" class="btn btn-primary" name="Signup-btn">Signup</button></a>  
</div>
</header>
    <form action="placements-submit.php" method="POST" class="text-bottom
    ">
    	<textarea name="announce" rows="6" cols="50"></textarea>
      <input type="hidden" name="date">
    <button type="submit" name="post-submit">Submit</button></form>
      <form action="placements-submit.php" method="POST" enctype="multipart/form-data">
      <input type="file" name="file">
      <!-- <input type="text" name="username">
      <input type="password" name="password">-->
      <input type="submit" name="upload" value="Upload">
    </form>
		<?php
		getPosts($conn);
		?>
<?php
function getPosts($conn){
  	$query="SELECT * FROM signuptable";
  	$result=mysqli_query($conn,$query);
  	if(mysqli_num_rows($result)>0){
  	while ($row=mysqli_fetch_assoc($result)) {
  		$msg=$row['message'];
      if(!($msg==="")){
  		echo "<table class='table table-borderless'>";
      echo"<tr>";
         echo"<td>";
          if ($row['image']==="") {
              echo "<img width='100' height='100' src='default.png'>";
          }
          else{
            echo '<img id="myImg" src="data:image/jpeg;base64,'.base64_encode($row['image']).'"width="100" height="100" alt="img"/>';
          }
                   echo"</td>";
      echo "<td>".$row['message']."</td></tr>";
  		echo  "<tr>";
      echo "<td>".$row['username']."</td></tr>";
  		echo "<tr><td>".$row['date']."</td></tr>";
  		echo "<tr>";
      echo "<td>
  		<form class='deletePost' method='POST' action='placements-submit.php'>
  		<input type='hidden' name='username'  value='".$user=$row['username']."'>
  		<button name='DeleteButton' class='delete' title='delete post'>Delete</button>
  		</form></td>
  		 <td><form method='POST' action='placements-submit.php'>
    	<input type='hidden' name='username'  value='".$user=$row['username']."'>
    	<input type='hidden' name='message'  value='".$row['message']."'>
    	 
    	<button type='submit' name='editButton' class='edit' title='edit post'>Edit</button>
    	</form></td>
      <td><form method='POST' action='placements-submit.php'>
      <input type='hidden' name='username'  value='".$user=$row['username']."'>
      <input type='hidden' name='message'  value='".$row['message']."'>
       
      <button type='submit' name='removeButton' class='remove' title='remove profile'>Remove</button>
      </form></td></tr>";
  		echo "</form></table>";
           
    }
  	}
  }
}
?>
</body>
</html>