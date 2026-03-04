<?php

declare(strict_types=1);//prevents typo

function get_username(object $pdo, string $username) {
    $query = "SELECT username FROM users WHERE username= :username";
    $stmt = $pdo->prepare($query); // sql injection prevention
    $stmt->bindParam(":username",$username);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}

function get_email(object $pdo, string $email) {
    $query = "SELECT email FROM users WHERE email= :email";
    $stmt = $pdo->prepare($query); // sql injection prevention
    $stmt->bindParam(":email",$email);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}

function set_user(object $pdo,string $pwd,string $username,string $email,string $bloodType,string $phoneNumber,string $address,string $city,$birthdate,string $gender,string $donated,$last_donated) {
    $query = "INSERT INTO users (username,pwd,email,blood_type,phone_number,address,city,birthdate,gender,previously_donated,last_donated) 
    VALUES (:username,:pwd,:email,:bloodType,:phoneNumber,:address,:city,:birthdate,:gender,:donated,:last_donated)";
    $stmt = $pdo->prepare($query); // sql injection prevention

    $options = [ 'cost'=> 12 ];
    $hashedPwd = password_hash($pwd,PASSWORD_DEFAULT,$options);

    $stmt->bindParam(":username",$username);
    $stmt->bindParam(":pwd",$hashedPwd);
    $stmt->bindParam(":email",$email);
    $stmt->bindParam(":bloodType",$bloodType);
    $stmt->bindParam("phoneNumber",$phoneNumber);
    $stmt->bindParam(":address",$address);
    $stmt->bindParam(":city",$city);
    $stmt->bindParam(":birthdate",$birthdate);
    $stmt->bindParam(":gender",$gender);
    $stmt->bindParam(":donated",$donated);
    $stmt->bindParam(":last_donated",$last_donated);
    $stmt->execute();

}