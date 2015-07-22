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
get('/resources/admin', function () {	

	//check session
	$authorized = check_session();

	if($authorized){
		render('res_main', array('title' => "Manage Resources"));
	} else {
		render('res_login', array('title' => "Login"));
	}

});

get('/resources/admin/new', function () {	

	//check session
	$authorized = check_session();

	if($authorized){
		render('res_new', array('title' => "Add resources"));
	} else {
		render('res_login', array('title' => "Login", 'error' => 'you must login to view this page.'));
	}

});

get('/resources/admin/edit', function () {	

	//check session
	$authorized = check_session();

	if($authorized){
		$files = get_files();
		render('res_edit', array('title' => "Edit Resources:",
								  'files' => $files ));
	} else {
		render('res_login', array('title' => "Login", 'error' => 'you must login to view this page.'));
	}
});

get('/resources/admin/delete', function () {	

	//check session
	$authorized = check_session();

	if($authorized){
		$files = get_files();
		render('res_delete', array('title' => "Delete Resources:",
								  'files' => $files ));
	} else {
		render('res_login', array('title' => "Login", 'error' => 'you must login to view this page.'));
	}
});


//post
post('/resources/admin/login', function () {

	$authorized = false;

	//get login details

	$username = test_input($_POST['username']);
	$password = test_input($_POST['password']);

	//create session

	if (check_login($username, $password)) {
		create_session();
		$authorized = true;
	}

	if ($authorized){

		render('res_main', array('title' => "Manage Resources"));

	} else {
	
		render('res_login', array('title' => "Login", 'error' => 'Invalid username password combination.'));

	}

});





post('/resources/admin/new', function () {

	//get post contents
	$type = test_input($_POST['type']);
	$title = test_input($_POST['title']);
	$description = test_input($_POST['description']);
	$url = test_input($_POST['url']);
	$file = $_FILES['file'];

	$postdata = array('links' => array(), 'tools' => array(), 'articles' => array());

	$postdata[$type]['active'] = true;
	$postdata[$type]['title'] = $title;
	$postdata[$type]['description'] = $description;
	$postdata[$type]['url'] = $url;

	$error = "";
	$message = "";

	//validation

	// check form type hasnt been changed
	if (!($type == 'links' || $type == 'tools' || $type == 'articles')){
		$error .= "Form has been tampered with.<br>";
	}
	// check title and desc isnt empty
	if (empty($title) || empty($description)){
		$error .= "Title and description are required.<br>";
	}

	if ($type == "links"){
		// check url isnt empty and check syntax
		if (empty($url)){
			$error .= "Please enter a url for the link (e.g. www.example.com).<br>";
		} elseif (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$url)){
			$error .= "URL is not valid.<br>";	
		} else {
			//remove http etc from start of url
			$url = preg_replace('#^https?://#', '', $url);
		}

	} else {

		// Check file uloaded correctly
		if ($file['size'] == 0){
			$error .= "Please select file for upload.<br>";	
		} elseif ($file['error'] != 0) {
			$error .= "Error uploading file. please try again.<br>";	
		}
		// Check file size
		if ($file["size"] > 5000000) {
		    $error .= "Sorry, your file is too large. Files must be less than 5mb.<br>";
		} 

	}

	if ($error == ""){

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

			if (!move_uploaded_file($file["tmp_name"], $path)) $error .= "Something went wrong uploading your file. Please try again.";

		}
	}

	//create file for documentation
	if ($error == ""){


		$docspath = "res/" . $type . "/docs/" . $filename . ".txt";
		$docsdata = $title . " #?# " . $description;
		$docsfile = fopen($docspath, "w");
		fwrite($docsfile, $docsdata); 
		fclose($docsfile);
		$message = "'" . $title . "' was succesfully added to " . $type . "!";
		$postdata = array();

	} 

	//render new page with message

	render('res_new', array('title' => "Add resources", 'postdata' => $postdata, 'message' => $message, 'error' => $error));

});



post('/resources/admin/edit', function () {

	//get post contents
	$type = test_input($_POST['type']);
	$title = test_input($_POST['title']);
	$description = test_input($_POST['description']);
	$url = test_input($_POST['url']);
	$id = test_input($_POST['id']);
	$file = $_FILES['file'];

	$docspath = test_input($_POST['docspath']);
	$filespath = test_input($_POST['filespath']);

	$postdata = array('links' => array(), 'tools' => array(), 'articles' => array());

	$postdata[$type]['active'] = true;
	$postdata[$type]['title'] = $title;
	$postdata[$type]['description'] = $description;
	$postdata[$type]['url'] = $url;
	$postdata['activeid'] = $id;

	$error = "";
	$message = "";

	//validation

	// check form type hasnt been changed
	if (!($type == 'links' || $type == 'tools' || $type == 'articles')){
		$error .= "Form has been tampered with.<br>";
	}
	//check file locations lead to right folder
	if (!(substr($docspath, 0, 4) == "res/" && substr($filespath, 0, 4)) == "res/" ) {
		$error .= "Form has been tampered with.<br>";
	}

	// check title and desc isnt empty
	if (empty($title) || empty($description)){
		$error .= "Title and description are required.<br>";
	}

	if ($type == "links"){
		// check url isnt empty and check syntax
		if (empty($url)){
			$error .= "Please enter a url for the link (e.g. www.example.com).<br>";
		} elseif (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$url)){
			$error .= "URL is not valid.<br>";	
		} else {
			//remove http etc from start of url
			$url = preg_replace('#^https?://#', '', $url);
		}

	} else {

		// Check file size
		if ($file["size"] > 5000000) {
		    $error .= "Sorry, your file is too large. Files must be less than 5mb.<br>";
		} 

	}

	if ($error == ""){

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
			if (!move_uploaded_file($file["tmp_name"], $newpath)) $error .= "Something went wrong uploading your file. Please try again.\n";

		}

	}

	if ($error == ""){

		//update docs

		$docsdata = $title . " #?# " . $description;
		$docsfile = fopen($docspath, "w");
		fwrite($docsfile, $docsdata); 
		fclose($docsfile);
		$message = "'" . $title . "' was succesfully updated!";
		$postdata = array();

	}

	//render edit page with message
	$files = get_files();
	render('res_edit', array('title' => "Edit resources", "files" => $files, 'postdata' => $postdata, 'message' => $message, 'error' => $error));

});


post('/resources/admin/delete', function () {

	//get post contents

	$title = test_input($_POST['title']);
	$docspath = test_input($_POST['docspath']);
	$filespath = test_input($_POST['filespath']);

	$error = "";
	$message = "";

	//validation

	//check file locations lead to right folder
	if (!(substr($docspath, 0, 4) == "res/" && substr($filespath, 0, 4)) == "res/" ) {
		$error .= "Form has been tampered with.<br>";
	} else {

		//remove files

		if ( unlink($docspath) && unlink($filespath) ) 	{
			$message = "'" . $title . "' was succesfully deleted!";
		} else {
			$error = "Something went wrong. Please try again.";
		}
		//render edit page with message

	}

	$files = get_files();
	render('res_delete', array('title' => "Edit resources", "files" => $files, 'message' => $message, 'error' => $error));

});


get('.*',function(){
	error(404, render('404'));
});

// Serve the blog
dispatch();
