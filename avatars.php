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
 if (isset($_GET["action"])) $action=$_GET["action"]; else $action="list";

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
                    <a href="?action=list" class="btn btn-primary waves-effect waves-light">Бүгд</a>
                    <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split waves-effect waves-light" data-bs-toggle="dropdown" aria-expanded="false"></button>
                    <div class="dropdown-menu">
                    <a class="dropdown-item" href="?action=new">Шинэ нэмэх</a>
                    </div>
                </div>
            </div>
            <? 
                if ($action=="list")
                {
                    ?>
                    <section id="basic-datatable">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">

                                    <table class="datatables-basic table">
                                    <thead>
                                        <tr>
                                        <th class="wd-5p">№</th>
                                        <th class="wd-30p">Зураг</th>
                                        <th class="wd-10p">Жагсаалтын эрэмбэ</th>
                                        <th class="wd-5p">-</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?
                                        $count =1;
                                        $sql = "SELECT *FROM avatars ORDER BY dd";
                                        $result = mysqli_query($conn,$sql);
                                        if (mysqli_num_rows($result)>0)
                                        {
                                        while ($data = mysqli_fetch_array($result))
                                        {

                                            ?>
                                            <tr>
                                            <td><?=$count++;?></td>
                                            <td><img src="../<?=$data["avatar"];?>" style="height: 30px; width:30px;"></td>
                                            <td><?=$data["dd"];?></td>
                                            <td class="tx-18">
                                                <div class="btn-group">
                                                    <a href="avatars?action=edit&id=<?=$data["id"];?>"  class="btn btn-success btn-icon btn-sm" title="Засах"><i class="fa fa-edit"></i></a>
                                                </div>
                                            </td>
                                            </tr>
                                            <?
                                        }
                                        }
                                        ?>
                                    </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>                   
                    </section>
                    <?
                }
                ?>

                <?
                if ($action == "detail")
                {
                    $id = $_GET["id"];
                  
                            $sql = "SELECT *FROM avatars WHERE id='$id'";
                            $result = mysqli_query($conn,$sql);
                            if (mysqli_num_rows($result)==1)
                            {
                                $data = mysqli_fetch_array($result);                            
                                $avatar_title = $data["title"];
                                $avatar_description = $data["description"];
                                $avatar_link = $data["link"];
                                $avatar_image = $data["image"];

                                ?>
                                <div class="blog-detail-wrapper">
                                    <div class="row">
                                        <!-- Blog -->
                                        <div class="col-12">
                                            <div class="card">
                                                <img src="../<?=$avatar_image;?>" class="img-fluid card-img-top" alt="<?=$avatar_title;?>" />
                                                <div class="card-body">
                                                    <h4 class="card-title"><?=$avatar_title;?></h4>
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
                                                       <?=$avatar_description;?>
                                                    </p>
                                                    
                                                    
                                                    
                                                    
                                                </div>
                                            </div>
                                        </div>
                                       
                                        
                                    </div>
                                </div>
                                <div class="btn-group">
                                    <a href="avatars?action=edit&id=<?=$id;?>" class="btn btn-success">Засах</a>
                                    <a href="avatars?action=grid" class="btn btn-primary">Бүх зураг</a>
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
                    $id = $_GET["id"];
                    $sql = "SELECT *FROM avatars WHERE id='$id'";
                    $result = mysqli_query($conn,$sql);
                    if (mysqli_num_rows($result)==1)
                    {
                        $data = mysqli_fetch_array($result);
                        $avatar_dd = $data["dd"];
                        $avatar_image = $data["avatar"];

                        ?>
                        <section id="input-group-basic">
                            <form action="avatars?action=editing" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="id" value="<?=$id;?>">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="card">
                                            <div class="card-header">
                                                <h4 class="card-title">Аватар зураг</h4>
                                            </div>
                                            <div class="card-body">
                                                <?
                                                if ($avatar_image<>"")
                                                {
                                                    ?>
                                                    <img src="../<?=$avatar_image;?>" class="mb-2">
                                                    <?
                                                    
                                                }
                                                ?>
                                                <input type="file" class="form-control mb-2" name="image"/>


                                                <div class="input-group mb-2">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon-search1"><i class="fa-light fa-list-ol"></i></span>
                                                    </div>
                                                    <input type="text" class="form-control" name="dd" placeholder="Жагсаалтын эрэмбэ" value="<?=$avatar_dd;?>" />
                                                </div>

                                            </div>

                                        </div>

                                        <button type="submit" class="btn btn-success waves-effect waves-float waves-light mt-1">Хадгалах</button>

                                    </div>

                                
                                
                                </div>
                            </form>
                        </section>
                        <a class="btn btn-danger waves-effect waves-float waves-light mt-1" href="avatars?action=delete&id=<?=$id;?>">Устгах</a>

                    <?
                    }
                    else header("location:avatars?action=grid");
                }
                ?>


                <?
                if ($action=="editing")
                {
                    $dd = $_POST["dd"];
                    $image = $_POST["title"];
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
                                $sql = "SELECT image FROM avatars WHERE id='$id'";
                                $result = mysqli_query($conn,$sql);
                                $avatars = mysqli_fetch_array($result);
                                $old_image = $avatars["image"];
                                if (file_exists('../'.$old_image)) unlink('../'.$old_image);
                                $sql = "UPDATE avatars SET image='$target_file' WHERE id='$id'";
                                mysqli_query($conn,$sql);
        
                            }
                    }

                    $sql = "UPDATE avatars SET title='$title',description='$description',link='$link',dd='$dd' WHERE id='$id'";


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
                    <a class="btn btn-success" href="avatars?action=edit&id=<?=$id;?>">Засах</a>
                    <a class="btn btn-primary" href="avatars?action=detail&id=<?=$id;?>">Дэлгэрэнгүй</a>
                    <a class="btn btn-primary" href="avatars?action=grid">Бүх зураг</a>
                    <?
                    
                }
                ?>

                <?
                if ($action=="new")
                {
                    ?>
                        <section id="input-group-basic">
                            <form action="avatars?action=adding" method="post" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="card">
                                            <div class="card-header">
                                                <h4 class="card-title">Аватар зураг</h4>
                                            </div>
                                            <div class="card-body">
                                                <input type="file" class="form-control mb-2" name="avatar"/>

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
                    $dd = intval($_POST["dd"]);

                    $avatar = "";
                    if(isset($_FILES['avatar']) && $_FILES['avatar']['name']!="")
                    {
                        if ($_FILES['avatar']['name']!="")
                            {                        
                                @$folder = date("Ym");
                                if(!file_exists('../uploads/'.$folder))
                                mkdir ( '../uploads/'.$folder);
                                $target_dir = '../uploads/'.$folder;
                                $target_file = $target_dir."/".@date("his").rand(0,1000). basename($_FILES["avatar"]["name"]);
                                move_uploaded_file($_FILES['avatar']['tmp_name'], $target_file);
                                $avatar= substr($target_file,3);        
                            }
                    }
                    $sql = "INSERT INTO avatars (avatar,dd)  VALUES ('$avatar','$dd')";

                    if (mysqli_query($conn,$sql))
                    {
                        $id  = mysqli_insert_id ($conn);
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
                    <a class="btn btn-success" href="avatars?action=edit&id=<?=$id;?>">Засах</a>
                    <a class="btn btn-primary" href="avatars?action=list">Бүх зураг</a>
                    <?
                    
                }
                ?>

                
                <?
                if ($action=="delete")
                {
                    $id = $_GET["id"];
                    $sql = "SELECT *FROM avatars WHERE id='$id'";
                    $result = mysqli_query($conn,$sql);
                    if (mysqli_num_rows($result)==1)
                    {
                        $data = mysqli_fetch_array($result);
                        $avatar_image = $data["avatar"];
                        $avatar_dd = $data["dd"];

                        $sql = "DELETE FROM avatars WHERE id='$id'";
                        if (mysqli_query($conn,$sql))
                        {
                            if (file_exists('../'.$avatar_image)) unlink('../'.$avatar_image);
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
                        <a class="btn btn-primary" href="avatars?action=grid">Бүх зураг</a>
                        <?
                    }
                    else header("location:avatars?action=grid");
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