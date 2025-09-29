<?php

// Ensure sessions are started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Set header for JSON response
header('Content-Type: application/json');

// 1. Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    echo json_encode(['success' => false, 'message' => 'You must be logged in to complete a reservation.']);
    exit;
}

// 2. Get and decode the JSON data
$json_data = file_get_contents('php://input');
$data = json_decode($json_data, true);

// Basic validation
if (!isset($data['items']) || !is_array($data['items']) || empty($data['items'])) {
    echo json_encode(['success' => false, 'message' => 'Reservation data is invalid or empty.']);
    exit;
}

// 3. Database connection and variables (ADJUST THESE)
// IMPORTANT: Include your actual database connection script and ensure $conn is available.
require_once 'db_connect.php'; 
$conn = $conn; 
$user_id = $_SESSION['user_id'];
$items = $data['items'];


// 4. Start Transaction (for safety when inserting multiple rows)
$conn->begin_transaction();
$total_insert_count = 0;

try {
    // SQL statement includes all fields from your new table structure
    $sql = "INSERT INTO reservations (user_id, product_name, quantity, price, status) VALUES (?, ?, ?, ?, 'pending')";
    $stmt = $conn->prepare($sql);
    
    // Check if preparation failed
    if ($stmt === false) {
        throw new Exception("SQL prepare failed: " . $conn->error);
    }
    
    // Bind parameters: 'isid' -> integer, string, integer, decimal (for user_id, product_name, quantity, price)
    $stmt->bind_param("isid", $user_id, $product_name, $quantity, $price);
    
    foreach ($items as $item) {
        // Sanitize and assign variables for binding
        $product_name = trim($item['name']); 
        $quantity = (int) $item['quantity'];
        // Ensure price is a float for binding to DECIMAL/double
        $price = (float) $item['price']; 

        if ($quantity <= 0) {
             continue; 
        }
        
        // Execute the statement for each item
        if (!$stmt->execute()) {
            throw new Exception("Error inserting item '{$product_name}': " . $stmt->error);
        }
        $total_insert_count++;
    }
    $stmt->close();

    // --- Commit the transaction if all insertions were successful ---
    if ($total_insert_count > 0) {
        $conn->commit();
    } else {
        throw new Exception("No valid items found in the cart to reserve.");
    }
    
} catch (Exception $e) {
    // --- Rollback if any error occurred ---
    $conn->rollback();
    error_log("Reservation Error: " . $e->getMessage()); 
    // Return a failure message to the client
    echo json_encode(['success' => false, 'message' => 'Database error during reservation. Please contact support.']);
    exit;
}

$conn->close();

// 5. Return success response
echo json_encode(['success' => true, 'message' => 'Items successfully reserved!']);
?>