<?php
/**
 * Enterprise Outsourcing - PHP email creation and transport
 * @author Hendrik Jacobs (hendrik.jacobs@enterpriseoutsourcing.com)
 */
date_default_timezone_set('Etc/UTC');

require_once 'PHPMailerAutoload.php';

/**
 * GLOBAL SETTINGS
 * @author Hendrik Jacobs (hendrik.jacobs@enterpriseoutsourcing.com)
 * $SMTPserver # Point to the SMTP Server
 */
$SMTPserver = "LOCALHOST";

$varURL = $_SERVER['SERVER_NAME'];

$varDefaultFROM = "info@enewmedia.co.za";
$varDefaultTO = "info@enewmedia.co.za";
$varDefaultReturn = "noreply@enewmedia.co.za";

if(isset($_POST['email'])) {
	
	// Grab data from the form
	$varFirstName = $_POST['first_name']; 
    $varLastName = $_POST['last_name']; 
	$varCompanyName = $_POST['company_name']; 
    $varEmail = $_POST['email']; 
    $varPhone = $_POST['phone']; 
	$varCountry = $_POST['country_name'];
    $varMessage = $_POST['message']; 
	
	
	if(strpos($varURL,"enewmedia.com")) {
      $varDefaultFROM = "info@enewmedia.com";
	  $varDefaultTO = "info@enewmedia.com";
	  $varDefaultReturn = "noreply@enewmedia.com";
    }
	if(strpos($varURL,"enewmedia.com.au")) {
      $varDefaultFROM = "info@enewmedia.com.au";
	  $varDefaultTO = "info@enewmedia.com.au";
	  $varDefaultReturn = "noreply@enewmedia.com.au";
    }
	if(strpos($varURL,"enewmedia.eu")) {
      $varDefaultFROM = "info@enewmedia.eu";
	  $varDefaultTO = "info@enewmedia.eu";
	  $varDefaultReturn = "noreply@enewmedia.eu";
    }
	if(strpos($varURL,"enewmedia.es")) {
      $varDefaultFROM = "info@enewmedia.es";
	  $varDefaultTO = "info@enewmedia.es";
	  $varDefaultReturn = "noreply@enewmedia.es";
    }
	
	/**
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
	$mailSales->Host = $SMTPserver;
	$mailSales->IsSMTP();
	$mailSales->SMTPAuth = false;
	$mailSales->Port = 25;
	$mailSales->From = $varDefaultFROM;
	$mailSales->FromName = "eNewMedia Info";
	$mailSales->Subject = "Message from eNewMedia Website";  
	// Sales email - END
	$mailSales->AddAddress($varDefaultTO);
	$mailSales->Body = $msgSales;
	
	/**
	* RETURN EMAIL TO THE END USER
	*/	
	$msgReturn .= 'Dear ' . $varFirstName . ' ' . $varLastName . "\n\n";
	$msgReturn .= 'Thank you for your enquiry on the eNewMedia ' . "\n\n";
	$msgReturn .= 'Our sales team will reach out you as soon as possible ' . "\n\n";
	$msgReturn .= 'Regards ' . "\n\n";
	$msgReturn .= 'eNewMedia ' . "\n";
	
	// Confirmation email - Assemble the email
	$mailConfirmation = new PHPMailer();
	$mailConfirmation->Host = $SMTPserver;
	$mailConfirmation->IsSMTP();
	$mailConfirmation->SMTPAuth = false;
	$mailConfirmation->Port = 25;
	$mailConfirmation->From = $varDefaultReturn;
	$mailConfirmation->FromName = "Noreply";
	$mailConfirmation->Subject = "Enquiry on the eNewMedia Website";
	// Confirmation email - END
	$mailConfirmation->AddAddress($varEmail);
	$mailConfirmation->Body = $msgReturn;
	
	if(!$mailSales->Send()) {
		echo "Mailer Error: " . $mailSales->ErrorInfo;
	} 
	else {
		echo "Message sent!";
	}
	
	if(!$mailConfirmation->Send()) {
		echo "Mailer Error: " . $mailConfirmation->ErrorInfo;
	}
	else {
		echo "Message sent!";
	}
	
	header("Location: thankyou.html");  
}
?>