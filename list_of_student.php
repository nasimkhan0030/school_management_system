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
    <title>Student List</title>
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

    <main class="list-container">
        <?php
        $sql1 = "SELECT * FROM users WHERE user_type='student'";
        $query1 = $conn->query($sql1);

        echo "<table border='1' id='class'>
                <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>DOB</th>
                    <th>Fathers Name</th>
                    <th>Mothers Name</th>
                    <th>Gender</th>
                    <th>email</th>
                    <th>Action</th>
                </tr>";
        while ($data = mysqli_fetch_assoc($query1)) {
            $user_id = $data['user_id'];
            $user_first_name = $data['user_first_name'];
            $user_last_name = $data['user_last_name'];
            $dob = $data['dob'];
            $father_name = $data['father_name'];
            $mother_name = $data['mother_name'];
            $gender = $data['gender'];
            $email = $data['email'];
            echo "<tr>
                    <td>$user_first_name</td>
                    <td>$user_last_name</td>
                    <td>$dob</td>
                    <td>$father_name</td>
                    <td>$mother_name</td>
                    <td>$gender</td>
                    <td>$email</td>
                    <td><a href='edit_student.php?id=$user_id'><button>Edit</button></a>
                </td></tr>";
        }
        echo "</table>";
        ?>
    </main>

    <footer>Footer</footer>

</body>

</html>

<?php
}else{
    header('location:login.php');
}
?>