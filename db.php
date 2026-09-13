<?php
$servername ="localhost";
$username = "root";
$password = "";
$database="amiable_db";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Database connection successful.
// Do not close the connection here when this file is included.

?>