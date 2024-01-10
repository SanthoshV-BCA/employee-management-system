<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Employee Management</title>
    <link rel="stylesheet" href="style.css" />
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous" />
    <style>
      /* Snackbar styles */
/* Snackbar styles */
/* Snackbar styles */
.snackbar {
  display: none;
  position: fixed;
  /* bottom: 20px; */
  right: 20px; /* Adjust right position */
  top: 64px;
  padding: 15px;
  background-color: #333;
  color: #fff;
  border-radius: 10px;
  text-align: center;
  z-index: 1;
  max-width: 300px; /* Set a maximum width for better readability */
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
  transition: transform 0.3s ease-in-out;
}

.success {
  background-color: #28a745;
}

.error {
  background-color: #dc3545;
}

/* Add animation for a right-to-left appearance */
@keyframes slideInRight {
  0% {
    transform: translateX(100%);
  }
  100% {
    transform: translateX(0);
  }
}

@keyframes slideOutRight {
  0% {
    transform: translateX(0);
  }
  100% {
    transform: translateX(100%);
  }
}

/* Apply animation to the snackbar */
.snackbar.show {
  animation: slideInRight 0.3s ease-in-out forwards;
}

/* Apply animation when hiding the snackbar */
.snackbar.hide {
  animation: slideOutRight 0.3s ease-in-out forwards;
}
.top-bar {
    background-color: #c99c33;
    color: #fff;
    padding: 10px;
    text-align: right;
}

.greeting-message {
    display: inline-block;
    margin-right: 20px;
}

.start-task-button {
    background-color: #2ecc71;
    color: #fff;
    border: none;
    padding: 10px 20px;
    font-size: 14px;
    cursor: pointer;
    border-radius: 10px;
}
/* Add this to your existing styles.css */

.greeting-message {
    display: inline-block;
    margin-right: 20px;
    font-size: 18px;
    font-weight: bold;
    float: left;
    padding: 10px;
}

/* Additional styling for different times of the day */
.greeting-message.morning {
    color: #f39c12; /* Morning color */
}

.greeting-message.afternoon {
    color: #e74c3c; /* Afternoon color */
}

.greeting-message.evening {
    color: #3498db; /* Evening color */
}

      </style>
</head>
<body>

<?php
session_start();
// session_start();

// Unset all session variables
// $_SESSION = array();

// Destroy the session
// session_destroy();

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: ../index.php"); // Redirect to the login page if not logged in
    exit();
}
?>

<div class="wrapper">
<div id="snackbar" class="snackbar"></div>
    <div class="wrapper_inner">
        <!-- Sidebar -->
        <div class="vertical_wrap">
            <div class="backdrop"></div>
            <div class="vertical_bar">
                <!-- Profile Info -->
                <div class="profile_info">
                    <div class="img_holder">
                    <img src="../images/<?php echo $_SESSION['image']; ?>" alt="profile_pic" />

                    </div>
                    <p class="title"><?php echo $_SESSION['name']; ?></p>
                    <p class="sub_title"><?php echo $_SESSION['user_email']; ?></p>
                </div>
                <!-- Menu Items -->
                <ul class="menu">
                    <!-- <li>
                        <a href="../side/index.php">
                            <span class="icon"><i class="fas fa-home"></i></span>
                            <span class="text">Management</span>
                        </a>
                    </li> -->
                    <li>
                        <a href="../timesheet/index.php" >
                            <span class="icon"><i class="fas fa-file-alt"></i></span>
                            <span class="text">Timesheet</span>
                        </a>
                    </li>
                   
                </ul>
            </div>
        </div>

        <!-- Main Container -->
        <div class="main_container">
            <div class="top_bar">
                <div class="hamburger">
                    <i class="fas fa-bars"></i>
                </div>
                <div class="logo">Time <span>Sheet</span></div>
            </div>

            <div class="container">
              <!-- Snackbar -->


                <div class="container-md mydiv">
                <div class="top-bar">
        <div class="greeting-message" id="greetingMessage"></div>
        <button class="start-task-button" onclick="startTask()">Start Task</button>
    </div>
                  

    <div class="container mt-4">
        <h2>Task Details</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Task Name</th>
                    <th scope="col">Description</th>
                    <th scope="col">Status</th>
                    <th scope="col">Assigned To</th>
                </tr>
            </thead>
            <tbody>
                <!-- Sample Data - Replace with dynamic data from your server -->
                <tr>
                    <th scope="row">1</th>
                    <td>Task 1</td>
                    <td>Complete the documentation</td>
                    <td>In Progress</td>
                    <td>John Doe</td>
                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td>Task 2</td>
                    <td>Review code changes</td>
                    <td>Completed</td>
                    <td>Jane Doe</td>
                </tr>
                <!-- Add more rows as needed -->
            </tbody>
        </table>
    </div>    

                    <!-- Employee Table -->
                    
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- updatepop -->


<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
    setGreetingMessage();
});

function setGreetingMessage() {
    var currentDate = new Date();
    var currentHour = currentDate.getHours();

    var greetingMessage = "Good ";

    if (currentHour >= 5 && currentHour < 12) {
        greetingMessage += "Morning";
    } else if (currentHour >= 12 && currentHour < 17) {
        greetingMessage += "Afternoon";
    } else {
        greetingMessage += "Evening";
    }

    document.getElementById('greetingMessage').innerHTML = greetingMessage;
}

function startTask() {
    // Add your logic for starting a task here
    alert("Task started!");
}

    var hamburger = document.querySelector(".hamburger");
    var wrapper = document.querySelector(".wrapper");
    var backdrop = document.querySelector(".backdrop");

    hamburger.addEventListener("click", function () {
        wrapper.classList.add("active");
    });

    backdrop.addEventListener("click", function () {
        wrapper.classList.remove("active");
    });

    function updateFileName() {
        var fileName = document.getElementById("employeeImage").files[0].name;
        document.getElementById("employeeImageLabel").innerText = fileName;
    }

    // Function to handle the form submission
    function submitForm() {
        $('#exampleModal').modal('hide'); // Assuming you're using Bootstrap modal

        // Get form values
        const name = document.getElementById('employeeName').value;
        const email = document.getElementById('employeeEmail').value;
        const dob = document.getElementById('employeeDOB').value;
        const role = document.getElementById('employeeRole').value;
        const image = document.getElementById('employeeImage').files[0];

        // Create FormData object to handle file upload
        const formData = new FormData();
        formData.append('name', name);
        formData.append('email', email);
        formData.append('DOB', dob);
        formData.append('role', role);
        formData.append('image', image);

        // Send the data to the server using XMLHttpRequest or fetch
        const xhr = new XMLHttpRequest();
        const url = 'http://localhost/task/apis/addemployee.php'; // Replace with your API endpoint
        xhr.open('POST', url, true);

        // Set up event listener to handle the response
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4) {
                console.log(xhr.responseText); // Log the entire response text to the console

                if (xhr.status === 200 || xhr.status === 0) {
                    let response;  // Declare the response variable here

                    try {
                        response = JSON.parse(xhr.responseText);
                        console.log(response); // Handle the server response here

                        const snackbar = document.getElementById('snackbar');

if (response.status === 200) {
  snackbar.className = 'snackbar success';
} else {
  snackbar.className = 'snackbar error';
}

snackbar.innerText = response.message; // Set the snackbar text from the response

snackbar.style.display = 'block';

// Hide the snackbar after a few seconds (adjust the timeout as needed)
setTimeout(function () {
  snackbar.style.display = 'none';
}, 3000);

// Additional actions for success or error, if needed
if (response.status === 200) {
  // Additional actions for success, if needed
} else {
  // Additional actions for error, if needed
}

                    } catch (error) {
                        console.error('Error parsing JSON: ' + error);
                        // Handle the case where the response is not valid JSON
                    }
                } else {
                    console.error('Error: ' + xhr.status);
                    // Handle other HTTP status codes (e.g., display an error message)
                }
            }
        };

        // Send the request
        xhr.send(formData);
        document.getElementById('employeeForm').reset(); // Reset the form
    }
</script>

<!-- validation -->
<script>
    function validateAndSubmitForm() {
        const name = document.getElementById('employeeName').value;
        const email = document.getElementById('employeeEmail').value;
        const dob = document.getElementById('employeeDOB').value;
        const role = document.getElementById('employeeRole').value;
        const image = document.getElementById('employeeImage').files[0];
        // ... (other form fields)

        // Validate form fields
        if (
            !validateName(name) ||
            !validateEmail(email) ||
            !validateDOB(dob) ||
            !validateRole(role) ||
            !validateImage(image)
        ) {
            return;
        }

        // If all fields are valid, proceed with form submission
        submitForm();
    }

    function validateImage(image) {
        const imageError = document.getElementById('imageError');
        if (!image) {
            imageError.innerText = 'Please choose an image.';
            imageError.style.display = 'block';
            return false;
        }

        const allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];
        const imageExtension = image.name.split('.').pop().toLowerCase();
        if (!allowedExtensions.includes(imageExtension)) {
            imageError.innerText = 'Invalid image format. Please choose a JPG, JPEG, PNG, or GIF file.';
            imageError.style.display = 'block';
            return false;
        }

        imageError.style.display = 'none';
        return true;
    }

    function validateName(name) {
        const nameError = document.getElementById('nameError');
        if (name.trim() === '') {
            nameError.innerText = 'Name is required.';
            nameError.style.display = 'block';
            return false;
        }
        nameError.style.display = 'none';
        return true;
    }

    function validateEmail(email) {
        const emailError = document.getElementById('emailError');

        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailRegex.test(email)) {
            emailError.innerText = 'Please enter a valid email address.';
            emailError.style.display = 'block';
            return false;
        }
        emailError.style.display = 'none';
        return true;
    }

    function validateDOB(dob) {
        const dobError = document.getElementById('dobError');
        if (dob.trim() === '') {
            dobError.innerText = 'Date of Birth is required.';
            dobError.style.display = 'block';
            return false;
        }
        dobError.style.display = 'none';
        return true;
    }

    function validateRole(role) {
        const roleError = document.getElementById('roleError');
        if (role === '') {
            roleError.innerText = 'Please select a role.';
            roleError.style.display = 'block';
            return false;
        }
        roleError.style.display = 'none';
        return true;
    }
</script>
<script>
    async function fetchData() {
        try {
            const response = await fetch('http://localhost/task/apis/getdata.php');
            const data = await response.json();

            // Populate the table with fetched data
            populateTable(data);
        } catch (error) {
            console.error('Error fetching data:', error);
        }
    }

    function populateUpdateModal(employeeData) {
        $('#updateModal').modal('show');

        // Set existing data in the modal fields
        $('#employeeNameUpdate').val(employeeData.name);
        $('#employeeEmailUpdate').val(employeeData.email);
        $('#employeeDOBUpdate').val(employeeData.DOB);
        $('#employeeRoleUpdate').val(employeeData.role_name);
        // Additional fields as needed
    }

    // Function to handle the "Update" button click
    function handleUpdateClick(index) {
        // Get the data of the employee to be updated
        const employeeData = apiData[index];

        // Populate the update modal with existing data
        populateUpdateModal(employeeData);
    }

    // Function to handle the "Delete" button click
    function handleDeleteClick(id) {
        // Perform delete action or show confirmation modal
        console.log('Delete button clicked for ID:', id);
    }

    // Function to populate the table with API data
    function populateTable(apiData) {
        var tableBody = $('#apiDataTableBody');

        // Clear existing rows
        tableBody.empty();

        // Iterate through the API data and create table rows
        $.each(apiData, function(index, data) {
            var row = '<tr>' +
                '<th scope="row">' + (index + 1) + '</th>' +
                '<td>' + data.name + '</td>' +
                '<td>' + data.email + '</td>' +
                '<td>' + data.DOB + '</td>' +
                '<td>' + data.role_name + '</td>' +
                '<td>' +
                    '<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal" onclick="handleDeleteClick(' + data.id + ')">' +
                        '<i class="fas fa-trash"></i>' +
                    '</button>' +
                '</td>' +
                '</tr>';

            // Append the row to the table
            tableBody.append(row);
        });
    }

    // Call the function to fetch data and populate the table
    fetchData();
    function handleDeleteClick(id) {
    // Confirm the deletion with the user if needed
    if (confirm("Are you sure you want to delete this item?")) {
        // Make the AJAX request to delete data
        $.ajax({
            url: 'http://localhost/task/apis/deletedata.php?id=' + id,  // Pass the id parameter in the URL
            type: 'DELETE',
            success: function(response) {
                // Handle the success response here
                console.log('Data deleted successfully', response);
                fetchData();
            },
            error: function(error) {
                // Handle the error response here
                console.error('Error deleting data', error);
            }
        });
    }
}
</script>

</body>
</html>
