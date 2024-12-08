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
    <title>Asssign Roll</title>
</head>

<body>
    <?php
    if (isset($_GET['id'])){
        $getId = $_GET['id'];
        $sql = "SELECT * FROM admission WHERE admision_id=$getId";
        $query = $conn->query($sql);
        $data = mysqli_fetch_assoc($query);
        $admision_id = $data['admision_id'];
        $student_roll = $data['student_roll'];
    }
    if (isset($_GET['roll'])) {
        $new_roll = $_GET['roll'];
        $new_admision_id= $_GET['class_id'];
        $sql1 = "UPDATE admission SET student_roll='$new_roll' WHERE admision_id = $new_admision_id";
        if ($conn->query($sql1) == TRUE) {
            echo "Update Successful.";
        } else {
            echo "Error occur.";
        }
    }
    ?>
    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="GET">
        <label for="roll">Roll :</label>
        <input type="number" name="roll" value="<?php echo $student_roll ?>"><br><br>
        <input type="hidden" name="class_id" value="<?php echo $admision_id ?>">
        <input type="submit" value="Submit">
    </form>

</body>

</html>
<?php
}else{
    header('location:login.php');
}
?>