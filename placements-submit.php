<?php
session_start();
$name=$_SESSION['username'];?>
<?php
$conn=mysqli_connect("localhost","root","","placements");
if(!$conn){
	die('connection failed:'.mysqli_connect_error());
}

if (isset($_SESSION['username'])) {
if (isset($_POST["post-submit"])){
	$msg=$_POST["announce"];
	$name=$_SESSION['username'];
	$date=date('Y-m-d');
	$sql = "UPDATE signuptable SET message='$msg',date='$date' WHERE username='$name'";
	mysqli_query($conn,$sql);
    // mysqli_close($conn);
    header("Location:placements.php");
    exit();
    
}
}
else{

	 header("Location: placements.php?&error=you must be logged in");
	 exit();
}
if (isset($_POST['editButton'])) {
    $user=$_POST['username'];
    $msg=$_POST['message'];
    if($user===$_SESSION['username']){

     echo "
    <form method='POST' action='placements-edit.php'>";
      
       echo "<textarea name='message' rows='8' cols='60'>".$msg."</textarea><br>";
      echo "<button type='submit' name='postButton'>submit</button>
      </form>";
}
          else{
            header("Location:placements.php?&error=edit");
            exit();
          }
}

if(isset($_POST['upload'])){
    if(isset($name)){
   
        $file=$_FILES['file'];
       $fileName = $_FILES['file']['name'];
       $fileTempName = $_FILES['file']['tmp_name'];
        $fileSize = $_FILES['file']['size'];
        $fileError = $_FILES['file']['error'];
        $fileType = $_FILES['file']['type'];

        $fileExt=explode('.',$fileName);
        $fileActExt=strtolower(end($fileExt));
       $allowed=array('jpg', 'jpeg', 'png', 'pdf');
        if (in_array($fileActExt,$allowed)) {
        if ($fileError===0) {
            if ($fileSize <5000000) {
                
                $image=addslashes(file_get_contents($_FILES['file']['tmp_name']));
                $q="UPDATE signuptable SET image='$image' WHERE username='$name'";
                 mysqli_query($conn,$q);
                  $query="SELECT * FROM signuptable";
                  $result=mysqli_query($conn,$query);  
                  header("Location:placements.php");
                  exit();
              }
            else{
                echo "file size is too big";
                }
                 }
             
        else{
            echo "error in uploading file";
        }
            }
        else{
        echo "this type of files are not allowed";
        }
              
            
        }
    }

    
    if(isset($_POST['removeButton'])){
        $user=$_POST['username'];   
         if($user===$_SESSION['username']){
          $sql="UPDATE signuptable set image='' WHERE username='$user'";
         $result=$conn->query($sql);
             header("Location:placements.php");
          $conn->close();
        
    }
    else{
      header("Location:placements.php?&error=remove");
      exit();
    }
  }  

        
        
    

?>