<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Shop Products</title>
    <link rel="stylesheet" href="css/styles.css">
   
</head>
<body>
    <!-- Header -->
    <header>
        <?php include 'nav.php'; ?>

    </header>

  <?php include 'header.php'; ?>
  
    <!-- Featured Products -->
    <section class="products">
        <h2>Shop Our Products</h2>
            <p><strong>Available Sizing:</strong> We proudly offer a complete size range from XS up to XL.
            <br>To ensure the absolute perfect fit for your garment, please visit in-store for a professional fitting and precise size check. 
            <br><br>Our tailoring experts are ready to assist you!

            You can find us at <a href = "https://maps.app.goo.gl/tUZFxX3LFV6ANmjt9">Level 1/15 Moore St, Canberra ACT 2601 </a>
        </p>
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
                    <img src="images/coat2.jpg" alt="Product 2">
                    <h3>Summer Outer</h3>
                    <p>$59.99</p>
            <!-- Product details that will be sent to the database -->
                    <a href="#" class="reserveBtn"
                            data-name= "Summer Outer"
                            data-price= "59.99"
                            data-loggedin="<?php echo isset($_SESSION['user_id']) ? 'yes' : 'no'; ?>">Add to Reserve </a>
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
                    <img src="images/jacket1.jpg" alt="Product 4">
                    <h3>Bomber Jacket</h3>
                    <p>$29.99</p>
                    <a href="#" class="reserveBtn"
                            data-name= "Bomber Jacket"
                            data-price= "29.99"
                            data-loggedin="<?php echo isset($_SESSION['user_id']) ? 'yes' : 'no'; ?>">Add to Reserve</a>
                </div>

                <div class="product-card">
                    <img src="images/jacket2.jpg" alt="Product 5">
                    <h3>Denim Jacket</h3>
                    <p>$49.99</p>
                    <a href="#" class="reserveBtn"
                            data-name= "Denim Jacket"
                            data-price= "49.99"
                            data-loggedin="<?php echo isset($_SESSION['user_id']) ? 'yes' : 'no'; ?>">Add to Reserve</a>
                </div>
                
                <div class="product-card">
                    <img src="images/tee2.jpg" alt="Product 6">
                    <h3>Classic T-shirt</h3>
                    <p>$19.99</p>
                    <a href="#" class="reserveBtn"
                            data-name= "Classic T-shirt"
                            data-price= "19.99"
                            data-loggedin="<?php echo isset($_SESSION['user_id']) ? 'yes' : 'no'; ?>">Add to Reserve</a>
                </div>
                <div class="product-card">
                    <img src="images/tee3.jpg" alt="Product 7">
                    <h3>Women T-shirt</h3>
                    <p>$19.99</p>
                      <a href="#" class="reserveBtn"
                            data-name= "Women T-shirt"
                            data-price= "19.99"
                            data-loggedin="<?php echo isset($_SESSION['user_id']) ? 'yes' : 'no'; ?>">Add to Reserve</a>
                </div>
                <div class="product-card">
                    <img src="images/sweat1.jpg" alt="Product 8">
                    <h3>Classic Sweatshirt</h3>
                    <p>$29.99</p>
                    <a href="#" class="reserveBtn"
                            data-name= "Classic Sweatshirt"
                            data-price= "29.99"
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
