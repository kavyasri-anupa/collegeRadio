<?php
$conn=mysqli_connect("localhost","root","","announcements");
if(!$conn){
  die('connection failed:'.mysqli_connect_error());
}
    if(isset($_POST['postButton'])){
         // $date=$_POST['date'];
        $user=$_POST['username'];
        $msg=$_POST['message'];
        // echo $msg;
        
           $sql="UPDATE signuptable set notice='$msg' WHERE username='$user'";
           $result=$conn->query($sql);
             header("Location:announcements.php");
           $conn->close();
    }
    else{
        echo "something wrong";
    }
