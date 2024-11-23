<?php
require('connection.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CLass List</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <nav>
        navbar
    </nav>
    <!-- sidebar start -->
    <aside>
        <?php include('sidebar.php') ?>
    </aside>
    <!-- sidebar end -->
    <main class="list-container">
        <h2>List of Class</h2>
        <?php
        $sql = "SELECT * FROM class";
        $result = $conn->query($sql);

        echo "<table border='1' id='class'><tr><th>Class Name</th><th>Action</th></tr>";
        while ($data = mysqli_fetch_assoc($result)) {
            $class_id = $data['class_id'];
            $class_name = $data['class_name'];
            echo "<tr><td>$class_name</td><td><a href='edit_class.php?id=$class_id'><button>Edit</button></a></td></tr>";
        }
        echo "</table>";

        ?>
    </main>

    <footer>Footer</footer>



</body>

</html>