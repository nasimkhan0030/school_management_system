<?php
require('connection.php');
session_start();
$user_first_name = $_SESSION['user_first_name'];
$user_last_name = $_SESSION['user_last_name'];
$user_id = $_SESSION['user_id'];
$email = $_SESSION['email'];
$user_type = $_SESSION['user_type'];
if ($user_type == 'admin' || $user_type == 'teacher') {
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Result List</title>
        <link rel="stylesheet" href="styles.css">
        <link rel="stylesheet" href="style2.css">
    </head>

    <body>

        <nav>
            <?php include('navbar.php') ?>
        </nav>

        <aside>
            <?php include('sidebar.php') ?>
        </aside>
        <main>
            <div>
                <?php
                $sql3 = "SELECT * FROM subject";
                $query3 = $conn->query($sql3);
                $data_list1 = array();
                while ($data = mysqli_fetch_assoc($query3)) {
                    $subject_id    = $data['subject_id'];
                    $subject_name  = $data['subject_name'];

                    $data_list1[$subject_id] = $subject_name;
                }
                ?>

                <?php
                $sql1 = "SELECT* FROM class";
                $query1 = $conn->query($sql1);
                $data_list2 = array();
                while ($data = mysqli_fetch_assoc($query1)) {
                    $class_id = $data['class_id'];
                    $class_name = $data['class_name'];

                    $data_list2[$class_id] = $class_name;
                }
                ?>

                <?php
                echo "<table border='1'>
                        <tr>
                            <th>Class</th>
                            <th>Student Roll</th>
                            <th>Subject</th>
                            <th>Midterm</th>
                            <th>Final</th>
                            <th>Total</th>
                             <th>Action</th>
                        </tr>";
                $sql = "SELECT * FROM result";
                $result = $conn->query($sql);
                while ($data = mysqli_fetch_assoc($result)) {
                    $result_id      = $data['result_id'];
                    $class          = $data['class'];
                    $student_roll   = $data['student_roll'];
                    $subject        = $data['subject'];
                    $midterm        = $data['midterm'];
                    $final          = $data['final'];
                    $total = $midterm + $final;
                    echo "<tr>
                            <td>$data_list2[$class]</td>
                            <td>$student_roll</td>
                             <td>$data_list1[$subject]</td>
                            <td>$midterm</td>
                            <td>$final</td>
                            <td>$total</td>
                            <td><a href='edit_result.php?id=$result_id'><button>Edit</button></a></td>
                            </tr>";
                }
                echo "</table>";
                ?>
            </div>
        </main>

        <footer>
            <?php require('footer.php') ?>
        </footer>

    </body>

    </html>
<?php
} else {
    header('location:login.php');
}
?>