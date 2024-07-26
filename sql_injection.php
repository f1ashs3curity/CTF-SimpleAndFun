<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "password";
$dbname = "ctf";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['username'])) {
    $username = $_GET['username'];
    $query = "SELECT * FROM users WHERE username = '$username'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        // Output flag
        echo "Flag: goSQL";
        $_SESSION['completed_challenges'][] = 'sql_injection';
    } else {
        echo "No user found.";
    }
} else {
    echo "Please provide a username.";
}
?>
