<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "task";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
    // Check if ID parameter is set
    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        // Delete data based on the ID
        $deleteSql = "DELETE FROM employee_info WHERE id = $id";
        if ($conn->query($deleteSql) === TRUE) {
            echo json_encode(array('status' => 'success', 'message' => 'Data deleted successfully'));
        } else {
            echo json_encode(array('status' => 'error', 'message' => 'Error deleting data: ' . $conn->error));
        }
    } else {
        echo json_encode(array('status' => 'error', 'message' => 'ID parameter is not set'));
    }
} else {
    // Fetch all data without filtering
    $sql = "SELECT employee_info.id, employee_info.name, employee_info.email,employee_info.DOB, role.name AS role_name FROM employee_info 
            JOIN role ON employee_info.role = role.id";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $data = array();

        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }

        header('Content-Type: application/json');
        echo json_encode($data);
    } else {
        echo "No records found.";
    }
}

$conn->close();
?>
