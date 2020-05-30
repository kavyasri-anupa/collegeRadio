<?php
// include "DBconnection.php";
include "postDB.php";
date_default_timezone_set('Asia/Kolkata');
session_start();

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		textarea{
			width:50%;
			text-align: center;
			height: auto;
		}
		button{
			background-color: blue;
			opacity: 0.5;
			color: white;
			border-radius: 4px;
		}
		button:hover{
			opacity: 1;
		}
		.editPost{
			position: absolute;
			
		}
	</style>

</head>
<body>
	<?php
	echo "<form method='POST' action='".getLogin($Conn)."'>
    	<input type='text' name='username' placeholder='username'>
    	<input type='password' name='pwd' placeholder='password'>
    	<button type='submit' name='loginButton'>Login</button>
    	</form>";
    echo "<form method='POST' action='".Logout()."'>
    	<button type='submit' name='logoutButton'>Logout</button>
    	</form>";
    	if(isset($_SESSION['id'])){
    		echo "you are logged in";
    	}
    	else{
    		echo "you are logged out";
    	}

	?>
<?php
echo "
    <form method='POST' action='".setPosts($Conn)."'>
    	<input type='hidden' name='id' value=''>
    	<input type='hidden' name='username'  value='Kavya sri'>
    	<input type='hidden' name='date' value='".date('Y-m-d H:i:s')."'>
    	<textarea name='message'></textarea>
    	<button type='submit' name='postButton'>Post</button>
    	</form>";
    	getPosts($Conn);
?>

</body>
</html>