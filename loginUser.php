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

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = trim($_POST['username']);
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT * FROM users WHERE username=?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $user = $stmt->get_result()->fetch_assoc();

    if ($user) {
        if (password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['user_id'];
            $_SESSION['username'] = $user['username'];
            header("Location: customerDashboard.php");
            exit();
        } else {
            $_SESSION['login_error'] = "Invalid password";
            header("Location: login.php");
            exit();
        }
    } else {
        $_SESSION['login_error'] = "NO USER FOUND. PLEASE ENTER VALID USER DETAIL";
        header("Location: login.php");
        exit();
    }
}
?>



</body>
</html>