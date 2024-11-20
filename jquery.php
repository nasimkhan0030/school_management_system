<?php
include('connection.php');
$class = $_GET['class'];
$sql = "SELECT section_name FROM section WHERE section_category='" . $class . "'";
$query = $conn->query($sql);

$output='<option>Select Section</option>';
while ($data = mysqli_fetch_array($query)) {
    $section_name = $data['section_name'];
    $output.="<option>".$section_name."</option>";
}
echo $output;
?>