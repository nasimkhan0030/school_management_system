<?php
require('connection.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Subject</title>
</head>

<body>
    <?php
    if (isset($_GET['id'])) {
        $getid = $_GET['id'];

        $sql = "SELECT *FROM `subject` WHERE subject_id = $getid";
        $query = $conn->query($sql);
        $data = mysqli_fetch_assoc($query);

        $subject_code = $data['subject_code'];
        $subject_name = $data['subject_name'];
        $subject_category = $data['subject_category'];
        $subject_id = $data['subject_id'];
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
            ?>
                <option value='<?php  echo $class_id ?>' <?php if($subject_category == $class_id){echo "selected";} ?>>
                    
                    <?php echo $class_name ?></option>
            <?php } ?>
        </select><br><br>

        Subject Name :<br>
        <input type="text" name="subject_name" value="<?php echo $subject_name ?>"><br><br>

        Subject Code :<br>
        <input type="text" name="subject_code" value="<?php echo $subject_code ?>"><br><br>

        <input type="text" name="subject_id" value="<?php echo $subject_id ?>" hidden>

        <input type="submit" value="Submit">
    </form>

</body>

</html>