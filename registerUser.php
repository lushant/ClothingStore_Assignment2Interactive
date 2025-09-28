<!DOCTYPE html>
<html>
<head>
    <title> </title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
     
<?php

session_start();
include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];
    
    //hash password
    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

    // Check if username or email already exists
    $stmt = $conn->prepare("SELECT * FROM users WHERE username=? OR email=?");
    $stmt->bind_param("ss", $username, $email);
    $stmt->execute();
    $result = $stmt->get_result();  

    if ($result->num_rows > 0) {
        $_SESSION['login_error'] = "Username or Email already exists";
        header("Location: register.php");
        exit();
    }
    if ($password !== $confirmPassword) {
        $_SESSION['login_error'] = "Passwords do not match";
        header("Location: register.php");
        exit();
    }
    // Insert new user
    $stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $username, $email, $hashedPassword);
    if ($stmt->execute()) {
        $_SESSION['user_id'] = $stmt->insert_id;
        $_SESSION['username'] = $username;
        header("Location: customerDashboard.php");
        exit();
    } else {
        $_SESSION['login_error'] = "Registration failed. Please try again.";
        header("Location: register.php");
        exit();
    }       
    // Close connections            
    $stmt->close();
    $conn->close(); 
}
    
?>
</body>
</html>