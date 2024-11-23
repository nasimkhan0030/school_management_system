<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher</title>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
        }

        * {
            padding: 0;
            margin: 0;
        }

        nav {
            position: fixed;
            background-color: green;
            width: 100%;
            height: 70px;
            z-index: 1;

        }

        .logo {
            font-size: 25px;
            position: relative;
            left: 5%;
            color: white;
            font-weight: bold;
            line-height: 70px;
        }

        ul {
            position: relative;
            float: right;
            margin-right: 20px;
        }

        ul li {
            display: inline;
            line-height: 70px;
            margin: 0 5px;
        }

        ul li a {
            text-decoration: none;
            color: white;
            font-size: 15px;
        }

        .login {
            background-color: blueviolet;
            padding: 8px 15px;
            border-radius: 5px;
        }

        .bodyContent {
            padding-top: 70px;
        }
    </style>
</head>
<body>
    <nav>
        <label class="logo">W-School</label>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="">Contact</a></li>
            <li><a href="logout.php" class="login">Logout</a></li>
        </ul>
    </nav>
    <div class="bodyContent">
        <h1>Teachers Homepage</h1>
        <h3><a href="logout.php">Logout</a></h3>
        <h3><a href="admission_request.php">Profile</a></h3>
        <h3><a href="admission_request.php">Enroled Students</a></h3>
        <h3><a href="admission_request.php">Update Result</a></h3>
    </div>

</body>

</html>