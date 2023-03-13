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
                  $content_id = $_GET["id"];
                  ?>
                  <?
                  $sql = "SELECT *FROM content WHERE id='$content_id'";
                  $result = mysqli_query($conn,$sql);
                  while ($data = mysqli_fetch_array($result))
                  {
                    $content_id = $data["id"];
                    $content_topic = $data["topic"];
                    $content_description = $data["description"];
                    $content_directions = $data["directions"];
                    $content_image = $data["image"];
                    $content_video = $data["video"];
                    $content_user = $data["user"];
              
                    ?>
                    <h4 class="fw-bold py-3 mb-4 ">
                      <span class="text-muted fw-light">Контент /</span> <?=$data["topic"];?>
                    </h4>
                    <a class="btn btn-outline-success mb-3" href="content_detail?action=edit&id=<?=$content_id;?>">Засах</a>
                    <a class="btn btn-outline-danger mb-3" href="content_detail?action=delete&id=<?=$content_id;?>">Устгах</a>

                    <div class="card mb-4">
                            <div class="card-body">
                                <div class="row">
                                <div class="col-md-6 mb-1">
                                    <div class="mb-5">
                                    <h6 class="mb-1">Сэдэв :</h6>
                                    <p><?=$data["topic"];?></p>
                                    </div>
                                    <div class="mb-5">
                                    <h6 class="mb-1">Агуулга :</h6>
                                    <p><?=$data["description"];?></p>
                                    </div>
                                    <div class="mb-5">
                                    <h6 class="mb-1">
                                        <span class="me-2">Чиглэл :</span>
                                    </h6>
                                    <p><?=$data["directions"];?></p>
                                    </div>
                                    <div class="mb-5">
                                    <h6 class="mb-1">
                                        <span class="me-2">Хэрэглэгч :</span>
                                    </h6>
                                    <p><?=$data["user"];?></p>
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
                    <?
                  }
                }
              ?>
              


              <?
              if ($action=="edit")
                {
                    $content_id = $_GET["id"];
                    $sql = "SELECT *FROM content WHERE id='$content_id'";
                    $result = mysqli_query($conn,$sql);
                    if (mysqli_num_rows($result)==1)
                    {
                        $data = mysqli_fetch_array($result);
                        $content_id = $data["id"];
                        $content_topic = $data["topic"];
                        $content_description = $data["description"];
                        $content_directions = $data["directions"];
                        $content_image = $data["image"];
                        $content_video = $data["video"];
                        $content_user = $data["user"];
                       
                        ?>

                        <?
                    }
                    ?>
                    <form action="content_detail?action=editing" method="post"  enctype="multipart/form-data">
                        <h4 class="fw-bold py-3 mb-4 ">
                            <span class="text-muted fw-light">Контент /</span> <?=$data["topic"];?>
                        </h4>
                        <div class="col-md-12">
                            <div class="card mb-4">
                            <h5 class="card-header">Контент засварлах</h5>
                                <div class="card-body">
                                    <input type="hidden" name="content_id" value="<?=$content_id;?>">
                                    <label for="exampleFormControlTextarea1" class="form-label">Сэдэв</label>
                                    <textarea class="form-control" id="report" name="topic" rows="3"><?=$data["topic"];?></textarea>
                                    <label for="exampleFormControlTextarea1" class="form-label">Агуулга</label>
                                    <textarea class="form-control" id="report" name="description" rows="3"><?=$data["description"];?></textarea>
                                    <label for="exampleFormControlTextarea1" class="form-label">Чиглэл</label>
                                    <textarea class="form-control" id="report" name="directions" rows="3"><?=$data["directions"];?></textarea>
                                    <label for="exampleFormControlTextarea1" class="form-label">Хэрэглэгч</label>
                                    <textarea class="form-control" id="report" name="user" rows="3"><?=$data["user"];?></textarea>
                                    <label for="formFile" class="form-label mt-3">Зураг оруулах</label>
                                    <?
                                    if ($content_image<>"")
                                    {
                                        ?>
                                        <img src="<?=$content_image;?>" class="w-100">
                                        <?
                                    }
                                    ?>
                                    <div class="input-group">
                                        <input type="file" name="image">
                                    </div>
                                    <label for="formFile" class="form-label mt-3">Видео оруулах</label>
                                    <?
                                    if ($content_image<>"")
                                    {
                                        ?>
                                        <img src="<?=$content_image;?>" class="w-100">
                                        <?
                                    }
                                    ?>
                                    <div class="input-group">
                                        <input type="file" name="video">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <input type="submit" class="btn btn-outline-success mb-3" value="Хадгалах">
                    </form>    
                    <?
                }
              ?>



              <?
                if ($action=="editing")
                {
                    $content_id = $_POST["content_id"];
                    $topic = $_POST["topic"];
                    $description = $_POST["description"];
                    $directions = $_POST["directions"];
                    $user = $_POST["user"];
                    

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
                                $sql = "UPDATE content SET image='$target_file' WHERE id='$content_id'";

                                mysqli_query($conn,$sql);
        
                            }
                    }

                    $sql = "UPDATE content SET topic='$topic',description='$description',directions='$directions',user='$user' WHERE id='$content_id'";


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
                    <a class="btn btn-success" href="content_detail?action=edit&id=<?=$content_id;?>">Засах</a>
                    <a class="btn btn-primary" href="content_detail?action=detail&id=<?=$content_id;?>">Дэлгэрэнгүй</a>
                    <a class="btn btn-primary" href="content">Бүх хөтөлбөр</a>
                    <?
                    
                }
              ?>



              <?
                if ($action=="delete")
                {
                    $content_id = $_GET["id"];
                    $sql = "SELECT *FROM content WHERE id='$content_id'";
                    $result = mysqli_query($conn,$sql);
                    if (mysqli_num_rows($result)==1)
                    {
                        $data = mysqli_fetch_array($result);
                        $image = $data["image"];
                        if (file_exists('./'.$image)) unlink('./'.$image);
                        $sql = "DELETE FROM content WHERE id=$content_id";
                        
                        if (mysqli_query($conn,$sql))
                        {
                            ?>
                            <div class="alert alert-success" role="alert">
                                <div class="alert-body">
                                   Амжилттай устгалаа
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
                        <a class="btn btn-primary" href="content">Жагсаалт</a>
                        <?                        
                    }
                    else header("location:content_detail");
                    
                    
                }
              ?>



              <?
                if ($action=="new")
                {
                    ?>
                    <h4 class="fw-bold py-3 mb-4 ">
                        <span class="text-muted fw-light">Шинэ контент нэмэх
                    </h4>
                    <form action="content_detail?action=adding" method="post" enctype="multipart/form-data">
                      <section id="input-group-basic">
                        <div class="row">
                          <div class="col-md-12">
                            <div class="card">
                              <div class="card mb-4">
                                  <h5 class="card-header">Контент нэмэх</h5>
                                  <div class="card-body">
                                    <input type="hidden" name="content_id" value="<?=$content_id;?>">
                                    <label for="exampleFormControlTextarea1" class="form-label">Сэдэв</label>
                                    <textarea class="form-control" id="report" name="topic" rows="3"></textarea>
                                    <label for="exampleFormControlTextarea1" class="form-label">Агуулга</label>
                                    <textarea class="form-control" id="report" name="description" rows="3"></textarea>
                                    <label for="exampleFormControlTextarea1" class="form-label">Чиглэл</label>
                                    <textarea class="form-control" id="report" name="directions" rows="3"></textarea>
                                    <label for="exampleFormControlTextarea1" class="form-label">Зорилго</label>
                                    <textarea class="form-control" id="report" name="purpose" rows="3"></textarea>
                                    <label for="exampleFormControlTextarea1" class="form-label">Хэрэглэгч</label>
                                    <textarea class="form-control" id="report" name="user" rows="3"></textarea>
                                    <label for="exampleFormControlTextarea1" class="form-label mt-3">Зураг оруулах</label>
                                    <div class="input-group mt-2">
                                      <input type="file" name="image">
                                    </div>
                                    <label for="exampleFormControlTextarea1" class="form-label mt-3">Видео оруулах</label>
                                    <div class="input-group mt-2">
                                      <input type="file" name="video">
                                    </div>
                                  </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </section>
                      <input type="submit" class="btn btn-outline-success mt-3" value="Нэмэх">
                    </form>
                    <?
                }
              ?>



              <?
                if ($action=="adding")
                {
                  $topic = $_POST["topic"];
                  $description = $_POST["description"];
                  $directions = $_POST["directions"];
                  $user = $_POST["user"];
                  $image = $_POST["image"];
                  $video = $_POST["video"];

                  $sql = "INSERT INTO content (topic,description,directions,user,image,video)  VALUES ('$topic','$description','$directions','$user','$image','$video')";

                    if (mysqli_query($conn,$sql))
                    {
                        $content_id  = mysqli_insert_id ($conn);
                        ?>
                        <div class="alert alert-success" role="alert">
                            <div class="alert-body">
                               Амжилттай үүслээ
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
                    <a class="btn btn-success" href="content_detail?action=edit&id=<?=$content_id;?>">Засах</a>
                    <a class="btn btn-primary" href="content_detail?action=detail&id=<?=$content_id;?>">Дэлгэрэнгүй</a>
                    <a class="btn btn-primary" href="content">Бүх хөтөлбөр</a>
                    <?
                    
                }
              ?>

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
