<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up - Clothing Store</title>
    <link rel="stylesheet" href="css/styles.css">
    
</head>
<body>

<header>
 <?php include 'nav.php'; ?>
</header>

<?php include   'header.php';  ?>

<section class="form-section">
<div class="login-container">
  <form class="login-form" method = "POST" action = "registerUser.php" id = "register-form" onsubmit="return validateForm()">
    <h2>Sign Up</h2>
    <div class="input-group">
      <label for="username">User Name</label>
      <input type="text" id="username" name="username" placeholder="Enter username">
      <p id="usernameError" class="error"></p>
    </div>

    <div class="input-group">
      <label for="email">Email</label>
      <input type="email" id="email" name="email" placeholder="Enter email">
      <p id="emailError" class="error"></p>
    </div>
    <div class="input-group">
      <label for="password">Password</label>
      <input type="password" id="password" name="password" placeholder="Enter password">

    </div>
      <div class="input-group">
      <label for="confirmPassword">Confirm Password</label>
      <input type="password" id="confirmPassword" name="confirmPassword" placeholder="Confirm password">
      <p id="passwordError" class="error"></p>
    </div>
    <button type="submit">Sign Up</button>
    <p class="signup-link">Already have an account? <a href="login.php">Login</a></p>
  </form>
</div>
<script src ="js/validate.js"></script>

</section>
<footer>
    <?php include 'footer.php'; ?>
</footer>
</body>
</html>
