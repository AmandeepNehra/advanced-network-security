<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'admin') {
    header('Location: admin_login.html');
    exit();
}
?>

<h1>Admin Dashboard</h1>
<p>Welcome, Admin!</p>
<a href="admin_logout.php">Logout</a>
