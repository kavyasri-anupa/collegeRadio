 <?php
 if(isset($_POST['upload'])){
 	$conn=mysqli_connect("localhost","root","","placements");
        
         $user=$_POST['userid'];
         $pwd=$_POST['pwd'];
         $_SESSION['username']=$user;
         $_SESSION['pwd']=$pwd;
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
                move_uploaded_file($_FILES['file']['tmp_name'], "pictures/".$_FILES['file']['name']);
                 $q="UPDATE profiles set image='".$_FILES['file']['name']."' WHERE username='".$_SESSION['username']."' and password='".$_SESSION['pwd']."'";
                 $result=mysqli_query($conn,$q);   
                if ($result) {
                // header("Location:indexUpload.php?uploadsuccess");
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
