<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="description">
	<meta name=viewport content="width-device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
	<title></title>
	<style type="text/css">
		form{
			background: linear-gradient(340deg, #b3d9ff 55%, #fff 0%);
		}
		.form-group{
			top:50%;
			right: 25%;
			transform: translate(20%,20%);
		}
	</style>
</head>
<body>
<main>
	<form action="placements-signupDB.php" method="POST">
		<?php
		if(isset($_GET['error'])){
			if($_GET['error']=="invalidemailUsername"){
				echo' <script>alert("invalid username or email")</script>';
			}
			else if($_GET['error']=="invalidemail"){
				echo '<script>alert("invalid email")</script>';
			}
			else if($_GET['error']=="invaliduid"){
				echo '<script>alert("invalid username")</script>';
			}
			else if($_GET['error']=="invalidrollno"){
				echo '<script>alert("invalid rollno")</script>';
			}
			else if($_GET['error']=="password"){
				echo '<script>alert("recheck password")</script>';
			}
			else if($_GET['error']=="usernametaken"){
				echo '<script>alert("user already exists")</script>';
			}
		}
		else if(isset($_GET['signup'])){
			if($_GET['signup']=="success"){
				echo '<script>alert("signup success")</script>';
			}

		}
		?>
		<div class="content">
	<div class="form-group ">
    <label for="Username" class="ml-3" style="text-align: center;">Username:</label>
    <input type="text" class="form-control ml-5" placeholder="Enter Username" id="Username" name="Username" style="width: 50%;" required>
  </div>
  <!-- <div class="form-group ">
    <label for="Rollno" class="ml-3" style="text-align: center;">Rollno:</label>
    <input type="text" class="form-control ml-5" placeholder="Enter Rollno" id="Rollno" name="Rollno" style="width: 50%;" required>
  </div> -->
  <div class="form-group ">
    <label for="email" class="ml-3" style="text-align: center;">Email address:</label>
    <input type="email" class="form-control ml-5" placeholder="example:abc@123.com" id="email" name="email" style="width: 50%;" required>
  </div>
    <div class="form-group ">
    <label for="pwd" class="ml-3" style="text-align: center;">Password:</label>
    <input type="password" class="form-control ml-5" placeholder="Enter password" id="pwd" name="password" style="width: 50%;;" required>
  </div>
  <div class="form-group ">
    <label for="re-pwd" class="ml-3" style="text-align: center;">Confirm-Password:</label>
    <input type="password" class="form-control ml-5" placeholder="Confirm password" id="re_pwd" name="re-password" style="width: 50% ;" required>
  </div>
  
  <button type="submit" class="btn btn-primary ml-3" name="signup-submit">Submit</button>
</div>
</form>
</main>
</body>
</html>
