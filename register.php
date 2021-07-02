<?php 
session_start();
$error = "";
$success = "";
$firstname = "";
$lastname = "";
$email = "";
$class = "error";
if(isset($_GET['error'])){
    if($_GET['error'] == "emptyfields"){
        $error = "Please fill all the fields!";
    }
    else if ($_GET['error'] == "emailnotvalid"){
        $error = "Please input a valid email";
    }
    else if ($_GET['error'] == "passwordmismatch"){
        $error = "Opps, your password don't match";
    }
    else if ($_GET['error'] == "passwordnotuptorequiredlength"){
        $error = "password must be upto 8 characters";
    } 
    else if ($_GET['error'] == "useralreadyexist"){
        $error = "Email already exist";
    }
} 
else if (isset($_GET["success"])) {
    $class = "success";
    if($_GET['success'] == "successful"){
        $error = "user registered successfully!";
    }
}

if(isset($_GET['firstname'])){
    $firstname = $_GET['firstname'];
}
if(isset($_GET['lastname'])){
    $lastname = $_GET['lastname'];
}
if(isset($_GET['email'])){
    $email = $_GET['email'];
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="index.css">
</head>
<body>
    <form action="handleregister.php" method="post">
        <p class="heading">Register User</p>
        <p class="<?php echo $class ?>"><?php echo $error ?></p>
        <div>
            <label for="fName">Firstname</label>
            <input type="text" id="fName" name="fName" value="<?php echo $firstname ?>">
        </div>
        <div>
            <label for="lName">lastname</label>
            <input type="text" id="lName" name="lName" value="<?php echo $lastname ?>">
        </div>
        <div>
            <label for="eMail">Email</label>
            <input type="email" id="eMail" name="email" value="<?php echo $email ?>">
        </div>
        <div>
            <label for="password">password</label>
            <input type="password" id="password" name="password">
        </div>
        <div>
            <label for="passwordRetype">Retype-password</label>
            <input type="password" id="passwordRetype" name="passwordRetype">
        </div>
        <input class="submit" type="submit" value="Register" name="register">
        <p>Already have an account <a href="login.php">Login</a></p>
        <p>Back to <a href="index.php">Home</a></p>
    </form>
</body>
</html>