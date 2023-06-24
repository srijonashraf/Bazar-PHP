<!DOCTYPE html>
<html lang="en">

<?php include '../home/headTagContainer.php'; ?>


<body>
    <section class="products mx-4 py-3" id="productsSection">
        <h4 class="font-semibold">Featured Product</h4>
        <div class="product-group flex mt-4">
            <?php
            // Include the database configuration file
            include '../database/config.php';

            // Retrieve all products from the database
            $query = "SELECT * FROM products";
            $result = mysqli_query($conn, $query);
            $products = mysqli_fetch_all($result, MYSQLI_ASSOC);

            // Generate product elements
            foreach ($products as $product) {
                echo '<div class="product flex-col">';
                echo '<div class="product-img flex justify-center">';
                echo '<a href="#"><img src="uploaded_img/' . $product['image'] . '" alt="" /></a>';
                echo '</div>';
                echo '<div class="product-description flex-col">';
                echo '<a href="#" class="black font-500 mb-2">' . $product['name'] . '</a>';
                echo '<span class="mb-2">$' . $product['price'] . '</span>';
                echo '<button type="button" class="btn btn-primary">Add to Cart</button>';
                echo '</div>';
                echo '</div>';
            }

            // Close the database connection
            mysqli_close($conn);
            ?>
        </div>
    </section>

    <script src="./js/script.js"></script>
</body>

</html>