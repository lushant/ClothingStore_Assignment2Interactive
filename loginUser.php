<!DOCTYPE html>
<html>
<head>
    <title> Contact Form Response</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
     
<?php

session_start();
include 'db_connect.php';
// Check if form is submitted

if ($_SERVER["REQUEST_METHOD"] === "POST") {// Ensure it's a POST request
    $username = trim($_POST['username']); // Sanitize input and remove whitespace
    $password = $_POST['password']; // Passwords should not be trimmed to preserve spaces

    $stmt = $conn->prepare("SELECT * FROM users WHERE username=?"); // Use prepared statements to prevent SQL injection
    $stmt->bind_param("s", $username); // Bind parameters to the query 
    $stmt->execute(); // Execute the query
    $user = $stmt->get_result()->fetch_assoc(); // Fetch user data

     // Verify password and set session variables
     // Redirect to dashboard on success, back to login on failure

    if ($user) {
        // Verify the password using password_verify
        if (password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['user_id'];
            $_SESSION['username'] = $user['username'];
            header("Location: customerDashboard.php");
            exit();
        } else {
            // Invalid password - set error message and redirect
            $_SESSION['login_error'] = "Invalid password";
            header("Location: login.php");
            exit();
        }
    } else {
        // No user found - set error message and redirect
        $_SESSION['login_error'] = "NO USER FOUND. PLEASE ENTER VALID USER DETAIL";
        header("Location: login.php");
        exit();
    }
}
?>



</body>
</html>