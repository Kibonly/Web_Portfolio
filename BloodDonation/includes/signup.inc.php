<?php

if ($_SERVER["REQUEST_METHOD"]=== "POST") {
    
    $firstName= $_POST["Firstname"];
    $lastName= $_POST["Lastname"];

    $username=$firstName . " ". $lastName;

    $pwd= $_POST["password"];
    $bloodType= $_POST["BloodType"];
    $birthdate= $_POST["BirthDate"];
    $gender= $_POST["Gender"];
    $phoneNumber= $_POST["phonenumber"];
    $email= $_POST["email"];
    $address= $_POST["Address"];
    $city= $_POST["City"];
    $donated = $_POST["Donated"];
    $last_donated = $_POST["Last_Donated"];
    
    

    try {

        require_once 'dbh.inc.php';
        require_once 'signup_model.inc.php';
        require_once 'signup_contr.inc.php';

        //Error Handlers
        $errors = [];

        if( is_input_empty($username,$pwd,$email,$bloodType,$phoneNumber,$address,$city) ) {
            $errors["empty_input"]="Fill in all fields!";
        }

        if( is_email_invalid($email) ) {
            $errors["invalid_email"]="Invalid email used!";
        }

        if( is_username_taken($pdo,$username) ) {
            $errors["username_taken"]="Username already taken";
        }

        if( is_email_registered($pdo, $email) ) {
            $errors["email_used"]="Email already registered!";
        }

        require_once 'config_session.inc.php';
        if($errors) {
            $_SESSION["error_signup"] = $errors;

            $signupData = [
                'firstname'=> $firstName,
                'lastname' => $lastName,
                'bloodtype' => $bloodType,
                'birthdate' => $birthdate,
                'gender' => $gender,
                'phonenumber' => $phoneNumber,
                'email' => $email,
                'address' => $address,
                'city' => $city,
                'donated' => $donated,
                'last_donated' => $last_donated
            ];
            $_SESSION['signup_data'] = $signupData;

            header("Location:../Register.php");
            die();
        }

        create_user( $pdo, $pwd, $username, $email, $bloodType, $phoneNumber, $address, $city,$birthdate, $gender, $donated,$last_donated);

        header('Location:../Register.php?signup=success');

        //Closing connection and stmt
        $pdo=NULL;
        $stmt=NULL;

        die();

    } catch (PDOException $e) {
        die("Query Failed:" . $e->getMessage());
    }
}
else {
    header("Location:../Register.php");
    die();
}