<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");

    $db_host = 'localhost';
    $db_user = 'root';
    $db_pass = '';
    $db_name = 'foundation_sixty6';

    $connection = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
    $errors = array();

    $fname = mysqli_real_escape_string($connection, $_POST['fname']);
    if ($fname == NULL) {
        $errors[] = "Name field is empty.";
    }

    $message = mysqli_real_escape_string($connection, $_POST['message']);
    if ($message == NULL) {
        $errors[] = "Message field is empty.";
    }

    $email = $_POST['email'];
    if ($email == NULL) {
        $errors[] = "Email field is empty.";
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "\"" . $email . "\" is not a valid email address.";
    }

    $errcount = count($errors);
    if ($errcount > 0) {
        $errmsg = array();
        for ($i = 0; $i < $errcount; $i++) {
            $errmsg[] = $errors[$i];
        }
        echo json_encode(array("errors" => $errmsg));
    } else {
        $querystring = "INSERT INTO contact_users(id,contact_name,contact_message,contact_email) VALUES(NULL,'" . $fname . "','" . $message . "','" . $email . "')";
        $qpartner = mysqli_query($connection, $querystring);
        echo json_encode(array("message" => "Form submitted. Thank you for your interest!"));
    }
?>