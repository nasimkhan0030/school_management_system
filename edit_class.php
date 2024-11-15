<?php
require('connection.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Class</title>
</head>

<body>
    <?php
    if(isset($_GET['id'])){
        $getId=$_GET['id'];
        $sql="SELECT * FROM class WHERE class_id=$getId";
        $query=$conn->query($sql);
        $data=mysqli_fetch_assoc($query); 

        $class_name=$data['class_name'];
        $class_id=$data['class_id'];
    }

    if(isset($_GET['class_name'])){
        $new_class_name=$_GET['class_name'];
        $new_class_id=$_GET['class_id'];

        $sql1="UPDATE class SET class_name='$new_class_name' WHERE class_id = $new_class_id";

        if($conn->query($sql1)==TRUE){
            echo"Update Successful.";
        }
        else{
            echo "Error occur.";
        }
        

    }
    ?>
    <form action="edit_class.php" method="GET" >
        Class Name :<br>
        <input type="text" name="class_name" value="<?php echo $class_name ?>"><br><br>
        <input type="text" name="class_id" value="<?php echo $class_id ?>" hidden>
        <input type="submit" value="Submit">
    </form>
    

</body>

</html>