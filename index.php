<?php 
session_start()
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
</head>
<body>
    
    <h1>This is the Home page</h1>

    <?php 
        if(isset($_SESSION['email'])) {
            echo "<h1>welcome ".$_SESSION['firstname']." ".$_SESSION['lastname'] ."</h1>";
          echo  '<form action="handleprocess.php" method="post">
                <input type="submit" value="logout" name="logout">
            </form>';
        } else {
            echo '<a href="login.php">Login</a> <br>
                    <a href="register.php">Register User</a>';
        }
    ?>
</body>
</html>