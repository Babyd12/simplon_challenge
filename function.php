<?php 

function validateName($name){
    $regexText = '/^[a-zA-Z0-9-ÿ\s]{2,20}$/';
    return !preg_match($regexText, $name);
}

function validateEmail($email){
    $regexEmail = '/^[a-zA-Z0-9._+-]+@[a-zA-Z0-9.%-]+\.[a-zA-Z]{2,}$/';
    return !preg_match($regexText, $email);
}

function validatePassword($password){
    $regexText = '/^[a-zA-Z0-9-ÿ\S]{2,20}$/';
    return !preg_match($regexText, $password);
}



function validatePasswordConfirmation($password, $passwordConfirmation){
    return $password == $passwordConfirmation;
}

function  validateDate(){

}

function isOnlyWhiteSpace(){

}

?>