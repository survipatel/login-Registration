<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
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
$name = $email = $rollNumber = '';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and validate user input
    $name = test_input($_POST["name"]);
    $email = test_input($_POST["email"]);
    $rollNumber = test_input($_POST["rollNumber"]);

    // Generate an 8-digit password
    $password = generatePassword(8);

    // Insert data into the database
    $sql = "INSERT INTO students (name, email, roll_number, password) VALUES ('$name', '$email', '$rollNumber', '$password')";
    
    if ($conn->query($sql) === TRUE) {
        echo "Registration successful! Your password is: $password" ," and it will disappear in 10 seconds";
        header("Refresh: 10; URL=login.php"); // Redirect to login page after 2 seconds
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Function to generate a random password
function generatePassword($length) {
    $characters = '0123456789';
    $password = '';
    for ($i = 0; $i < $length; $i++) {
        $password .= $characters[rand(0, strlen($characters) - 1)];
    }
    return $password;
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
    <h1 class="login-title">Registration</h1>
    <input type="text" class="login-input" name="name" placeholder="Name" required />
    <input type="email" class="login-input" name="email" placeholder="Email Adress"required>
    <input type="text" class="login-input" name="rollNumber" placeholder="Roll Number"required>
    <input type="submit" name="submit" value="Register" class="login-button">
    <p class="link">Already have an account? <a href="login.php">Login here</a></p>
</form>

</body>
</html>
