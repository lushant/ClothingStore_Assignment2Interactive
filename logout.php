<?php
// 1. Server-side cleanup (clears $_SESSION['user_id'], etc.)
session_start();
session_unset();
session_destroy(); 

// 2. Client-side cleanup (Clears the cart data from the browser)
?>
<!DOCTYPE html>
<html>
<body>
    <script>
        // Clears the cart data stored in the browser
        sessionStorage.removeItem('reserveCart'); 
        
        // Also clear the cart count display
        const cartCount = document.getElementById('cartCount');
        if (cartCount) {
            cartCount.textContent = '0';
        }

        // Redirect the user back to the homepage after cleanup
        window.location.href = 'index.php'; 
    </script>
</body>
</html>
<?php exit(); ?>