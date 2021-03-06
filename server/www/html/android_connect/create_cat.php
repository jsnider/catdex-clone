<?php
// Include the login information stored in the db_config.php file.
require '../../includes/db_config.php';

// Create connecton using required DEFINEs
$conn = new mysqli(DB_SERVER, DB_USER, DB_PASSWORD, DB_DATABASE);

// Check connection (from w3schools website)
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the JSON struct and decode it.
$data = json_decode(file_get_contents('php://input'), true);
echo $data['name'];

// Insert the provided name of the cat into the database.
mysqli_query($conn, "INSERT INTO cats (name) VALUES ('".$data['name']."')") or die(mysqli_error($conn));
?>
