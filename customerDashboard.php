<?php
session_start();
// Redirect to login if not logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}

// Database connection
include 'db_connect.php'; 

$userId = $_SESSION['user_id'];

// 1. Select the correct columns from the reservations table
$stmt = $conn->prepare("SELECT reservation_id, product_name, quantity, price, reservation_date, status FROM reservations WHERE user_id = ? ORDER BY reservation_date DESC");
$stmt->bind_param("i", $userId);
$stmt->execute();
$result = $stmt->get_result();  
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User Dashboard - Clothing Store</title>
  <link rel="stylesheet" href="css/styles.css">
</head>
<body>

<header>
  <?php include 'nav.php'; ?>
</header>

<?php include 'header.php'; ?>

<section class="dashboard-section">
  <div class="container">
    <h1>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h1>
    <h2>Your Reservations</h2>
    <h3>Your reservatiion will be ready within 24 hours. 
       <br>Please pick it up from <a href = "https://maps.app.goo.gl/tUZFxX3LFV6ANmjt9">Level 1/15 Moore St, Canberra ACT 2601 </a></h3>
       
    <?php 
    // 2. Check if there are any reservations and display them in a table
    if ($result->num_rows > 0): 
    ?>
      <table class="reservation-table">
        <thead>
          <tr>
            <th>Reservation ID</th>
            <th>Product Name</th>
            <th>Qty</th>
            <th>Price</th>
            <th>Reservation Date</th>
            <th>Status</th>
          </tr>
        </thead>
        <tbody>
        <?php while($row = $result->fetch_assoc()): ?>
          <tr>
          
            <td><?php echo $row['reservation_id']; ?></td>
            <td><?php echo htmlspecialchars($row['product_name']); ?></td>
            <td><?php echo $row['quantity']; ?></td>
            <td><?php echo '$' . number_format($row['price'], 2); ?></td>
            <td><?php echo date("M j, Y", strtotime($row['reservation_date'])); ?></td>
            <td><?php echo ucfirst($row['status']); ?></td>
          </tr>
        <?php endwhile; ?>
        </tbody>
      </table>
    <?php else: ?>
      <p class="no-data">No reservations found.</p>
    <?php endif; ?>
    
    <div style="margin-top: 30px;">
        <a href="product.php" class="button logout">Browse More Products</a>
        <a href="logout.php" class="button logout">Log out</a>
    </div>
  </div>
</section>

<section class="products">
    <h2>Selected For You</h2>
    <div class="product-grid">
        <div class="product-card">
            <img src="images/coat1.jpg" alt="Product 1">
            <h3>Fleece Coat</h3>
            <p>$59.99</p>
            <a href="#" class="reserveBtn"
                    data-name= "Fleece Coat"
                    data-price= "59.99"
                    data-loggedin="<?php echo isset($_SESSION['user_id']) ? 'yes' : 'no'; ?>">Add to Reserve</a>
        </div>
        <div class="product-card">
            <img src="images/coat3.jpg" alt="Product 3">
            <h3>Tech Jacket</h3>
            <p>$49.99</p>
                    <a href="#" class="reserveBtn"
                            data-name= "Tech Jacket"
                            data-price= "49.99"
                            data-loggedin="<?php echo isset($_SESSION['user_id']) ? 'yes' : 'no'; ?>">Add to Reserve</a>
        </div>
        <div class="product-card">
            <img src="images/sweat2.jpg" alt="Product 9">
            <h3>Knit Cardigan</h3>
            <p>$69.99</p>
                    <a href="#" class="reserveBtn"
                            data-name= "Knit Cardigan"
                            data-price= "69.99"
                            data-loggedin="<?php echo isset($_SESSION['user_id']) ? 'yes' : 'no'; ?>">Add to Reserve</a>
        </div>
    </div>
</section>

<footer>
  <?php include 'footer.php'; ?>
</footer>

</body>
</html>