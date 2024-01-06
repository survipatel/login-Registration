<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" href="style.css"/>
    
</head>
<body>

<?php
// Include database connection
include('db_connection.php');

// Start session
session_start();

// Check if the user is already logged in, redirect to dashboard
if (isset($_SESSION['rollNumber'])) {
    header("Location: dashboard.php");
    exit();
}

// Define variables to store user input
$rollNumber = $password = '';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and validate user input
    $rollNumber = test_input($_POST["rollNumber"]);
    $password = test_input($_POST["password"]);

    // Check login credentials
    $sql = "SELECT * FROM students WHERE roll_number = '$rollNumber' AND password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Login successful, set session variable
        $_SESSION['rollNumber'] = $rollNumber;
        header("Location: dashboard.php"); // Redirect to dashboard
         exit();
    } else {
        echo "Invalid credentials. Please try again.";
    }
}

// Function to sanitize and validate user input
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

?>

<form class="form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <h1 class="login-title">Login</h1>
    <input type="text" class="login-input" name="rollNumber" placeholder="Roll Number" required >
    <input type="password" class="login-input" name="password" placeholder="Password"/>
    <input type="submit" value="Login" name="submit" class="login-button"/>
    <p class="link">Don't have an account? <a href="registration.php">Registration Now</a></p>
</form>

</body>
</html>
