<?php
require('connection.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Section</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="style2.css">
</head>

<body>
    <?php
    if (isset($_GET['section_category'])) {
        $section_category = $_GET["section_category"];
        $section_name = $_GET["section_name"];

        $sql = "INSERT INTO section(section_category,section_name) 
                VALUES('$section_category','$section_name')";

        if ($conn->query($sql) == TRUE) {
            echo 'Data Inserted.';
        } else {
            echo 'Data not Inserted.';
        }
    }
    ?>
    <?php
    $sql1 = "SELECT * FROM class";
    $query1 = $conn->query($sql1);
    ?>

    <nav>
        navbar
    </nav>

    <aside>
        <?php include('sidebar.php') ?>
    </aside>

    <main>
        <div>
            <form action="<?php $_SERVER['PHP_SELF'] ?>" method="GET">
                <label for="section_category">Class Name :</label>
                <select name="section_category">
                    <?php
                    while ($data = mysqli_fetch_assoc($query1)) {
                        $class_id = $data['class_id'];
                        $class_name = $data['class_name'];

                        echo "<option value='$class_id'>$class_name</option>";
                    }
                    ?>
                </select><br><br>
                <label for="section_name">Section Name :</label>
                <input type="text" name="section_name"><br><br>
                <input type="submit" value="Submit">
            </form>
        </div>
    </main>

    <footer>Footer</footer>


</body>

</html>