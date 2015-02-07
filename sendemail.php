<?php
	header('Content-type: application/json');
	$status = array(
		'type'=>'success',
		'message'=>'Thank you for contacting us. As early as possible we will reach out to you '
	);

    $name = @trim(stripslashes($_POST['name'])); 
    $email = @trim(stripslashes($_POST['email'])); 
    $subjected = @trim(stripslashes($_POST['subject']));
    $message = @trim(stripslashes($_POST['message'])); 

    $email_from = $email;
    $email_to = 'amarjing@gmail.com';//replace with your email
    $subject = "Powerful Conference - Contact Us". $name;

    $body = 'Dear Admin '. $name . " has sent an email. Please find the details below: \n\n" ;
    $body .= 'Name: '.$name . "\n";
    $body .= 'Email: '.$email. "\n";
    $body .= 'Subject: '.$subjected. "\n";
    $body .= 'Message: '.$message. "\n";

    $success = @mail($email_to, $subject, $body, 'From: <'.$email_from.'>');

    echo json_encode($status);
    die;