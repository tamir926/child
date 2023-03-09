<?php
require_once("config.php");
require_once("views/helper.php");
require_once("views/login_check.php");
require_once("views/init.php");
?>
<?php
 $g_logged_name = $_SESSION['admin_name'];
 $g_logged_avatar = $_SESSION['admin_avatar'];
 $g_logged = $_SESSION['admin_logged'];
 $g_logged_timestamp = $_SESSION['admin_timestamp'];
 ?>
  <body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <!-- Menu -->

        <?php require_once("views/sidemenu.php");?>
        <!-- / Menu -->

        <!-- Layout container -->
        <div class="layout-page">
          <!-- Navbar -->

          <?php require_once("views/topmenu.php");?>

          <!-- / Navbar -->

          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Тайлан /</span> тайлан1</h4>
              <a class="btn btn-outline-success mb-3" href="report_detail?action=new">Тайлан нэмэх</a>

              <!-- Examples -->
              <div class="row mb-5">
              <?
              $sql = "SELECT *FROM report ORDER BY id";
              $result = mysqli_query($conn,$sql);
              while ($data = mysqli_fetch_array($result))
              {
                  ?>
                <div class="col-md-6 col-lg-4 mb-3">
                  <div class="card h-100">
                    <img class="card-img-top" src="./assets/img/elements/2.jpg" alt="Card image cap" />
                    <div class="card-body">
                    <p class="card-text">
                    <?=$data["years"];?> оны <?=$data["month"];?> сарын 
                    </p>
                      <h5 class="card-title">Багш '<?=$data["teacher"];?>'-ын тайлан</h5>
                      <a href="report_detail?id=<?=$data["id"];?>" class="btn btn-outline-primary">Дэлгэрэнүгй</a>
                    </div>
                  </div>
                </div>
              <?
                  }
              ?>
              </div>
              <!-- Examples -->

            <!-- Footer -->
            <footer class="content-footer footer bg-footer-theme">
              <div class="container-xxl">
                <div
                  class="footer-container d-flex align-items-center justify-content-between py-2 flex-md-row flex-column"
                >
                  <div>
                    ©
                    <script>
                      document.write(new Date().getFullYear());
                    </script>
                     <a href="https://pixinvent.com" target="_blank" class="fw-semibold">Happy Child</a>
                  </div>
                  <div>
                 
                  </div>
                </div>
              </div>
            </footer>
            <!-- / Footer -->

            <div class="content-backdrop fade"></div>
          </div>
          <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
      </div>

      <!-- Overlay -->
      <div class="layout-overlay layout-menu-toggle"></div>

      <!-- Drag Target Area To SlideIn Menu On Small Screens -->
      <div class="drag-target"></div>
    </div>
    <!-- / Layout wrapper -->

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="<?=$path?>assets/vendor/libs/jquery/jquery.js"></script>
    <script src="<?=$path?>assets/vendor/libs/popper/popper.js"></script>
    <script src="<?=$path?>assets/vendor/js/bootstrap.js"></script>
    <script src="<?=$path?>assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="<?=$path?>assets/vendor/libs/node-waves/node-waves.js"></script>
    <script src="<?=$path?>assets/vendor/libs/hammer/hammer.js"></script>
    <script src="<?=$path?>assets/vendor/libs/i18n/i18n.js"></script>
    <script src="<?=$path?>assets/vendor/libs/typeahead-js/typeahead.js"></script>
    <script src="<?=$path?>assets/vendor/js/menu.js"></script>

    <script src="<?=$path?>assets/vendor/libs/jszip/jszip.js"></script>
    <script src="<?=$path?>assets/vendor/libs/pdfmake/pdfmake.js"></script>
    <script src="<?=$path?>assets/vendor/libs/formvalidation/dist/js/FormValidation.min.js"></script>
    <script src="<?=$path?>assets/vendor/libs/formvalidation/dist/js/plugins/Bootstrap5.min.js"></script>
    <script src="<?=$path?>assets/vendor/libs/formvalidation/dist/js/plugins/AutoFocus.min.js"></script>
    <script src="<?=$path?>assets/js/main.js"></script>

    <!-- Page JS -->
  </body>
</html>
