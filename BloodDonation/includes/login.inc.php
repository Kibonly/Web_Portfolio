<?php

if($_SERVER["REQUEST_METHOD"]==="POST")
    {
        $username=$_POST["username"];
        $pwd=$_POST["password"];

        try {
            require_once 'dbh.inc.php';
            require_once 'login_model.inc.php';
            require_once 'login_contr.inc.php';

            //Error Handlers
        $errors = [];

        if( is_input_empty($username,$pwd) ) {
            $errors["empty_input"]="Fill in all fields!";
        }

        $result = get_user($pdo,$username);

        if(is_username_Wrong($result)){
            $errors["login_incorrect"] = "Incorrect login info!";
        }

        else if(is_password_Wrong($pwd, $result["pwd"])){
            $errors["login_incorrect"] = "Incorrect login info!";
        }

        require_once 'config_session.inc.php';
        if($errors) {
            $_SESSION["error_login"] = $errors;
            
            header("Location:../login.php?login=unsuccess");
            die();
        }

        $newSessionId = session_create_id();
        $sessionID = $newSessionId . "_" . $result["id"];
        session_id($sessionID);

        $_SESSION["user_id"] = $result["id"];
        $_SESSION["user_username"] = htmlspecialchars($result["username"]);

        $_SESSION["last_regeneration"]=time();

        header("Location: ../login.php?login=success");
        $pdo = null;
        $statement = null;

        die();

        } catch (PDOexception $e) {
            die("Query Failed:" . $e->getmessage());
        }
    }


    else {
        header("Location:../login.php");
        die();
    }