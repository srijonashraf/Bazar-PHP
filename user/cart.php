<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/cart.css">
    <style>
        /* Add any additional CSS styles specific to cart.php here */
    </style>
</head>

<body>
    <?php
    session_start();

    // Function to check if the user is logged in
    function isLoggedIn()
    {
        return isset($_SESSION['loginusername']);
    }
    ?>

    <!-- Navbar -->
    <div class="navbar bg-warning">
        <div class="navbar-container">
            <a href="../index.php" class="btn" style="background-color: rgb(41, 41, 41); color:white;">
                <i class="fa-solid fa-angles-left"></i> Back to Products</a>
        </div>

        <div>
            <?php
            if (isLoggedIn()) {
                // User is logged in
                echo "<b>Hi, " . $_SESSION['loginusername'] . "</b>";
            }
            ?>
        </div>
    </div>

    <!-- Cart Items -->
    <h3 class="cart-title my-5" id="cartTitle" style="text-align:center !important ">Your Cart</h3>
    <div id="cart-container" class="cart-items-container container">

        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Product Image</th>
                    <th>Product Name</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody id="cart-items-list">
                <!-- Cart items will be displayed here dynamically using JavaScript -->
            </tbody>
        </table>

        <div class="footer d-flex flex-column justify-content-end align-items-center">
            <div>
                <!-- Place Order Button -->

                <h4 class="py-2">Total Price: BDT<span id="total-price">0.00</span></h4>
            </div>
            <!-- Total Price -->
            <div class="total-price-container py-2">
                <!-- Display the total price -->
                <button type="button" id="placeOrder" class="btn place-order-btn" style="font-weight: bold; background-color: rgba(255, 128, 30, 0.938); color:white"> Place Order <i class="fa-solid fa-cart-arrow-down fa-fade"></i></button>
            </div>
        </div>
    </div>

    <!-- Include Bootstrap and other JS scripts -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- Include FontAwesome JS script -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/js/all.min.js" integrity="sha512-n73z8iQtdp7K+AAzGPcGfgFvJlYyGm4VSBd6FGs9+b8ugU4W/yIvfxRQ3XONKtjwT+UCkLPYyGbUhAW9MslFw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="../js/cartCount.js"></script>
    <script>
        // Function to update the cart items on the cart page
        function updateCartItems() {
            // Get the cart items from localStorage
            let cartItems = JSON.parse(localStorage.getItem("cartItems")) || {};

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
                itemPriceCell.textContent = "BDT " + cartItems[product].price;
                tableRow.appendChild(itemPriceCell);

                // Quantity
                const quantityCell = document.createElement("td");
                const quantityInput = document.createElement("input");
                quantityInput.type = "number";
                quantityInput.min = "1";
                quantityInput.value = cartItems[product].quantity || 1;
                quantityInput.className = "form-control";
                quantityInput.dataset.product = product; // Set the data-product attribute to identify the product
                quantityInput.oninput = function() {
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
                totalCell.textContent = "BDT " + (cartItems[product].price * quantityInput.value).toFixed(2);
                tableRow.appendChild(totalCell);

                // Remove Button
                const removeCell = document.createElement("td");
                const removeButton = document.createElement("button");
                removeButton.type = "button";
                removeButton.textContent = "Remove";
                removeButton.className = "btn btn-danger";
                removeButton.onclick = function() {
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

            document.getElementById("total-price").innerText = " " + totalPrice.toFixed(2);
        }

        // Function to handle "Place Order" button click
        document.querySelector(".place-order-btn").addEventListener("click", function() {
            // Perform any necessary actions when the "Place Order" button is clicked
            console.log("Order Placed!");
        });

        // Call the updateCartItems function when the page loads
        updateCartItems();
    </script>
    

</body>

</html>