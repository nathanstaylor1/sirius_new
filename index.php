<?php

require 'vendor/autoload.php';
require 'app/includes/dispatch.php';
require 'app/includes/functions.php';

// Load the configuration file
config('source', 'app/config.ini');

//STANDARD routing
get('/index', function () {	render('frontpage', array('title' => "Home", 'parallax' => true));});
get('/about', function () {	render('about', array('title' => "About"));});
get('/individuals', function () {	render('individuals', array('title' => "Individuals"));});
get('/companies', function () {	render('companies', array('title' => "Companies"));});
get('/boards', function () {	render('boards', array('title' => "Boards"));});
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

// display resources from server 

get('/resources', function () {	

	$files = get_files();
	render('resources', array('title' => "Resources",
							  'files' => $files ));
});



// resources admin 


//get
get('/resources/admin', function () {	render('resources_admin', array('title' => "Edit resources"));});

get('/resources/admin/new', function () {	render('res_new', array('title' => "Add resources"));});

get('/resources/admin/edit', function () {	

	$files = get_files();
	render('res_edit', array('title' => "Edit Resources:",
							  'files' => $files ));
});

get('/resources/admin/delete', function () {	

	$files = get_files();
	render('res_delete', array('title' => "Delete Resources:",
							  'files' => $files ));
});


//post

post('/resources/admin/new', function () {

	//get post contents
	$type = test_input($_POST['type']);
	$title = test_input($_POST['title']);
	$description = test_input($_POST['description']);
	$url = test_input($_POST['url']);
	$file = $_FILES['file'];

	//validation
	$message = "";

	 // Check file size
	if ($file["size"] > 500000) {
	    $message .= "Sorry, your file is too large.\n";
	} 

	if ($message == ""){

		//create new file listing

		//set filename as time to avoid duplicates
		$filename = time();

		if ($type == "links"){	//create file for link

			$filespath = "res/" . $type . "/files/" . $filename . ".txt";
			$filesdata = $url;
			$filesfile = fopen($filespath, "w");
			fwrite($filesfile, $filesdata); 
			fclose($filesfile);

		} else {	//upload file for tools and articles to server

			$extension = array_pop(explode(".", $file["name"]));
			$path = "res/" . $type . "/files/" . $filename . "." . $extension;

			if (!move_uploaded_file($file["tmp_name"], $path)) $message .= "Something went wrong uploading your file. Please try again.";

		}
	}

	//create file for documentation
	if ($message == ""){

		$docspath = "res/" . $type . "/docs/" . $filename . ".txt";
		$docsdata = $title . " #?# " . $description;
		$docsfile = fopen($docspath, "w");
		fwrite($docsfile, $docsdata); 
		fclose($docsfile);
		$message = "'" . $title . "' was succesfully added to " . $type . "!";

	} 

	//render new page with message

	render('res_new', array('title' => "Add resources", 'message' => $message));

});



post('/resources/admin/edit', function () {

	//get post contents
	$type = test_input($_POST['type']);
	$title = test_input($_POST['title']);
	$description = test_input($_POST['description']);
	$url = test_input($_POST['url']);
	$file = $_FILES['file'];

	$docspath = test_input($_POST['docspath']);
	$filespath = test_input($_POST['filespath']);

	//update files

	if ($type == "links"){

		$filesdata = $url;
		$filesfile = fopen($filespath, "w");
		fwrite($filesfile, $filesdata); 
		fclose($filesfile);

	} elseif ( $file['size'] != 0 ) {

		$newextension = array_pop(explode(".", $file["name"]));

		$noext = explode(".", $filespath);
		$discard = array_pop($noext);
		$noext = implode(".", $noext);
		$newpath = $noext . "." . $newextension;
			
		unlink($filespath);	
		if (!move_uploaded_file($file["tmp_name"], $newpath)) $message .= "Something went wrong uploading your file. Please try again.";

	}

	//update docs
	if ($message == ""){

		$docsdata = $title . " #?# " . $description;
		$docsfile = fopen($docspath, "w");
		fwrite($docsfile, $docsdata); 
		fclose($docsfile);
		$message = "'" . $title . "' was succesfully updated!";

	}
	//render edit page with message
	$files = get_files();
	render('res_edit', array('title' => "Edit resources", "files" => $files, 'message' => $message, 'test' => $test));

});


post('/resources/admin/delete', function () {

	//get post contents

	$title = test_input($_POST['title']);
	$docspath = test_input($_POST['docspath']);
	$filespath = test_input($_POST['filespath']);

	//remove files

	if ( unlink($docspath) && unlink($filespath) ) 	{
		$message = "'" . $title . "' was succesfully deleted!";
	} else {
		$message = "Something went wrong. Please try again.";
	}
	//render edit page with message

	$files = get_files();
	render('res_delete', array('title' => "Edit resources", "files" => $files, 'message' => $message));

});


get('.*',function(){
	error(404, render('404'));
});

// Serve the blog
dispatch();
