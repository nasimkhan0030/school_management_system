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
    <title>Admission Approve</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="style2.css">
</head>

<body>
    <nav>
        <?php include('navbar.php') ?>
    </nav>

    <aside>
        <?php include('sidebar.php') ?>
    </aside>

    <main class="list-container"> <!--main start-->
        <h1>Admision Pending List</h1>
        <?php
        if (isset($_GET['delete_record'])) {

            $getid = $_GET['delete_record'];
            $sql1 = "DELETE  FROM admission  WHERE admision_id = $getid";
            if ($conn->query($sql1) == TRUE) {
                echo 'Deleted';
            }
        }
        ?>
        <?php
        if (isset($_GET['roll'])) {
            $roll_input = $_GET['roll'];

            $getid = $_GET['appprove_record'];
      
            $sql2 = "UPDATE admission SET student_roll='$roll_input' WHERE admision_id = $getid";
            if ($conn->query($sql2) == TRUE) {
                echo 'Approved Done.';
            }
        }
        ?>
        <?php
        $sql = "SELECT * FROM admission WHERE student_roll is NULL";
        $query = $conn->query($sql);
        echo "<table table='1' id='class'>
                    <tr>
            <th>Student Name</th>
            <th>Class</th>
            <th>Action</th>
        </tr>";

        while ($data = mysqli_fetch_assoc($query)) {
            $student_name = $data['student_name'];
            $class = $data['class'];
            $admision_id  = $data['admision_id'];
            echo "<tr>
                        <td>$student_name</td>
                        <td>$class</td>
                        <td><a href='edit_admission.php?id=$admision_id'><button>Assign Roll</button></a></td>
                 </tr>";
        }
        echo "</table>";
        ?>
    </main><!--end main -->

    <footer>Footer</footer>
</body>

</html>
<?php
}else{
    header('location:login.php');
}
?>