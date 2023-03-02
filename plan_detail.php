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
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Үйл ажилгааны тайлан /</span> Хичээлийн хөтөлбөр</h4>

              <!-- Examples -->
            
              <div class="row height-match">
                <div class="col-xl-6">
                    <div class="card">
                        <div class="card-body">
                            <h6 class="text-muted">Цагаан сар</h6>
                            <div class="nav-align-top mb-4">
                              <ul class="nav nav-pills mb-3" role="tablist">
                                <li class="nav-item">
                                  <button
                                    type="button"
                                    class="nav-link active"
                                    role="tab"
                                    data-bs-toggle="tab"
                                    data-bs-target="#title"
                                    aria-controls="title"
                                    aria-selected="true"
                                  >
                                    Суралцахуйн чиглэл
                                  </button>
                                </li>
                                <li class="nav-item">
                                  <button
                                    type="button"
                                    class="nav-link"
                                    role="tab"
                                    data-bs-toggle="tab"
                                    data-bs-target="#date"
                                    aria-controls="date"
                                    aria-selected="false"
                                  >
                                    Он сар өдөр
                                  </button>
                                </li>
                                <li class="nav-item">
                                  <button
                                    type="button"
                                    class="nav-link"
                                    role="tab"
                                    data-bs-toggle="tab"
                                    data-bs-target="#description"
                                    aria-controls="description"
                                    aria-selected="false"
                                  >
                                    Агуулга
                                  </button>
                                </li>
                              </ul>
                              <div class="tab-content">
                                <div class="tab-pane fade show active" id="title" role="tabpanel">
                                  <p>
                                    Хэл яриа
                                  </p>
                                  
                                </div>
                                <div class="tab-pane fade" id="date" role="tabpanel">
                                  <p>
                                    2023,02,13
                                  </p>
                                  
                                </div>
                                <div class="tab-pane fade" id="description" role="tabpanel">
                                  <p>
                                    Санаа бодлоо илэрхийлэн ярих
                                  </p>
                                  
                                </div>
                              </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="card">
                        <div class="card-body">
                            <h6 class="text-muted">Цагаан сар</h6>
                            <div class="nav-align-top mb-4">
                                <ul class="nav nav-pills mb-3" role="tablist">
                                <li class="nav-item">
                                    <button
                                    type="button"
                                    class="nav-link active"
                                    role="tab"
                                    data-bs-toggle="tab"
                                    data-bs-target="#purpose"
                                    aria-controls="purpose"
                                    aria-selected="true"
                                    >
                                    Зорилго
                                    </button>
                                </li>
                                <li class="nav-item">
                                    <button
                                    type="button"
                                    class="nav-link"
                                    role="tab"
                                    data-bs-toggle="tab"
                                    data-bs-target="#method"
                                    aria-controls="method"
                                    aria-selected="false"
                                    >
                                    Сургалтын арга
                                    </button>
                                </li>
                                <li class="nav-item">
                                    <button
                                    type="button"
                                    class="nav-link"
                                    role="tab"
                                    data-bs-toggle="tab"
                                    data-bs-target="#tools"
                                    aria-controls="tools"
                                    aria-selected="false"
                                    >
                                    Хэрэгсэл
                                    </button>
                                </li>
                                </ul>
                                <div class="tab-content">
                                <div class="tab-pane fade show active" id="purpose" role="tabpanel">
                                    <p>
                                    Icing pastry pudding oat cake. Lemon drops cotton candy caramels cake caramels sesame snaps powder. Bear claw candy topping.Tootsie roll fruitcake cookie. Dessert topping pie. Jujubes wafer carrot cake jelly. Bonbon jelly-o jelly-o ice cream jelly beans candy canes cake bonbon. Cookie jelly beans marshmallow jujubes sweet.
                                    </p>
                                    
                                </div>
                                <div class="tab-pane fade" id="method" role="tabpanel">
                                    <p>
                                    2023,02,13
                                    </p>
                                    
                                </div>
                                <div class="tab-pane fade" id="tools" role="tabpanel">
                                    <p>
                                    Санаа бодлоо илэрхийлэн ярих
                                    </p>
                                    
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
              </div>
              <div class="row">
                <div class="col-xl-6">
                <div class="card mt-4">
                    <div class="card-body">
                        <!-- <h6 class="text-muted">Цагаан сар</h6> -->
                        <div class="nav-align-top mb-4">
                          <ul class="nav nav-pills mb-3" role="tablist">
                            <li class="nav-item">
                              <button
                                type="button"
                                class="nav-link active"
                                role="tab"
                                data-bs-toggle="tab"
                                data-bs-target="#activity1"
                                aria-controls="activity1"
                                aria-selected="true"
                              >
                                Үйл ажилгаа 1
                              </button>
                            </li>
                            <li class="nav-item">
                              <button
                                type="button"
                                class="nav-link"
                                role="tab"
                                data-bs-toggle="tab"
                                data-bs-target="#activity2"
                                aria-controls="activity2"
                                aria-selected="false"
                              >
                                Үйл ажилгаа 2
                              </button>
                            </li>
                            <li class="nav-item">
                              <button
                                type="button"
                                class="nav-link"
                                role="tab"
                                data-bs-toggle="tab"
                                data-bs-target="#word"
                                aria-controls="word"
                                aria-selected="false"
                              >
                                Шинэ үг
                              </button>
                            </li>
                          </ul>
                          <div class="tab-content">
                            <div class="tab-pane fade show active" id="activity1" role="tabpanel">
                              <p>
                              Icing pastry pudding oat cake. Lemon drops cotton candy caramels cake caramels sesame snaps powder. Bear claw candy topping.Tootsie roll fruitcake cookie. Dessert topping pie. Jujubes wafer carrot cake jelly. Bonbon jelly-o jelly-o ice cream jelly beans candy canes cake bonbon. Cookie jelly beans marshmallow jujubes sweet.
                              </p>
                              
                            </div>
                            <div class="tab-pane fade" id="activity2" role="tabpanel">
                              <p>
                              Icing pastry pudding oat cake. Lemon drops cotton candy caramels cake caramels sesame snaps powder. Bear claw candy topping.Tootsie roll fruitcake cookie. Dessert topping pie. Jujubes wafer carrot cake jelly. 
                              </p>
                              
                            </div>
                            <div class="tab-pane fade" id="word" role="tabpanel">
                              <p>
                              Icing pastry pudding oat cake. Lemon drops cotton candy caramels cake caramels sesame snaps powder. Bear claw candy topping.Tootsie roll fruitcake cookie. Dessert topping pie. Jujubes wafer carrot cake jelly. Bonbon jelly-o jelly-o ice cream jelly beans candy canes cake bonbon. Cookie jelly beans marshmallow jujubes sweet.Icing pastry pudding oat cake. Lemon drops cotton candy caramels cake caramels sesame snaps powder. Bear claw candy topping.Tootsie roll fruitcake cookie. Dessert topping pie. Jujubes wafer carrot cake jelly. Bonbon jelly-o jelly-o ice cream jelly beans candy canes cake bonbon. Cookie jelly beans marshmallow jujubes sweet.
                              </p>
                              
                            </div>
                          </div>
                        </div>
                    </div>   
                </div>   
                </div>
                <div class="col-xl-6">
                    <div class="card mt-4">
                        <div class="card-body">
                            <!-- <h6 class="text-muted">Зураг</h6> -->
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
                                    Зураг 3
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
                                <img class="card-img-top" src="./assets/img/elements/3.jpg" alt="Card image cap" />
                                
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
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
