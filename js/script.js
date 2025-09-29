// Function to load the cart from session storage
function loadCart() {
    const cart = JSON.parse(sessionStorage.getItem('reserveCart')) || [];
    updateCartDisplay(cart);
    return cart;
}

// Function to save the cart to session storage
function saveCart(cart) {
    sessionStorage.setItem('reserveCart', JSON.stringify(cart));
    updateCartDisplay(cart);
}

// Function to update all cart UI elements
function updateCartDisplay(cart) {
    const cartCountElement = document.getElementById('cartCount');
    const cartItemsDropdown = document.getElementById('cartItemsDropdown');
    const cartTotalDropdown = document.getElementById('cartTotalDropdown');

    // 1. Update total item count in the navigation
    const totalItems = cart.reduce((sum, item) => sum + item.quantity, 0);
    if (cartCountElement) {
        cartCountElement.textContent = totalItems;
    }

    // 2. Update the dropdown content
    if (cartItemsDropdown) {
        cartItemsDropdown.innerHTML = '';
        let total = 0;

        if (cart.length === 0) {
            cartItemsDropdown.innerHTML = '<p class="empty-cart-message">Your reserve list is empty.</p>';
        } else {
            cart.forEach((item, index) => {
                const itemTotal = item.price * item.quantity;
                total += itemTotal;

                const itemDiv = document.createElement('div');
                itemDiv.classList.add('cart-item-dropdown');
                itemDiv.innerHTML = `
                    <p class="cart-item-name">${item.name}</p>
                    <p class="cart-item-details">Qty: ${item.quantity} | $${item.price.toFixed(2)} ea.</p>
                    <button class="remove-btn" data-index="${index}">&times;</button>
                `;
                cartItemsDropdown.appendChild(itemDiv);
            });
        }
        
        // 3. Update total price
        if (cartTotalDropdown) {
            cartTotalDropdown.textContent = total.toFixed(2);
        }
    }
}

// Function to add a product to the cart
function addToReserve(productName, productPrice) {
    const cart = loadCart();
    const price = parseFloat(productPrice);

    // Check if item already exists
    const existingItem = cart.find(item => item.name === productName);

    if (existingItem) {
        existingItem.quantity += 1;
    } else {
        cart.push({
            name: productName,
            price: price,
            quantity: 1
        });
    }

    saveCart(cart);
    alert(`${productName} added to your reserve list!`);
}

// Function to handle the removal of an item from the cart dropdown
function handleRemoveItem(event) {
    if (event.target.classList.contains('remove-btn')) {
        const itemIndex = event.target.getAttribute('data-index');
        const cart = loadCart();

        // Remove the item from the array
        cart.splice(itemIndex, 1);
        
        saveCart(cart);
    }
}


// --- Event Listeners ---

document.addEventListener('DOMContentLoaded', () => {
    // 1. Initial Load of Cart
    loadCart();

    // 2. "Add to Reserve" button handler
    document.querySelectorAll('.reserveBtn, .btn').forEach(button => {
        button.addEventListener('click', function(event) {
            event.preventDefault();
            
            // For the specific button with data attributes 
            const isDynamic = this.hasAttribute('data-name');
            let name, price, loggedIn;

            if (isDynamic) {
                // Get data from the 'data-' attributes
                name = this.getAttribute('data-name');
                price = this.getAttribute('data-price');
                loggedIn = this.getAttribute('data-loggedin');
            } else {
                // For other buttons, extract data from parent elements
                const card = this.closest('.product-card');
                name = card ? card.querySelector('h3').textContent.trim() : 'Unknown Product';
                // Extracting price text (e.g., "$59.99") and remove the '$' sign
                const priceText = card ? card.querySelector('p').textContent.trim() : '0.00';
                price = priceText.replace('$', '');
                // Assume 'no' if no explicit login check is present
                loggedIn = 'no'; 
            }

            // Check if the user is logged in before adding to reserve
            if (loggedIn === 'no') {
                alert('Please log in to start reserving items.');
                window.location.href = 'login.php'; 
            } else {
                addToReserve(name, price);
            }
        });
    });

    // 3. Cart Dropdown Toggle
    const cartLink = document.getElementById('cartLink');
    const cartDropdown = document.getElementById('cartDropdown');

    if (cartLink && cartDropdown) {
        cartLink.addEventListener('click', function(e) {
            e.preventDefault();
            cartDropdown.classList.toggle('visible');
        });
        
        // Hide dropdown if user clicks outside
        document.addEventListener('click', function(e) {
            if (!cartDropdown.contains(e.target) && !cartLink.contains(e.target)) {
                cartDropdown.classList.remove('visible');
            }
        });
    }

    // 4. Remove Item from Dropdown Handler
    const cartItemsDropdown = document.getElementById('cartItemsDropdown');
    if (cartItemsDropdown) {
        cartItemsDropdown.addEventListener('click', handleRemoveItem);
    }
    
    // 5. "Reserve Items" Button Handler
    const checkoutDropdown = document.getElementById('checkoutDropdown');
    if (checkoutDropdown) {
        checkoutDropdown.addEventListener('click', reserveItems);
    }
});


// Function to send the final reservation request to the server
function reserveItems() {
    const cart = loadCart();
    const total = parseFloat(document.getElementById('cartTotalDropdown').textContent);

    if (cart.length === 0) {
        alert('Your reserve list is empty. Add items before reserving.');
        return;
    }

    // Construct the data payload to send to the server
    const reservationData = {
        items: cart,
        totalAmount: total
    };

    // AJAX call to reserveItem.php
    fetch('reserveItem.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify(reservationData),
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            alert(`Reservation successful! Please check your dashboard for full details of your reservation.`);
            // Clear the cart on successful reservation
            sessionStorage.removeItem('reserveCart');
            loadCart(); // Update UI
            document.getElementById('cartDropdown').classList.remove('visible'); // Hide dropdown
        } else {
            // Display specific error from the server
            alert(`Reservation failed: ${data.message || 'An unknown error occurred.'}`);
        }
    })
    .catch((error) => {
        console.error('Error:', error);
        alert('An error occurred while connecting to the server. Please try again.');
    });
}