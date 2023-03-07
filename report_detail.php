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
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              
              <!-- Examples -->
                <?
                if ($action == "detail")
                {
                    $report_id = $_GET["id"];
                    ?>
                    <?
                        $sql = "SELECT *FROM report WHERE id='$report_id'";
                        $result = mysqli_query($conn,$sql);
                        while ($data = mysqli_fetch_array($result))
                        {
                            // $data = mysqli_fetch_array($result);
                            $report_id = $data["id"];
                            $report_dd = $data["dd"];
                            // $report_teacher = $data["teacher"];
                            
                            $report_image = $data["image"];
                            $report_report = $data["report"];
                            ?>
                            <h4 class="fw-bold py-3 mb-1 ">
                                <span class="text-muted fw-light">Тайлан бичсэн багш/</span> <?=$data["teacher"];?>
                            </h4>
                            <a class="btn btn-outline-success mb-3" href="report_detail?action=edit&id=<?=$report_id;?>">Засах</a>
                            <a class="btn btn-outline-danger mb-3" href="report?action=delete&id=<?=$report_id;?>">Устгах</a>
                            <div class="col-xl-12">
                                <div class="card">
                                <h5 class="card-header"><?=$data["dd"];?>. <?=$data["report"];?></h5>
                                <div class="card-body">
                                    <div class="row">
                                    <div class="col-md mb-md-0 mb-2">
                                        <div class="form-check custom-option custom-option-image custom-option-image-radio">
                                        <label class="form-check-label custom-option-content" for="customRadioImg1">
                                            <span class="custom-option-body">
                                            <img src="./assets/img/backgrounds/speaker.png" alt="radioImg" />
                                            </span>
                                        </label>
                                        <input
                                            name="customRadioImage"
                                            class="form-check-input"
                                            type="radio"
                                            value="customRadioImg1"
                                            id="customRadioImg1"
                                            checked
                                        />
                                        </div>
                                    </div>
                                    <div class="col-md mb-md-0 mb-2">
                                        <div class="form-check custom-option custom-option-image custom-option-image-radio">
                                        <label class="form-check-label custom-option-content" for="customRadioImg2">
                                            <span class="custom-option-body">
                                            <img src="./assets/img/backgrounds/airpods.png" alt="radioImg" />
                                            </span>
                                        </label>
                                        <input
                                            name="customRadioImage"
                                            class="form-check-input"
                                            type="radio"
                                            value="customRadioImg2"
                                            id="customRadioImg2"
                                        />
                                        </div>
                                    </div>
                                    <div class="col-md">
                                        <div class="form-check custom-option custom-option-image custom-option-image-radio">
                                        <label class="form-check-label custom-option-content" for="customRadioImg3">
                                            <span class="custom-option-body">
                                            <img src="./assets/img/backgrounds/headphones.png" alt="radioImg" />
                                            </span>
                                        </label>
                                        <input
                                            name="customRadioImage"
                                            class="form-check-input"
                                            type="radio"
                                            value="customRadioImg3"
                                            id="customRadioImg3"
                                        />
                                        </div>
                                    </div>
                                    </div>
                                </div>
                                </div>
                            </div>

                            <?
                        }
                        ?>
                        <?
                }
                ?>



                <?
                if ($action=="edit")
                {
                    $report_id = $_GET["id"];
                    $sql = "SELECT *FROM report WHERE id='$report_id'";
                    $result = mysqli_query($conn,$sql);
                    if (mysqli_num_rows($result)==1)
                    {
                        $data = mysqli_fetch_array($result);
                        $report_dd = $data["dd"];
                        // $report_teacher = $data["teacher"];
                        
                        $report_image = $data["image"];
                        $report_years = $data["years"];
                        $report_month = $data["month"];

                        ?>

                        <?
                    }
                    ?>
                    <form action="report_detail?action=editing" method="post"  enctype="multipart/form-data">
                        <h4 class="fw-bold py-3 mb-4 ">
                            <span class="text-muted fw-light">Тайлан бичсэн багш/</span> <?=$data["teacher"];?>
                        </h4>
                        <div class="col-md-12">
                            <div class="card mb-4">
                                <h5 class="card-header">Тайлан засварлах</h5>
                                <div class="card-body">
                                <input type="hidden" name="report_id" value="<?=$report_id;?>">
                                    
                                    <div class="mb-3">
                                        <label for="exampleFormControlSelect1" class="form-label">Дэс дугаар</label>
                                        <select class="form-select" id="dd" aria-label="Default select example" name="dd">
                                            <option selected><?=$data["dd"];?></option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                        </select>
                                    </div>
                                    <label for="exampleFormControlTextarea1" class="form-label">Тайлан</label>
                                    <textarea class="form-control" id="report" name="report" rows="3"><?=$data["report"];?></textarea>
                                    <div class="mb-3">
                                    <label for="exampleFormControlTextarea1" class="form-label">Он сар</label>
                                        <div class="col-md-6">
                                            <div class="card mb-4">
                                                <input
                                                type="text"
                                                class="form-control"
                                                id="defaultFormControlInput"
                                                placeholder="<?=$data["years"];?> оны"
                                                aria-describedby="defaultFormControlHelp"
                                                name="years"
                                                />
                                            </div>
                                            <div class="card mb-4">
                                                <input
                                                type="text"
                                                class="form-control"
                                                id="defaultFormControlInput"
                                                placeholder="<?=$data["month"];?> сар"
                                                aria-describedby="defaultFormControlHelp"
                                                name="month"
                                                />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="formFile" class="form-label">Зураг оруулах</label>

                                        <?
                                        if ($report_image<>"")
                                        {
                                            ?>
                                            <img src="<?=$report_image;?>" class="w-100">
                                            <?
                                            
                                        }
                                        ?>
                                        <div class="input-group">
                                            <input type="file" name="image">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <input type="submit" class="btn btn-outline-success mb-3" value="Хадгалах">
                        </div>
                    </form>    
                    <?
                }
                ?>



                <?
                if ($action=="editing")
                {
                    $report_id = $_POST["report_id"];
                    $dd = $_POST["dd"];
                    // $teacher = $_POST["teacher"];
                    $date = $_POST["years"];
                    $month = $_POST["month"];
                    $report = $_POST["report"];

                    if(isset($_FILES['image']) && $_FILES['image']['name']!="")
                    {
                        if ($_FILES['image']['name']!="")
                            {                        
                                @$folder = date("Ym");
                                if(!file_exists('uploads/'.$folder))
                                mkdir ( 'uploads/'.$folder);
                                $target_dir = 'uploads/'.$folder;
                                $target_file = $target_dir."/".@date("his").rand(0,1000). basename($_FILES["image"]["name"]);
                                move_uploaded_file($_FILES['image']['tmp_name'], $target_file);
                                $target_file= substr($target_file,3);
                                $sql = "UPDATE report SET image='$target_file' WHERE id='$report_id'";

                                mysqli_query($conn,$sql);
        
                            }
                    }

                    $sql = "UPDATE report SET dd='$dd',date='$date',years='$years',month='$month',report='$report' WHERE id='$report_id'";


                    if (mysqli_query($conn,$sql))
                    {
                        ?>
                        <div class="alert alert-success" role="alert">
                            <div class="alert-body">
                               Амжилттай засагдлаа
                            </div>
                        </div>
                        <?
                    }
                    else 
                    {
                        ?>
                        <div class="alert alert-danger" role="alert">
                            <div class="alert-body">
                               Алдаа гарлаа. <?=mysqli_error($conn);?>
                            </div>
                        </div>
                        <?
                    }
                    ?>
                    <a class="btn btn-success" href="report_detail?action=edit&id=<?=$report_id;?>">Засах</a>
                    <a class="btn btn-primary" href="report_detail?action=detail&id=<?=$report_id;?>">Дэлгэрэнгүй</a>
                    <a class="btn btn-primary" href="report">Бүх мэдээ</a>
                    <?
                    
                }
                ?>

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
