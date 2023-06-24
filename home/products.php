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
                echo '<h4 class="font-semibold" id="productSecTitle">Searched Products</h4>';
                echo '<div class="product-group flex mt-4">';

                while ($row = mysqli_fetch_assoc($searchResult)) {
                    // Output the search results as desired
                    echo '<div class="product flex-col">';
                    echo '<div class="product-img flex justify-center">';
                    echo '<a href="#"><img src="../uploaded_img/' . $row['image'] . '" alt="" /></a>';
                    echo '</div>';
                    echo '<div class="product-description flex-col">';
                    echo '<a href="#" class="black font-500 mb-2">' . $row['name'] . '</a>';
                    echo '<span class="mb-2">$' . $row['price'] . '</span>';
                    echo '<button type="button" class="btn btn-primary">Add to Cart</button>';
                    echo '</div>';
                    echo '</div>';
                }

                echo '</div>';
            } else {
                echo '<h4 class="font-semibold" id="productSecTitle">No Products Found</h4>';
            }
        } else {
            // No search query, display all products

            echo '<h4 class="font-semibold" id="productSecTitle">Featured Products</h4>';
            echo '<div class="product-group flex mt-4">';

            // Retrieve all products from the database
            $query = "SELECT * FROM products";
            $result = mysqli_query($conn, $query);
            $products = mysqli_fetch_all($result, MYSQLI_ASSOC);

            // Generate product elements
            foreach ($products as $product) {
                echo '<div class="product flex-col">';
                echo '<div class="product-img flex justify-center">';
                echo '<a href="#"><img src="../uploaded_img/' . $product['image'] . '" alt="" /></a>';
                echo '</div>';
                echo '<div class="product-description flex-col">';
                echo '<a href="#" class="black font-500 mb-2">' . $product['name'] . '</a>';
                echo '<span class="mb-2">$' . $product['price'] . '</span>';
                echo '<button type="button" class="btn btn-primary">Add to Cart</button>';
                echo '</div>';
                echo '</div>';
            }

            echo '</div>';
        }


        // Close the database connection
        mysqli_close($conn);
        ?>
    </section>

    <script src="../js/script.js"></script>
</body>

</html>