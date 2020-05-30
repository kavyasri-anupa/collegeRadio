<?php
$conn=mysqli_connect("localhost","root","","placements");
if(!$conn){
  die('connection failed:'.mysqli_connect_error());
}
    if(isset($_POST['postButton'])){
         // $date=$_POST['date'];
        $user=$_POST['username'];
        $msg=$_POST['message'];
        // echo $msg;
        
           $sql="UPDATE signuptable set message='$msg' WHERE username='$user'";
           $result=$conn->query($sql);
             header("Location:placements.php");
           $conn->close();
    }
    else{
        echo "something wrong";
    }
