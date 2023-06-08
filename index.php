<!DOCTYPE html>
<html lang="en">

<?php include 'headTagContainer.php'; ?>

<body>
  <script src="https://kit.fontawesome.com/0818cb3b83.js" crossorigin="anonymous"></script>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

  <div class="wrapper">
    <section id="leftSideMenuSection">
      <!-- $("#leftSideMenuSection").load("leftSideMenu.html"); -->
    </section>

    <section id="mainContentSection">
      <!-- $("#mainContentSection").load("mainContent.html"); -->
    </section>
  </div>

  <script src="script.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
    $(function() {
      $("#leftSideMenuSection").load("leftSideMenu.php");
      $("#headerSection").load("headerContent.php");
      $("#productsSection").load("products.php");
      $("#footerSection").load("footer.php");
      $("#mainContentSection").load("mainContent.php");
    });
  </script>
</body>

</html>