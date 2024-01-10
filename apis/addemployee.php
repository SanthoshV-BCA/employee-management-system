<?php
require 'C:/xampp/htdocs/task/mail/src/Exception.php';
require 'C:/xampp/htdocs/task/mail/src/PHPMailer.php';
require 'C:/xampp/htdocs/task/mail/src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Set up database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "task";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Create a response array
$response = array();

// Check if the HTTP status code is 200
if (http_response_code() === 200) {
    $uploadDir = '../images/';
    $uploadFile = $uploadDir . basename($_FILES['image']['name']);

    // Additional checks for file upload
    $fileType = pathinfo($uploadFile, PATHINFO_EXTENSION);
    $allowedExtensions = array("jpg", "jpeg", "png", "gif");

    if (!in_array(strtolower($fileType), $allowedExtensions)) {
        $response['status'] = 400;
        $response['error'] = "Invalid file type.";
    } elseif ($_FILES['image']['size'] > 5000000) {
        $response['status'] = 400;
        $response['error'] = "File size exceeds the limit.";
    } else {
        // Generate a unique filename
        $uniqueFilename = uniqid() . '_' . $_FILES['image']['name'];
        $uploadFile = $uploadDir . $uniqueFilename;

        if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadFile)) {
            $response['status'] = 200;
            $response['file'] = "uploaded";
            $response['message'] = "File is valid and was successfully uploaded.";

            // Get data from the POST array
            $name = $conn->real_escape_string($_POST['name']);
            $email = $conn->real_escape_string($_POST['email']);
            $DOB = $conn->real_escape_string($_POST['DOB']);
            $role = $conn->real_escape_string($_POST['role']);
            $image = $conn->real_escape_string($uniqueFilename);
            $pass1 = substr($name, 0, 3);
            $pass2 = substr($DOB, -2);
            $passwords = $pass1 . $pass2;

            // Prepare and execute the SQL query
            $sql = "INSERT INTO employee_info (name, email, DOB, role, image, password)
                    VALUES ('$name', '$email', '$DOB', '$role', '$image', '$passwords')";

            if ($conn->query($sql) === true) {
                $response['message'] = "Employee Added successfully";

                // Send email using PHPMailer
                $mail = new PHPMailer(true);
                try {
                    // Server settings
                    $mail->isSMTP();
                    $mail->Host       = 'smtp.gmail.com'; // Replace with your SMTP server
                    $mail->SMTPAuth   = true;
                    $mail->Username   = 'san.oct007@gmail.com'; // Replace with your email
                    $mail->Password   = 'rubc pxwz dbwf fqiu'; // Replace with your email password
                    $mail->SMTPSecure = 'tls'; // Use 'tls' or 'ssl'
                    $mail->Port       = 587; // Use the appropriate port
                    $mail->SMTPDebug  = 0; // Set to 2 for detailed debugging output

                    // Recipients
                    $mail->setFrom('san.oct007@gmail.com', 'Santhosh');
                    $mail->addAddress($email); // Use $email as the recipient

                    // Content
                    $mail->isHTML(false);
                    $mail->Subject = 'Employee Registration';
                    $mail->Body    = "Dear $name,\n\nYour registration is successful.\n\nUsername: $email\nPassword: $passwords";

                    $mail->send();
                    $response['email_status'] = "Email sent successfully";
                } catch (Exception $e) {
                    $response['email_status'] = "Error sending email: {$e->getMessage()}";
                }
            } else {
                $response['status'] = 500;
                $response['error'] = "Error executing query: " . $conn->error;
            }
        } else {
            $response['status'] = 500;
            $response['error'] = "Error uploading file.";
        }
    }
} else {
    $response['status'] = 500;
    $response['error'] = "Error: HTTP status code is not 200";
}

// Close the database connection
$conn->close();

// Output the response as JSON
header('Content-Type: application/json');
echo json_encode($response);
?>
