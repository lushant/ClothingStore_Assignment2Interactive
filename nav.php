    <?php
    if (session_status() === PHP_SESSION_NONE ) {
        session_start();
    }
    ?>  
        <div class="logo-container">
            <a href="index.php">
                <img src="images\logo.png" width="90" height="70" alt="Clothing Store Logo" class="logo">
            </a>
        </div>

         <nav>
           

            <div class="user-menu">
                <ul>
                    <!--Dynamic link for Dashboard or Home based on login status -->

                    <li><a href="<?php echo isset($_SESSION['user_id']) ? 'customerDashboard.php' : 'index.php'; ?>">
                    <?php echo isset($_SESSION['user_id']) ? 'DASHBOARD' : 'HOME'; ?>
                    </a></li>
                

                    <li><a href="product.php">SHOP PRODUCT</a></li>
                    <li><a href="about.php">ABOUT US</a></li>
                    <li><a href="contact_us.php">CONTACT US</a></li>
                    <li><a href="register.php">SIGN UP</a></li>
                   <!-- Dynamic Log In/Log Out link based on login status -->
                    <?php 
                    // Check if user is logged in and display appropriate link 
                    // If logged in, show Log Out with username; else show Log In
                    if (isset($_SESSION['user_id'])): ?>
                        <li><a href="logout.php">LOG OUT (<?php echo htmlspecialchars($_SESSION['username']); ?>)</a></li>
                        <?php else: ?>
                        <li><a href="login.php">LOG IN</a></li>
                        <?php endif; ?>
            
                    <!-- Cart link with dynamic item count -->
                    <li class="cart-menu">
                        <a href="#" id="cartLink">CART (<span id="cartCount">0</span>)</a>

                        <div id="cartDropdown" class="cart-dropdown">
                            <h4>Your Cart</h4>
                            <div id="cartItemsDropdown"></div>
                            <div class="cart-total">Total: $<span id="cartTotalDropdown">0.00</span></div>
                            <button id="checkoutDropdown">Reserve Items</button>
                        </div>
                    </li>
                </ul>
            </div>
        

        </nav>
        <script src ="js/script.js"></script>

        <script>   

        // Highlight active page in navigation
        // Get current path and filename
            const currentLocation = window.location.pathname.split("/").pop();
            const menuItems = document.querySelectorAll(".user-menu ul a");
        // Loop through menu items to find a match
        // If match found, add 'active' class
        // This highlights the current page in the navigation menu
            menuItems.forEach(link => {
                if(link.getAttribute("href") === currentLocation){
                link.classList.add("active");
                }
            });
        </script>