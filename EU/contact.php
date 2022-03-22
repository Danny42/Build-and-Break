<?php
/**
 * Enterprise Outsourcing - PHP email creation and transport
 * @author Hendrik Jacobs (hendrik.jacobs@enterpriseoutsourcing.com)
 */
date_default_timezone_set('Etc/UTC');

require_once 'PHPMailerAutoload.php';

require('recaptcha-master/src/autoload.php');

$recaptchaSecret = '6Lca7doUAAAAAJBb0_bgjQ4exozRfB0TO_DkSote';

/**
 * GLOBAL SETTINGS
 * @author Hendrik Jacobs (hendrik.jacobs@enterpriseoutsourcing.com)
 * $SMTPserver # Point to the SMTP Server
 */
$SMTPserver = "LOCALHOST";

$varURL = $_SERVER['SERVER_NAME'];



$varDefaultFROM = "info@enterpriseunify.com";
$varDefaultTO = "info@enterpriseunify.com";
$varDefaultReturn = "noreply@enterpriseunify.com";

$error_msg = array();
$maxPoints = 4; // max points a person can hit before it refuses to submit - recommend 4

if ($_SERVER['REQUEST_METHOD'] == "POST") {

	//reCAPTCHA validation
	if (isset($_POST['g-recaptcha-response'])) {
						
		$recaptcha = new \ReCaptcha\ReCaptcha($recaptchaSecret, new \ReCaptcha\RequestMethod\SocketPost());

		$resp = $recaptcha->verify($_POST['g-recaptcha-response'], $_SERVER['REMOTE_ADDR']);

		  if (!$resp->isSuccess()) {
		
				header("Location: capcha-failed.html");
				exit();				
				 
		  }	
	}
	
	
		

$points += 2;

		if (strpos($_POST['message'], "http://") !== false || strpos($_POST['comments'], "www.") !== false)
			$points += 2;
		if (preg_match("/(<.*>)/i", $_POST['message']))
		$points += 2;
		if (strlen($_POST['first_name']) < 3)
			$points += 1;
		if (strlen($_POST['last_name']) < 3)
			$points += 1;
		if (strlen($_POST['message']) < 15 || strlen($_POST['message']) > 1500)
			$points += 1;
		if (preg_match("/[bcdfghjklmnpqrstvwxyz]{7,}/i", $_POST['message']))
			$points += 1;
	//SPAM Check end
	
	
	
  //Validate First Name
	if (!empty($_POST['first_name']) && !preg_match("/^[a-zA-Z-'\s]*$/", stripslashes($_POST['first_name'])))
		$error_msg[] = "The firstname field must not contain special characters.\r\n";
	//Validate Last Name
	if (!empty($_POST['last_name']) && !preg_match("/^[a-zA-Z-'\s]*$/", stripslashes($_POST['last_name'])))
		$error_msg[] = "The lastname field must not contain special characters.\r\n";
	//Validate Email Address
	if (!empty($_POST['email']) && !preg_match('/^([a-z0-9])(([-a-z0-9._])*([a-z0-9]))*\@([a-z0-9])(([a-z0-9-])*([a-z0-9]))+' . '(\.([a-z0-9])([-a-z0-9_-])?([a-z0-9])+)+$/i', strtolower($_POST['email'])))
		$error_msg[] = "That is not a valid e-mail address.\r\n";
		
	
	/*NO LINKS ALLLOWED IN THIS MAILER!!!!*/
if (preg_match("/\b(?:(?:https?|ftp|http):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i", $_POST['first_name']))
{      
     $error_msg[] = "No links in textfield.\r\n";
}
if (preg_match("/\b(?:(?:https?|ftp|http):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i", $_POST['last_name']))
{
    $error_msg[] = "No links in textfield.\r\n";
}
if (preg_match("/\b(?:(?:https?|ftp|http):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i", $_POST['company_name']))
{
    $error_msg[] = "No links in textfield.\r\n";
}
if (preg_match("/\b(?:(?:https?|ftp|http):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i", $_POST['phone']))
{
    $error_msg[] = "No links in textfield.\r\n";
}
if (preg_match("/\b(?:(?:https?|ftp|http):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i", $_POST['country']))
{
    $error_msg[] = "No links in textfield.\r\n";
}
if (preg_match("/\b(?:(?:https?|ftp|http):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i", $_POST['message']))
{
    $error_msg[] = "No links in textfield.\r\n";
}

	
	if ($error_msg == NULL && $points <= $maxPoints) {
			
		// Grab data from the form
		$honeypot1 = $_POST['title'];
		$varFirstName = $_POST['first_name']; 
		$varLastName = $_POST['last_name']; 
		$varCompanyName = $_POST['company_name']; 
		$varEmail = $_POST['email']; 
		$varPhone = $_POST['phone']; 
		$varCountry = $_POST['country_name'];
		$honeypot2 = $_POST['subject'];
		$varMessage = $_POST['message']; 
		$varAns = $_POST['ans']; 

				
	if(strpos($varURL,"enterpriseunify.co.za")) {
		  $varDefaultFROM = "info@enterpriseunify.co.za";
		  $varDefaultTO = "info@enterpriseunify.co.za";
		  $varDefaultReturn = "noreply@enterpriseunify.co.za";
		}
		if(strpos($varURL,"enterpriseunify.com.au")) {
		  $varDefaultFROM = "info@enterpriseunify.com.au";
		  $varDefaultTO = "info@enterpriseunify.com.au";
		  $varDefaultReturn = "noreply@enterpriseunify.com.au";
		}


		
		/*/
		* EMAIL TO THE SALES TEAM
		*/
		// Sales Email - Create the Body 
		$msgSales .= 'First Name: ' . $varFirstName . "\n";
		$msgSales .= 'Last Name: ' . $varLastName . "\n";
		$msgSales .= 'Company: ' . $varCompanyName . "\n";
		$msgSales.= 'Country: ' . $varCountry . "\n";
		$msgSales .= 'Email: ' . $varEmail . "\n";
		$msgSales .= 'Telephone: ' . $varPhone . "\n";
		$msgSales .= 'Message: ' . $varMessage . "\n";

		// Sales email - Assemble the email
		$mailSales = new PHPMailer();        
		$mailSales->CharSet = 'UTF-8 ';
		$mailSales->Host = $SMTPserver;
		$mailSales->IsSMTP();
		$mailSales->SMTPAuth = false;
		$mailSales->Port = 25;
		$mailSales->From = $varDefaultFROM;
		$mailSales->FromName = "Enterprise Unify Info";
		$mailSales->Subject = "Message from Enterprise Unify Website";  
		// Sales email - END
		$mailSales->AddAddress($varDefaultTO);
		$mailSales->Body = $msgSales;
		
		/**
		* RETURN EMAIL TO THE END USER
		*/	
		$msgReturn .= 'Dear ' . $varFirstName . ' ' . $varLastName . "\n\n";
		$msgReturn .= 'Thank you for your enquiry on the Enterprise Unify ' . "\n\n";
		$msgReturn .= 'Our sales team will reach out to you as soon as possible ' . "\n\n";
		$msgReturn .= 'Regards ' . "\n\n";
		$msgReturn .= 'Enterprise Unify ' . "\n";
		
		// Confirmation email - Assemble the email
		$mailConfirmation = new PHPMailer();
		$mailConfirmation->Host = $SMTPserver;
		$mailConfirmation->IsSMTP();
		$mailConfirmation->SMTPAuth = false;
		$mailConfirmation->Port = 25;
		$mailConfirmation->From = $varDefaultReturn;
		$mailConfirmation->FromName = "Noreply";
		$mailConfirmation->Subject = "Enquiry on the Enterprise Unify Website";
		// Confirmation email - END
		$mailConfirmation->AddAddress($varEmail);
		$mailConfirmation->Body = $msgReturn;
		
		
		if (strlen(($_POST['message'])) <= 25) {
    	
		echo "Message too Short to submit...";
		die();
		}else{
		if (strlen(($_POST['message'])) >= 250) {
    	
		echo "Message too Long to submit...";
		die();
		}else{
			
			
			
		if(isset($_POST['ans']) && (strtolower( $_POST['ans']))!='blue')
		{
// add error to error array
			$error[] = header('Location: fail.html');
			exit();
		}
// if no errors are set, continue
			if(empty($error))
			{
				header('Location: thankyou.html');
			
			}
	
	
			
			//check if the honeypot field is filled out. If not, send a mail.
		if( ! empty( $honeypot1 ) ){
		echo "Error!!!";
		die();
			}else{
		if( ! empty( $honeypot2 ) ){
		echo "Error!!!";
		die();
			}else{

			
		if(!$mailSales->Send()) {
			echo "Mailer Error: " . $mailSales->ErrorInfo;
			die();
		} 
		else {
			echo "Message sent!";
		}
		
		if(!$mailConfirmation->Send()) {
			echo "Mailer Error: " . $mailConfirmation->ErrorInfo;
			die();
		}
		else {
			echo "Message sent!";
		}
		
		header("Location: thankyou.html");  
		
	}}}}}
	
	else //Error
	{echo "Error!!!M";
		die();
		header("Location: fail.html"); 
	}
}


?>