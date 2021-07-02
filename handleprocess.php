<?php
session_start();
if(isset($_POST['register'])){
    $firstname = $_POST['fName'];
    $lastname = $_POST['lName'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $passwordRetype = $_POST['passwordRetype'];
    
    if(empty($firstname) || empty($lastname) || empty($email) || (empty($password) && $password != "0") || (empty($passwordRetype) && $passwordRetype != "0")) {
        header("location: register.php?error=emptyfields&firstname=$firstname&lastname=$lastname&email=$email");
        exit();
    } 
    else if (!(filter_var($email, FILTER_VALIDATE_EMAIL))){
        header("location: register.php?error=emailnotvalid&firstname=$firstname&lastname=$lastname");
        exit();
    }
    else if ($password != $passwordRetype){
        header("location: register.php?error=passwordmismatch&firstname=$firstname&lastname=$lastname&email=$email");
        exit();
    }
    else if (!(strlen($password) >= 8)){
        header("location: register.php?error=passwordnotuptorequiredlength&firstname=$firstname&lastname=$lastname&email=$email");
        exit();
    }
    else {
        // session_start();
        if(isset($_SESSION['email'])){
            if($_SESSION['email'] == $email) {
                header("location: register.php?error=useralreadyexist&firstname=$firstname&lastname=$lastname");
                exit();
            }
        } 
        else {
            $_SESSION['email'] = $email;
            $_SESSION['password'] = $password;
            $_SESSION['firstname'] = $firstname;
            $_SESSION['lastname'] = $lastname;
            header("location: login.php?success=successful");
        }
    }

}
else if(isset($_POST['login'])){
    $email = $_POST['email'];
    $password = $_POST['password'];
    if(empty($email) || (empty($password) && $password != "0")){
        header("location: login.php?error=emptyfields&email=$email");
        exit();
    }
    else {
        // session_start();
        if(!isset($_SESSION['email'])){
            header("location: login.php?error=invaliduser&email=$email");
            exit();
        }
        else if (isset($_SESSION['email'])) {
            $userEmail = $_SESSION['email'];
            $userPassword = $_SESSION['password'];
            $userFirstname = $_SESSION['firstname'];
            $userLastname = $_SESSION['lastname'];
            if($email != $userEmail){
                header("location: login.php?error=invaliduser&email=$email");
                exit();
            }
            else if($email == $userEmail) {
                if($password != $userPassword){
                    header("location: login.php?error=invalidpassword&email=$email");
                    exit();
                }
                else if($password == $userPassword) {
                    header("location: index.php");
                    exit();
                }
            }
        } 
    }
}
else if (isset($_POST['logout'])){
    // session_start();
    session_unset();
    session_destroy();
    header("location: index.php");
    exit();
}
else{
    header("location: register.php?error=errorinpageloading");
    exit();
}