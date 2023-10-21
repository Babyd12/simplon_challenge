<?php 

function isValidName($name){
    $regexText = '/^[a-zA-Z0-9-ÿ\s]{2,20}$/';
    return !preg_match($regexText, $name);
}
function isValidTextFormat($format){
    // $regexText = '/^[a-zA-Z0-9-ÿ\s]{4,}$/';
    $regexDeFou ='~^[a-zA-ZÀ-ÖØ-öø-ÿœŒ\']{4,}+$~u';
    return preg_match($regexDeFou, $format);
}
function isValidEmail($email){
    $regexEmail = '/^[a-zA-Z0-9._+-]+@[a-zA-Z0-9.%-]+\.[a-zA-Z]{2,}$/';
    return !preg_match($regexText, $email);
}

function isValidPassword($password){
    $regexText = '/^[a-zA-Z0-9-ÿ\S]{2,20}$/';
    return !preg_match($regexText, $password);
}



function idValidPasswordConfirmation($password, $passwordConfirmation){
    return $password == $passwordConfirmation;
}



function isOnlyWhiteSpace($value){
    return empty(trim($value));
}

function isValidDate($date) {
    return preg_match('/^(\d{4})-(\d{2})-(\d{2})$/', $date);
}

function isValidIntervalDate($today, $nextDay) {
    if(!isValidDate($today) || !isValidDate($nextDay)) {
        return false;
    }
    if($today > $nextDay){
       return false;
    }else{
        return true;
    }

}

?>