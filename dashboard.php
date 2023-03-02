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
    <div class="layout-wrapper layout-content-navbar ">
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
              <div class="row">
                <!-- View sales -->
                <div class="col-xl-4 mb-4 col-lg-5 col-12">
                  <div class="card">
                    <div class="d-flex align-items-end row">
                      <div class="col-7">
                        <div class="card-body text-nowrap">
                          <h5 class="card-title mb-0">Өдрийн мэнд Б.Энхтөр 🎉</h5>
                          <p class="mb-2">Саруул цэцэрлэг</p>
                          <a href="javascript:;" class="btn btn-primary">Хувийн мэдээлэл</a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- View sales -->

                <!-- Statistics -->
                <div class="col-xl-8 mb-4 col-lg-7 col-12">
                  <div class="card h-100">
                    <div class="card-header">
                      <div class="d-flex justify-content-between mb-3">
                        <h5 class="card-title mb-0">Мэдээлэл</h5>
                        <small class="text-muted">Updated 1 month ago</small>
                      </div>
                    </div>
                    <div class="card-body">
                      <div class="row gy-3">
                        <div class="col-md-3 col-6">
                          <div class="d-flex align-items-center">
                            <div class="badge rounded-pill bg-label-primary me-3 p-2">
                              <i class="ti ti-chart-pie-2 ti-sm"></i>
                            </div>
                            <div class="card-info">
                              <h5 class="mb-0">230.000</h5>
                              <small>Нийт төлбөрийн үлдэгдэл</small>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-3 col-6">
                          <div class="d-flex align-items-center">
                            <div class="badge rounded-pill bg-label-info me-3 p-2">
                              <i class="ti ti-users ti-sm"></i>
                            </div>
                            <div class="card-info">
                              <h5 class="mb-0">8.549k</h5>
                              <small>Бүртгэлтэй сурагчид</small>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-3 col-6">
                          <div class="d-flex align-items-center">
                            <div class="badge rounded-pill bg-label-danger me-3 p-2">
                              <i class="ti ti-shopping-cart ti-sm"></i>
                            </div>
                            <div class="card-info">
                              <h5 class="mb-0">1.423k</h5>
                              <small>Бүртгэлтэй хөрөнгийн тоо</small>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-3 col-6">
                          <div class="d-flex align-items-center">
                            <div class="badge rounded-pill bg-label-success me-3 p-2">
                              <i class="ti ti-currency-dollar ti-sm"></i>
                            </div>
                            <div class="card-info">
                              <h5 class="mb-0">9745</h5>
                              <small>Зөрүү дүн</small>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!--/ Statistics -->

                <div class="col-xl-4 col-12">
                  <div class="row">
                    <!-- Expenses -->
                    <div class="col-xl-6 mb-4 col-md-3 col-6">
                      <div class="card">
                        <div class="card-header pb-0">
                          <h5 class="card-title mb-0">82.5k</h5>
                          <small class="text-muted">Худалдан авалт</small>
                        </div>
                        <div class="card-body">
                          <div id="expensesChart"></div>
                          <div class="mt-md-2 text-center mt-lg-3 mt-3">
                            <small class="text-muted mt-3">Худалдан авалтын дундаж</small>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!--/ Expenses -->

                    <!-- Profit last month -->
                    <div class="col-xl-6 mb-4 col-md-3 col-6">
                      <div class="card">
                        <div class="card-header pb-0">
                          <h5 class="card-title mb-0">Төлбөр</h5>
                          <small class="text-muted">Last Month</small>
                        </div>
                        <div class="card-body">
                          <div id="profitLastMonth"></div>
                          <div class="d-flex justify-content-between align-items-center mt-3 gap-3">
                            <h4 class="mb-0">624k</h4>
                            <small class="text-success">+8.24%</small>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!--/ Profit last month -->

                    <!-- Generated Leads -->
                    <div class="col-xl-12 mb-4 col-md-6">
                      <div class="card">
                        <div class="card-body">
                          <div class="d-flex justify-content-between">
                            <div class="d-flex flex-column">
                              <div class="card-title mb-auto">
                                <h5 class="mb-1 text-nowrap">Generated Leads</h5>
                                <small>Monthly Report</small>
                              </div>
                              <div class="chart-statistics">
                                <h3 class="card-title mb-1">4,350</h3>
                                <small class="text-success text-nowrap fw-semibold"
                                  ><i class="ti ti-chevron-up me-1"></i> 15.8%</small
                                >
                              </div>
                            </div>
                            <div id="generatedLeadsChart"></div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!--/ Generated Leads -->
                  </div>
                </div>

                <!-- Revenue Report -->
                <div class="col-12 col-xl-8 mb-4 col-lg-7">
                  <div class="card">
                    <div class="card-header pb-3">
                      <h5 class="m-0 me-2 card-title">Ирцийн мэдээлэл</h5>
                    </div>
                    <div class="card-body">
                      <div class="row row-bordered g-0">
                        <div class="col-md-8">
                          <div id="totalRevenueChart"></div>
                        </div>
                        <div class="col-md-4">
                          <div class="text-center mt-4">
                            <div class="dropdown">
                              <button
                                class="btn btn-sm btn-outline-primary dropdown-toggle"
                                type="button"
                                id="budgetId"
                                data-bs-toggle="dropdown"
                                aria-haspopup="true"
                                aria-expanded="false"
                              >
                                <script>
                                  document.write(new Date().getFullYear());
                                </script>
                              </button>
                              <div class="dropdown-menu dropdown-menu-end" aria-labelledby="budgetId">
                                <a class="dropdown-item prev-year1" href="javascript:void(0);">
                                  <script>
                                    document.write(new Date().getFullYear() - 1);
                                  </script>
                                </a>
                                <a class="dropdown-item prev-year2" href="javascript:void(0);">
                                  <script>
                                    document.write(new Date().getFullYear() - 2);
                                  </script>
                                </a>
                                <a class="dropdown-item prev-year3" href="javascript:void(0);">
                                  <script>
                                    document.write(new Date().getFullYear() - 3);
                                  </script>
                                </a>
                              </div>
                            </div>
                          </div>
                          <h3 class="text-center pt-4 mb-0">95%</h3>
                          <div class="px-3">
                            <div id="budgetChart"></div>
                          </div>
                          <div class="text-center mt-4">
                            <button type="button" class="btn btn-primary">Дэлгэрэнгүй</button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!--/ Revenue Report -->

               
                

                <!-- Sales by Countries tabs-->
                <div class="col-md-6 col-xl-4 col-xl-4 mb-4">
                  <div class="card h-100">
                    <div class="card-header d-flex justify-content-between pb-2 mb-1">
                      <div class="card-title mb-1">
                        <h5 class="m-0 me-2">Төлөвлөгөөт ажил</h5>
                        <small class="text-muted">62 Deliveries in Progress</small>
                      </div>
                      <div class="dropdown">
                        <button
                          class="btn p-0"
                          type="button"
                          id="salesByCountryTabs"
                          data-bs-toggle="dropdown"
                          aria-haspopup="true"
                          aria-expanded="false"
                        >
                          <i class="ti ti-dots-vertical ti-sm text-muted"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="salesByCountryTabs">
                          <a class="dropdown-item" href="javascript:void(0);">Download</a>
                          <a class="dropdown-item" href="javascript:void(0);">Refresh</a>
                          <a class="dropdown-item" href="javascript:void(0);">Share</a>
                        </div>
                      </div>
                    </div>
                    <div class="card-body">
                      <div class="nav-align-top">
                        <ul class="nav nav-tabs nav-fill" role="tablist">
                          <li class="nav-item">
                            <button
                              type="button"
                              class="nav-link active"
                              role="tab"
                              data-bs-toggle="tab"
                              data-bs-target="#navs-justified-new"
                              aria-controls="navs-justified-new"
                              aria-selected="true"
                            >
                              Шинэ
                            </button>
                          </li>
                          <li class="nav-item">
                            <button
                              type="button"
                              class="nav-link"
                              role="tab"
                              data-bs-toggle="tab"
                              data-bs-target="#navs-justified-link-preparing"
                              aria-controls="navs-justified-link-preparing"
                              aria-selected="false"
                            >
                              Хэвийн
                            </button>
                          </li>
                          <li class="nav-item">
                            <button
                              type="button"
                              class="nav-link"
                              role="tab"
                              data-bs-toggle="tab"
                              data-bs-target="#navs-justified-link-shipping"
                              aria-controls="navs-justified-link-shipping"
                              aria-selected="false"
                            >
                              Яаралтай
                            </button>
                          </li>
                        </ul>
                        <div class="tab-content pb-0">
                          <div class="tab-pane fade show active" id="navs-justified-new" role="tabpanel">
                            <ul class="timeline timeline-advance timeline-advance mb-2 pb-1">
                              <li class="timeline-item ps-4 border-left-dashed">
                                <span class="timeline-indicator timeline-indicator-success">
                                  <i class="ti ti-circle-check"></i>
                                </span>
                                <div class="timeline-event ps-0 pb-0">
                                  <div class="timeline-header">
                                    <small class="text-success text-uppercase fw-semibold">Хариуцагч</small>
                                  </div>
                                  <h6 class="mb-0">Д.Ганбаяр</h6>
                                  <p class="text-muted mb-0 text-nowrap">Сургалтын төлөвлөгөө боловсруулах</p>
                                </div>
                              </li>
                              <li class="timeline-item ps-4 border-0">
                                <span class="timeline-indicator timeline-indicator-primary">
                                  <i class="ti ti-map-pin"></i>
                                </span>
                                <div class="timeline-event ps-0 pb-0">
                                  <div class="timeline-header">
                                    <small class="text-primary text-uppercase fw-semibold">Хариуцагч</small>
                                  </div>
                                  <h6 class="mb-0">М.Батцэцэг</h6>
                                  <p class="text-muted mb-0 text-nowrap">Хөрөнгийн мэдээлэл бүрэн оруулах</p>
                                </div>
                              </li>
                            </ul>
                            <div class="border-bottom border-bottom-dashed mt-0 mb-4"></div>
                            <ul class="timeline timeline-advance mb-0">
                              <li class="timeline-item ps-4 border-left-dashed">
                                <span class="timeline-indicator timeline-indicator-success">
                                  <i class="ti ti-circle-check"></i>
                                </span>
                                <div class="timeline-event ps-0 pb-0">
                                  <div class="timeline-header">
                                    <small class="text-success text-uppercase fw-semibold">Хариуцагч</small>
                                  </div>
                                  <h6 class="mb-0">Б.Энхтөр</h6>
                                  <p class="text-muted mb-0 text-nowrap">Үйлчилгээний тайлан бэлтгэх</p>
                                </div>
                              </li>
                              <li class="timeline-item ps-4 border-0">
                                <span class="timeline-indicator timeline-indicator-primary">
                                  <i class="ti ti-map-pin"></i>
                                </span>
                                <div class="timeline-event ps-0 pb-0">
                                  <div class="timeline-header">
                                    <small class="text-primary text-uppercase fw-semibold">Хариуцагч</small>
                                  </div>
                                  <h6 class="mb-0">Б.Энхтөр</h6>
                                  <p class="text-muted mb-0 text-nowrap">Цалин автоматжуулах</p>
                                </div>
                              </li>
                            </ul>
                          </div>

                          <div class="tab-pane fade" id="navs-justified-link-preparing" role="tabpanel">
                            <ul class="timeline timeline-advance mb-2 pb-1">
                              <li class="timeline-item ps-4 border-left-dashed">
                                <span class="timeline-indicator timeline-indicator-success">
                                  <i class="ti ti-circle-check"></i>
                                </span>
                                <div class="timeline-event ps-0 pb-0">
                                  <div class="timeline-header">
                                    <small class="text-success text-uppercase fw-semibold">sender</small>
                                  </div>
                                  <h6 class="mb-0">Barry Schowalter</h6>
                                  <p class="text-muted mb-0 text-nowrap">939 Orange, California(CA),92118</p>
                                </div>
                              </li>
                              <li class="timeline-item ps-4 border-0 border-left-dashed">
                                <span class="timeline-indicator timeline-indicator-primary">
                                  <i class="ti ti-map-pin"></i>
                                </span>
                                <div class="timeline-event ps-0 pb-0">
                                  <div class="timeline-header">
                                    <small class="text-primary text-uppercase fw-semibold">Receiver</small>
                                  </div>
                                  <h6 class="mb-0">Myrtle Ullrich</h6>
                                  <p class="text-muted mb-0 text-nowrap">101 Boulder, California(CA), 95959</p>
                                </div>
                              </li>
                            </ul>
                            <div class="border-bottom border-bottom-dashed mt-0 mb-4"></div>
                            <ul class="timeline timeline-advance mb-0">
                              <li class="timeline-item ps-4 border-left-dashed">
                                <span class="timeline-indicator timeline-indicator-success">
                                  <i class="ti ti-circle-check"></i>
                                </span>
                                <div class="timeline-event ps-0 pb-0">
                                  <div class="timeline-header">
                                    <small class="text-success text-uppercase fw-semibold">sender</small>
                                  </div>
                                  <h6 class="mb-0">Veronica Herman</h6>
                                  <p class="text-muted mb-0 text-nowrap">162 Windsor, California(CA), 95492</p>
                                </div>
                              </li>
                              <li class="timeline-item ps-4 border-0">
                                <span class="timeline-indicator timeline-indicator-primary">
                                  <i class="ti ti-map-pin"></i>
                                </span>
                                <div class="timeline-event ps-0 pb-0">
                                  <div class="timeline-header">
                                    <small class="text-primary text-uppercase fw-semibold">Receiver</small>
                                  </div>
                                  <h6 class="mb-0">Helen Jacobs</h6>
                                  <p class="text-muted mb-0 text-nowrap">487 Sunset, California(CA), 94043</p>
                                </div>
                              </li>
                            </ul>
                          </div>
                          <div class="tab-pane fade" id="navs-justified-link-shipping" role="tabpanel">
                            <ul class="timeline timeline-advance mb-2 pb-1">
                              <li class="timeline-item ps-4 border-left-dashed">
                                <span class="timeline-indicator timeline-indicator-success">
                                  <i class="ti ti-circle-check"></i>
                                </span>
                                <div class="timeline-event ps-0 pb-0">
                                  <div class="timeline-header">
                                    <small class="text-success text-uppercase fw-semibold">sender</small>
                                  </div>
                                  <h6 class="mb-0">Veronica Herman</h6>
                                  <p class="text-muted mb-0 text-nowrap">101 Boulder, California(CA), 95959</p>
                                </div>
                              </li>
                              <li class="timeline-item ps-4 border-0">
                                <span class="timeline-indicator timeline-indicator-primary">
                                  <i class="ti ti-map-pin"></i>
                                </span>
                                <div class="timeline-event ps-0 pb-0">
                                  <div class="timeline-header">
                                    <small class="text-primary text-uppercase fw-semibold">Receiver</small>
                                  </div>
                                  <h6 class="mb-0">Barry Schowalter</h6>
                                  <p class="text-muted mb-0 text-nowrap">939 Orange, California(CA),92118</p>
                                </div>
                              </li>
                            </ul>
                            <div class="border-bottom border-bottom-dashed mt-0 mb-4"></div>
                            <ul class="timeline timeline-advance mb-0">
                              <li class="timeline-item ps-4 border-left-dashed">
                                <span class="timeline-indicator timeline-indicator-success">
                                  <i class="ti ti-circle-check"></i>
                                </span>
                                <div class="timeline-event ps-0 pb-0">
                                  <div class="timeline-header">
                                    <small class="text-success text-uppercase fw-semibold">sender</small>
                                  </div>
                                  <h6 class="mb-0">Myrtle Ullrich</h6>
                                  <p class="text-muted mb-0 text-nowrap">162 Windsor, California(CA), 95492</p>
                                </div>
                              </li>
                              <li class="timeline-item ps-4 border-0">
                                <span class="timeline-indicator timeline-indicator-primary">
                                  <i class="ti ti-map-pin"></i>
                                </span>
                                <div class="timeline-event ps-0 pb-0">
                                  <div class="timeline-header">
                                    <small class="text-primary text-uppercase fw-semibold">Receiver</small>
                                  </div>
                                  <h6 class="mb-0">Helen Jacobs</h6>
                                  <p class="text-muted mb-0 text-nowrap">487 Sunset, California(CA), 94043</p>
                                </div>
                              </li>
                            </ul>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!--/ Sales by Countries tabs -->


               
              </div>
            </div>
            <!-- / Content -->

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
    <script src="assets/vendor/libs/jquery/jquery.js"></script>
    <script src="assets/vendor/libs/popper/popper.js"></script>
    <script src="assets/vendor/js/bootstrap.js"></script>
    <script src="assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="assets/vendor/libs/node-waves/node-waves.js"></script>

    <script src="assets/vendor/libs/hammer/hammer.js"></script>
    <script src="assets/vendor/libs/i18n/i18n.js"></script>
    <script src="assets/vendor/libs/typeahead-js/typeahead.js"></script>

    <script src="assets/vendor/js/menu.js"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="assets/vendor/libs/apex-charts/apexcharts.js"></script>
    <script src="assets/vendor/libs/datatables/jquery.dataTables.js"></script>
    <script src="assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js"></script>
    <script src="assets/vendor/libs/datatables-responsive/datatables.responsive.js"></script>
    <script src="assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.js"></script>
    <script src="assets/vendor/libs/datatables-buttons/datatables-buttons.js"></script>
    <script src="assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.js"></script>
    <script src="assets/vendor/libs/datatables-buttons/buttons.html5.js"></script>
    <script src="assets/vendor/libs/datatables-buttons/buttons.print.js"></script>

    <!-- Main JS -->
    <script src="assets/js/main.js"></script>

    <!-- Page JS -->
    <script src="assets/js/dashboards-ecommerce.js"></script>
  </body>
</html>