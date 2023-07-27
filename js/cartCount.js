// Initialize cart items from local storage or as an empty object
let cartItems = JSON.parse(localStorage.getItem("cartItems")) || {};

// Function to update the cart count
function updateCartCount() {
    let cartCount = Object.keys(cartItems).length;
    document.getElementById("cart-count").innerText = cartCount;
}

// Function to handle "Add to Cart" button click
document.addEventListener("click", function (event) {
    if (event.target.classList.contains("add-to-cart-btn")) {
        // Get the product data from the custom attributes
        let productName = event.target.dataset.productName;
        let productPrice = event.target.dataset.productPrice;
        let productImage = event.target.dataset.productImage;

        // Add the product to the cartItems object with the product name as the key
        cartItems[productName] = {
            name: productName,
            price: productPrice,
            image: productImage
        };

        // Save the updated cart items to local storage
        localStorage.setItem("cartItems", JSON.stringify(cartItems));

        // Update the cart count and display the cartItems in the console for testing
        updateCartCount();
        console.log(cartItems);
    }
});

// Call updateCartCount on page load to initialize the cart count
updateCartCount();