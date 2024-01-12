<?php

require_once('connect.php');

///contact values
$fname = $_POST['firstname'];
$lname = $_POST['lastname'];
$email = $_POST['email'];
$msg = $_POST['comments'];

$errors = [];

//Validate values

$fname = trim($fname);
$lname = trim($lname);
$email = trim($email);
$msg = trim($msg);

if(empty($lname)) {
    $errors['lastname'] = 'You must provide your Last Name';
}

if(empty($fname)) {
    $errors['firstname'] = 'You must provide your First Name';
}

if(empty($msg)) {
    $errors['comments'] = 'Sorry but this field can not be empty';
}

if(empty($email)) {
    $errors['email'] = 'You must provide an email';
} else if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors['legit_email'] = 'You must provide a REAL Email';
}

if(empty($errors)) {

    //insert these values as a new row in the clients table

    $query = "INSERT INTO clients (firstname, lastname, email, comments) VALUES('$fname','$lname','$email','$msg')";

    if(mysqli_query($connect, $query)) {


//Sending Email

$to = 'k_dahilan@fanshaweonline.ca';
$subject = 'You just recevied a message from your Portfolio website!';

$message = "You have received a new contact form submission:\n\n";
$message .= "Full Name: ".$fname." ".$lname."\n";
$message .= "Email: ".$email."\n\n";


mail($to,$subject,$message);


// This will be a modal
header('Location: received.php');

}


}


?>