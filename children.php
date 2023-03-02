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
              <h4 class="fw-bold py-3 mb-4">Хувийн мэдээлэл</h4>
              <div class="card" style="padding:30px;">
              <?php
  			$id = $_GET['id'];
        $query = mysqli_query($conn,"select a.*   , c.discount  , b.name  from student a , sector b , 
        discount c where  a.sector = b.id and a.discount = c.id and a.id=$id") or die (mysqli_error());
  			$data = mysqli_fetch_array($query);
        $img = $data['img'];
        if(strlen($img)>0)
        {

        }
        else
        {
          $img = '../assets/img/noimage.png';
        }
  			?>
        <div class="table-responsive">
        <table class="table table-bordered">
          <tr>
            <td rowspan="8" align="center">
            <img src="<?=$img?>" width="120px" height="150px;"><br/><br/>
            <a href="<?=$path?>category/<?=$id?>" style="width:120px;" class="btn btn-danger">Засварлах</a><br/>
            <a style="margin-top:5px;" href="<?=$path?>print_child.php?id=<?=$id?>" target="_blank" style="width:120px;" class="btn btn-primary">Хэвлэх</a>
            </td>
            <td><b>Төлөв</b></td><td><?php
            switch ($data['type1'])
            {
                case 0:	echo "Сонголт хийгээгүй"; break;
            	case 1:	echo "Хэвийн"; break;
            	case 2:	echo "Гарсан"; break;
            	case 3:	echo "Өвчтэй"; break;
            	case 4:	echo "Чөлөөтэй"; break;
            	case 5:	echo "Төгссөн"; break;
            	case 6:	echo "Сургуульд орсон"; break;
            }
            ?></td>
            <td><b>Бүртгүүлсэн огноо</b></td><td><?=$data['createdate']?></td>
          </tr>
          <tr>
            <td><b>Овог</b></td><td><?=$data['surname']?></td>
            <td><b>Нэр</b></td><td><?=$data['ownname']?></td>
          </tr>
          <tr>
            <td><b>Бүлэг</b></td><td><?=$data['name']?></td>
            <td><b>Нас</b></td><td><?=$data['age']?></td>
          </tr>
          <tr>
            <td><b>Суралцсан жил</b></td><td>
                <?php 
                $query2 = mysqli_query($conn,"select *from irts where studentid = $id order by ognoo limit 1") or die (mysqli_error());
                $data2 = mysqli_fetch_array($query2);
                $irts_date = substr($data2['ognoo'],0,4);
                $now_date = date('Y');
                echo $now_date-$irts_date;
                ?>
            </td>
            <td><b>Шинжилгээ өгсөн эсэх</b></td>
            <td><?php
            switch ($data['health']) {
                case 0: echo "Бүрэн"; break;
                case 1: echo "Шээс"; break;
                case 2: echo "Цагаан хорхой"; break;
                case 3: echo "Шинжилгээ өгөөгүй"; break;
            }
            ?></td>
          </tr>
          <tr>
            <td><b>Регистерийн дугаар</b></td><td><?=$data['register']?></td>
            <td><b>Хүйс</b></td>
						<td><?php if($data['gender']==1){ echo 'Эрэгтэй';} else { echo 'Эмэгтэй';}?></td>
          </tr>
          <tr>
            <td><b>Төлвийн шалтгаан</b></td><td><?=$data['reason']?></td>
            <td><b>Төлбөр</b></td><td><?=number_format($data['price'],2)?> төгрөг</td>
          </tr>
          <tr>
            <td><b>Гэрээ эхлэх огноо:</b></td><td><?=$data['date1']?></td>
						<td><b>Гэрээ дуусах огноо:</b></td><td><?=$data['date2']?></td>
          </tr>
          <tr>
            <td><b>Хөнгөлөлт</b></td><td><b><?=$data['discount']?></b></td><td></td><td></td>
          </tr>
        </table><br/>
        </div>

                  <h6 class="text-muted">Basic</h6>
                  <div class="nav-align-top nav-tabs-shadow mb-4">
                    <ul class="nav nav-tabs" role="tablist">
                      <li class="nav-item">
                        <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab" data-bs-target="#navs-top-home"
                          aria-controls="navs-top-home" aria-selected="true">
                          Хувийн хэрэг
                        </button>
                      </li>
                      <li class="nav-item">
                        <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-top-profile"
                          aria-controls="navs-top-profile" aria-selected="false">
                          Файлууд
                        </button>
                      </li>
                      <li class="nav-item">
                        <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-top-messages"
                          aria-controls="navs-top-messages" aria-selected="false">
                          Төлбөр
                        </button>
                      </li>
                      <li class="nav-item">
                        <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-top-irts"
                          aria-controls="navs-top-irts" aria-selected="false">
                          Ирц
                        </button>
                      </li>
                      <li class="nav-item">
                        <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-top-history"
                          aria-controls="navs-top-history" aria-selected="false">
                          Өөрчлөлтийн түүх
                        </button>
                      </li>
                    </ul>
                    <div class="tab-content">
                      <div class="tab-pane fade show active" id="navs-top-home" role="tabpanel">
                        <p>
                            <?php require_once 'children/child_family.php';?>
                        </p>
                      </div>
                      <div class="tab-pane fade" id="navs-top-profile" role="tabpanel">
                        <p>
                            <?php require_once 'children/file.php';?>
                        </p>
                      </div>
                      <div class="tab-pane fade" id="navs-top-messages" role="tabpanel">
                        <p>
                            <?php require_once 'children/price.php';?>
                        </p>
                      </div>
                      <div class="tab-pane fade" id="navs-top-irts" role="tabpanel">
                        <p>
                            <?php require_once 'children/irts.php';?>
                        </p>
                      </div>
                      <div class="tab-pane fade" id="navs-top-history" role="tabpanel">
                        <p>
                            <?php require_once 'children/change.php';?>
                        </p>
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
