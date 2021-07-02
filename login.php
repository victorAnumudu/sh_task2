<?php 
session_start();


$error = "";
$success = "";
$email = "";
$class = "error";

if(isset($_GET['error'])){
    if($_GET['error'] == "emptyfields"){
        $error = "Please fill all the fields!";
    }
    else if ($_GET['error'] == "invaliduser"){
        $error = "Opps! user does not exist";
    }
    else if ($_GET['error'] == "invalidpassword"){
        $error = "Opps, your password is incorrect";
    }
} else if(isset($_GET['success'])) {
    $class = "success";
    if($_GET['success'] == "loginsuccessful"){
        $error = "user registered successfully!";
    }
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
    <title>Login</title>
    <link rel="stylesheet" href="index.css">
</head>
<body>
<form action="handleprocess.php" method="post">
        <p class="heading">Login</p>
        <p class="<?php echo $class ?>"><?php echo $error ?></p>
        <div>
            <label for="eMail">Email</label>
            <input type="email" id="eMail" name="email" value="<?php echo $email ?>">
        </div>
        <div>
            <label for="password">password</label>
            <input type="password" id="password" name="password">
        </div>
        <input class="submit" type="submit" value="Login" name="login">
        <p>Don't have an account <a href="register.php">Register</a></p>
        <p>Back to <a href="index.php">Home</a></p>
    </form>
</body>
</html>