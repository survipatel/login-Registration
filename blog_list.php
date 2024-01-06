<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog List</title>
    
</head>
<body>
<?php
// Include database connection
include('db_connection.php');

// Start session
session_start();

// Check if the user is logged in, otherwise redirect to login page
if (!isset($_SESSION['rollNumber'])) {
    header("Location: login.php");
    exit();
}

// Retrieve and display only the blogs posted by the currently logged-in student
$rollNumber = $_SESSION['rollNumber'];
$sql = "SELECT * FROM blogs WHERE roll_number = '$rollNumber'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
   
    echo "<h2>Your Blog List:</h2>";
    while ($row = $result->fetch_assoc()) {
        echo "<p><strong>Title:</strong> " . $row["title"] . "<br>";
        echo "<strong>Description:</strong> " . $row["description"] . "<br>";
        echo "<img src='" . $row["image"] . "' alt='Blog Image' style='max-width: 300px;'><br>";
        echo "</p>";

    }
    echo "<br><a href='dashboard.php'>Go Back to Dashboard</a>";
} else {
    echo "No blogs posted yet.";
     echo "<br><a href='dashboard.php'>Go Back to Dashboard</a>";
}

?>

</body>
</html>
