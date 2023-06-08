<!DOCTYPE html>
<html lang="en">

<?php include 'headTagContainer.php'; ?>

<body>


    <section class="right" id="mainContentSection">
        <section id="headerSection">
            <!-- $("#headerSection").load("header.html"); -->
        </section>

        <section class="slider">
            <form action="">
                <input class="searchbar-middle text-sm" type="text" placeholder="Search for items of brands" />
            </form>
        </section>

        <section id="productsSection">
            <!-- $("#productsSection").load("products.html"); -->
        </section>

        <footer id="footerSection">
            <!-- $("#footerSection").load("footer.html"); -->
        </footer>
    </section>


    <script src="script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(function() {
            $("#headerSection").load("headerContent.php");
            $("#productsSection").load("products.php");
            $("#footerSection").load("footer.php");

        });
    </script>


</body>

</html>