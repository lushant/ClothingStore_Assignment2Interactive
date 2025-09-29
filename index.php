<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> The Clothing Store</title>
    <link rel="stylesheet" href="css/styles.css">
   
</head>
<body>
    <!-- Header -->
    <header>
        <?php include 'nav.php'; ?>
    </header>

  <?php include 'header.php'; ?>
  
    <!-- Hero Section -->
    <section class="hero">
        <div class="hero-content">
            <h1></h1>
            <p></p>
            <a href="product.php" class="shopBtn">Shop Now</a>
        </div>
    </section>

    <!-- Featured Products -->
    <section class="products">
        <h2>Featured Products</h2>
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

    <!-- Footer -->
    <footer>
        <?php include 'footer.php'; ?>
    </footer>
</body>
</html>
