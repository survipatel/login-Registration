<?php
// Start session
session_start();

// Check if the user is logged in, otherwise redirect to login page
if (!isset($_SESSION['rollNumber'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Bootstrap CSS link -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<!-- Bootstrap JS and Popper.js scripts -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
<!-- Bootstrap JS script -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <!-- Bootstrap CSS link -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
            padding: 20px;
        }
        .dashboard-container {
            max-width: 600px;
            margin: auto;
            text-align: center;
        }
        .btn-container {
            margin-top: 20px;
        }
    </style>
</head>
<body>

<div class="dashboard-container">
    <h2>Welcome to the Dashboard</h2>
    <p>Roll Number: <?php echo $_SESSION['rollNumber']; ?></p>

    <div class="btn-container">
        <!-- Button to add a blog -->
        <a href="blog_form.php" class="btn btn-primary">Add Blog</a>

        <!-- Button to show blogs -->
        <a href="blog_list.php" class="btn btn-success">Show Blogs</a>

        <!-- Button to logout -->
        <a href="logout.php" class="btn btn-danger">Logout</a>
    </div>
</div>

<!-- Bootstrap JS and Popper.js scripts -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
<!-- Bootstrap JS script -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
