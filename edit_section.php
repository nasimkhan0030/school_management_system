<?php
require('connection.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Section</title>
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

                $sql = "SELECT *FROM `section` WHERE section_category = $getid";
                $query = $conn->query($sql);
                $data = mysqli_fetch_assoc($query);

                $section_name       = $data['section_name'];
                $section_category   = $data['section_category'];
                $section_id         = $data['section_id'];
            }
            if (isset($_GET['section_category'])) {
                $new_section_category   = $_GET['section_category'];
                $new_section_name       = $_GET['section_name'];
                $new_section_id        = $_GET['section_id'];

                $sql2 = "UPDATE section SET section_category='$new_section_category',
                                     section_name='$new_section_name',
                                     WHERE section_id='$new_section_id'";

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
                <label for="section_category">Class Name :</label>
                <select name="section_category">
                    <?php
                    while ($data = mysqli_fetch_assoc($query1)) {
                        $class_id = $data['class_id'];
                        $class_name = $data['class_name'];
                    ?>
                        <option value='<?php echo $class_id ?>' <?php if ($section_category == $class_id) {
                                                                    echo "selected";
                                                                } ?>><?php echo $class_name ?></option>
                    <?php } ?>
                </select><br><br>

                <label for="section_name">Section Name :</label>
                <input type="text" name="section_name" value="<?php echo $section_name ?>">

                <input type="hidden" name="section_id" value="<?php echo $section_id ?>" >

                <input type="submit" value="Submit">
            </form>
        </div>
    </main>

    <footer>Footer</footer>

</body>

</html>