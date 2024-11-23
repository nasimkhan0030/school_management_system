<?php
session_start();
$user_first_name = $_SESSION['user_first_name'];
$user_last_name = $_SESSION['user_last_name'];
$user_id = $_SESSION['user_id'];

if (!empty($user_id)) {
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Student</title>
    </head>
    <link rel="stylesheet" href="styles.css">

    <body>

        <nav>
            navbar
        </nav>

        <aside>
            <?php include('sidebar.php')?>
        </aside>

        <main>
            <h1>Hello</h1>
        </main>

        <footer>Footer</footer>
        
    </body>

    </html>

<?php
} else {
    header('location:login.php');
}
?>