<?php include "db.php" ?>

<html>
<head>
<title> Blubnote </title>
  <link rel="icon" href="favicon.png" type="image/png">

</head>
<body>



<?php


   $comentario= mysql_real_escape_string($_POST['comentario']);
   $date = $_POST['date'];
      $comment = htmlspecialchars($comentario, ENT_QUOTES, 'ISO-8859-1');


   
//file






$allowedExts = array("gif", "jpeg", "jpg", "png","psd");
$temp = explode(".", $_FILES["file"]["name"]);
$extension = end($temp);





if ((($_FILES["file"]["type"] == "image/gif")
|| ($_FILES["file"]["type"] == "image/jpeg")
|| ($_FILES["file"]["type"] == "image/jpg")
|| ($_FILES["file"]["type"] == "image/photoshop")
|| ($_FILES["file"]["type"] == "image/x-photoshop")
|| ($_FILES["file"]["type"] == "application/x-photoshop")
|| ($_FILES["file"]["type"] == "image/psd")
|| ($_FILES["file"]["type"] == "application/photoshop")
|| ($_FILES["file"]["type"] == "application/psd")
|| ($_FILES["file"]["type"] == "image/vnd.adobe.photoshop")
|| ($_FILES["file"]["type"] == "application/octet-stream")
|| ($_FILES["file"]["type"] == "application/postscript")
|| ($_FILES["file"]["type"] == "image/pjpeg")
|| ($_FILES["file"]["type"] == "image/x-png")
|| ($_FILES["file"]["type"] == "image/png"))
&& ($_FILES["file"]["size"] < 41943040)  //40MB
&& in_array($extension, $allowedExts)) {
  if ($_FILES["file"]["error"] > 0) {
    echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
  } else {
    echo "Upload: " . $_FILES["file"]["name"] . "<br>";
    echo "Type: " . $_FILES["file"]["type"] . "<br>";
    echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
    echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br>";
   if (file_exists("upload/" . $_FILES["file"]["name"]))
   {
    
    $filename = $_FILES["file"]["name"];
    $i = (rand());
    $ii = (rand());
    $iii = (rand());
    $newfilename = $ii.$iii.$i.$filename;
    
    
  
    
      echo $_FILES["file"]["name"] . " new file name is $newfilename. ";
    } else {
    
       $filename = $_FILES["file"]["name"];
    $i = (rand());
    $newfilename = $i.$filename;
    
    
   
    
    
    
      move_uploaded_file($_FILES["file"]["tmp_name"],
      "upload/" . $newfilename);
      echo "Stored in: " . "upload/" . $newfilename;
    }
  }
} else {
  echo "Invalid file";
}


$filename = $_FILES["file"]["name"];
$filelink = "upload/$filename";
$filename = $_FILES["file"]["name"];



 if($_FILES["file"]["size"] > 41943040){
	 
	 header('location: home.php?error=size');
	 exit;   
    }
    
     if(in_array($extension, $allowedExts)){
	 	 
	 }
	 
else{
	 header('location: home.php?error=format');
exit;
}
   
?>


<?php


//CHECK MINE TYPE OF THE UPLOADED FILE
$filearray = array("image/gif", "image/jpeg", "image/jpg","image/pjpeg", "image/x-png","image/png");
$filetype =  mime_content_type('upload/'.$newfilename);
echo $filetype;


if(!in_array($filetype, $filearray)){

	 header('location: home.php?error=format');
	 exit;
}




$insert = "INSERT INTO act (date, filelink, filename, newfilename, comentario)



VALUES ('$date', '$filelink', '$filename', '$newfilename', '".$comment."')";
$query = mysql_query($insert);


?>
<?php
if(!empty($newfilename)){
$backurl = "upload.php?upload=$newfilename";
header("Location: $backurl");
exit;

}

else{
	header("Location: home.php");
	
	
	

}
if ($_FILES["file"]["error"] > 0) {
    echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
exit;
}

?>






</form>





</body>
</html>