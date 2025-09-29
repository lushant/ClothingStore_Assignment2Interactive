
<?php
session_start();
$error = $_SESSION['login_error'] ?? '';
unset($_SESSION['login_error']); // remove it after showing
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Clothing Store</title>
    <link rel="stylesheet" href="css/styles.css">
    
</head>
<body>

<header>
 <?php include 'nav.php'; ?>
</header>

<?php include   'header.php';  ?>

<section class="form-section">
<div class="login-container">
  <form class="login-form" method = "POST" action = "loginUser.php" id = "login-form">
    <h2>Login</h2>
    <div class="input-group">
      <label for="username">Username</label>
      <input type="text" id="username" name="username" placeholder="Enter your username" required>
    </div>
    <div class="input-group">
      <label for="password">Password</label>
      <input type="password" id="password" name="password" placeholder="Enter your password" required>
    </div>
    <button type="submit">Login</button>
    <p class="signup-link">Don't have an account? <a href="register.php">Sign Up</a></p>
  </form>


<?php 
// Show error message if exists
if($error): 

?>
  <script>
    // Simple alert for error message
      alert('<?php echo $error; ?>');
  </script>
<?php endif; ?>
</div>



</section>
<footer>
    <?php include 'footer.php'; ?>
</footer>
</body>
</html>
