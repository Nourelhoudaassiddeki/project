
<?php
include('connectlogin.php'); // Include database connection
session_start(); // Start the session

$error_message = ""; // Initialize the error message variable

if (isset($_POST['submit'])) {
    $username = $_POST['email'];
    $password = $_POST['password'];

    // Use prepared statements to prevent SQL injection
    $sql = "SELECT * FROM users WHERE email = ?";  
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username); // Bind the parameter
    $stmt->execute();
    $result = $stmt->get_result();  
    $count = $result->num_rows;  

    if ($count > 0) {
        $user = $result->fetch_assoc(); // Fetch user data

        // Directly compare passwords (Not secure!)
        if ($password === $user['password']) {
            // Password is correct
            $_SESSION['user_id'] = $user['id']; // Store user ID
            $_SESSION['user_email'] = $user['email']; // Store user email
            
            // Redirect to the dashboard or protected area
            header("Location: pro.php");
            exit();
        } else {
            // Invalid password error message
            $error_message = "Invalid password.";
        }
    } else {
        // No user found error message
        $error_message = "No user found with that email.";
    }
}
?>

