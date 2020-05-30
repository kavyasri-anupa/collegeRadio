
<?php
$conn=mysqli_connect("localhost","root","","fest");
session_start();
if(!$conn){
	die("connection error");
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>College Fest</title>
    <link rel="stylesheet" type="text/css" href="D:/magicthumb/magicthumb.css">
    <script type="text/javascript" src="D:/magicthumb/magicthumb.js"></script>
    <style type="text/css">
            .inputs{
                position: absolute;
                bottom: 10px;
                text-align: center;
            }
            img:hover{
                width: 300px;
                height: 300px;
                box-shadow: 0 0 20px 0 rgba(0,0,0,0.3);
            }
  /*          #myImg {
  border-radius: 5px;
  cursor: pointer;
  transition: 0.3s;
}

#myImg:hover {opacity: 0.7;}


.modal {
  display: none;
  position: fixed;
  z-index: 1; 
  padding-top: 100px;
  left: 0;
  top: 0;
  width: 100%; 
  height: 100%; 
  overflow: auto;
  background-color: rgb(0,0,0);
  background-color: rgba(0,0,0,0.9); 
}

.modal-content {
  margin: auto;
  display: block;
  width: 80%;
  max-width: 700px;
}
#caption {
  margin: auto;
  display: block;
  width: 80%;
  max-width: 700px;
  text-align: center;
  color: #ccc;
  padding: 10px 0;
  height: 150px;
}

.modal-content,{ 
  animation-name: zoom;
  animation-duration: 0.6s;
}

@keyframes zoom {
  from {transform:scale(0)} 
  to {transform:scale(1)}
}
.close {
  position: absolute;
  top: 15px;
  right: 35px;
  color: #f1f1f1;
  font-size: 40px;
  font-weight: bold;
  transition: 0.3s;
}

.close:hover,
.close:focus {
  color: #bbb;
  text-decoration: none;
  cursor: pointer;
}*/

/* 100% Image Width on Smaller Screens */
/*@media only screen and (max-width: 700px){
  .modal-content {
    width: 100%;
  }
}*/
        </style>
</head>
<body>
    <div class="inputs">
	<form action="#" method="POST" enctype="multipart/form-data">
		<input type="text" name="username" placeholder="enter name" required>
		<input type="file" name="file[]" multiple="multiple">
		<input type="submit" name="upload" value="add">
        
	</form>
</div>
	<?php
	if (isset($_POST['upload'])) {
		$file=$_FILES['file'];
	$fileName = $_FILES['file']['name'];
	$fileTempName = $_FILES['file']['tmp_name'];
	$fileSize = $_FILES['file']['size'];
	$fileError = $_FILES['file']['error'];
	$fileType = $_FILES['file']['type'];
    	
    			for($i=0;$i<=count($fileTempName)-1;$i++){
    			
                    $username=$_POST['username'];
    				$name=addslashes($fileName[$i]);
    				$tmp=addslashes(file_get_contents($fileTempName[$i]));
                    $fileExt=explode('.',$name);
                    $fileActExt=strtolower(end($fileExt));
                    $allowed=array('jpg', 'jpeg', 'png');
                    if (in_array($fileActExt,$allowed)) {
    			       $sql="INSERT INTO fest_Images(username,name,images) VALUES('$username','$name','$tmp');";
    		           $result=mysqli_query($conn,$sql);
                      
    		        }
                     else{
                         echo "this type of files are not allowed";
                    }
    			    
                }
            }
$q="SELECT * FROM fest_Images";
$res=mysqli_query($conn,$q);
if (mysqli_num_rows($res)>0) {
	while ($row=mysqli_fetch_array($res)) {

         echo '<img id="myImg" class=MagicThumb src="data:image/jpeg;base64,'.base64_encode($row['images']).'"width="250" height="250"" alt="img" style="padding:5px">';
//     <div id="myModal" class="modal">
//   <span class="close">&times;</span>
//   <img class="modal-content" id="img01">
// </div>';
//        echo'<script>
//     var modal = document.getElementById("myModal");
// var img = document.getElementById("myImg");
// var modalImg = document.getElementById("img01");
// var captionText = document.getElementById("caption");
// fun enlarge(){
//   modal.style.display = "block";
//   modalImg.src = this.src;
//   captionText.innerHTML = this.alt;
// }
// var span = document.getElementsByClassName("close")[0];
// span.onclick = function() { 
//   modal.style.display = "none";
// }
// </script>';
        
	}
       
}?>
</body>
</html>