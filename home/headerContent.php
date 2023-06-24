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
        <form class="mx-4 py-3" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>"> <!-- Added action attribute -->
            <div class="header-left">
                <div class="searchbar-top">
                    <input class="text-sm pe-5 ps-2" type="text" placeholder="Search for item or brands" />
                </div>
            </div>
            <div class="header-right">
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
            </div>
        </form>
    </section>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script src="./js/script.js"></script>

</body>

</html>