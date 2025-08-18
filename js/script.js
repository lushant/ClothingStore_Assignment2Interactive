let cartCount = 0;

function addToCart(productId) {
    cartCount++;
    document.getElementById("cart-link").innerText = `Cart (${cartCount})`;
    alert(`Product ${productId} added to cart!`);
}

function scrollToShop() {
    document.getElementById("shop-section").scrollIntoView({ behavior: "smooth" });
}
