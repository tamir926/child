<?
require_once("config.php");
require_once("views/helper.php");
require_once("views/login_check.php");
require_once("views/init.php");
?>
<?
 $g_logged_name = $_SESSION['admin_name'];
 $g_logged_avatar = $_SESSION['admin_avatar'];
 $g_logged = $_SESSION['admin_logged'];
 $g_logged_timestamp = $_SESSION['admin_timestamp'];
 if (isset($_GET["action"])) $action=$_GET["action"]; else $action="grid";

 ?>
<body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <!-- Menu -->

        <? require_once("views/sidemenu.php");?>
        <!-- / Menu -->

        <!-- Layout container -->
        <div class="layout-page">
          <!-- Navbar -->

          <? require_once("views/topmenu.php");?>

          <!-- / Navbar -->

          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">

            <div class="d-flex flex-row-reverse mb-3">
                <div class="btn-group pull-right">
                    <a href="?action=grid" class="btn btn-primary waves-effect waves-light">Бүгд</a>
                    <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split waves-effect waves-light" data-bs-toggle="dropdown" aria-expanded="false"></button>
                    <div class="dropdown-menu" style="">
                    <a class="dropdown-item" href="?action=new">Шинэ нэмэх</a>
                    </div>
                </div>
            </div>
            <? 
                if ($action=="grid")
                {
                    ?>
                    <section id="card-demo-example">
                        <div class="row match-height">
                            <?
                            
                            $sql = "SELECT * FROM tutorials";

                            $result = mysqli_query($conn,$sql);
                            while ($data = mysqli_fetch_array($result))
                            {
                                $tutorial_id = $data["tutorial_id"];
                                $tutorial_title = $data["title"];
                                $tutorial_description = $data["description"];
                                $tutorial_link = $data["link"];
                                $tutorial_image = $data["image"];
                               
                                ?>
                                <div class="col-md-6 col-12">
                                    <div class="card">
                                        <a href="tutorial?action=detail&id=<?=$tutorial_id;?>">
                                            <img class="card-img-top img-fluid" src="../<?=$tutorial_image;?>" alt="<?=$tutorial_title;?>" />
                                        </a>
                                        <div class="card-body">
                                            <h4 class="card-title">
                                                <a href="tutorial?action=detail&id=<?=$tutorial_id;?>" class="blog-title-truncate text-body-heading"><?=$tutorial_title;?></a>
                                            </h4>
                                            <div class="media">
                                                <div class="avatar mr-50">
                                                    <img src="../<?=$g_logged_avatar;?>" alt="Avatar" width="24" height="24" />
                                                </div>
                                                <div class="media-body">
                                                    <small class="text-muted mr-25">Оруулсан: </small>
                                                    <small><?=$g_logged_name;?></small>
                                                    <span class="text-muted ml-50 mr-25">|</span>
                                                </div>
                                            </div>
                                            
                                            <p class="card-text blog-content-truncate mt-2">
                                                <?=$tutorial_description;?>
                                            </p>
                                            <hr />
                                            <div class="d-flex justify-content-between align-items-center">
                                                

                                                <a href="tutorial?action=detail&id=<?=$tutorial_id;?>" class="font-weight-bold">Дэлгэрэнгүй</a>
                                                <a href="tutorial?action=edit&id=<?=$tutorial_id;?>" class="font-weight-bold text-success">Засах</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?
                            }
                            ?>
                        </div>
                    </section>
                    <?
                }
                ?>

                <?
                if ($action == "detail")
                {
                    $tutorial_id = $_GET["id"];
                  
                            $sql = "SELECT *FROM tutorials WHERE tutorial_id='$tutorial_id'";
                            $result = mysqli_query($conn,$sql);
                            if (mysqli_num_rows($result)==1)
                            {
                                $data = mysqli_fetch_array($result);                            
                                $tutorial_title = $data["title"];
                                $tutorial_description = $data["description"];
                                $tutorial_link = $data["link"];
                                $tutorial_image = $data["image"];

                                ?>
                                <div class="blog-detail-wrapper">
                                    <div class="row">
                                        <!-- Blog -->
                                        <div class="col-12">
                                            <div class="card">
                                                <img src="../<?=$tutorial_image;?>" class="img-fluid card-img-top" alt="<?=$tutorial_title;?>" />
                                                <div class="card-body">
                                                    <h4 class="card-title"><?=$tutorial_title;?></h4>
                                                    <div class="media">
                                                        <div class="avatar mr-50">
                                                            <img src="../<?=$admin_avatar;?>" alt="Avatar" width="24" height="24" />
                                                        </div>
                                                        <div class="media-body">
                                                            <small class="text-muted mr-25">by</small>
                                                            <small><a href="javascript:void(0);" class="text-body"><?=$admin_name;?></a></small>
                                                            <span class="text-muted ml-50 mr-25">|</span>
                                                        </div>
                                                    </div>
                                                  
                                                    <p class="card-text mb-2 news-body">
                                                       <?=$tutorial_description;?>
                                                    </p>
                                                    
                                                    
                                                    
                                                    
                                                </div>
                                            </div>
                                        </div>
                                       
                                        
                                    </div>
                                </div>
                                <div class="btn-group">
                                    <a href="tutorial?action=edit&id=<?=$tutorial_id;?>" class="btn btn-success">Засах</a>
                                    <a href="tutorial?action=grid" class="btn btn-primary">Бүх зураг</a>
                                </div>
                                <?
                            }
                            else 
                            {
                                ?>
                                <div class="alert alert-danger" role="alert">
                                    <div class="alert-body">
                                    Зураг олдсонгүй
                                    </div>
                                </div>
                                <?
                            }
                }
                ?>

                <?
                if ($action=="edit")
                {
                    $tutorial_id = $_GET["id"];
                    $sql = "SELECT *FROM tutorials WHERE tutorial_id='$tutorial_id'";
                    $result = mysqli_query($conn,$sql);
                    if (mysqli_num_rows($result)==1)
                    {
                        $data = mysqli_fetch_array($result);
                        $tutorial_title = $data["title"];
                        $tutorial_description = $data["description"];
                        $tutorial_link = $data["link"];
                        $tutorial_image = $data["image"];
                        $tutorial_dd = $data["dd"];

                       

                        ?>
                        <section id="input-group-basic">
                            <form action="tutorial?action=editing" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="tutorial_id" value="<?=$tutorial_id;?>">

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="card">
                                            <div class="card-header">
                                                <h4 class="card-title">Зураг</h4>
                                            </div>
                                            <div class="card-body">
                                                <?
                                                if ($tutorial_image<>"")
                                                {
                                                    ?>
                                                    <img src="../<?=$tutorial_image;?>" style="max-width:100%;" class="mb-2">
                                                    <?
                                                    
                                                }
                                                ?>
                                                <input type="file" class="form-control mb-2" name="image"/>

                                                <div class="input-group mb-2">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon-search1"><i class="fa fa-home"></i></span>
                                                    </div>
                                                    <input type="text" class="form-control" name="title" value="<?=$tutorial_title;?>" placeholder="Нэр..." />
                                                </div>

                                                <div class="input-group mb-2">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon-search1"><i class="fa fa-pen-to-square"></i></span>
                                                    </div>
                                                    <textarea class="form-control"  name="description"><?=$tutorial_description;?></textarea>
                                                </div>

                                                <div class="input-group mb-2">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon-search1"><i class="fa fa-home"></i></span>
                                                    </div>
                                                    <input type="text" class="form-control" name="link" value="<?=$tutorial_link;?>" placeholder="Линк" />
                                                </div>

                                                <div class="input-group mb-2">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon-search1"><i class="fa-light fa-list-ol"></i></span>
                                                    </div>
                                                    <input type="text" class="form-control" name="dd" placeholder="Жагсаалтын эрэмбэ" value="<?=$tutorial_dd;?>" />
                                                </div>

                                            </div>

                                        </div>

                                        <input type="submit" class="btn btn-success waves-effect waves-float waves-light mt-1" value="Хадгалах">

                                    </div>

                                
                                
                                </div>
                            </form>
                        </section>
                        <a class="btn btn-danger waves-effect waves-float waves-light mt-1" href="tutorial?action=delete&id=<?=$tutorial_id;?>">Устгах</a>

                    <?
                    }
                    else header("location:tutorial?action=grid");
                }
                ?>


                <?
                if ($action=="editing")
                {
                    $tutorial_id = $_POST["tutorial_id"];
                    $title = $_POST["title"];
                    $description = $_POST["description"];
                    $link = $_POST["link"];
                    $dd = $_POST["dd"];

                    if(isset($_FILES['image']) && $_FILES['image']['name']!="")
                    {
                        if ($_FILES['image']['name']!="")
                            {                        
                                @$folder = date("Ym");
                                if(!file_exists('../uploads/'.$folder))
                                mkdir ( '../uploads/'.$folder);
                                $target_dir = '../uploads/'.$folder;
                                $target_file = $target_dir."/".@date("his").rand(0,1000). basename($_FILES["image"]["name"]);
                                move_uploaded_file($_FILES['image']['tmp_name'], $target_file);
                                $target_file= substr($target_file,3);
                                $sql = "SELECT image FROM tutorial WHERE tutorial_id='$tutorial_id'";
                                $result = mysqli_query($conn,$sql);
                                $tutorial = mysqli_fetch_array($result);
                                $old_image = $tutorial["image"];
                                if (file_exists('../'.$old_image)) unlink('../'.$old_image);
                                $sql = "UPDATE tutorials SET image='$target_file' WHERE tutorial_id='$tutorial_id'";
                                mysqli_query($conn,$sql);
        
                            }
                    }

                    $sql = "UPDATE tutorials SET title='$title',description='$description',link='$link',dd='$dd' WHERE tutorial_id='$tutorial_id'";


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
                    <a class="btn btn-success" href="tutorial?action=edit&id=<?=$tutorial_id;?>">Засах</a>
                    <a class="btn btn-primary" href="tutorial?action=detail&id=<?=$tutorial_id;?>">Дэлгэрэнгүй</a>
                    <a class="btn btn-primary" href="tutorial?action=grid">Бүх зураг</a>
                    <?
                    
                }
                ?>

                <?
                if ($action=="new")
                {
                    ?>
                        <section id="input-group-basic">
                            <form action="tutorial?action=adding" method="post" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="card">
                                            <div class="card-header">
                                                <h4 class="card-title">Зураг</h4>
                                            </div>
                                            <div class="card-body">
                                              
                                                <input type="file" class="form-control mb-2" name="image"/>

                                                <div class="input-group mb-2">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon-search1"><i class="fa fa-home"></i></span>
                                                    </div>
                                                    <input type="text" class="form-control" name="title" placeholder="Нэр..." />
                                                </div>

                                                <div class="input-group mb-2">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon-search1"><i class="fa fa-align-left"></i></span>
                                                    </div>
                                                    <textarea class="form-control"  name="description"></textarea>
                                                </div>

                                                <div class="input-group mb-2">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon-search1"><i class="fa fa-home"></i></span>
                                                    </div>
                                                    <input type="text" class="form-control" name="link" placeholder="Линк" />
                                                </div>

                                                <div class="input-group mb-2">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon-search1"><i class="fa fa-list-ol"></i></span>
                                                    </div>
                                                    <input type="text" class="form-control" name="dd" placeholder="Жагсаалтын эрэмбэ" value="0" />
                                                </div>

                                            </div>

                                        </div>

                                        <button type="submit" class="btn btn-success waves-effect waves-float waves-light mt-1">Хадгалах</button>

                                    </div>

                                
                                
                                </div>
                            </form>
                        </section>
                    <?
                }
                ?>


                <?
                if ($action=="adding")
                {
                    $title = $_POST["title"];
                    $description = $_POST["description"];
                    $link = $_POST["link"];
                    $dd = $_POST["dd"];

                    if(isset($_FILES['image']) && $_FILES['image']['name']!="")
                    {
                        if ($_FILES['image']['name']!="")
                            {                        
                                @$folder = date("Ym");
                                if(!file_exists('../uploads/'.$folder))
                                mkdir ( '../uploads/'.$folder);
                                $target_dir = '../uploads/'.$folder;
                                $target_file = $target_dir."/".@date("his").rand(0,1000). basename($_FILES["image"]["name"]);
                                move_uploaded_file($_FILES['image']['tmp_name'], $target_file);
                                $image= substr($target_file,3);        
                            }
                    }
                    $sql = "INSERT INTO tutorials (title,description,link,image,dd)  VALUES ('$title','$description','$link','$image','$dd')";

                    if (mysqli_query($conn,$sql))
                    {
                        $tutorial_id  = mysqli_insert_id ($conn);
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
                    <a class="btn btn-success" href="tutorial?action=edit&id=<?=$tutorial_id;?>">Засах</a>
                    <a class="btn btn-primary" href="tutorial?action=detail&id=<?=$tutorial_id;?>">Дэлгэрэнгүй</a>
                    <a class="btn btn-primary" href="tutorial?action=grid">Бүх зураг</a>
                    <?
                    
                }
                ?>

                
                <?
                if ($action=="delete")
                {
                    $tutorial_id = $_GET["id"];
                    $sql = "SELECT *FROM tutorials WHERE tutorial_id='$tutorial_id'";
                    $result = mysqli_query($conn,$sql);
                    if (mysqli_num_rows($result)==1)
                    {
                        $data = mysqli_fetch_array($result);
                        $tutorial_title = $data["title"];
                        $tutorial_description = $data["description"];
                        $tutorial_link = $data["link"];
                        $tutorial_image = $data["image"];

                        $sql = "DELETE FROM tutorials WHERE tutorial_id='$tutorial_id'";
                        if (mysqli_query($conn,$sql))
                        {
                            if (file_exists('../'.$tutorial_image)) unlink('../'.$tutorial_image);
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
                        <a class="btn btn-primary" href="tutorial?action=grid">Бүх зураг</a>
                        <?
                    }
                    else header("location:tutorial?action=grid");
                }
                ?>
            </div>
            <!-- / Content -->

            <? require_once("views/footer.php");?>

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