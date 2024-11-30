<?php
require('connection.php');
session_start();
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
        if (isset($_GET['roll_input'])) {
            $roll_input = $_GET['roll_input'];
            echo $roll_input;
            $getid = $_GET['appprove_record'];
            echo $getid;
            $sql2 = "UPDATE admission SET student_roll='$roll_input' , status='approved'  WHERE admision_id = $getid";
            if ($conn->query($sql2) == TRUE) {
                echo 'Approved Done.';
            }
        }
        ?>
        <?php
        $sql = "SELECT * FROM admission WHERE status='pending'";
        $query = $conn->query($sql);
        echo "<table table='1' id='class'>
                    <tr>
            <th>Student Name</th>
            <th>Class</th>
            <th>Section</th>
            <th>Roll</th>
            <th>Status</th>
        </tr>";

        while ($data = mysqli_fetch_assoc($query)) {
            $student_name = $data['student_name'];
            $class = $data['class'];
            $section = $data['section'];
            $student_roll = $data['student_roll'];
            $admision_id  = $data['admision_id'];

            echo "<tr>
                        <td>$student_name</td>
                        <td>$class</td>
                        <td>$section</td>
                        <td><form action='admission_approve.php' method='GET' ><input type='number' name='roll_input' value='$admision_id' placeholder='Enter Class Roll'></form></td>
        <td><form action='admission_approve.php' method='GET'><button type='submit' name='appprove_record' value='$admision_id' >Approve</button></form>
        <form action='admission_approve.php' method='GET'><button type='submit' name='delete_record' value='$admision_id'>Delete</button></form></td>
        </tr>";
        }
        echo "</table>";
        ?>
    </main><!--end main -->

    <footer>Footer</footer>
</body>


</html>