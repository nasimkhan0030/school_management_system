<?php
require('connection.php');
session_start();
$user_first_name = $_SESSION['user_first_name'];
$user_last_name = $_SESSION['user_last_name'];
$user_id = $_SESSION['user_id'];
$name=$user_first_name." ".$user_last_name;

if(!empty($user_id)){
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admission Request</title>
</head>

<body>
    <?php
    if (isset($_GET['class'])) {
        $class = $_GET["class"];
        $section = $_GET["section"];

        $sql = "INSERT INTO admission(class,section,student_name)
                VALUES('$class','$section','$name')";

        if ($conn->query($sql) == TRUE) {
            echo 'Data Inserted.';
        } else {
            echo 'Data not Inserted.';
        }
    }
    ?>

    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="GET">
        Class :<br>
        <select id="class" name="class">
            <option value="">Select Class</option>

            <?php
            $sql1 = "SELECT * FROM class";
            $query1 = $conn->query($sql1);
            while ($data = mysqli_fetch_assoc($query1)) {
                $class_id = $data['class_id'];
                $class_name = $data['class_name'];

                echo "<option value='$class_id'>$class_name</option>";
            }
            ?>
        </select><br><br>



        Section :<br>
        <select id="section" name="section">
            <option>Select Section</option>
        </select><br><br>
        
        <input type="submit" value="Submit">
    </form>

</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="jquery.php"></script>
<script>
    $('#class').change(function() {
        $class = $('#class').val();
        $.ajax({
            url: 'jquery.php',
            method: 'GET',
            data: {
                'class': $class
            },
            success: function(response) {
                $('#section').html(response);
            }
        });
    });
    
</script>

<?php 
}
else{
    header('location:login.php');
}
?>

</html>