<?php
require('connection.php');
session_start();
$user_first_name = $_SESSION['user_first_name'];
$user_last_name = $_SESSION['user_last_name'];
$user_id = $_SESSION['user_id'];
$email = $_SESSION['email'];
$user_type = $_SESSION['user_type'];
$name=$user_first_name." ".$user_last_name;
if ($user_type=='student') {
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Admission Request</title>
        <link rel="stylesheet" href="styles.css">
        <link rel="stylesheet" href="style2.css">
    </head>

    <body>
        <nav>
            <?php include('navbar.php') ?>
        </nav>

        <aside>
            <?php include('sidebar2.php') ?>
        </aside>
        <main class="list-container"> <!--main start-->
            <div>
                <?php
                if (isset($_GET['class'])) {
                    $class = $_GET["class"];


                    $sql = "INSERT INTO admission(class,user_id,student_name)
                            VALUES('$class','$user_id','$name')";

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
                    <input type="submit" value="Submit">
                </form>
            </div>
        </main><!--end main -->

        <footer>Footer</footer>

    </body>

<?php
} else {
    header('location:login.php');
}
?>

    </html>