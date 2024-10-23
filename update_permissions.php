<?php
session_start(); // Ensure session is started
include('connectlogin.php');
// Check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Capture selected permissions
    if (isset($_POST['permissions'])) {
        $_SESSION['user_privileges'] = $_POST['permissions']; // Update session with new permissions
    } else {
        $_SESSION['user_privileges'] = []; // No permissions selected
    }

    // Redirect back to the main page (optional)
    header('Location: pro.php');
    exit();
}
// Function to check if the user has a specific privilege
