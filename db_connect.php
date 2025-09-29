<?php
$host = "localhost"; // Default MAMP host
$user = "root"; // Default MAMP user
$password = "root"; // Default MAMP password .. Needs to be empty for WAMP
//$password = ""; // Uncomment this and Comment the Default MAMP when using WAMP server 
$dbname = "clothing_store";

#Create connection
$conn = new mysqli($host, $user, $password, $dbname);

#Check connection for errors
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
