<!DOCTYPE html>
<html lang="en">

<?php include '../home/headTagContainer.php'; ?>

<body>
    <section class="products mx-4 py-3" id="productsSection">
        <?php
        // Include the database configuration file
        include '../database/config.php';

        if (isset($_GET['query'])) {
            // Search query is present, perform search operation

            $query = $_GET['query'];
            // Sanitize the search query if needed

            // Perform the search operation using the sanitized query
            $searchQuery = "SELECT * FROM products WHERE name LIKE '%$query%'";
            $searchResult = mysqli_query($conn, $searchQuery);

            // Process the search results
            if ($searchResult && mysqli_num_rows($searchResult) > 0) {
                // Display the search results
        ?>
                <h4 class="font-semibold" id="productSecTitle">Searched Products</h4>
                <div class="product-group flex mt-4">
                    <?php while ($row = mysqli_fetch_assoc($searchResult)) { ?>
                        <div class="product flex-col">
                            <div class="product-img flex justify-center">
                                <a href="#"><img src="../uploaded_img/<?php echo $row['image']; ?>" alt="" /></a>
                            </div>
                            <div class="product-description flex-col">
                                <a href="#" class="black font-500 mb-2"><?php echo $row['name']; ?></a>
                                <span class="mb-2">$<?php echo $row['price']; ?></span>
                                <!-- <button type="button" class="btn btn-primary">Add to Cart</button> -->3
                                <button type="button" class="btn btn-primary add-to-cart-btn" data-product-name="<?php echo $product['name']; ?>" data-product-price="<?php echo $product['price']; ?>" data-product-image="../uploaded_img/<?php echo $product['image']; ?>">Add to Cart</button>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            <?php } else { ?>
                <h4 class="font-semibold" id="productSecTitle">No Products Found</h4>
            <?php }
        } else {
            // No search query, display all products
            ?>
            <h4 class="font-semibold" id="productSecTitle">Featured Products</h4>
            <div class="product-group flex mt-4">
                <?php
                // Retrieve all products from the database
                $query = "SELECT * FROM products";
                $result = mysqli_query($conn, $query);
                $products = mysqli_fetch_all($result, MYSQLI_ASSOC);

                // Generate product elements
                foreach ($products as $product) {
                ?>
                    <div class="product flex-col">
                        <div class="product-img flex justify-center">
                            <a href="#"><img src="../uploaded_img/<?php echo $product['image']; ?>" alt="" /></a>
                        </div>
                        <div class="product-description flex-col">
                            <a href="#" class="black font-500 mb-2"><?php echo $product['name']; ?></a>
                            <span class="mb-2">BDT <?php echo $product['price']; ?></span>
                            <!-- <button type="button" onclick="updateCartCount()" id="add-to-cart" class="btn btn-primary">Add to Cart</button> -->
                            <button type="button" class="btn btn-primary add-to-cart-btn" data-product-name="<?php echo $product['name']; ?>" data-product-price="<?php echo $product['price']; ?>" data-product-image="../uploaded_img/<?php echo $product['image']; ?>">Add to Cart</button>
                        </div>
                    </div>
                <?php } ?>
            </div>
        <?php }

        // Close the database connection
        mysqli_close($conn);
        ?>
    </section>

    <script src="../js/script.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="../js/cartCount.js"></script>
</body>

</html>