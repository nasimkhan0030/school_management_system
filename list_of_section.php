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
    <title>Section List</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <nav>
        navbar
    </nav>

    <aside>
        <?php include('sidebar.php') ?>
    </aside>

    <main class="list-container">
        <h2>List of Section</h2>
        <?php
        $sql = "SELECT * FROM section";
        $result = $conn->query($sql);

        echo "<table border='1' id='class'>
    <tr>
    <th>Class Name</th>
    <th>Section Name</th>
    <th>Action</th>
    </tr>";
        while ($data = mysqli_fetch_assoc($result)) {
            $section_id  = $data['section_id'];
            $section_category = $data['section_category'];
            $section_name = $data['section_name'];
            echo "<tr>
        <td>$data_list[$section_category]</td>
        <td>$section_name</td>
        <td><a href='edit_section.php?id=$section_id'><button>Edit</button></a>
        </td></tr>";
        }
        echo "</table>";
        ?>
    </main>

    <footer>Footer</footer>

</body>

</html>