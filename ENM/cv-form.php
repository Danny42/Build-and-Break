<?php

date_default_timezone_set('Etc/UTC');

require_once 'PHPMailerAutoload.php';
$SMTPserver = "LOCALHOST";

$varURL = $_SERVER['SERVER_NAME'];
 

if ($_SERVER['REQUEST_METHOD'] == "POST") {
	    $varFirstName = $_POST['first_name']; 
		$varLastName = $_POST['last_name']; 
		$varPhone = $_POST['contact']; 
		$varEmail = $_POST['email'];
		$varAge = $_POST['age']; 
		$varGender = $_POST['gender']; 

	

	    $message_added .= 'First Name: ' . $varFirstName . "\n";
		$message_added .= 'Last Name: ' . $varLastName . "\n";
		$message_added .= 'Telephone: ' . $varPhone . "\n";
		$message_added .= 'Email: ' . $varEmail . "\n";
		$message_added .= 'Age: ' . $varAge . "\n";
		$message_added .= 'Gender: ' . $varGender . "\n";

		/**
		* RETURN EMAIL TO THE END USER
		*/	
		$msgReturn .= 'Dear ' . $varFirstName . ' ' . $varLastName . "\n\n";
		$msgReturn .= 'Thank you for your enquiry on the Enterprise Outsourcing Website ' . "\n\n";
		$msgReturn .= 'Our sales team will reach out to you as soon as possible ' . "\n\n";
		$msgReturn .= 'Regards ' . "\n\n";
		$msgReturn .= 'Enterprise Outsourcing ' . "\n";
		

 error_reporting(E_ALL);
 ini_set('display_errors', 0 );
 
if(isset($_FILES) && (bool) $_FILES) {
  
	$allowedExtensions = array("pdf","doc","docx","gif","jpeg","jpg","png","rtf","txt");
	
	$files = array();
	foreach($_FILES as $name=>$file) {
		$file_name = $file['name']; 
		$temp_name = $file['tmp_name'];
		$file_type = $file['type'];
		$path_parts = pathinfo($file_name);
		$ext = $path_parts['extension'];
		if(!in_array($ext,$allowedExtensions)) {
			die("File $file_name has the extensions $ext which is not allowed");
		}
		array_push($files,$file);
	}
	
	// email fields: to, from, subject, and so on
	$to = "danievdb101danny@gmail.com";
	$from = "noreply@enterpriseoutsourcing.com"; 
	$subject ="Enterprise Outsourcing CV Form Submissions"; 
	$message = "$message_added";
	$headers = "From: $from";
	
	
	
	// boundary 
	$semi_rand = md5(time()); 
	$mime_boundary = "==Multipart_Boundary_x{$semi_rand}x"; 
	 
	// headers for attachment 
	$headers .= "\nMIME-Version: 1.0\n" . "Content-Type: multipart/mixed;\n" . " boundary=\"{$mime_boundary}\""; 
	 
	// multipart boundary 
	$message = "This is a multi-part message in MIME format.\n\n" . "--{$mime_boundary}\n" . "Content-Type: text/plain; charset=\"iso-8859-1\"\n" . "Content-Transfer-Encoding: 7bit\n\n" . $message . "\n\n"; 
	$message .= "--{$mime_boundary}\n";
	 
	// preparing attachments
	for($x=0;$x<count($files);$x++){
		$file = fopen($files[$x]['tmp_name'],"rb");
		$data = fread($file,filesize($files[$x]['tmp_name']));
		fclose($file);
		$data = chunk_split(base64_encode($data));
		$name = $files[$x]['name'];
		$message .= "Content-Type: {\"application/octet-stream\"};\n" . " name=\"$name\"\n" . 
		"Content-Disposition: attachment;\n" . " filename=\"$name\"\n" . 
		"Content-Transfer-Encoding: base64\n\n" . $data . "\n\n";
		$message .= "--{$mime_boundary}\n";
			
	}
	// send
	 
	$send = mail($to, $subject, $message, $headers); 
	if ($send) { 
		echo "mail sent to $to!"; 
		header("location: index.html");
	} 
	
}
	else { 
		echo "failed"; 
	} 
	
}





?>	
<html>
<body>
                    	  <form action="cv-form.php" name="Enterprise_Outsourcing" class="df-form" method="post" enctype="multipart/form-data">
<div class="row">
<div class="col-md-6">
<div class="form-group">
<label for="first_name" style="float: left">First Name:</label>
<div class="df-input-box">
<input type="text" name="first_name" placeholder="First Name" id="first_name" required>
</div>
</div>
			
<div class="form-group">
<label for="last_name" style="float: left">Last Name:</label>
<div class="df-input-box">
<input type="text" name="last_name" placeholder="Last Name" id="last_name" required>
</div>
</div>
					
<div class="form-group">
<label for="contact" style="float: left">Contact Details:</label>
<div class="df-input-box">
<input type="text" name="contact" placeholder="Phone Number" id="contact" required> <label for="contact"></label>
</div>
</div>
				  
<div class="form-group">
<label for="email" style="float: left">Email:</label>
<div class="df-input-box">
<input type="text" name="email" placeholder="Email Address" id="email" required>
</div>
</div>	
<div class="form-group">
<label for="age" style="float: left">Age:</label>
<div class="df-input-box">
<input type="text" name="age" placeholder="Age" id="age" required>	
</div>
</div>
			
<div class="form-group">
<label for="gender" style="float: left">Gender:</label>
<div class="df-input-box">
<select type="suject" name="gender" id="gender">
<option value="" >--Select--</option>         
<option value="Male">Male</option>
<option value="Female">Female</option>
<option value="Other">Other</option>
</select>
</div>
</div>
	

<label for="cv" style="float: left">Upload CV:</label>
<input type="file" id="attach1" class="form-cv" name="attach1" accept="application/pdf" required>
</div>
</div>				
	
					
<center> <button type="submit" class="text-center text-uppercase s-btn s-btn--md s-btn--dark-brd g-radius--50 g-padding-x-50--xs g-margin-b-20--xs" name="submit" value="Apply Now"  >Apply Now </button></center>
					 
</form>
	</body></html>
