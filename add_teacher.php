<?php
require('connection.php');
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Teacher</title>
    <link rel="stylesheet" href="style2.css">
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <nav>
        <?php include('navbar.php') ?>
    </nav>

    <aside>
        <?php include('sidebar.php') ?>
    </aside>

    <main> <!--main start-->
        <div>
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
                <label for="user_first_name">First Name :</label>
                <input type="text" name="user_first_name"><br><br>
                <label for="user_last_name">Last Name :</label>
                <input type="text" name="user_last_name"><br><br>
                <label for="dob">Date of Birth :</label>
                <input type="date" name="dob"><br><br>
                <label for="gender">Gender :</label><br>
                <input type="radio" id="male" name="gender" value="Male">
                <label for="male">Male</label><br>
                <input type="radio" id="female" name="gender" value="Female">
                <label for="female">Female</label> <br><br>
                <label for="email">Email :</label>
                <input type="email" name="email"><br><br>
                <label for="password">Password :</label>
                <input type="password" name="password"><br><br>
                <input type="submit" value="Submit">
            </form>
        </div>
    </main><!--end main -->

    <footer>Footer</footer>
</body>
</html>