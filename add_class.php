<?php
require('connection.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Class</title>
</head>

<body>
    <?php
    if (isset($_GET['class_name'])) {
        $class_name = $_GET["class_name"];

        $sql = "INSERT INTO class(class_name) 
                VALUES('$class_name')";

        if($conn->query($sql) == TRUE){
            echo 'Data Inserted.';
        }else{
            echo 'Data not Inserted.';
        }
    }
    ?>
    <form action="add_class.php" method="GET">
        Class Name :<br>
        <input type="text" name="class_name"><br><br>
        <input type="submit" value="Submit">
    </form>

</body>

</html>