<?php

// Assuming you have a database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "task";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the ID parameter is set in the request
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // SQL to delete a record
    $sql = "DELETE FROM employee_info WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        // Record deleted successfully
        $response = array('status' => 'success', 'message' => 'Record deleted successfully');
    } else {
        // Error deleting record
        $response = array('status' => 'error', 'message' => 'Error deleting record: ' . $conn->error);
    }
} else {
    // ID parameter is not set
    $response = array('status' => 'error', 'message' => 'ID parameter is not set');
}

// Close the database connection
$conn->close();

// Set the content type to JSON
header('Content-Type: application/json');

// Output the JSON response
echo json_encode($response);
?>
