<!DOCTYPE html>
<html lang="en">

<?php include '../home/headTagContainer.php'; ?>

<body>
    <section class="right" id="mainContentSection">
        <section id="headerSection">
            <!-- $("#headerSection").load("header.html"); -->
        </section>

        <section class="slider" id="SliderSection">
            <form action="" id="searchFormMiddle">
                <input class="searchbar-middle text-sm" id="searchQueryMiddle" type="text" placeholder="Search for items of brands" />
            </form>
        </section>

        <section id="productsSection">
            <!-- $("#productsSection").load("products.html"); -->
        </section>

        <footer id="footerSection">
            <!-- $("#footerSection").load("footer.html"); -->
        </footer>
    </section>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="../js/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script>
        $(function() {
            $("#headerSection").load("../home/headerContent.php");
            $("#productsSection").load("../home/products.php");
            $("#footerSection").load("../home/footer.php");

            $("#searchQueryMiddle").keypress(function(event) {
                if (event.keyCode === 13) { // 13 is the key code for Enter
                    event.preventDefault(); // Prevent form submission

                    var searchQuery = $("#searchQueryMiddle").val(); // Get the search query

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
    <script src="../js/cartCount.js"></script>
</body>

</html>