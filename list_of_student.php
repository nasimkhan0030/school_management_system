<?php
require('connection.php');
$sql1="SELECT * FROM users";
$query1=$conn->query($sql1);

$data_list=array();

while($data=mysqli_fetch_assoc($query1)){
    $user_first_name=$data['user_first_name'];
    $user_last_name=$data['user_last_name'];
    $dob=$data['dob'];
    $father_name=$data['father_name'];
    $mother_name=$data['mother_name'];
    $gender=$data['gender'];
    $email=$data['email'];

    $data_list[$class_id]=$class_name;

}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student List</title>
</head>

<body>
    <?php
    $sql = "SELECT * FROM section";
    $result = $conn->query($sql);

    echo "<table border='1'>
    <tr>
    <th>section_category</th>
    <th>section_name</th>
    <th>Action</th>
    </tr>";
    while ($data = mysqli_fetch_assoc($result)) {
        $section_id  = $data['section_id'];
        $section_category = $data['section_category'];
        $section_name = $data['section_name'];
        echo "<tr>
        <td>$data_list[$section_category]</td>
        <td>$section_name</td>
        <td><a href='edit_section.php?id=$section_id'>Edit</a>
        </td></tr>";
    }
    echo "</table>";

    ?>


</body>

</html>