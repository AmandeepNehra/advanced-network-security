<?php
include 'config.php'; // Include database connection

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form data
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Prepare and execute the query
    $stmt = $conn->prepare("SELECT id, password, role FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if user exists and password is correct
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            if ($row['role'] === 'admin') {
                // Start session and set session variables
                session_start();
                $_SESSION['user_id'] = $row['id'];
                $_SESSION['role'] = 'admin';
                
                // Redirect to admin dashboard
                header('Location: admin_dashboard.php');
                exit();
            } else {
                // User is not an admin
                header('Location: index.html?error=not_admin'); // Redirect to index.html with an error parameter
                exit();
            }
        } else {
            // Incorrect password
            header('Location: index.html?error=invalid_password'); // Redirect to index.html with an error parameter
            exit();
        }
    } else {
        // User does not exist
        header('Location: index.html?error=no_user'); // Redirect to index.html with an error parameter
        exit();
    }

    // Close the database connection
    $stmt->close();
    $conn->close();
}
?>
