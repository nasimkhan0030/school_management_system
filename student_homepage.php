<?php
session_start();
$user_first_name = $_SESSION['user_first_name'];
$user_last_name = $_SESSION['user_last_name'];
$user_id = $_SESSION['user_id'];

if(!empty($user_id)){
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Homepage</h1>

    <h3><a href="logout.php">Logout</a></h3>
    <h3><a href="admission_request.php">Admission</a></h3>
    <h3><a href="admission_request.php">Profile</a></h3>
    <h3><a href="admission_request.php">Result</a></h3>
    <h3><a href="admission_request.php">Enrolled Subject</a></h3>

</body>

</html>

<?php 
}
else{
    header('location:login.php');
}
?>