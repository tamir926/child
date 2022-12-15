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
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <?php require_once("views/sidemenu.php");?>
        <div class="layout-page">
        <?php require_once("views/topmenu.php");?>
          <div class="content-wrapper">
            <div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold py-3 mb-4">Ирцийн мэдээлэл</h4>
              <div class="card" style="padding:30px;">
              <div class="container-fluid">
                <div class="block-header">
                <?php
                $id = $_GET['id'];
                $query = mysqli_query($conn,"select *from sector where id = $id") or die (mysqli_error());
                $data = mysqli_fetch_array($query);
                ?>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a style="color:#666666; text-decoration: none;" href="<?=$path?>/lesson">Бүлгийн бүртгэл</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><a style="color:#666666; text-decoration: none;" href=""><?=$data['name']?> бүлгийн ирц оруулах</a></li>
                    </ol>
                </nav>
                </div>
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="body">
                        <div class="table-responsive">
                                <?php include 'calendar_drawing.php';?>
                        </div>
                        </div>
                        </div>
                    </div>
                </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

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
  </body>
</html>
