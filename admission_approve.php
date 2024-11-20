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
</head>

<body>

<h1>Admision Pending List</h1>
    <?php
    $sql = "SELECT * FROM admission WHERE status='pending'";
    $query = $conn->query($sql);

    echo "<table>
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

        echo "<tr>
        <td>$student_name</td>
        <td>$class</td>
        <td>$section</td>
        <td><input type='number'></td>
        <td><input type='submit' value='Approve'>\n<button>Delete</button></td>
        </tr>";
    }
        echo"</table>";
    ?>
    


</body>


</html>