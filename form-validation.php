<?php

$errors = [];
$listErrors = "";
$orderConfirmed = "";
$email = $street = $streetNumber = $city = $zipcode = $success = '';
$emailError = $streetError = $streetNumberError = $cityError = $zipcodeError = '';

if ($_SERVER["REQUEST_METHOD"] == "POST"){

    if(empty($_POST['email'])){
        array_push($errors, 'email');
        $emailError = 'Please enter your mail.';
    } else {
        $email = validate_data($_POST['email']);
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $emailError = 'Plese enter a valid email adress';
        }
    }

    if(empty($_POST['street'])){
        array_push($errors, ['streetError' => 'Required']);
        $streetError  = 'Required';
    }else {
        $street = validate_data($_POST['street']);
    }

    if(empty($_POST['streetnumber'])){
        array_push($errors, 'streetnumber');
        $streetNumberError = 'Required';
    }else {
        $streetNumber = validate_data($_POST['streetnumber']);
    }

    if(empty($_POST['city'])){
        $cityError = 'Required';
    }else {
        $city = validate_data($_POST['city']);
    }

    if(empty($_POST['zipcode'])){
        $zipcodeError = 'Required';
    }else {
        $zipcode = validate_data($_POST['zipcode']);
    }

    if(empty($errors)){
        $orderConfirmed = 'Your order has succesfully been submitted';
    }
}

function validate_data($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

