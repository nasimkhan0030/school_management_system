<?php
$hostname = 'localhost';
$username = 'root';
$password = "";
$dbname = 'student_management';
$conn = new mysqli($hostname, $username, $password, $dbname);
if ($conn->connect_error) {
    die('Connection Failed: ' . $conn->connect_error);
}

// CREATE DATABASE student_management;
// CREATE TABLE admission (
//     admision_id Primary	int(5),
//     class	int(5),
//     section	int(5),
//     student_name	varchar(50),
//     student_roll	int(10)
// );
// CREATE TABLE class (
//     class_id Primary	int(11),
//     class_name	varchar(10)
// );
// CREATE TABLE result (
//     result_id Primary	int(5),
//     class	int(5),
//     student_roll	int(5),
//     subject	int(5),
//     midterm	int(2),
//     final	int(2),
//     status	varchar(10)
// );
// CREATE TABLE section (
//     section_id Primary	int(11),
//     section_category	int(5),
//     section_name	varchar(20)
// );
// CREATE TABLE subject (
//     subject_id Primary	int(5),
//     subject_category	varchar(20),
//     subject_name	varchar(50),
//     subject_code	varchar(10)
// );
// CREATE TABLE users (
//     user_id Primary	int(5),
//     user_first_name	varchar(20),
//     user_last_name	varchar(20),
//     dob	varchar(10),
//     father_name	varchar(50),
//     mother_name	varchar(50),
//     gender	varchar(6),
//     email	varchar(50),
//     password	varchar(20),
//     user_type	varchar(10)
// );
?>

<?php
$host = 'localhost';
$dbname = 'phpdb';
$username = 'root'; // Adjust according to your setup
$password = ''; // Adjust according to your setup

try {
    // Connect to MySQL server
    $pdo = new PDO("mysql:host=$host", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Check if database exists, if not, create it
    $pdo->exec("CREATE DATABASE IF NOT EXISTS $dbname");
    $pdo->exec("USE $dbname");

    // Check if `users` table exists, if not, create it
    $usersTableQuery = "
        CREATE TABLE IF NOT EXISTS users (
            id INT AUTO_INCREMENT PRIMARY KEY,
            username VARCHAR(50) UNIQUE NOT NULL,
            password VARCHAR(255) NOT NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        )
    ";
    $pdo->exec($usersTableQuery);

    // Check if `products` table exists, if not, create it
    $productsTableQuery = "
        CREATE TABLE IF NOT EXISTS products (
            id INT AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(100) NOT NULL,
            price DECIMAL(10, 2) NOT NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        )
    ";
    $pdo->exec($productsTableQuery);

    // Insert sample data into `products` table if it is empty
    $checkProducts = $pdo->query("SELECT COUNT(*) FROM products")->fetchColumn();
    if ($checkProducts == 0) {
        $pdo->exec("
            INSERT INTO products (name, price) VALUES 
            ('Product 1', 10.99), 
            ('Product 2', 20.49), 
            ('Product 3', 30.00),
            ('Product 4', 90.00),
            ('Product 5', 200.00),
            ('Product 6', 76.66),
            ('Product 7', 36.00),
            ('Product 8', 500.00)
        ");
    }

} catch (PDOException $e) {
    die("Database setup or connection failed: " . $e->getMessage());
}
