<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog Form</title>
    <link rel="stylesheet" href="style.css"/>
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

// Define variables to store user input
$title = $description = '';
$image = '';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and validate user input
    $title = test_input($_POST["title"]);
    $description = test_input($_POST["description"]);
    $rollNumber = $_SESSION['rollNumber'];

    // Upload image
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if ($check !== false) {
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            echo "Image uploaded successfully.";
            $image = $target_file;

            // Insert blog data into the database
            $sql = "INSERT INTO blogs (title, description, image, roll_number) VALUES ('$title', '$description', '$image', '$rollNumber')";
            
            if ($conn->query($sql) === TRUE) {
               echo "Blog posted successfully!";
                /*echo "<br><a href='dashboard.php'>Go Back to Dashboard</a>";*/
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        } else {
            echo "Error uploading image.";
        }
    } else {
        echo "File is not an image.";
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
<?php
echo "<br><a href='dashboard.php'>Go Back to Dashboard</a>";
?>
<form class="form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype="multipart/form-data">
     <h1 class="login-title">Add Blog</h1>
    <input type="text" class="login-input" name="title" placeholder="Title" required />
   <textarea name="description" class="login-input" rows="4" cols="50" placeholder="Description" required></textarea><br>
   <input type="file" name="image" class="login-input" accept="image/*" placeholder="Image " required><br>
    <input type="submit" value="Post Blog" class="login-button">
</form>

<!-- <?php
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
} else {
    echo "No blogs posted yet.";
    echo "<br><a href='dashboard.php'>Go Back to Dashboard</a>";
}

?> -->
</body>
</html>