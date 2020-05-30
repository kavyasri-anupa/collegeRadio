<?php
session_start();
$conn=mysqli_connect("localhost","root","","profileUpload");
$username=$_SESSION['username'];
<?php
// $msg = '';
// if($_SERVER['REQUEST_METHOD']=='POST'){
//     $image = $_FILES['image']['tmp_name'];
//     $img = file_get_contents($image);
//     $con = mysqli_connect('localhost','root','','admin') or die('Unable To connect');
//     $sql = "insert into images (image) values(?)";

//     $stmt = mysqli_prepare($con,$sql);

//     mysqli_stmt_bind_param($stmt, "s",$img);
//     mysqli_stmt_execute($stmt);

//     $check = mysqli_stmt_affected_rows($stmt);
//     if($check==1){
//         $msg = 'Image Successfullly UPloaded';
//     }else{
//         $msg = 'Error uploading image';
//     }
//     mysqli_close($con);

if (isset($_POST['submit'])) {
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
    			$newfile="profile".$username.".".$fileActExt;
    			$fileDest='uploads/'.$newfile;
    			move_uploaded_file($fileTempName, $fileDest);
    			// $sql="UPDATE profileimg SET status=0 WHERE userid='$id';";
    			$sql="INSERT INTO profile(img) VALUES('$fileTempName');";
    		    $result=mysqli_query($conn,$sql);
    			if ($result) {
    			header("Location:indexUpload.php?uploadsuccess");
    				echo "uploaded";
    			 }
    			 else{
    			 	echo "failedss";
    			 }
    			
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
?>