<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role = $_POST['role'] ?? 'user'; // Default to 'user' role

    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (username, password, role) VALUES ('$username', '$hashed_password', '$role')";

    if ($conn->query($sql) === TRUE) {
        // Registration successful, redirect to login page
        header('Location: login.html');
        exit(); // Ensure that no further code is executed after redirection
    } else {
        // Display error message
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
