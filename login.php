<?php
session_start();
include 'db_connect.php';

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST["email"]);
    $password = $_POST["password"];

    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user["password"])) {
            $_SESSION['user_id'] = $user["user_id"];
            $_SESSION['user_name'] = $user["name"];
            header("Location: index.php");
            exit;
        } else {
            $message = "Invalid password!";
        }
    } else {
        $message = "No account found with that email!";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Clothing Store</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<header>
    <div class="logo">My Clothing Store</div>
    <nav>
        <a href="index.php">Home</a>
        <a href="register.php">Register</a>
        <a href="login.php">Login</a>
    </nav>
</header>

<section class="form-section">
    <h2>Login</h2>
    <?php if ($message) echo "<p style='color:red;'>$message</p>"; ?>
    <form method="POST">
        <input type="email" name="email" placeholder="Email Address" required><br>
        <input type="password" name="password" placeholder="Password" required><br>
        <button type="submit">Login</button>
    </form>
</section>

</body>
</html>
