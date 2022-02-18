<?php
/**
 * Enterprise Outsourcing - PHP email creation and transport
 * @author Hendrik Jacobs (hendrik.jacobs@enterpriseoutsourcing.com)
 */
date_default_timezone_set('Etc/UTC');

require_once 'PHPMailerAutoload.php';

require('recaptcha-master/src/autoload.php');

$recaptchaSecret = '6LdsdSIUAAAAAJcrgoeC2MinO3s9ZMo2HZPpTkEh';

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
	
	//SPAM Check
	$points = (int)0;
	
	$badwords = array("adult", "beastial", "bestial", "blowjob", "clit", "cum", "cunilingus", "cunillingus", "cunnilingus", "cunt", "ejaculate", "fag", "felatio", "fellatio", "fuck", "fuk", "fuks", "gangbang", "gangbanged", "gangbangs", "hotsex", "hardcode", "jism", "jiz", "orgasim", "orgasims", "orgasm", "orgasms", "phonesex", "phuk", "phuq", "pussies", "pussy", "spunk", "xxx", "viagra", "phentermine", "tramadol", "adipex", "advai", "alprazolam", "ambien", "ambian", "amoxicillin", "antivert", "blackjack", "backgammon", "texas", "holdem", "poker", "carisoprodol", "ciara", "ciprofloxacin", "debt", "dating", "porn", "link=", "voyeur", "content-type", "bcc:", "cc:", "document.cookie", "onclick", "onload", "javascript");

	foreach ($badwords as $word)
		if (
			strpos(strtolower($_POST['message']), $word) !== false || 
			strpos(strtolower($_POST['first_name']), $word) !== false ||
			strpos(strtolower($_POST['last_name']), $word) !== false
		)
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
			$points += 2;
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
		
	if ($error_msg == NULL && $points <= $maxPoints) {
			
		// Grab data from the form
		$varFirstName = $_POST['first_name']; 
		$varLastName = $_POST['last_name']; 
		$varCompanyName = $_POST['company_name']; 
		$varEmail = $_POST['email']; 
		$varPhone = $_POST['phone']; 
		$varCountry = $_POST['country_name'];
		$varMessage = $_POST['message']; 
		$varUser_IP = getUserIP();
				
		if(strpos($varURL,"enewmedia.co.za")) {
		  $varDefaultFROM = "info@enewmedia.co.za";
		  $varDefaultTO = "info@enewmedia.co.za";
		  $varDefaultReturn = "noreply@enewmedia.co.za";
		}
		if(strpos($varURL,"enewmedia.com.au")) {
		  $varDefaultFROM = "info@enewmedia.com.au";
		  $varDefaultTO = "info@enewmedia.com.au";
		  $varDefaultReturn = "noreply@enewmedia.com.au";
		}
		if(strpos($varURL,"enewmedia.co.uk")) {
		  $varDefaultFROM = "info@enewmedia.co.uk";
		  $varDefaultTO = "info@enewmedia.co.uk";
		  $varDefaultReturn = "noreply@enewmedia.co.uk";
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
		$msgSales .= 'IP: ' . $varUser_IP . "\n";
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
		$mailSales->FromName = "eNew Media Info";
		$mailSales->Subject = "Message from eNew Media Website";  
		// Sales email - END
		$mailSales->AddAddress($varDefaultTO);
		$mailSales->Body = $msgSales;
		
		/**
		* RETURN EMAIL TO THE END USER
		*/	
		$msgReturn .= 'Dear ' . $varFirstName . ' ' . $varLastName . "\n\n";
		$msgReturn .= 'Thank you for your enquiry on the eNew Media ' . "\n\n";
		$msgReturn .= 'Our sales team will reach out you as soon as possible ' . "\n\n";
		$msgReturn .= 'Regards ' . "\n\n";
		$msgReturn .= 'eNew Media' . "\n";
		
		// Confirmation email - Assemble the email
		$mailConfirmation = new PHPMailer();
		$mailConfirmation->Host = $SMTPserver;
		$mailConfirmation->IsSMTP();
		$mailConfirmation->SMTPAuth = false;
		$mailConfirmation->Port = 25;
		$mailConfirmation->From = $varDefaultReturn;
		$mailConfirmation->FromName = "Noreply";
		$mailConfirmation->Subject = "Enquiry on the eNew Media Website";
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
	else //Error
	{
		header("Location: contact.html"); 
	}
}

/**
 * Get USER IP Address
 */
function getUserIP()
{
    if (isset($_SERVER["HTTP_CF_CONNECTING_IP"])) {
              $_SERVER['REMOTE_ADDR'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
              $_SERVER['HTTP_CLIENT_IP'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
    }
    $client  = @$_SERVER['HTTP_CLIENT_IP'];
    $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
    $remote  = $_SERVER['REMOTE_ADDR'];

    if(filter_var($client, FILTER_VALIDATE_IP))
    {
        $ip = $client;
    }
    elseif(filter_var($forward, FILTER_VALIDATE_IP))
    {
        $ip = $forward;
    }
    else
    {
        $ip = $remote;
    }

    return $ip;
}


?>