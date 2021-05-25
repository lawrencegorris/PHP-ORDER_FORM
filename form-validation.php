<?php
$email = $street = $streetNumber = $city = $zipcode = $success = '';
$emailError = $streetError = $streetNumberError = $cityError = $zipcodeError = '';

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    if(empty($_POST['email'])){
        $emailError = 'Please enter your e-mail address';
    }else {
        $email = validate_data($_POST['email']);
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $emailError = 'Please use a valid e-mail format!';
        }
    }

    if(empty($_POST['street'])){
        $streetError = 'Required';
    }else {
        $street = validate_data($_POST['street']);
    }

    if(empty($_POST['streetnumber'])){
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

}

function validate_data($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

