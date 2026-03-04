<?php

declare(strict_types=1);//prevents typo

function is_input_empty(string $username,string $password,string $email,string $bloodType,string $phoneNumber,string $address,string $city) {
    if(empty($username) || empty($password) || empty($email) || empty($bloodType) || empty($address) || empty($city) ) {
        return true;
    }
    else {
        return false;
    }
}

function is_email_invalid(string $email) {
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return true;
    }
    else {
        return false;
    }
}

function is_username_taken(object $pdo,string $username)
{
    if( get_username($pdo, $username) ) {
        return true;
    }
    else {
        return false;
    }
}

function is_email_registered(object $pdo,string $email)
{
    if( get_email($pdo, $email) ) {
        return true;
    }
    else {
        return false;
    }
}

function create_user(object $pdo,string $pwd,string $username,string $email,string $bloodType,string $phoneNumber,string $address,string $city,$birthdate,string $gender,string $donated,$last_donated) {
    set_user( $pdo, $pwd, $username, $email, $bloodType, $phoneNumber, $address, $city,$birthdate, $gender, $donated,$last_donated);
}