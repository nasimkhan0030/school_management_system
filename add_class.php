<?php
require('connection.php');
session_start();
$user_first_name = $_SESSION['user_first_name'];
$user_last_name = $_SESSION['user_last_name'];
$user_id = $_SESSION['user_id'];
$email = $_SESSION['email'];
$user_type = $_SESSION['user_type'];
if ($user_type=='admin') {
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Class</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="style2.css">
    <style>

    </style>
</head>

<body>
    <?php
    if (isset($_GET['class_name'])) {
        $class_name = $_GET["class_name"];

        $sql = "INSERT INTO class(class_name)
                VALUES('$class_name')";

        if ($conn->query($sql) == TRUE) {
            echo 'Data Inserted.';
        } else {
            echo 'Data not Inserted.';
        }
    }
    ?>
    <nav>
        <?php include('navbar.php') ?>
    </nav>

    <aside>
        <?php include('sidebar.php') ?>
    </aside>

    <main>
        <div>
            <form action="add_class.php" method="GET">
                <label for="class_name">Class Name :</label>
                <input type="text" name="class_name" placeholder="Enter Class Name"><br><br>
                <input type="submit" value="Submit">
            </form>
        </div>
    </main>

    <footer>Footer</footer>

</body>

</html>
<?php 
}else{
    header('location:login.php');
}
?>