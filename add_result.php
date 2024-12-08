<?php
require('connection.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Result</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="style2.css">
</head>

<body>
    <nav>
        <?php include('navbar.php') ?>
    </nav>

    <aside>
        <?php include('sidebar3.php') ?>
    </aside>

    <main>
        <div>
            <?php
            if (isset($_GET['class'])) {
                $class           = $_GET["class"];
                $roll            = $_GET["roll"];
                $subject         = $_GET["subject"];
                $midterm         = $_GET["midterm"];
                $final           = $_GET["final"];

                $sql = "INSERT INTO result(class,student_roll,subject,midterm,final)
                VALUES('$class','$roll','$subject','$midterm','$final')";

                if ($conn->query($sql) == TRUE) {
                    echo 'Data Inserted.';
                } else {
                    echo 'Data not Inserted.';
                }
            }
            ?>
            <?php
            $sql2 = "SELECT * FROM admission";
            $query2 = $conn->query($sql2);
            while ($data = mysqli_fetch_assoc($query2)) {
                $admision_id    = $data['admision_id'];
                $class          = $data['class'];
                $student_roll   = $data['student_roll'];
            }
            ?>

            <?php
            $sql3 = "SELECT * FROM subject";
            $query3 = $conn->query($sql3);
            ?>

            <?php
            $sql1 = "SELECT* FROM class";
            $query1 = $conn->query($sql1);
            ?>

            <form action="<?php $_SERVER['PHP_SELF'] ?>" method="GET">
                Class :<br>
                <select name="class" required>
                    <?php
                    while ($data = mysqli_fetch_assoc($query1)) {
                        $class_id = $data['class_id'];
                        $class_name = $data['class_name'];

                        echo "<option value='$class_id'>$class_name</option>";
                    }
                    ?>

                </select><br><br>
                Roll:<br>
                <input type="number" name="roll" required><br><br>
                Subject :<br>
                <select name="subject" required>
                    <?php
                    while ($data = mysqli_fetch_assoc($query3)) {
                        $subject_id    = $data['subject_id'];
                        $subject_name  = $data['subject_name'];
                        echo "<option value='$subject_id'>$subject_name</option>";
                    } ?>
                </select><br><br>
                Midterm :<br>
                <input type="number" name="midterm" required><br><br>
                Final :<br>
                <input type="number" name="final" required><br><br>
                <input type="submit" value="Submit">
            </form>
        </div>
    </main>

    <footer>
        <?php require('footer.php') ?>
    </footer>

</body>

</html>