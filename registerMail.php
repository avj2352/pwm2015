<?php
/*Simple Redirect Helper Function*/
function redirect($url, $statusCode = 303)
{
    header('Location: ' . $url, true, $statusCode);
    die();
}/*end function: redirect*/

//1. SEND EMAIL
//The following Code takes care of sending an Email First to intlpowerministries@gmail.com
	header('Content-type: application/json');
	$status = array(
		'type'=>'success',
		'message'=>'Thank you for Filling out the Registration form. As early as possible We will contact you!'
	);

    $salutation = @trim(stripslashes($_POST['salutation']));
    $first_name = @trim(stripslashes($_POST['first_name']));
    $last_name = @trim(stripslashes($_POST['last_name']));
    $email = @trim(stripslashes($_POST['email']));
    $website = @trim(stripslashes($_POST['website']));
    $phone = @trim(stripslashes($_POST['phone']));
    $church = @trim(stripslashes($_POST['00No0000008XSgz']));
    $street = @trim(stripslashes($_POST['street']));
    $city = @trim(stripslashes($_POST['city']));
    $state = @trim(stripslashes($_POST['state']));
    $zipcode = @trim(stripslashes($_POST['zipcode']));
    $country = @trim(stripslashes($_POST['country']));
    $passport = @trim(stripslashes($_POST['passport']));
    $name = $first_name . ' ' . $last_name;

    $email_from = $email;

    $email_to = 'intlpowerministries@gmail.com';//replace with your email

    $subject = "Powerful Conference - Registration ". $name;

    //$body = 'Name: ' . $name . "\n\n" . 'Email: ' . $email . "\n\n" . 'Subject: ' . $subject . "\n\n" . 'Message: ' . $message;
    $body = 'Dear Admin '. $name . " has sent a registration request. Please find the details below: \n\n" ;
    $body .= 'Name: '.$name . "\n";
    $body .= 'Email: '.$email. "\n";
    $body .= 'Website: '.isset($website)?$website:"NA";
    $body .= "\n";
    $body .= "Phone: ".isset($phone)?$phone:"NA";
    $body .= "\n";
    $body .= "Church: ".isset($church)?$church:"NA";
    $body .= "\n";
    $body .= 'Address: '.$street. "\n";
    $body .= 'City: '.$city. "\n";
    $body .= 'State: '.$state. "\n";
    $body .= 'ZipCode: '.$zipcode. "\n";
    $body .= 'Country: '.$country. "\n";
    $body .= 'Passport#: '.$passport. "\n";

    $success = @mail($email_to, $subject, $body, 'From: <'.$email_from.'>');

//2. SEND POST DATA TO SALESFORCE
//The following Code takes care of POST data to Salesforce.

// SF Org Id.
$oid = "00Do0000000Hnda";
//I first check if cURL is enabled before processing any further.

// Make sure cURL is enabled
if (!function_exists('curl_init')) {
    error("Curl is not setup on this PHP server and is
    required for this script");
    die;
}
//I then loop through all the data input from the form. I first check there is data there (twice). Then I loop through each POST data using a foreach. Within the foreach loop I run stripslashes()function to stop the backslashes getting added twice. I don’t do any other form of validation as the data is going to Salesforce and I rely on them checking the data. At the end I add the organisation to the array.
if (isset($_POST)) {
    if (count($_POST) == 0) exit("Error.  No data was passed
     to this script.");

// variable to hold cleaned up a version of $_POST data
    $cleanPOST = array();

// Loop through the $_POST data and process it
    foreach ($_POST as $key=>$value){
        $cleanPOST[stripslashes($key)] = stripslashes($value);
    }/*end foreach*/

// Add the Org ID
    $cleanPOST["oid"] = $oid;

} else {
    exit("Error.  No data was passed to this script.");
}
//Once the POST data is in an array we can send it to Salesforce. I have commented each step below. I add a return URL to the data sent which then redirects the user to that URL. You could do the redirect in the PHP file itself.

// Create a new cURL resource
$ch = curl_init();

if (curl_error($ch) != "") {
    echo "Error: $error\n";
}

// Point to the Salesforce Web to Lead page
curl_setopt($ch, CURLOPT_URL,
    "http://www.salesforce.com/servlet/servlet.WebToLead");

// Set the method to POST
curl_setopt($ch, CURLOPT_POST, 1);

// Pass POST data
curl_setopt(
    $ch, CURLOPT_POSTFIELDS, http_build_query($cleanPOST));

curl_exec($ch); // Post to Salesforce
curl_close($ch); // close cURL resource

/*To Debug uncomment the below line else redirect the page to success.html*/
//echo json_encode($status);
redirect("http://www.powerministry.info/success.html");

