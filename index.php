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
            <a href="#" class="btn">Shop Now</a>
        </div>
    </section>

    <!-- Featured Products -->
    <section class="products">
        <h2>Featured Products</h2>
            <div class="product-grid">
                <div class="product-card">
                    <img src="images/product1.jpg" alt="Product 1">
                    <h3>Classic T-Shirt</h3>
                    <p>$29.99</p>
                    <a href="#" class="btn">Add to Cart</a>
                </div>
                <div class="product-card">
                    <img src="images/product2.jpg" alt="Product 2">
                    <h3>Denim Jacket</h3>
                    <p>$59.99</p>
                    <a href="#" class="btn">Add to Cart</a>
                </div>
                <div class="product-card">
                    <img src="images/product3.jpg" alt="Product 3">
                    <h3>Summer Dress</h3>
                    <p>$49.99</p>
                    <a href="#" class="btn">Add to Cart</a>
                </div>
            </div>
    </section>

    <!-- Footer -->
    <footer>
        <?php include 'footer.php'; ?>
    </footer>
</body>
</html>
