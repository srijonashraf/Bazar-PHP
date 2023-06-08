<?php
@include 'config.php';

// Add Product
if (isset($_POST['add_product'])) {
    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $product_image = $_FILES['product_image']['name'];
    $product_image_tmp_name = $_FILES['product_image']['tmp_name'];
    $product_image_folder = 'uploaded_img/' . $product_image;

    if (empty($product_name) || empty($product_price) || empty($product_image)) {
        $message[] = 'Please fill out all fields.';
    } else {
        // Check if the product name or image name already exists in the database
        $check_query = "SELECT * FROM products WHERE name = '$product_name' OR image = '$product_image'";
        $check_result = mysqli_query($conn, $check_query);

        if (mysqli_num_rows($check_result) > 0) {
            $message[] = "Product already exists!";
        } else {
            $insert_data = "INSERT INTO products (name, price, image) VALUES ('$product_name', '$product_price', '$product_image')";
            $insert = mysqli_query($conn, $insert_data);

            if ($insert) {
                move_uploaded_file($product_image_tmp_name, $product_image_folder);
                $message[] = "Product Added!";
            } else {
                $message[] = 'Error adding the product.';
            }
        }
    }
}

// Edit Product
if (isset($_GET['edit'])) {
    $edit_id = $_GET['edit'];

    if (isset($_POST['update_product'])) {
        $product_name = $_POST['product_name'];
        $product_price = $_POST['product_price'];
        $product_image = $_FILES['product_image']['name'];
        $product_image_tmp_name = $_FILES['product_image']['tmp_name'];
        $product_image_folder = 'uploaded_img/' . $product_image;

        $update_data = "UPDATE products SET ";
        $update_fields = array();

        if (!empty($product_name)) {
            $update_fields[] = "name = '$product_name'";
        }

        if (!empty($product_price)) {
            $update_fields[] = "price = '$product_price'";
        }

        if (!empty($product_image)) {
            $update_fields[] = "image = '$product_image'";
        }

        if (!empty($update_fields)) {
            $update_data .= implode(", ", $update_fields);
            $update_data .= " WHERE id = '$edit_id'";

            $upload = mysqli_query($conn, $update_data);

            if ($upload) {
                if (!empty($product_image)) {
                    move_uploaded_file($product_image_tmp_name, $product_image_folder);
                    $message[] = 'Product Updated!';
                }
                header('Location: addProduct.php');
                exit();
            } else {
                $message[] = 'Error updating the product.';
            }
        } else {
            $message[] = 'No fields to update.';
        }
    }


    // Fetch Product Details for Editing
    $select = mysqli_query($conn, "SELECT * FROM products WHERE id = '$edit_id'");
    $row = mysqli_fetch_assoc($select);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/addProduct.css">
</head>

<body>
    <?php
    if (isset($message)) {
        foreach ($message as $msg) {
            echo '<span class="message">' . $msg . '</span>';
        }
    }
    ?>

    <div class="container">
        <div class="admin-product-form-container centered">
            <?php if (isset($success_message)) {
                echo '<span class="success-message">' . $success_message . '</span>';
            } ?>
            <?php if (isset($_GET['edit'])) { ?>
                <form action="" method="post" enctype="multipart/form-data">
                    <h3 class="title">Update the product</h3>
                    <input type="text" class="box" name="product_name" value="<?php echo $row['name']; ?>" placeholder="Enter the product name" required>
                    <input type="number" min="0" class="box" name="product_price" value="<?php echo $row['price']; ?>" placeholder="Enter the product price" required>
                    <input type="file" class="box" name="product_image" accept="image/png, image/jpeg, image/jpg">
                    <input type="submit" value="Update Product" name="update_product" class="btn">
                    <a href="addProduct.php" class="btn">Cancel</a>
                </form>
            <?php } else { ?>
                <form action="" method="post" enctype="multipart/form-data">
                    <h3 class="title">Add a new product</h3>
                    <input type="text" class="box" name="product_name" placeholder="Enter the product name" required>
                    <input type="number" min="0" class="box" name="product_price" placeholder="Enter the product price" required>
                    <input type="file" class="box" name="product_image" accept="image/png, image/jpeg, image/jpg" required>
                    <input type="submit" value="Add Product" name="add_product" class="btn">
                    <a href="index.php" class="btn">Go back</a>
                </form>
            <?php } ?>
        </div>

        <div class="product-display">
            <table class="product-display-table">
                <thead>
                    <tr>
                        <th>Product Image</th>
                        <th>Product Name</th>
                        <th>Product Price</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $select_products = mysqli_query($conn, "SELECT * FROM products");
                    while ($product_row = mysqli_fetch_assoc($select_products)) {
                    ?>
                        <tr>
                            <td><img src="uploaded_img/<?php echo $product_row['image']; ?>" height="100" alt=""></td>
                            <td><?php echo $product_row['name']; ?></td>
                            <td><?php echo $product_row['price']; ?></td>
                            <td>
                                <a class="btn" href="addProduct.php?edit=<?php echo $product_row['id']; ?>">Edit</a>
                                <a class="btn" href="deleteProduct.php?delete=<?php echo $product_row['id']; ?>">Delete</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>