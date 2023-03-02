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
                        <div class="dropdown-menu" style="">
                        <a class="dropdown-item" href="?action=new">Шинэ асуулт</a>
                        </div>
                    </div>
                </div>
                
                <? 
                if ($action=="list")
                {
                    ?><!-- Basic table -->
                    <section id="basic-datatable">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">

                                    <table class="datatables-basic table">
                                    <thead>
                                        <tr>
                                        <th class="wd-5p">№</th>
                                        <th class="wd-30p">Асуулт</th>
                                        <th class="wd-10p">Хариулт</th>
                                        <th class="wd-5p">-</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?
                                        $count =1;
                                        $sql = "SELECT *FROM faqs ORDER BY dd";
                                        $result = mysqli_query($conn,$sql);
                                        if (mysqli_num_rows($result)>0)
                                        {
                                        while ($data = mysqli_fetch_array($result))
                                        {

                                            ?>
                                            <tr>
                                            <td><?=$count++;?></td>
                                            <td><?=$data["question"];?></td>
                                            <td><?=$data["answer"];?></td>
                                            <td class="tx-18">
                                                <div class="btn-group">
                                                    <a href="faqs?action=edit&id=<?=$data["id"];?>"  class="btn btn-success btn-icon btn-sm" title="Засах"><i class="fa fa-edit"></i></a>
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
                    <!--/ Basic table -->
                    <?
                }
                ?>

                <?
                if ($action=="edit")
                {
                    $faq_id = $_GET["id"];
                    $sql = "SELECT *FROM faqs WHERE id=$faq_id LIMIT 1";
                    $result = mysqli_query($conn,$sql);
                    if (mysqli_num_rows($result)==1)
                    {
                        $data = mysqli_fetch_array($result);
                        ?>
                       
                        <section id="input-group-basic">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="card">
                                        <div class="card-header">
                                            <h4 class="card-title">Засах</h4>
                                        </div>
                                        <div class="card-body">
                                            <form action="faqs?action=editing" method="post" enctype="multipart/form-data">
                                                <input type="hidden" name="id" value="<?=$data["id"];?>">
                                                <div class="media-list mg-t-25">
                                                    <div class="media">
                                                        <div class="media-body mg-l-15 mt-3">
                                                            <h6 class="tx-14 tx-gray-700">Асуулт</h6>
                                                            <input type="text" name="question" value="<?=$data["question"];?>" class="form-control">
                                                        </div>
                                                    </div>


                                                    <div class="media">
                                                        <div class="media-body mg-l-15 mt-3">
                                                            <h6 class="tx-14 tx-gray-700">Хариулт</h6>
                                                            <input type="text" name="answer" value="<?=$data["answer"];?>" class="form-control">
                                                        </div>
                                                    </div>
                                                </div><!-- media-list -->
                                                                                                    
                                                <div class="btn-group mt-3">
                                                    <button type="submit" class="btn btn-success">Хадгалах</button>
                                                    <a href="faqs" class="btn btn-primary"> Буцах</a>
                                                    <a href="faqs?action=delete&id=<?=$faq_id;?>" class="btn btn-danger"> Устгах</a>

                                                </div>
                                            </form>                                       
                                        </div>
                                    </div>
                                </div>
                            
                            
                            </div>
                        </section>
                        <?
                    }
                }
                ?>


                <?
                if ($action=="editing")
                {
                      if (isset($_POST["id"])) $faq_id=$_POST["id"]; else header("location:faqs");
                 
                      $question = $_POST["question"];
                      $answer = $_POST["answer"];

                      $sql = "UPDATE faqs SET question='$question',answer='$answer' WHERE id=$faq_id LIMIT 1";
                       //  echo $sql;
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
                      <div class="btn-group">
                        <a href="faqs?action=edit&id=<?=$faq_id;?>" class="btn btn-success"><i class="icon ion-edit"></i> Засах</a>
                        <a href="faqs" class="btn btn-primary"><i class="icon ion-ios-list"></i> Буцах</a>
                      </div>   
                      <?                                 
                }
                ?>

                <?
                if ($action=="new")
                {
                    ?>
                       
                        <section id="input-group-basic">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="card">
                                        <div class="card-header">
                                            <h4 class="card-title">ҮҮсгэх</h4>
                                        </div>
                                        <div class="card-body">
                                            <form action="faqs?action=adding" method="post" enctype="multipart/form-data">
                                                <div class="media-list mg-t-25">
                                                    <div class="media">
                                                        <div class="media-body mg-l-15 mt-3">
                                                            <h6 class="tx-14 tx-gray-700">Асуулт</h6>
                                                            <input type="text" name="question" value="" class="form-control" placeholder="Асуулт">
                                                        </div>
                                                    </div>


                                                    <div class="media">
                                                        <div class="media-body mg-l-15 mt-3">
                                                            <h6 class="tx-14 tx-gray-700">Хариулт</h6>
                                                            <input type="text" name="answer" class="form-control" placeholder="Хариулт">
                                                        </div>
                                                    </div>
                                                </div><!-- media-list -->
                                                                                                    
                                                <div class="btn-group mt-3">
                                                    <button type="submit" class="btn btn-success">Хадгалах</button>
                                                    <a href="faqs" class="btn btn-primary"><i class="icon ion-ios-list"></i> Буцах</a>
                                                </div>
                                            </form>                                       
                                        </div>
                                    </div>
                                </div>
                            
                            
                            </div>
                        </section>
                        <?
                 
                }
                ?>

                <?
                if ($action=="adding")
                {
                 
                      $question = $_POST["question"];
                      $answer = $_POST["answer"];

                      $sql = "INSERT INTO faqs (question,answer) VALUES('$question','$answer')";
                       //  echo $sql;
                      if (mysqli_query($conn,$sql))
                        {
                          ?>
                           <div class="alert alert-success" role="alert">
                                <div class="alert-body">
                                Амжилттай үүсгэлээ
                                </div>
                            </div>
                          <?
                        }
                        else 
                        {
                          ?>
                          <div class="alert alert-danger" role="alert">
                            <div class="alert-body">
                               Алдаа гарлаа.
                            </div>
                        </div>
                          <?
                        }

                      ?>                            
                      <div class="btn-group">
                        <a href="faqs?action=edit&id=<?=$faq_id;?>" class="btn btn-success"><i class="icon ion-edit"></i> Засах</a>
                        <a href="faqs" class="btn btn-primary"><i class="icon ion-ios-list"></i> Буцах</a>
                      </div>   
                      <?                                 
                }
                ?>

                <?
                if ($action=="delete")
                {
                    $faq_id = $_GET["id"];
                    $sql = "SELECT *FROM faqs WHERE id=$faq_id LIMIT 1";
                    $result = mysqli_query($conn,$sql);
                    if (mysqli_num_rows($result)==1)
                    {
                        $sql = "DELETE FROM faqs WHERE id=$faq_id LIMIT 1";
                        //  echo $sql;
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
                                Алдаа гарлаа. 
                             </div>
                         </div>
                           <?
                         }
 
                       ?>                            
                       <div class="btn-group">
                         <a href="faqs" class="btn btn-primary"><i class="icon ion-ios-list"></i> Буцах</a>
                       </div>   
                       <?                                 
                    }
                    else 
                    header("location:faqs");
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