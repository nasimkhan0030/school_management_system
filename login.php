<?php
require('connection.php');
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<body>
    <?php

    if (isset($_POST['email'])) {

        $email              = $_POST['email'];
        $password      = $_POST['password'];

        $sql = "SELECT * FROM users WHERE 
                	email='$email' AND  
                    password='$password' AND
                    user_type='student'";
        $sql1 = "SELECT * FROM users WHERE 
                	email='$email' AND  
                    password='$password' AND
                    user_type='teacher'";
        $sql2 = "SELECT * FROM users WHERE 
                	email='$email' AND  
                    password='$password' AND
                    user_type='admin'";

        $query = $conn->query($sql);
        $query1 = $conn->query($sql1);
        $query2 = $conn->query($sql2);

        if (mysqli_num_rows($query) > 0) {
            $data = mysqli_fetch_array($query);
            $user_first_name=$data['user_first_name'];
            $user_last_name=$data['user_last_name'];
            $email=$data['email'];
            $user_id =$data['user_id'];

            $_SESSION['user_first_name']=$user_first_name;
            $_SESSION['user_last_name']=$user_last_name;
            $_SESSION['email']=$email;
            $_SESSION['user_id']=$user_id;
            
            header('location:index.php');
        } elseif (mysqli_num_rows($query1) > 0) {
            header('location:index1.php');
        } elseif (mysqli_num_rows($query2) > 0) {
            header('location:index2.php');
        }
    }

    ?>

    <form action="<?php echo $_SERVER['PHP_SELF'];  ?>" method="POST">

        User's email :<br>
        <input type="email" name="email"><br><br>

        User's Password :<br>
        <input type="password" name="password"><br><br>

        <input type="submit" value="Login">
    </form>

</body>

</html>