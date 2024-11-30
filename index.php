<?php
require('connection.php');
session_start();
$user_first_name = $_SESSION['user_first_name'];
$user_last_name = $_SESSION['user_last_name'];
if (!empty($user_first_name) && !empty($user_last_name)) {
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {font-family: Arial, Helvetica, sans-serif;}
        * {
            padding: 0;
            margin: 0;
        }

        nav {
            position: fixed;
            background-color: green;
            width: 100%;
            height: 70px;
            z-index: 1;

        }

        .logo {
            font-size: 25px;
            position: relative;
            left: 5%;
            color: white;
            font-weight: bold;
            line-height: 70px;
        }

        ul {
            position: relative;
            float: right;
            margin-right: 20px;
        }

        ul li {
            display: inline;
            line-height: 70px;
            margin: 0 5px;
        }

        ul li a {
            text-decoration: none;
            color: white;
            font-size: 15px;
        }

        .login {
            background-color: blueviolet;
            padding: 8px 15px;
            border-radius: 5px;
        }

        .mainImg {
            width: 100%;
            height: 300px;
        }

        .section1 {
            padding-top: 70px;
        }

        .img_text {
            position: absolute;
            top: 20%;
            left: 30%;
            color: white;
            background-color: midnightblue;
            padding-right: 20px;
            padding-left: 20px;
            font-size: 35px;
        }

        .container1_img {
            float: left;
            height: 150px;
            width: 150px;
        }
        .containe1{
            position: absolute;
            width: 80%;
            margin-left: 10%;
        }
        .teacher{
            margin-top: 5%;
            text-align: center;
        }

    </style>
</head>

<body>
    <nav>
        <label class="logo">W-School</label>
        <ul>
            <li><a href="">Home</a></li>
            <li><a href="">Contact</a></li>
            <li><a href="admission_request.php">Admission</a></li>
            <li><a  href="login.php" class="login">Login</a></li>
        </ul>
    </nav>

    <div class="section1">
        <label class="img_text" for="">We Teach Student with Care.</label>
        <img class="mainImg" src="images\classroom.png" alt="">
    </div>

    <div class="container1">
        <img class="container1_img" src="images\school1.jpg" alt="">

        <span class="container1_text">The school began as Ramna Preparatory
            School in 1947.[1] Austrian Pakistani social worker Begum Viqar
            un Nisa Noon, wife of the then-governor of East Pakistan, Firoz
            Khan Noon, was impressed when she visited in 1950.[2] With her
            support the school moved to its current Baily Road location,
            where it was renamed in her honour on 14 January 1952.</span>
    </div>

    <div class="teacher">
        <h1>Our Teacher</h1>
    </div>
</body>

</html>
<?php 
}else{
    header('location:login.php');
}
?>