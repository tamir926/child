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
          <h4 class="fw-bold py-3 mb-4">Хүний нөөцийн мэдээлэл</h4>
          <div class="card"><br/>
          <?php if(isset($_GET['t']))
          {
            $select_tab = $_GET['t'];
          }
          else
          {
            $select_tab = 'home';
          }
          ?>
          <?php
          if(isset($_GET['id']))
          {
          $id = $_GET['id'];
          $query = mysqli_query($conn,"select b.id , img , name, b.fname, b.role role_id, b.lname, job_name, b.salary from job a, employer b , branch c where b.brchno = c.id and b.role = a.id and b.id=$id") or die (mysqli_error());
          $data = mysqli_fetch_array($query);
          $image = $data['img'];
          $img = explode("/", $image);
          if(!empty($img[3]))
          {
              $zurag=$path.substr($image,2,999);
          }
          else 
          {
              $zurag=$path.'assets/img/noimage.png';
          }
          ?>
          <table class="table">
            <tr>
              <td><img src="<?=$zurag?>" style="width:60px;"></td>
              <td>Салбар</td><td><input type="text" class="form-control" value="<?=$data['name']?>" disabled></td>
              <td>Овог нэр</td><td><input type="text" class="form-control" value="<?=$data['lname'].'-'.$data['fname']?>" disabled></td>
            </tr>
          </table>
          <!------------------------------------------------>
          <div class="nav-align-top nav-tabs-shadow mb-4">
            <ul class="nav nav-tabs" style="width:100%; margin-top:20px; margin-left:auto; margin-right:auto;" role="tablist">
              <li class="nav-item">
                <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab" data-bs-target="#navs-top-home" aria-controls="navs-top-home" aria-selected="true">
                  Хувийн хэрэг
                </button>
              </li>
              <li class="nav-item">
                <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-top-profile" aria-controls="navs-top-profile" aria-selected="false">
                  Гэр бүлийн байдал
                </button>
              </li>
              <li class="nav-item">
                <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-top-messages" aria-controls="navs-top-messages" aria-selected="false">
                  Боловсрол
                </button>
              </li>
              <li class="nav-item">
                <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-top-irts" aria-controls="navs-top-irts" aria-selected="false">
                  Ажлын туршлага
                </button>
              </li>
              <li class="nav-item">
                <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-top-history" aria-controls="navs-top-history" aria-selected="false">
                  Ур чадвар
                </button>
              </li>
              <li class="nav-item">
                <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-top-award" aria-controls="navs-top-award" aria-selected="false">
                  Шагнал
                </button>
              </li>
              <li class="nav-item">
                <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-top-kpi" aria-controls="navs-top-kpi" aria-selected="false">
                  Ажлын гүйцэтгэлийн үнэлгээ
                </button>
              </li>
              <li class="nav-item">
                <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-top-asset" aria-controls="navs-top-asset" aria-selected="false">
                  Бүртгэлтэй хөрөнгө
                </button>
              </li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane fade show active" id="navs-top-home" role="tabpanel">
                <?php require_once 'emp/add_home.php';?>
              </div>
              <div class="tab-pane fade" id="navs-top-profile" role="tabpanel">
                <?php 
                    if(isset($_GET['id']))
                    { 
                      require_once 'emp/edit_family.php'; 
                    }
                        
                ?>
              </div>
              <div class="tab-pane fade" id="navs-top-messages" role="tabpanel">
                <?php /*require_once 'emp/education.php';*/ ?>
              </div>
              <div class="tab-pane fade" id="navs-top-irts" role="tabpanel">
                <?php include 'emp/job_history.php'; ?>
              </div>
              <div class="tab-pane fade" id="navs-top-history" role="tabpanel">
                <?php include 'emp/skill.php'; ?> 
              </div>
              <div class="tab-pane fade" id="navs-top-award" role="tabpanel">
                <?php include 'emp/award.php'; ?> 
              </div>
              <div class="tab-pane fade" id="navs-top-kpi" role="tabpanel">
                <?php include 'emp/kpi.php'; ?> 
              </div>
              <div class="tab-pane fade" id="navs-top-asset" role="tabpanel">
                <?php include 'emp/asset.php'; ?> 
              </div>
                    </div>
                  </div>
          <!------------------------------------------------>
          <?php 
          }
          ?>
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
    <script src="<?=$path?>assets/vendor/libs/formvalidation/dist/js/FormValidation.min.js"></script>
    <script src="<?=$path?>assets/vendor/libs/formvalidation/dist/js/plugins/Bootstrap5.min.js"></script>
    <script src="<?=$path?>assets/vendor/libs/formvalidation/dist/js/plugins/AutoFocus.min.js"></script>
    <script src="<?=$path?>assets/js/main.js"></script>
  </body>
</html>
