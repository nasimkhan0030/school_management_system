<?php
require('connection.php');
$sql1 = "SELECT * FROM class";
$query1 = $conn->query($sql1);

$data_list = array();

while ($data = mysqli_fetch_assoc($query1)) {
    $class_id = $data['class_id'];
    $class_name = $data['class_name'];

    $data_list[$class_id] = $class_name;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subject List</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <nav>
        <?php include('navbar.php') ?>
    </nav>
    <!-- sidebar start -->
    <aside>
        <?php include('sidebar.php') ?>
    </aside>
    <!-- sidebar end -->
    <main class='list-container'>
        <?php
        $sql = "SELECT * FROM subject";
        $result = $conn->query($sql);

        echo "<table border='1' id='class'>
                <tr>
                <th>Subject Category</th>
                <th>Subject Name</th>
                <th>Subject Code</th>
                <th>Action</th>
            </tr>";
        while ($data = mysqli_fetch_assoc($result)) {
            $subject_id = $data['subject_id'];
            $subject_category = $data['subject_category'];
            $subject_name = $data['subject_name'];
            $subject_code = $data['subject_code'];
            echo "<tr>
                    <td>$data_list[$subject_category]</td>
                    <td>$subject_name</td>
                    <td>$subject_code</td>
                    <td><a href='edit_subject.php?id=$subject_id'><button>Edit</button></a></td>
                </tr>";
        }
        echo "</table>";
        ?>

    </main>

    <footer>Footer</footer>
</body>

</html>