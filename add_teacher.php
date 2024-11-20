<?php
require('connection.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Teacher</title>
</head>

<body>
    <?php
    if (isset($_GET['user_first_name'])) {
        $user_first_name    = $_GET["user_first_name"];
        $user_last_name     = $_GET["user_last_name"];
        $dob                = $_GET["dob"];
        $gender             = $_GET["gender"];
        $email              = $_GET["email"];
        $password           = $_GET["password"];

        $sql = "INSERT INTO users(user_first_name,user_last_name,dob,gender,email,password,	user_type) 
                VALUES('$user_first_name','$user_last_name','$dob','$gender','$email','$password','teacher')";

        if ($conn->query($sql) == TRUE) {
            echo 'Data Inserted.';
        } else {
            echo 'Data not Inserted.';
        }
    }
    ?>
    <?php
    $sql1 = "SELECT * FROM class";
    $query1 = $conn->query($sql1);
    ?>
    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="GET">
        First Name :<br>
        <input type="text" name="user_first_name"><br><br>
        Last Name :<br>
        <input type="text" name="user_last_name"><br><br>
        Date of Birth :<br>
        <input type="date" name="dob"><br><br>
        Gender :<br>
        <input type="radio" id="male" name="gender" value="Male">
        <label for="male"></label>Male <br>
        <input type="radio" id="female" name="gender" value="Female">
        <label for="female"></label>Female <br><br>
        Email :<br>
        <input type="email" name="email"><br><br>
        Password :<br>
        <input type="password" name="password"><br><br>

        <input type="submit" value="Submit">
    </form>

</body>

</html>