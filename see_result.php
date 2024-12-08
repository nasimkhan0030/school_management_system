<?php
require('connection.php');
session_start();
$user_first_name = $_SESSION['user_first_name'];
$user_last_name = $_SESSION['user_last_name'];
$user_id = $_SESSION['user_id'];
$email = $_SESSION['email'];
$user_type = $_SESSION['user_type'];
if ($user_type == 'student') {
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Show Result</title>
        <link rel="stylesheet" href="styles.css">
        <link rel="stylesheet" href="style2.css">
        <script src="result.js"></script>
    </head>

    <body>

        <nav>
            <?php include('navbar.php') ?>
        </nav>

        <aside>
            <?php include('sidebar2.php') ?>
        </aside>

        <main>
            <?php
            $sql1 = "SELECT* FROM class";
            $query1 = $conn->query($sql1);
            ?>
            <form action="<?php $_SERVER['PHP_SELF'] ?>" method="GET">
                Select Class :<br>
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
                <input type="submit" value="See Result">
            </form>
            <div id="myResultArea">
                <?php
                if (isset($_GET['class'])) {
                    $class           = $_GET["class"];
                    $roll            = $_GET["roll"];

                    // Subject Table
                    $sql3 = "SELECT * FROM subject";
                    $query3 = $conn->query($sql3);
                    $data_list1 = array();
                    while ($data = mysqli_fetch_assoc($query3)) {
                        $subject_id    = $data['subject_id'];
                        $subject_name  = $data['subject_name'];

                        $data_list1[$subject_id] = $subject_name;
                    }
                    // Class Table
                    $sql1 = "SELECT* FROM class";
                    $query1 = $conn->query($sql1);
                    $data_list2 = array();
                    while ($data = mysqli_fetch_assoc($query1)) {
                        $class_id = $data['class_id'];
                        $class_name = $data['class_name'];

                        $data_list2[$class_id] = $class_name;
                    }
                    // Admission Table
                    $sql2 = "SELECT* FROM admission WHERE class=$class AND student_roll=$roll ";
                    $query2 = $conn->query($sql2);
                    while ($data = mysqli_fetch_assoc($query2)) {
                        $student_name = $data['student_name'];
                    }
                    echo "<h4>Name: $student_name</h4>";
                    // Result Table
                    echo "<table>
                    <tr>
                        <th>Subject</th>
                        <th>Midterm</th>
                        <th>Final</th>
                        <th>Total</th>
                    </tr>";
                    $sql5 = "SELECT * FROM result WHERE class=$class AND  student_roll=$roll";
                    $query5 = $conn->query($sql5);
                    $data2 = mysqli_fetch_assoc($query5);
                    $class_name     = $data2['class'];
                    $student_roll   = $data2['student_roll'];
                    echo "<h4>Class: $data_list2[$class_name]</h4>";
                    echo "<h4>Roll: $student_roll</h4>";
                    $sql = "SELECT * FROM result WHERE class=$class AND  student_roll=$roll";
                    $query = $conn->query($sql);
                    while ($data = mysqli_fetch_array($query)) {
                        $subject        = $data['subject'];
                        $midterm        = $data['midterm'];
                        $final          = $data['final'];
                        $total = $midterm + $final;
                        echo "<tr>
                            <td>$data_list1[$subject]</td>    
                            <td>$midterm</td>
                            <td>$final</td>
                            <td>$total</td>
                        </tr>";
                    }
                    echo "</table>";
                }
                ?>
                
            </div>
            <button onclick="printMyResultArea()">Print</button>
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