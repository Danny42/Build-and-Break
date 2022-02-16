<?php

date_default_timezone_set('Etc/UTC');

require_once 'PHPMailerAutoload.php';

/**
 * MySQL
 */
	$db_host = "172.31.101.42";
	$db_user = "leadsuser";
	$db_pass = "L32d5Us3r";
	$db_database = "enm_leads";
	$db_table = "secured_details";
	
/**
 * Mail, URL and Email Address
 */
$SMTPserver = "LOCALHOST";

$varURL = $_SERVER['SERVER_NAME'];

$varDefaultReturn = "noreply@securedenterprise.com";	

/**
 * Post back
 */	
if(isset($_POST['email'])) {
	
	if(strpos($varURL,"securedenterprise.co.za")) 
	{
		  $varDefaultReturn = "noreply@securedenterprise.co.za";
	}
	if(strpos($varURL,"securedenterprise.com.au")) 
	{
		  $varDefaultReturn = "noreply@securedenterprise.com.au";
	}
	if(strpos($varURL,"securedenterprise.co.uk")) 
	{
		  $varDefaultReturn = "noreply@securedenterprise.co.uk";
	}
	if(strpos($varURL,"securedenterprise.es"))
	{
		  $varDefaultReturn = "noreply@securedenterprise.es";
	}
		
	//Name, Email and Contact number
	$vName = $_POST['fullname'];
	$vCompanyName = $_POST['companyname'];
	$vEmail = $_POST['email'];
	$vNumber = $_POST['number'];
	$vJobTitle = $_POST['jobtitle'];
	
	//Create connection
	$conn = new mysqli($db_host, $db_user, $db_pass, $db_database);
	// Check connection
	if ($conn->connect_error) 
	{
		die("Connection failed: " . $conn->connect_error);
	} 
	// SQL Statement
	$sql = "INSERT INTO $db_table (name, email, number, companyname, title, regdate) VALUES ('$vName', '$vEmail', '$vNumber', '$vCompanyName', '$vJobTitle', NOW())";
	// Check if write to DB successful
	
	if ($conn->query($sql) === TRUE)
	{
		/**
		* RETURN EMAIL TO THE END USER
		*/	
		$msgReturn .= 'Dear ' . $vName . "\n\n";
		$msgReturn .= 'Thank you for completing the Secured Enterprise Sign up form. ' . "\n\n";
		
		$msgReturn .= 'Regards ' . "\n\n";
		$msgReturn .= 'Secured Enterprise ' . "\n";
		
		// Confirmation email - Assemble the email
		$mailConfirmation = new PHPMailer();
		$mailConfirmation->Host = $SMTPserver;
		$mailConfirmation->IsSMTP();
		$mailConfirmation->SMTPAuth = false;
		$mailConfirmation->Port = 25;
		$mailConfirmation->From = $varDefaultReturn;
		$mailConfirmation->FromName = "Noreply";
		$mailConfirmation->Subject = "Secured Enterprise - Form";
		// Confirmation email - END
		$mailConfirmation->AddAddress($vEmail);
		$mailConfirmation->Body = $msgReturn;		
		$mailConfirmation->Send();
		
		header("Location: blog.html"); 	
		exit();
	}
	else
	{
			header("Location: form.html"); 
			exit();
	}
	
	// Close SQL connection
	$conn->close();	
}

?>