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
    <h3 class="cart-title my-5" id="cartTitle" style="text-align:center !important ">Your Cart is empty</h3>

    <!-- Include Bootstrap and other JS scripts -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- Include FontAwesome JS script -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/js/all.min.js" integrity="sha512-n73z8iQtdp7K+AAzGPcGfgFvJlYyGm4VSBd6FGs9+b8ugU4W/yIvfxRQ3XONKtjwT+UCkLPYyGbUhAW9MslFw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="../js/cartCount.js"></script>
    

</body>

</html>