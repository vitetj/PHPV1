<?php
if($_POST)
{
	// provide your email address in next line
	$your_email="            ";
	
	$email=$_POST['email'];
	$message=$_POST['message'];
	$name=$_POST['name'];
	$subject="Contact from page";
	$message="New message from ". $name ."
	    	    Message: ". $message."
				Senders email: ". $email;

	$headers="Message from hosting";
	
	mail($your_email,$subject,$message,$headers);
}
else
	{ 
		echo 'error';
	}
?>