<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: login.html');
    exit();
}

// Check for error parameters in the URL
$error_message = '';
if (isset($_GET['error'])) {
    switch ($_GET['error']) {
        case 'invalid_password':
            $error_message = 'Invalid password. Please try again.';
            break;
        case 'no_admin':
            $error_message = 'No admin user found with that username.';
            break;
        default:
            $error_message = 'An unknown error occurred.';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index Page</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Welcome to the Index Page</h1>
    <?php if ($error_message): ?>
        <p style="color: red;"><?php echo htmlspecialchars($error_message); ?></p>
    <?php endif; ?>
    <p>You are logged in!</p>
    <a href="logout.php">Logout</a>
</body>
</html>
