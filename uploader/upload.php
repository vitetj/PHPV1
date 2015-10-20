<?php include "db.php" ?>

<?php


  	$_GET["upload"];
	
	
	
	
	$upload = $_GET["upload"];


$sql =  mysql_query ("SELECT * FROM act  WHERE newfilename = '$upload'");
$row = mysql_num_rows($sql);

	($linha = mysql_fetch_array($sql));
	$title = $linha['comentario'];




	
	?>
	
  
  <html>
  <head>
  <?php
  
  
  
  
  
  
  if(empty($title)){
  echo "<title>Upload</title>";
	
	
	
}else{
  echo "<title>$title</title>";

	
}



 
 
  if(empty($title)){
  
  $newtitle = "Upload";
	
	
	
}else{

  $newtitle = $title;

	

}

	  
	  
	  ?>
	    <link rel="stylesheet" type="text/css" href="styles.css">
	    <link rel="stylesheet" type="text/css" href="socialstyles.css">
<link href="http://fonts.googleapis.com/css?family=Lato:300,400" rel="stylesheet" type="text/css">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<meta name="apple-mobile-web-app-capable" content="yes" />
<link rel="stylesheet" href="Font-Awesome/css/font-awesome.min.css">

    <script src="js/pace.min.js"></script>
      <link href="css/pace.css" rel="stylesheet" />
      <script>
pace.start()
</script>


  </head>
  
  <body>
  
<br>
<!-- logo -->

  <center>
  <img width='200px'; height="auto"; src='img/yourlogo.png'>
  
  
  <br><br>
  <center>
  <div class='action'>
  
  
  
  <a href='home.php'> <i class="fa fa-angle-left"></i>&nbsp;&nbsp;Back</a>
  
  </div>
  <div class="mainbox">

  <?php
  
  //GET ALL THE INFORMATIONS/LINK/COMMENT FROM THE DATABASE
  
     $sql =  mysql_query ("SELECT * FROM act  WHERE newfilename = '$upload' ORDER BY date desc");
$row = mysql_num_rows($sql);

	($linha = mysql_fetch_array($sql));
			$newfilename = $linha['newfilename'];
			$comment = $linha['comentario'];
			$date = $linha['date'];
			echo "<br><br>";
			
			
			
			
			
			
			
			
			if(!empty($comment)){
            echo "<div class='comment'>";
            echo $comment;
            echo "</div><br><br>";
            }
            else{
	            echo"<br>";
            }
			
            echo "<img id = 'img'; height='auto'; src='/upload/upload/".$newfilename."'>";
            
       
            echo "<br><br>";
            
            
            
             
            			$myurl = $_SERVER['HTTP_HOST'];

			?>
			
			
			<div class='options'>
			<?php
			
			// DIRECT LINK / HTML CODE FOR THE UPLOADED IMAGE
			echo"<br>";
			echo'&nbsp;	&nbsp;	&nbsp;	&nbsp;HTML Image (websites & blogs)<br>';
			echo"&nbsp;	&nbsp;<input type='text' name='comentario' value='<img src=&#34;$myurl/upload/upload/$newfilename&#34;>'/>";
			echo "<br><hr>";
			echo'&nbsp;	&nbsp;&nbsp;	&nbsp;	Direct Image Link<br>';
			echo"&nbsp;	&nbsp;<input type='text' name='comentario' value='$myurl/upload/upload/$newfilename'/>";
						echo "<br><br>";
						?>
						
						
						
			
			
	
	
	
  </div><br><br>
  		    <div class='options2'>

  		    <div class='inneroptions2'>







<center>
<table style="text-align: center; width: auto; position: relative; top:-12px;" border="0"
cellpadding="0" cellspacing="20">
<tbody>
<tr>
<td style="vertical-align: top;">



<div class='twittershare'>

<a href='http://twitter.com/home?status=<?php echo $newtitle; ?>+<?php echo $myurl.'/upload/upload.php?upload='.$newfilename;  ?>' target='_blank'>   <i class="fa fa-twitter"></i> Twitter</a>
</div>



</td>
<td style="vertical-align: top;">




<div class='facebookshare'>

<a href='http://www.facebook.com/share.php?u=<?php echo $myurl.'/upload/upload.php?upload='.$newfilename;  ?>&title=<?php echo $newtitle; ?>
' target='_blank'>   <i class="fa fa-facebook"></i> Facebook</a>

</div>




</td>
<td style="vertical-align: top;">



<div class='googleshare'>

<a href='https://plus.google.com/share?url=<?php echo $myurl.'/upload/upload.php?upload='.$newfilename;  ?>' target='_blank'>   <i class="fa fa-google-plus"></i> Google+</a>

</div>



</td>
</tr>
</tbody>
</table>

</div></div><br><br>


</div>


			
			<br><br><br>
			
  </body>
  </html>