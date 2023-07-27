function updateCartItems() {
    // Get the cart items from localStorage
    let cartItems = JSON.parse(localStorage.getItem("cartItems"));

    // Get the cart items list element
    const cartItemsList = document.getElementById("cart-items-list");

    // Clear the current cart items list
    cartItemsList.innerHTML = "";

    // Loop through the cart items and create table rows for each item
    for (const product in cartItems) {
        const tableRow = document.createElement("tr");

        // Product Image
        const itemImageCell = document.createElement("td");
        const img = document.createElement("img");
        img.src = cartItems[product].image;
        img.alt = cartItems[product].name;
        img.style.maxHeight = "100px"; // Set the maximum height of the image
        itemImageCell.appendChild(img);
        tableRow.appendChild(itemImageCell);

        // Product Name
        const itemNameCell = document.createElement("td");
        itemNameCell.textContent = cartItems[product].name;
        tableRow.appendChild(itemNameCell);

        // Product Price
        const itemPriceCell = document.createElement("td");
        itemPriceCell.textContent = "$" + cartItems[product].price;
        tableRow.appendChild(itemPriceCell);

        // Quantity
        const quantityCell = document.createElement("td");
        const quantityInput = document.createElement("input");
        quantityInput.type = "number";
        quantityInput.min = "1";
        quantityInput.value = cartItems[product].quantity || 1;
        quantityInput.className = "form-control";
        quantityInput.oninput = function () {
            // Update the quantity in the cartItems object
            cartItems[product].quantity = parseInt(quantityInput.value);
            localStorage.setItem("cartItems", JSON.stringify(cartItems));
            // Call the updateCartItems function to update the table
            updateCartItems();
        };
        quantityCell.appendChild(quantityInput);
        tableRow.appendChild(quantityCell);

        // Total
        const totalCell = document.createElement("td");
        totalCell.textContent = "$" + (cartItems[product].price * quantityInput.value).toFixed(2);
        tableRow.appendChild(totalCell);

        // Remove Button
        const removeCell = document.createElement("td");
        const removeButton = document.createElement("button");
        removeButton.type = "button";
        removeButton.textContent = "Remove";
        removeButton.className = "btn btn-danger";
        removeButton.onclick = function () {
            // Remove the product from cartItems object
            delete cartItems[product];
            localStorage.setItem("cartItems", JSON.stringify(cartItems));
            // Call the updateCartItems function to update the table
            updateCartItems();
        };
        removeCell.appendChild(removeButton);
        tableRow.appendChild(removeCell);

        cartItemsList.appendChild(tableRow);
    }

    // Update the total price
    updateTotalPrice();
}

// Function to update the total price
function updateTotalPrice() {
    let cartItems = JSON.parse(localStorage.getItem("cartItems"));
    let totalPrice = 0;

    for (const product in cartItems) {
        const quantityInput = document.querySelector(`[data-product="${product}"]`);
        const productPrice = cartItems[product].price;
        const quantity = parseInt(quantityInput.value);
        const total = productPrice * quantity;
        totalPrice += total;
    }

    document.getElementById("total-price").innerText = "$" + totalPrice.toFixed(2);
}

// Function to handle "Add to Cart" button click
document.querySelector(".add-to-cart-btn").addEventListener("click", function () {
    // Get the product data from the form
    const productName = document.getElementById("product-name").value;
    const productPrice = parseFloat(document.getElementById("product-price").value);
    const productImage = document.getElementById("product-image").value;

    // Get the existing cart items from localStorage
    let cartItems = JSON.parse(localStorage.getItem("cartItems")) || {};

    // Check if the product already exists in the cart
    if (cartItems.hasOwnProperty(productName)) {
        // If the product already exists, increase the quantity by 1
        cartItems[productName].quantity += 1;
    } else {
        // If the product does not exist, add it to the cart with quantity 1
        cartItems[productName] = {
            name: productName,
            price: productPrice,
            image: productImage,
            quantity: 1
        };
    }

    // Save the updated cart items to localStorage
    localStorage.setItem("cartItems", JSON.stringify(cartItems));

    // Call the updateCartItems function to update the table
    updateCartItems();

    // Clear the form inputs
    document.getElementById("product-name").value = "";
    document.getElementById("product-price").value = "";
    document.getElementById("product-image").value = "";
});

// Function to handle "Place Order" button click
document.querySelector(".place-order-btn").addEventListener("click", function () {
    // Perform any necessary actions when the "Place Order" button is clicked
    console.log("Order Placed!");
});

// Call the updateCartItems function when the page loads
updateCartItems();