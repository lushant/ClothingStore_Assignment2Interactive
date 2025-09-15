<!DOCTYPE html>
<html>
<head>
    <title> Contact Form Response</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <div class = "submit-container">
        <div class = "submit-info">
        <h2>Message Sent!</h2>   
        <p>Thank you for reaching out to us. 
        <br> We appreciate you contacting us. 
        <br>We will get back to you soon! 
        </p>
        <h3>Have a great day!</h3>
        <a href="index.php" class = "button">Return To Home</a>
       
     </div>
    </div>
    

	<?php 
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        include 'db_connect.php';       

        // Get and sanitize input
        $name = isset($_POST['fullname']) ? trim($_POST['fullname']) : null;
        $email = isset($_POST['email']) ? trim($_POST['email']) : null;
        $message = isset($_POST['message']) ? trim($_POST['message']) : null;

        // Check for null or empty values
        if (!$name || !$email || !$message) {
            die("Please fill in all fields.");
        }

        // Prepare and bind
        $stmt = $conn->prepare("INSERT INTO messages(name, email, message) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $name, $email, $message);

        // Execute
        if ($stmt->execute()) {
            echo "Message submitted successfully!";
        } else {
            echo "Error: " . $stmt->error;
        }

        // Close connections
        $stmt->close();
        $conn->close();
    }

	?>
</body>
</html>