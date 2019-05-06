<?php

if(!isset($_SESSION['inputs']))
{
  session_start();
}

require 'models/Model.php';
require 'models/Contact.php';
require 'controllers/ControllerValidator.php';
$errors = [];

$validator = new ControllerValidator(['name'=>'required', 'email'=>['required', 'email'], 'message'=>'required']);
$validator->check($_POST);
$errors = $validator->errors();

if(!empty($errors))
{
	$_SESSION['success'] = 0;
	$_SESSION['errors'] = $errors;
	$_SESSION['inputs'] = $_POST;
}
else
{
	$_SESSION['success'] = 1;
	$message = filter_input(INPUT_POST, 'message', FILTER_SANITIZE_SPECIAL_CHARS);
	$author = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS);
	$email =  filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
	$headers = 'FROM : site@local.dev';
	try {
		//Mail function ignore "try catch" : for the purpose of this project we will use "@" to ignore error : because mail server is not set
		@mail('erika.beaumier@gmail.com', 'Formulaire de contact', $author.' ('.$email.') : '.$message, $headers);
	} catch (Exception $e) {
		//Do nothing : mail not enable on server
	}
	
}
header('Location: Contact');
?>