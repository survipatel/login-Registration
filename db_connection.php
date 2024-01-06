<?php
    // Enter your host name, database username, password, and database name.
    // If you have not set database password on localhost then set empty.
    $conn =  new mysqli("localhost","root","","innovation");
    // Check connection
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
