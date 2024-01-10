<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login</title>
    <link rel="stylesheet" href="style.css" />
    <style>
        /* Snackbar styles */
       /* Snackbar styles */
#snackbar {
    visibility: hidden;
    min-width: 250px;
    margin-left: -125px;
    background-color: #333;
    color: #fff;
    text-align: center;
    border-radius: 2px;
    padding: 16px;
    position: fixed;
    z-index: 1;
    left: 50%;
    top: 30px; /* Change 'bottom' to 'top' and adjust the 'top' value as needed */
    font-size: 16px;
}

#snackbar.show {
    visibility: visible;
    animation: fadein 0.5s, fadeout 0.5s 2.5s;
}

@keyframes fadein {
    from {
        top: 0; /* Change 'bottom' to 'top' */
        opacity: 0;
    }
    to {
        top: 30px; /* Change 'bottom' to 'top' and adjust the 'top' value as needed */
        opacity: 1;
    }
}

@keyframes fadeout {
    from {
        top: 30px; /* Change 'bottom' to 'top' and adjust the 'top' value as needed */
        opacity: 1;
    }
    to {
        top: 0; /* Change 'bottom' to 'top' */
        opacity: 0;
    }
}

    </style>
    <script>
        function showSnackbar(message, color) {
            var snackbar = document.getElementById("snackbar");
            snackbar.textContent = message;
            snackbar.style.backgroundColor = color;
            snackbar.className = "show";

            setTimeout(function () {
                snackbar.className = snackbar.className.replace("show", "");
            }, 3000); // 3 seconds, adjust as needed
        }
    </script>
</head>
<body>

    <div class="container">
        <div class="form-box">
            <header>
                <h1 id="title" style="color: #c99c33;">Login</h1>
            </header>
            <form method="post" action="index.php" id="loginForm">
                <input type="email" placeholder="Email address" name="email" required />
                <input type="password" placeholder="Password" name="password" required />
                <!-- <a href="#">Forgot Password?</a> -->
                <input type="submit" value="Login" id="signinBtn" style='background-color: #c99c33;
    color: white;
    font-weight: 700;
    font-size: 18px; cursor:pointer' />
            </form>
        </div>
    </div>

    <div id="snackbar"></div>

    <?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    session_start(); // Start the session

    // Assuming you have a database connection established
    $your_db_connection = mysqli_connect("localhost", "root", "", "task");

    if (!$your_db_connection) {
        die("Connection failed: " . mysqli_connect_error());
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Get the input values from the form
        $email = mysqli_real_escape_string($your_db_connection, $_POST["email"]);
        $password = mysqli_real_escape_string($your_db_connection, $_POST["password"]);

        // TODO: Add proper validation and sanitation of input data

        // Example query to check login credentials
        $query = "SELECT * FROM employee_info WHERE email ='$email' AND password='$password'";
        $result = mysqli_query($your_db_connection, $query);

        if ($result) {
            $row = mysqli_fetch_assoc($result);
            if ($row) {
                // Check the role column
                $role = $row['role'];

                // Create session variables
                $_SESSION['user_id'] = $row['id'];
                $_SESSION['user_email'] = $row['email'];
                $_SESSION['user_role'] = $role;
                $_SESSION['image'] = $row['image'];
                $_SESSION['name'] = $row['name'];
                $_SESSION['role'] = $row['role'];
              

                // Redirect based on the role
                if ($role == 5) {
                    header("Location: side/index.php");
                } else {
                    header("Location: timesheet/index.php");
                }
                exit();
            } else {
                // Invalid credentials, show custom Snackbar
                echo '<script>showSnackbar("Invalid email or password!", "#dc3545");</script>';
            }
        } else {
            // Handle database query error, show custom Snackbar
            echo '<script>showSnackbar("Database error: ' . mysqli_error($your_db_connection) . '", "#dc3545");</script>';
        }
    }
    ?>

</body>
</html>
