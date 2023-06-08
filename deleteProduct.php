<?php
@include 'config.php';

if (isset($_GET['delete'])) {
    $delete_id = $_GET['delete'];

    // Retrieve the image filename to delete from the server
    $select_image = mysqli_query($conn, "SELECT image FROM products WHERE id = '$delete_id'");
    $image_row = mysqli_fetch_assoc($select_image);
    $product_image = $image_row['image'];

    // Delete the product from the database
    $delete_query = "DELETE FROM products WHERE id = '$delete_id'";
    $delete_result = mysqli_query($conn, $delete_query);

    if ($delete_result) {
        // Delete the product image file from the server
        $image_path = 'uploaded_img/' . $product_image;
        if (file_exists($image_path)) {
            unlink($image_path);
        }
        header('Location: addProduct.php');
        exit();
    } else {
        echo 'Error deleting the product.';
    }
}
