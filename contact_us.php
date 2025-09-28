<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - Clothing Store</title>
    <link rel="stylesheet" href="css/styles.css">
    
</head>
<body>

<header>
 <?php include 'nav.php'; ?>
</header>

<?php include   'header.php';  ?>



<section class="form-section">
<div class="login-container">
  <form class="contact-form" method="POST" action="submitContact.php" id = "contact-form">  
    <h2>Contact Us</h2>
    <div class="input-group">
      <label for="fullname">Name</label>
      <input type="text" id="fullname" name="fullname" placeholder="Enter your full name" required>
    </div>
    <div class="input-group">
      <label for="email">Email</label>
      <input type="text" id="email" name="email" placeholder="Enter your email" required>
      
    </div>
        <div class="input-group">
      <label for="message">Message</label>
      <textarea id="message" name="message" rows = "6" cols = "40" placeholder="Enter your message here" required></textarea>
    </div>
    <button type="submit">Submit</button>
     </form>

     <script>
      const form = document.getElementById("contact-form");

      form.addEventListener("submit", function(event) {
          const email = document.getElementById("email").value.trim();
          
          // Check if input is empty
          if (email === "") {
              alert("Please enter your email!");
              event.preventDefault();
              return;
          }

          // Basic email format check
          const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
          if (!emailPattern.test(email)) {
              alert("Please enter a valid email address!");
              event.preventDefault();
          }
      });
    </script>
</div>

</section>
<footer>
    <?php include 'footer.php'; ?>
</footer>

</body>

</html>
