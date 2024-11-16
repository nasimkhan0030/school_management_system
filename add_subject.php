<?php
require('connection.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Subject</title>
</head>

<body>
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
        Subject Category :<br>
        <select name="subject_category">
            <?php
            while ($data = mysqli_fetch_assoc($query1)) {
                $class_id = $data['class_id'];
                $class_name = $data['class_name'];

                echo "<option value='$class_id'>$class_name</option>";
            }
            ?>
        </select><br><br>

        Subject Name :<br>
        <input type="text" name="subject_name"><br><br>

        Subject Code :<br>
        <input type="text" name="subject_code"><br><br>

        <input type="submit" value="Submit">
    </form>

</body>

</html>