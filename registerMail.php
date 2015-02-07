<?php
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

    $email_to = 'avj2352@gmail.com';//replace with your email

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

    echo json_encode($status);
    die;