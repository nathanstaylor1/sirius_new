<?php

require 'vendor/autoload.php';
require 'app/includes/dispatch.php';

// Load the configuration file
config('source', 'app/config.ini');

//STANDARD routing
get('/index', function () {	render('frontpage', array('title' => "Home", 'parallax' => true));});
get('/about', function () {	render('about', array('title' => "About"));});
get('/individuals', function () {	render('individuals', array('title' => "Individuals"));});
get('/companies', function () {	render('companies', array('title' => "Companies"));});
get('/boards', function () {	render('boards', array('title' => "Boards"));});
get('/resources', function () {	render('resources', array('title' => "Resources"));});
get('/contact', function () {	render('contact', array('title' => "Contact"));});
	
//CONTACT FORM

post('/contact/mail', function () {	

	function test_input($data) {
	  $data = strip_tags($data);
	  $data = trim($data);
	  $data = stripslashes($data);
	  $data = htmlspecialchars($data);
	  return $data;
	}

	$name = test_input($_POST['name']);
	$email = test_input($_POST['email']);
	$phone = preg_replace("/[^0-9]/", '', test_input($_POST['phone']));
	$message = test_input($_POST['message']);
			
	//validation //
	$error = "";

	$nameErr = " - Name is required. <br>";
	$contactErr = " - A valid email or phone number is required. <br>";
	$messageErr = " - Please write a message. <br>";

	$nameInputErr = " - Name must only contain letters and whitespace. <br>";
	$emailInputErr = " - Must ba a valid email address. <br>";
	$phoneInputErr = " - Must ba a valid phone number. <br>";

	if (empty($name)){ 
		$error .= $nameErr;
	} elseif ( !preg_match("/^[a-zA-Z ]*$/",$name) ){
		$error .= $nameInputErr;
	}

	if (empty($email) && empty($phone)){ 
		$error .= $contactErr;
	} else {
		if (!empty($email) && !filter_var($email, FILTER_VALIDATE_EMAIL)){
			$error .= $emailInputErr;	
		}
		if (!empty($phone) && ( strlen($phone) < 8 || strlen($phone) > 12 ) ) {
			$error .= $phoneInputErr;	
		}
	}

	if (empty($message)){ 
		$error .= $messageErr;
	}

	//response
	if ($error === ""){
		$formcontent="--  Message from website contact form:  -- \n \n　From: $name \n　Email: $email \n　Phone: $phone \n \n　Message: \n \n $message \n \n ";
		$recipient = "nathanstaylor1@gmail.com";
		$subject = "Website contact form message from: $name";
		$mailheader = "From: $email \r\n";
		//mail($recipient, $subject, $formcontent, $mailheader) or die("Error!");
		render('thankyou');
	} else {
		render('contact', array('title' => "Contact",
		 'error' => $error,
		 'name' => $name,
		 'email' => $email,
		 'phone' => $phone,
		 'message' => $message,
		 ));
	}
});

// resources admin 

get('/resources/admin', function () {	render('resources_admin', array('title' => "Edit resources"));});
get('/resources/admin/new', function () {	render('res_new', array('title' => "Add resources"));});
get('/resources/admin/edit', function () {	render('res_edit', array('title' => "Edit resources"));});
get('/resources/admin/delete', function () {	render('res_delete', array('title' => "Delete resources"));});



get('.*',function(){
	error(404, render('404'));
});

// Serve the blog
dispatch();
