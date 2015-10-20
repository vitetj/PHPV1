<?php include "db.php" ?>

<?php $getdate = date('H:i | d/m/Y');  
	error_reporting(0);

	
	
	/*  DELETE FILES OLDER THAN 24H
	
	$sql =  mysql_query ("SELECT * FROM act");
$row = mysql_num_rows($sql);


	($linha = mysql_fetch_array($sql));
		$filelink = $linha['filelink'];
		$filename = $linha['filename'];



$deletefile = "upload/$filename";

	
$dir = "upload/";

foreach (glob($dir."*") as $filename) {

if (filemtime($filename) < time() - 86400) {
    unlink($filename);
    }
}


	*/
	
	$error = $_GET['error'];
	
	
	function fileCheck($error){
	
	
	$errorcolor = "<span style='color:#9a382f'><strong>Error</strong></span>";
	
	if($error == 'size'){
		return $errorcolor.': Upload limit is 40mb<br><br>';
		
}
	
	
		if($error == 'format'){
		return $errorcolor.': Invalid Format<br><br>';
	
	}
	}
	
?>



<html>
<head>

<title>Uploads</title>
<link rel="stylesheet" href="Font-Awesome/css/font-awesome.min.css">

  <link rel="stylesheet" type="text/css" href="styles.css">

<link href="http://fonts.googleapis.com/css?family=Lato:300,400" rel="stylesheet" type="text/css">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<meta name="apple-mobile-web-app-capable" content="yes" />

  <meta name="viewport" content="width=device-width,initial-scale=1">

 
  <style>
  
  
#yourBtn{ /* CUSTOM UPLOAD BUTTON STYLES */

   font-family: Lato;
   width: 100%;
   max-width: 280px;
   height: 50px;
   line-height: 50px;
   padding: 4px;
   -webkit-border-radius: 5px;
   -moz-border-radius: 5px;
   border: 2px dashed #BBB; 
   text-align: center;
   background-color: #fbfbfb;
   cursor:pointer;
   font-family: 'Lato';
   top:5px;
   font-size: 20px;
   
   
   
   
  }
</style>



    <script src="js/pace.min.js"></script>
      <link href="css/pace.css" rel="stylesheet" />
      <script>
pace.start()
</script>



<script type="text/javascript">

function escapeHtml(text) {
  return text
      .replace(/&/g, "&amp;")
      .replace(/</g, "&lt;")
      .replace(/>/g, "&gt;")
      .replace(/"/g, "&quot;")
      .replace(/'/g, "&#039;");
}



/* JAVASCRIPT TO MAKE THE CUSTOM UPLOAD BUTTON WORKS */

 function getFile(){
   document.getElementById("upfile").click();
 }
 function sub(obj){
    var file = obj.value;
    var fileName = file.split("\\");
    var fileNam2 = fileName[fileName.length-1];
    document.getElementById("yourBtn").innerHTML = escapeHtml(fileNam2);
    document.myForm.submit();
    event.preventDefault();

  }
  
</script>



</head>
<body>


  <br>
  <center>
  
   <!-- ADD LOGO HERE -->
  <img width='200px'; height="auto"; src='img/yourlogo.png'>
  
  
  <br><br>


<div class="mainbox">
<br><br>
<center>
<?php

echo fileCheck($error);

?>
<!-- UPLOAD IMAGE AND COMMENT -->
<form name="commentform" method="POST"  enctype="multipart/form-data"  action="act.php" accept-charset="ISO-8859-1">
<input type="hidden" name="myid" value="<?=$_SESSION['UserID'] ?>" />
<input type="hidden" name="myuser" value="<?=$_SESSION['Username'] ?>" />
<input type="hidden" name="date" value="<?= $getdate; ?>" />








<!-- UPLOAD BUTTON -->

<div id="yourBtn" onclick="getFile()"><span style="color:#c3c3c3;"><i class="fa fa-cloud-upload"></i> Upload (Max. 40mb)</span></div>
<!-- this is your file input tag, so i hide it!-->
<!-- i used the onchange event to fire the form submission-->
<div style='height: 0px;width: 0px; overflow:hidden; ' ><input id="upfile" type="file" value="upload" name="file" onchange="sub(this)" accept="image/*" /></div>
<br>
<input type="text" name="comentario" maxlength="50" value="" placeholder="Title"/><br>






<!-- here you can have file submit button or you can write a simple script to upload the file automatically-->
<!-- <input type="submit" value='submit' > -->
<br><br>
<button type="submit" name="submit" style="width:98px;">Upload  <i class="fa fa-cloud-upload"></i></button>


<br>
</form>




<br>
</div>


</body>
</html>