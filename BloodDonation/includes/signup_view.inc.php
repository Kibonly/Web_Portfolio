<?php

declare(strict_types=1);//prevents typo


function check_signup_errors() {
    if(isset($errors_signup)) {
        $errors=$_SESSION['errors_signup'];

        echo "<br>";
        foreach ($errors as $error) {
            echo  $error ;
        }

        unset($_SESSION['errors_signup']);

    }
    elseif (isset($_GET["signup"]) && $_GET["signup"] === "success") {
        echo 'Signup Success';
    }
}

