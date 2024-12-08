<?php
require('connection.php');
session_start();
$user_first_name = $_SESSION['user_first_name'];
$user_last_name = $_SESSION['user_last_name'];
$user_id = $_SESSION['user_id'];
$email = $_SESSION['email'];
$user_type = $_SESSION['user_type'];
if ($user_type=='admin') {
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Subject</title>
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
            if (isset($_GET['id'])) {
                $getid = $_GET['id'];

                $sql = "SELECT *FROM `subject` WHERE subject_id = $getid";
                $query = $conn->query($sql);
                $data = mysqli_fetch_assoc($query);

                $subject_code       = $data['subject_code'];
                $subject_name       = $data['subject_name'];
                $subject_category   = $data['subject_category'];
                $subject_id         = $data['subject_id'];
            }
            if (isset($_GET['subject_category'])) {
                $new_subject_category   = $_GET['subject_category'];
                $new_subject_name       = $_GET['subject_name'];
                $new_subject_code       = $_GET['subject_code'];
                $new_subject_id         = $_GET['subject_id'];

                $sql2 = "UPDATE subject SET subject_category='$new_subject_category',
                                     subject_name='$new_subject_name',
                                     subject_code='$new_subject_code'
                                     WHERE subject_id='$new_subject_id'";

                if ($conn->query($sql2) == TRUE) {
                    echo "Update Successful.";
                } else {
                    echo "Error occur.";
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
                    ?>
                        <option value='<?php echo $class_id ?>' <?php if ($subject_category == $class_id) {
                                                                    echo "selected";
                                                                } ?>><?php echo $class_name ?></option>
                    <?php } ?>
                </select><br><br>
                <label for="subject_name">Subject Name :</label>
                <input type="text" name="subject_name" value="<?php echo $subject_name ?>"><br><br>

                <label for="subject_code">Subject Code :</label>
                <input type="text" name="subject_code" value="<?php echo $subject_code ?>"><br><br>

                <input type="hidden" name="subject_id" value="<?php echo $subject_id ?>">

                <input type="submit" value="Submit">
            </form>
        </div>
    </main>

    <footer><?php include('footer.php') ?></footer>


</body>

</html>
<?php
}else{
    header('location:login.php');
}
?>