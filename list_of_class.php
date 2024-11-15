<?php
require('connection.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CLass List</title>
</head>

<body>
    <?php
    $sql = "SELECT * FROM class";
    $result = $conn->query($sql);

    echo "<table border='1'><tr><th>Class Name</th><th>Action</th></tr>";
    while ($data = mysqli_fetch_assoc($result)) {
        $class_id = $data['class_id'];
        $class_name = $data['class_name'];
        echo "<tr><td>$class_name</td><td><a href='edit_class.php?id=$class_id'>Edit</a></td></tr>";
    }
    echo "</table>";

    ?>


</body>

</html>