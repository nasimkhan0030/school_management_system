<?php
require('connection.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Subject</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="style2.css">
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
    <main>
        <div>
            <?php
            if (isset($_GET['subject_category'])) {
                $subject_category = $_GET["subject_category"];
                $subject_name = $_GET["subject_name"];
                $subject_code = $_GET["subject_code"];

                $sql = "INSERT INTO subject(subject_category,subject_name,subject_code) 
                VALUES('$subject_category','$subject_name','$subject_code')";

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
            <form action="<?php $_SERVER['PHP_SELF'] ?>" method="GET">
                <label for="subject_category">Class Name :</label>
                <select name="subject_category">
                    <?php
                    while ($data = mysqli_fetch_assoc($query1)) {
                        $class_id = $data['class_id'];
                        $class_name = $data['class_name'];

                        echo "<option value='$class_id'>$class_name</option>";
                    }
                    ?>
                </select><br><br>
                <label for="subject_name">Subject Name :</label>
                <input type="text" name="subject_name"><br><br>

                <label for="subject_code">Subject Code :</label>
                <input type="text" name="subject_code"><br><br>

                <input type="submit" value="Submit">
            </form>
        </div>
    </main>

    <footer>
        <?php include('footer.php'); ?>
    </footer>


</body>

</html>