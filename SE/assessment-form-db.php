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
	$db_table = "securedleads";
	
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
	// Questions and Answers - real values
	$vQ1 = $_POST['answer1'];
	$vQ2 = $_POST['answer2'];	
	$vQ3 = $_POST['answer3'];
	$vQ4 = $_POST['answer4'];
	$vQ5 = $_POST['answer5'];
	$vQ6 = $_POST['answer6'];
	$vQ7 = $_POST['answer7'];
	$vQ8 = $_POST['answer8'];
	$vQ9 = $_POST['answer9'];
	$vQ10 = $_POST['answer10'];
	//Score
	$vScore = $_POST['score'];
	
	//Create connection
	$conn = new mysqli($db_host, $db_user, $db_pass, $db_database);
	// Check connection
	if ($conn->connect_error) 
	{
		die("Connection failed: " . $conn->connect_error);
	} 
	// SQL Statement
	$sql = "INSERT INTO $db_table (name, email, number, companyname, regdate, Q1, Q2, Q3, Q4, Q5, Q6, Q7, Q8, Q9, Q10, score) VALUES ('$vName', '$vEmail', '$vNumber', '$vCompanyName', NOW(), '$vQ1' , '$vQ2' , '$vQ3' , '$vQ4' , '$vQ5' , '$vQ6' , '$vQ7' , '$vQ8', '$vQ9' , '$vQ10' , '$vScore')";
	// Check if write to DB successful
	
	if ($conn->query($sql) === TRUE)
	{
		/**
		* RETURN EMAIL TO THE END USER
		*/	
		$msgReturn .= 'Dear ' . $vName . "\n\n";
		$msgReturn .= 'Thank you for completing the Secured Enterprise risk assessment. ' . "\n\n";
		$msgReturn .= 'You scored ' . $vScore . "\n\n";
		
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
		$mailConfirmation->Subject = "Secured Enterprise - Online Risk Assessment";
		// Confirmation email - END
		$mailConfirmation->AddAddress($vEmail);
		$mailConfirmation->Body = $msgReturn;		
		$mailConfirmation->Send();
		
		// Fair Risk
		if ($vScore > "0" && $vScore <= "3")
		{
			header("Location: notsecure.html"); 
			exit();
		}
		// Medium Risk
		elseif ($vScore > "3" && $vScore <= "6")
		{
			header("Location: semisecure.html"); 
			exit();
		}
		// High Risk
		else
		{
			header("Location: secure.html"); 
			exit();
		}		
	}
	else
	{
			header("Location: assessment-form.html"); 
			exit();
	}
	
	// Close SQL connection
	$conn->close();	
}

?>