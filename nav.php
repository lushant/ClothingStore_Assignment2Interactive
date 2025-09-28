        <div class="logo-container">
            <a href="index.php">
                <img src="images\logo.png" width="90" height="70" alt="Clothing Store Logo" class="logo">
            </a>
        </div>

         <nav>
           

            <div class="user-menu">
                <ul>
                    <li><a href="index.php">HOME</a></li>
                    <li><a href="product.php">SHOP PRODUCT</a></li>
                    <li><a href="#">ACCESSORIES</a></li>
                    <li><a href="about.php/Applications/MAMP/htdocs/project_ClothingStore/images/about.jpg">ABOUT US</a></li>
                    <li><a href="contact_us.php">CONTACT US</a></li>
                    <li><a href="register.php">SIGN UP</a></li>
                    <li><a href="login.php">LOGIN</a></li>
                    <li><a href="#">CART(0)</a></li>
                </ul>
            </div>
        

        </nav>
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