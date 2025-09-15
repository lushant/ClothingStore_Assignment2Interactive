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
  <form class="login-form">
    <h2>Sign Up</h2>
    <div class="input-group">
      <label for="firstname">First Name</label>
      <input type="text" id="firstname" name="firstname" placeholder="Enter your first name" required>
    </div>
    <div class="input-group">
      <label for="lastname">Last Name</label>
      <input type="text" id="lastname" name="lastname" placeholder="Enter your last name" required>
    </div>
    <div class="input-group">
      <label for="email">Email</label>
      <input type="text" id="email" name="email" placeholder="Enter your email" required>
    </div>
    <div class="input-group">
      <label for="password">Password</label>
      <input type="password" id="password" name="password" placeholder="Enter your password" required>
    </div>
    <button type="submit">Sign Up</button>
    <p class="signup-link">Already have an account? <a href="login.php">Login</a></p>
  </form>
</div>

</section>
<footer>
    <?php include 'footer.php'; ?>
</footer>
</body>
</html>
