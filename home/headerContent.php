<!DOCTYPE html>
<html lang="en">

<?php include '../home/headTagContainer.php'; ?>


<?php
session_start();

if (isset($_POST['userlogout'])) {
    unset($_SESSION['loginusername']); // Unset the specific session variable
    header("Location: ../index.php"); // Redirect to the login page
    exit();
}

?>

<body>

    <section class="header" id="headerSection">
        <div class="header-wrapper mx-4 py-3">

            <div class="header-left">
                <form action="" method="get" id="searchForm">
                    <input class="text-sm pe-5 ps-2 searchbar-top" type="text" name="query" id="searchQuery" placeholder="Search for item or brands" />
                </form>
            </div>

            <div class="header-right">
                <form class="" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>"> <!-- Added action attribute -->
                    <?php
                    if (isset($_SESSION['loginusername'])) {
                        // User is logged in
                        echo '<a href="#"><i class="fa-solid fa-cart-shopping px-3 text-muted"></i></a>';
                        echo "Hi, " . $_SESSION['loginusername'] . "!";
                        echo '<input type="submit" value="Logout" name="userlogout" class="login-button ms-2 text-sm">';
                    }
                    if (!isset($_SESSION['loginusername'])) {
                        echo ' <a href="../auth/userLogin.php" class="login-button text-sm">Login</a>';
                    }
                    ?>
                </form>
            </div>
        </div>
    </section>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script src="../js/script.js"></script>
    <script>
        $(function() {
            $("#searchQuery").keypress(function(event) {
                if (event.keyCode === 13) { // 13 is the key code for Enter
                    event.preventDefault(); // Prevent form submission

                    var searchQuery = $("#searchQuery").val(); // Get the search query

                    $.ajax({
                        url: "../home/products.php", // URL of the product.php file
                        type: "GET",
                        data: {
                            query: searchQuery
                        }, // Pass the search query as data
                        success: function(response) {
                            // Update the products section with the search results
                            $("#productsSection").html(response);
                        }
                    });
                }
            });
        });

        
    </script>

</body>

</html>