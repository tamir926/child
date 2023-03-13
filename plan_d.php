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
          <? if (isset($_GET["action"])) $action=$_GET["action"]; else $action="detail"; ?>

          <!-- / Navbar -->

          <!-- Content wrapper -->
          <div class="content-wrapper">
            <div class="container-xxl flex-grow-1 container-p-y">
            <div class="card mb-4">
                    <!-- Current Plan -->
                    <h5 class="card-header">Цагаан сар</h5>
                    <div class="card-body">
                      <div class="row">
                        <div class="col-md-6 mb-1">
                          <div class="mb-5">
                            <h6 class="mb-1">Суралцахуйн чиглэл</h6>
                            <p>A simple start for everyone</p>
                          </div>
                          <div class="mb-5">
                            <h6 class="mb-1">Он сар өдөр</h6>
                            <p>We will send you a notification upon Subscription expiration</p>
                          </div>
                          <div class="mb-5">
                            <h6 class="mb-1">
                              <span class="me-2">Агуулга</span>
                              <span class="badge bg-label-primary">Popular</span>
                            </h6>
                            <p>Standard plan for small to medium businesses</p>
                          </div>
                          <div class="mb-5">
                            <h6 class="mb-1">
                              <span class="me-2">Зорилго</span>
                              <span class="badge bg-label-primary">Popular</span>
                            </h6>
                            <p>Standard plan for small to medium businesses</p>
                          </div>
                          <div class="mb-5">
                            <h6 class="mb-1">
                              <span class="me-2">Сургалтын арга</span>
                              <span class="badge bg-label-primary">Popular</span>
                            </h6>
                            <p>Standard plan for small to medium businesses</p>
                          </div>
                          <div class="mb-5">
                            <h6 class="mb-1">
                              <span class="me-2">Хэрэгсэл</span>
                              <span class="badge bg-label-primary">Popular</span>
                            </h6>
                            <p>Standard plan for small to medium businesses</p>
                          </div>
                          <div class="mb-4">
                            <h6 class="mb-1">
                              <span class="me-2">Үйл ажиллагаа 1</span>
                              <span class="badge bg-label-primary">Popular</span>
                            </h6>
                            <p>Standard plan for small to medium businesses</p>
                          </div>
                          <div class="mb-4">
                            <h6 class="mb-1">
                              <span class="me-2">Үйл ажиллагаа 2</span>
                              <span class="badge bg-label-primary">Popular</span>
                            </h6>
                            <p>Standard plan for small to medium businesses</p>
                          </div>
                          <div class="mb-4">
                            <h6 class="mb-1">
                              <span class="me-2">Шинэ үг</span>
                              <span class="badge bg-label-primary">Popular</span>
                            </h6>
                            <p>Standard plan for small to medium businesses</p>
                          </div>
                        </div>
                        <div class="col-md-6 mb-1">
                                
                                <div class="nav-align-top mb-6">
                                <ul class="nav nav-pills mb-3" role="tablist">
                                    <li class="nav-item">
                                    <button
                                        type="button"
                                        class="nav-link active"
                                        role="tab"
                                        data-bs-toggle="tab"
                                        data-bs-target="#image1"
                                        aria-controls="image1"
                                        aria-selected="true"
                                    >
                                        Зураг 1
                                    </button>
                                    </li>
                                    <li class="nav-item">
                                    <button
                                        type="button"
                                        class="nav-link"
                                        role="tab"
                                        data-bs-toggle="tab"
                                        data-bs-target="#image2"
                                        aria-controls="image2"
                                        aria-selected="false"
                                    >
                                        Зураг 2
                                    </button>
                                    </li>
                                    <li class="nav-item">
                                    <button
                                        type="button"
                                        class="nav-link"
                                        role="tab"
                                        data-bs-toggle="tab"
                                        data-bs-target="#image3"
                                        aria-controls="image3"
                                        aria-selected="false"
                                    >
                                        Бичлэг
                                    </button>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane fade show active" id="image1" role="tabpanel">
                                        <img class="card-img-top" src="./assets/img/elements/1.jpg" alt="Card image cap" />
                                    
                                    </div>
                                    <div class="tab-pane fade" id="image2" role="tabpanel">
                                        <img class="card-img-top" src="./assets/img/elements/2.jpg" alt="Card image cap" />
                                    
                                    </div>
                                    <div class="tab-pane fade" id="image3" role="tabpanel">
                                        <video
                                            class="w-100"
                                            poster="https://cdn.plyr.io/static/demo/View_From_A_Blue_Moon_Trailer-HD.jpg"
                                            id="plyr-video-player"
                                            playsinline
                                            controls
                                        >
                                            <source
                                            src="https://cdn.plyr.io/static/demo/View_From_A_Blue_Moon_Trailer-576p.mp4"
                                            type="video/mp4"
                                            />
                                        </video>
                                    
                                    </div>
                                </div>   
                            
                        </div>
                      </div>
                    </div>
                  </div>
            </div>
            
           
              
             

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
