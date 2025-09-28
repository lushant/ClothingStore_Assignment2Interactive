// cart.js

let cart = [];

// Add item to cart
function addToCart(name, price) {
    const existing = cart.find(item => item.name === name);
    if (existing) existing.quantity++;
    else cart.push({ name, price, quantity: 1 });

    updateCartDropdown();
}

// Remove item from cart by index
function removeFromCart(index) {
    cart.splice(index, 1);
    updateCartDropdown();
}

// Change item quantity
function updateQuantity(index, quantity) {
    if (quantity < 1) quantity = 1;
    cart[index].quantity = quantity;
    updateCartDropdown();
}

// Calculate total items
function getTotalItems() {
    return cart.reduce((acc, item) => acc + item.quantity, 0);
}

// Update cart count in nav
function updateCartCount() {
    document.getElementById('cartCount').innerText = getTotalItems();
}

// Update cart dropdown display
function updateCartDropdown() {
    const cartItemsDropdown = document.getElementById('cartItemsDropdown');
    const cartTotalDropdown = document.getElementById('cartTotalDropdown');

    cartItemsDropdown.innerHTML = '';
    let total = 0;

    cart.forEach((item, index) => {
        const div = document.createElement('div');
        div.classList.add('cart-item');
        div.innerHTML = `
            <span>${item.name}</span>
            <input type="number" min="1" value="${item.quantity}" data-index="${index}">
            <span>$${(item.price * item.quantity).toFixed(2)}</span>
            <button class="removeBtn" data-index="${index}">x</button>
        `;
        cartItemsDropdown.appendChild(div);
        total += item.price * item.quantity;
    });

    cartTotalDropdown.innerText = total.toFixed(2);
    updateCartCount();

    // Attach quantity change event
    document.querySelectorAll('.cart-item input').forEach(input => {
        input.addEventListener('change', e => {
            const idx = parseInt(e.target.dataset.index);
            updateQuantity(idx, parseInt(e.target.value));
        });
    });

    // Attach remove button event
    document.querySelectorAll('.removeBtn').forEach(btn => {
        btn.addEventListener('click', e => {
            const idx = parseInt(e.target.dataset.index);
            removeFromCart(idx);
        });
    });
}

// Checkout / Reserve Items
function checkoutCart() {
    if (cart.length === 0) return alert("Cart is empty!");

    if (!confirm("Reserve these items?")) return;

    fetch('add_to_cart.php', {
        method: 'POST',
        headers: {'Content-Type':'application/json'},
        body: JSON.stringify({ cart })
    })
    .then(res => res.text())
    .then(data => {
        alert("Items reserved successfully!");
        cart = [];
        updateCartDropdown();
    })
    .catch(err => {
        console.error(err);
        alert("Error reserving items!");
    });
}

// Toggle cart dropdown visibility
function initCartDropdown() {
    const cartLink = document.getElementById('cartLink');
    const cartDropdown = document.getElementById('cartDropdown');
    const checkoutDropdown = document.getElementById('checkoutDropdown');

    // Toggle dropdown
    cartLink.addEventListener('click', e => {
        e.preventDefault();
        cartDropdown.style.display = cartDropdown.style.display === 'block' ? 'none' : 'block';
    });

    // Close when clicking outside
    document.addEventListener('click', e => {
        if (!cartDropdown.contains(e.target) && e.target !== cartLink) {
            cartDropdown.style.display = 'none';
        }
    });

    // Checkout button
    checkoutDropdown.addEventListener('click', () => {
        checkoutCart();
    });
}


// Initialize cart (call this after DOM is loaded)
function initCart() {
    initCartDropdown();

    // Attach Add to Reserve buttons
    document.querySelectorAll('.reserveBtn').forEach(btn => {
        btn.addEventListener('click', () => {
            const name = btn.dataset.name;
            const price = parseFloat(btn.dataset.price);
            addToCart(name, price);
            alert(name + " added to cart!");
        });
    });
}

// Run initialization after DOM is loaded
document.addEventListener('DOMContentLoaded', () => {
    initCart();
});
