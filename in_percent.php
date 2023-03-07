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
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Үйл ажилгааны тайлан /</span> Хичээлийн хувиар</h4>

              <!-- Examples -->
                <?
                    if ($action == "detail")
                    {
                        
                        ?>
                        <?
                            $sql = "SELECT *FROM in_percent ORDER BY id";
                            $result = mysqli_query($conn,$sql);
                            while ($data = mysqli_fetch_array($result))
                            {
                                // $data = mysqli_fetch_array($result);
                                
                                ?>
                            <a class="btn btn-outline-success mb-3" href="in_percent?action=edit&id">Засах</a>
                            <div class="card">
                                <div class="table-responsive text-nowrap">
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th>Гарчиг</th>
                                            <th>Даваа</th>
                                            <th>Мягмар</th>
                                            <th>Лхагва</th>
                                            <th>Пүрэв</th>
                                            <th>Баасан</th>
                                            
                                        </tr>
                                        </thead>
                                        <tbody class="table-border-bottom-0">
                                        <tr>
                                            <td>
                                            <i class=" text-danger me-3"></i> <strong>Тойргын цаг</strong>
                                            </td>
                                            <td><?=$data["mon1"];?></td>
                                            <td><?=$data["tue1"];?></td>
                                            <td><?=$data["wed1"];?></td>
                                            <td><?=$data["thu1"];?></td>
                                            <td><?=$data["fri1"];?></td>                           
                                            
                                        </tr>
                                        <tr>
                                            <td>
                                            <i class="text-success me-3"></i> <strong>Өглөөний дасгал</strong>
                                            </td>
                                            <td><?=$data["mon2"];?></td>
                                            <td><?=$data["tue2"];?></td>
                                            <td><?=$data["wed2"];?></td>
                                            <td><?=$data["thu2"];?></td>
                                            <td><?=$data["fri2"];?></td>
                                            
                                        </tr>
                                        <tr>
                                            <td><i class=" text-success me-3"></i> <strong>Сургалтын үйл ажиллагаа</strong></td>
                                            <td><?=$data["mon3"];?></td>
                                            <td><?=$data["tue3"];?></td>
                                            <td><?=$data["wed3"];?></td>
                                            <td><?=$data["thu3"];?></td>
                                            <td><?=$data["fri3"];?></td>
                                            
                                        </tr>
                                        <tr>
                                            <td>
                                            <i class=" ti-lg text-primary me-3"></i>
                                            <strong>Хөгжимийн цаг</strong>
                                            </td>
                                            <td><?=$data["mon4"];?></td>
                                            <td><?=$data["tue4"];?></td>
                                            <td><?=$data["wed4"];?></td>
                                            <td><?=$data["thu4"];?></td>
                                            <td><?=$data["fri4"];?></td>
                                            
                                        </tr>
                                        <tr>
                                            <td>
                                            <i class=" ti-lg text-primary me-3"></i>
                                            <strong>Хотын соёл</strong>
                                            </td>
                                            <td><?=$data["mon5"];?></td>
                                            <td><?=$data["tue5"];?></td>
                                            <td><?=$data["wed5"];?></td>
                                            <td><?=$data["thu5"];?></td>
                                            <td><?=$data["fri5"];?></td>
                                            
                                        </tr>
                                        <tr>
                                            <td>
                                            <i class=" ti-lg text-primary me-3"></i>
                                            <strong>Алчуураар тоглох цаг</strong>
                                            </td>
                                            <td><?=$data["mon6"];?></td>
                                            <td><?=$data["tue6"];?></td>
                                            <td><?=$data["wed6"];?></td>
                                            <td><?=$data["thu6"];?></td>
                                            <td><?=$data["fri6"];?></td>
                                            
                                        </tr>
                                        <tr>
                                            <td>
                                            <i class=" ti-lg text-primary me-3"></i>
                                            <strong>Хөгжөөн баясах</strong>
                                            </td>
                                            <td><?=$data["mon7"];?></td>
                                            <td><?=$data["tue7"];?></td>
                                            <td><?=$data["wed7"];?></td>
                                            <td><?=$data["thu7"];?></td>
                                            <td><?=$data["fri7"];?></td>
                                            
                                        </tr>
                                        </tbody>
                                    </table>
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
                        $sql = "SELECT *FROM in_percent WHERE id";
                        $result = mysqli_query($conn,$sql);
                        if (mysqli_num_rows($result)==1)
                        {
                            $data = mysqli_fetch_array($result);
                            $in_percent_mon1 = $data["mon1"];
                            $in_percent_mon2 = $data["mon2"];
                            $in_percent_mon3 = $data["mon3"];
                            $in_percent_mon4 = $data["mon4"];
                            $in_percent_mon5 = $data["mon5"];
                            $in_percent_mon6 = $data["mon6"];
                            $in_percent_mon7 = $data["mon7"];
                            $in_percent_tue1 = $data["tue1"];
                            $in_percent_tue2 = $data["tue2"];
                            $in_percent_tue3 = $data["tue3"];
                            $in_percent_tue4 = $data["tue4"];
                            $in_percent_tue5 = $data["tue5"];
                            $in_percent_tue6 = $data["tue6"];
                            $in_percent_tue7 = $data["tue7"];
                            $in_percent_wed1 = $data["wed1"];
                            $in_percent_wed2 = $data["wed2"];
                            $in_percent_wed3 = $data["wed3"];
                            $in_percent_wed4 = $data["wed4"];
                            $in_percent_wed5 = $data["wed5"];
                            $in_percent_wed6 = $data["wed6"];
                            $in_percent_wed7 = $data["wed7"];
                            $in_percent_thu1 = $data["thu1"];
                            $in_percent_thu1 = $data["thu1"];
                            $in_percent_thu2 = $data["thu2"];
                            $in_percent_thu3 = $data["thu3"];
                            $in_percent_thu4 = $data["thu4"];
                            $in_percent_thu5 = $data["thu5"];
                            $in_percent_thu6 = $data["thu6"];
                            $in_percent_thu7 = $data["thu7"];
                            $in_percent_fri1 = $data["fri1"];
                            $in_percent_fri2 = $data["fri2"];
                            $in_percent_fri3 = $data["fri3"];
                            $in_percent_fri4 = $data["fri4"];
                            $in_percent_fri5 = $data["fri5"];
                            $in_percent_fri6 = $data["fri6"];
                            $in_percent_fri7 = $data["fri7"];

                            ?>

                            <?
                        }
                        ?>
                        <form action="in_percent?action=editing" method="post"  enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-xl-6">
                                    <div class="card mt-4">
                                        <div class="card-body">
                                            <h5> 1дэх өдөр </h5>
                                            <div class="nav-align-top mb-4">
                                            
                                            <ul class="nav nav-pills mb-3" role="tablist">
                                                <li class="nav-item">
                                                <button
                                                    type="button"
                                                    class="nav-link active"
                                                    role="tab"
                                                    data-bs-toggle="tab"
                                                    data-bs-target="#mon1"
                                                    aria-controls="mon1"
                                                    aria-selected="true"
                                                    name=""
                                                >
                                                Тойргын цаг
                                                </button>
                                                </li>
                                                <li class="nav-item">
                                                <button
                                                    type="button"
                                                    class="nav-link"
                                                    role="tab"
                                                    data-bs-toggle="tab"
                                                    data-bs-target="#mon2"
                                                    aria-controls="mon2"
                                                    aria-selected="false"
                                                >
                                                    Өглөөний дасгал
                                                </button>
                                                </li>
                                                <li class="nav-item">
                                                <button
                                                    type="button"
                                                    class="nav-link"
                                                    role="tab"
                                                    data-bs-toggle="tab"
                                                    data-bs-target="#mon3"
                                                    aria-controls="mon3"
                                                    aria-selected="false"
                                                >
                                                    Сургалтын үйл ажиллагаа
                                                </button>
                                                </li>
                                                <li class="nav-item">
                                                <button
                                                    type="button"
                                                    class="nav-link"
                                                    role="tab"
                                                    data-bs-toggle="tab"
                                                    data-bs-target="#mon4"
                                                    aria-controls="mon4"
                                                    aria-selected="false"
                                                >
                                                    Хөгжимийн цаг
                                                </button>
                                                </li>
                                                <li class="nav-item">
                                                <button
                                                    type="button"
                                                    class="nav-link"
                                                    role="tab"
                                                    data-bs-toggle="tab"
                                                    data-bs-target="#mon5"
                                                    aria-controls="mon5"
                                                    aria-selected="false"
                                                >
                                                    Хотын соёл
                                                </button>
                                                </li>
                                                <li class="nav-item">
                                                <button
                                                    type="button"
                                                    class="nav-link"
                                                    role="tab"
                                                    data-bs-toggle="tab"
                                                    data-bs-target="#mon6"
                                                    aria-controls="mon6"
                                                    aria-selected="false"
                                                >
                                                    Алчуураар тоглох цаг
                                                </button>
                                                </li>
                                                <li class="nav-item">
                                                <button
                                                    type="button"
                                                    class="nav-link"
                                                    role="tab"
                                                    data-bs-toggle="tab"
                                                    data-bs-target="#mon7"
                                                    aria-controls="mon7"
                                                    aria-selected="false"
                                                >
                                                    Хөгжөөн баясгах
                                                </button>
                                                </li>
                                            </ul>
                                            <div class="tab-content">
                                                <div class="tab-pane fade show active" id="mon1" role="tabpanel">
                                                    <textarea class="form-control" id="report" name="mon1" rows="3"><?=$data["mon1"];?></textarea>
                                                </div>
                                                <div class="tab-pane fade" id="mon2" role="tabpanel">
                                                    <textarea class="form-control" id="report" name="mon2" rows="3"><?=$data["mon2"];?></textarea>
                                                </div>
                                                <div class="tab-pane fade" id="mon3" role="tabpanel">
                                                    <textarea class="form-control" id="report" name="mon3" rows="3"><?=$data["mon3"];?></textarea>
                                                </div>
                                                <div class="tab-pane fade" id="mon4" role="tabpanel">
                                                    <textarea class="form-control" id="report" name="mon4" rows="3"><?=$data["mon4"];?></textarea>
                                                </div>
                                                <div class="tab-pane fade" id="mon5" role="tabpanel">
                                                    <textarea class="form-control" id="report" name="mon5" rows="3"><?=$data["mon5"];?></textarea>
                                                </div>
                                                <div class="tab-pane fade" id="mon6" role="tabpanel">
                                                    <textarea class="form-control" id="report" name="mon6" rows="3"><?=$data["mon6"];?></textarea>
                                                </div>
                                                <div class="tab-pane fade" id="mon7" role="tabpanel">
                                                    <textarea class="form-control" id="report" name="mon7" rows="3"><?=$data["mon7"];?></textarea>
                                                </div>
                                            </div>
                                            </div>
                                        </div>   
                                    </div>   
                                </div>
                                <div class="col-xl-6">
                                    <div class="card mt-4">
                                        <div class="card-body">
                                            <h5> 2дох өдөр </h5>
                                            <div class="nav-align-top mb-4">
                                            <ul class="nav nav-pills mb-3" role="tablist">
                                                <li class="nav-item">
                                                <button
                                                    type="button"
                                                    class="nav-link active"
                                                    role="tab"
                                                    data-bs-toggle="tab"
                                                    data-bs-target="#tue1"
                                                    aria-controls="tue1"
                                                    aria-selected="true"
                                                >
                                                Тойргын цаг
                                                </button>
                                                </li>
                                                <li class="nav-item">
                                                <button
                                                    type="button"
                                                    class="nav-link"
                                                    role="tab"
                                                    data-bs-toggle="tab"
                                                    data-bs-target="#tue2"
                                                    aria-controls="tue2"
                                                    aria-selected="false"
                                                >
                                                Өглөөний дасгал
                                                </button>
                                                </li>
                                                <li class="nav-item">
                                                <button
                                                    type="button"
                                                    class="nav-link"
                                                    role="tab"
                                                    data-bs-toggle="tab"
                                                    data-bs-target="#tue3"
                                                    aria-controls="tue3"
                                                    aria-selected="false"
                                                >
                                                Сургалтын үйл ажиллагаа
                                                </button>
                                                </li>
                                                <li class="nav-item">
                                                <button
                                                    type="button"
                                                    class="nav-link"
                                                    role="tab"
                                                    data-bs-toggle="tab"
                                                    data-bs-target="#tue4"
                                                    aria-controls="tue4"
                                                    aria-selected="false"
                                                >
                                                Хөгжимийн цаг
                                                </button>
                                                </li>
                                                <li class="nav-item">
                                                <button
                                                    type="button"
                                                    class="nav-link"
                                                    role="tab"
                                                    data-bs-toggle="tab"
                                                    data-bs-target="#tue5"
                                                    aria-controls="tue5"
                                                    aria-selected="false"
                                                >
                                                Хотын соёл
                                                </button>
                                                </li>
                                                <li class="nav-item">
                                                <button
                                                    type="button"
                                                    class="nav-link"
                                                    role="tab"
                                                    data-bs-toggle="tab"
                                                    data-bs-target="#tue6"
                                                    aria-controls="tue6"
                                                    aria-selected="false"
                                                >
                                                Алчуураар тоглох цаг
                                                </button>
                                                </li>
                                                <li class="nav-item">
                                                <button
                                                    type="button"
                                                    class="nav-link"
                                                    role="tab"
                                                    data-bs-toggle="tab"
                                                    data-bs-target="#tue7"
                                                    aria-controls="tue7"
                                                    aria-selected="false"
                                                >
                                                Хөгжөөн баясгах
                                                </button>
                                                </li>
                                            </ul>
                                            <div class="tab-content">
                                                <div class="tab-pane fade show active" id="tue1" role="tabpanel">
                                                    <textarea class="form-control" id="report" name="tue1" rows="3"><?=$data["tue1"];?></textarea>
                                                </div>
                                                <div class="tab-pane fade" id="tue2" role="tabpanel">
                                                    <textarea class="form-control" id="report" name="tue2" rows="3"><?=$data["tue2"];?></textarea>
                                                </div>
                                                <div class="tab-pane fade" id="tue3" role="tabpanel">
                                                    <textarea class="form-control" id="report" name="tue3" rows="3"><?=$data["tue3"];?></textarea>
                                                </div>
                                                <div class="tab-pane fade" id="tue4" role="tabpanel">
                                                    <textarea class="form-control" id="report" name="tue4" rows="3"><?=$data["tue4"];?></textarea>
                                                </div>
                                                <div class="tab-pane fade" id="tue5" role="tabpanel">
                                                    <textarea class="form-control" id="report" name="tue5" rows="3"><?=$data["tue5"];?></textarea>
                                                </div>
                                                <div class="tab-pane fade" id="tue6" role="tabpanel">
                                                    <textarea class="form-control" id="report" name="tue6" rows="3"><?=$data["tue6"];?></textarea>
                                                </div>
                                                <div class="tab-pane fade" id="tue7" role="tabpanel">
                                                    <textarea class="form-control" id="report" name="tue7" rows="3"><?=$data["tue7"];?></textarea>
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
                                            <h5> 3дах өдөр </h5>
                                            <div class="nav-align-top mb-4">
                                            <ul class="nav nav-pills mb-3" role="tablist">
                                                <li class="nav-item">
                                                <button
                                                    type="button"
                                                    class="nav-link active"
                                                    role="tab"
                                                    data-bs-toggle="tab"
                                                    data-bs-target="#wed1"
                                                    aria-controls="wed1"
                                                    aria-selected="true"
                                                >
                                                Тойргын цаг
                                                </button>
                                                </li>
                                                <li class="nav-item">
                                                <button
                                                    type="button"
                                                    class="nav-link"
                                                    role="tab"
                                                    data-bs-toggle="tab"
                                                    data-bs-target="#wed2"
                                                    aria-controls="wed2"
                                                    aria-selected="false"
                                                >
                                                Өглөөний дасгал
                                                </button>
                                                </li>
                                                <li class="nav-item">
                                                <button
                                                    type="button"
                                                    class="nav-link"
                                                    role="tab"
                                                    data-bs-toggle="tab"
                                                    data-bs-target="#wed3"
                                                    aria-controls="wed3"
                                                    aria-selected="false"
                                                >
                                                Сургалтын үйл ажиллагаа
                                                </button>
                                                </li>
                                                <li class="nav-item">
                                                <button
                                                    type="button"
                                                    class="nav-link"
                                                    role="tab"
                                                    data-bs-toggle="tab"
                                                    data-bs-target="#wed4"
                                                    aria-controls="wed4"
                                                    aria-selected="false"
                                                >
                                                Хөгжимийн цаг
                                                </button>
                                                </li>
                                                <li class="nav-item">
                                                <button
                                                    type="button"
                                                    class="nav-link"
                                                    role="tab"
                                                    data-bs-toggle="tab"
                                                    data-bs-target="#wed5"
                                                    aria-controls="wed5"
                                                    aria-selected="false"
                                                >
                                                Хотын соёл
                                                </button>
                                                </li>
                                                <li class="nav-item">
                                                <button
                                                    type="button"
                                                    class="nav-link"
                                                    role="tab"
                                                    data-bs-toggle="tab"
                                                    data-bs-target="#wed6"
                                                    aria-controls="wed6"
                                                    aria-selected="false"
                                                >
                                                Алчуураар тоглох цаг
                                                </button>
                                                </li>
                                                <li class="nav-item">
                                                <button
                                                    type="button"
                                                    class="nav-link"
                                                    role="tab"
                                                    data-bs-toggle="tab"
                                                    data-bs-target="#wed7"
                                                    aria-controls="wed7"
                                                    aria-selected="false"
                                                >
                                                Хөгжөөн баясгах
                                                </button>
                                                </li>
                                            </ul>
                                            <div class="tab-content">
                                                <div class="tab-pane fade show active" id="wed1" role="tabpanel">
                                                    <textarea class="form-control" id="report" name="wed1" rows="3"><?=$data["wed1"];?></textarea>
                                                </div>
                                                <div class="tab-pane fade" id="wed2" role="tabpanel">
                                                    <textarea class="form-control" id="report" name="wed2" rows="3"><?=$data["wed2"];?></textarea>
                                                </div>
                                                <div class="tab-pane fade" id="wed3" role="tabpanel">
                                                    <textarea class="form-control" id="report" name="wed3" rows="3"><?=$data["wed3"];?></textarea>
                                                </div>
                                                <div class="tab-pane fade" id="wed4" role="tabpanel">
                                                    <textarea class="form-control" id="report" name="wed4" rows="3"><?=$data["wed4"];?></textarea>
                                                </div>
                                                <div class="tab-pane fade" id="wed5" role="tabpanel">
                                                    <textarea class="form-control" id="report" name="wed5" rows="3"><?=$data["wed5"];?></textarea>
                                                </div>
                                                <div class="tab-pane fade" id="wed6" role="tabpanel">
                                                    <textarea class="form-control" id="report" name="wed6" rows="3"><?=$data["wed6"];?></textarea>
                                                </div>
                                                <div class="tab-pane fade" id="wed7" role="tabpanel">
                                                    <textarea class="form-control" id="report" name="wed7" rows="3"><?=$data["wed7"];?></textarea>
                                                </div>
                                            </div>
                                            </div>
                                        </div>   
                                    </div>   
                                </div>
                                <div class="col-xl-6">
                                    <div class="card mt-4">
                                        <div class="card-body">
                                            <h5> 4дөх өдөр </h5>
                                            <div class="nav-align-top mb-4">
                                            <ul class="nav nav-pills mb-3" role="tablist">
                                                <li class="nav-item">
                                                <button
                                                    type="button"
                                                    class="nav-link active"
                                                    role="tab"
                                                    data-bs-toggle="tab"
                                                    data-bs-target="#thu1"
                                                    aria-controls="thu1"
                                                    aria-selected="true"
                                                >
                                                    Тойргын цаг
                                                </button>
                                                </li>
                                                <li class="nav-item">
                                                <button
                                                    type="button"
                                                    class="nav-link"
                                                    role="tab"
                                                    data-bs-toggle="tab"
                                                    data-bs-target="#thu2"
                                                    aria-controls="thu2"
                                                    aria-selected="false"
                                                >
                                                Өглөөний дасгал
                                                </button>
                                                </li>
                                                <li class="nav-item">
                                                <button
                                                    type="button"
                                                    class="nav-link"
                                                    role="tab"
                                                    data-bs-toggle="tab"
                                                    data-bs-target="#thu3"
                                                    aria-controls="thu3"
                                                    aria-selected="false"
                                                >
                                                Сургалтын үйл ажиллагаа
                                                </button>
                                                </li>
                                                <li class="nav-item">
                                                <button
                                                    type="button"
                                                    class="nav-link"
                                                    role="tab"
                                                    data-bs-toggle="tab"
                                                    data-bs-target="#thu4"
                                                    aria-controls="thu4"
                                                    aria-selected="false"
                                                >
                                                Хөгжимийн цаг
                                                </button>
                                                </li>
                                                <li class="nav-item">
                                                <button
                                                    type="button"
                                                    class="nav-link"
                                                    role="tab"
                                                    data-bs-toggle="tab"
                                                    data-bs-target="#thu5"
                                                    aria-controls="thu5"
                                                    aria-selected="false"
                                                >
                                                Хотын соёл
                                                </button>
                                                </li>
                                                <li class="nav-item">
                                                <button
                                                    type="button"
                                                    class="nav-link"
                                                    role="tab"
                                                    data-bs-toggle="tab"
                                                    data-bs-target="#thu6"
                                                    aria-controls="thu6"
                                                    aria-selected="false"
                                                >
                                                Алчуураар тоглох цаг
                                                </button>
                                                </li>
                                                <li class="nav-item">
                                                <button
                                                    type="button"
                                                    class="nav-link"
                                                    role="tab"
                                                    data-bs-toggle="tab"
                                                    data-bs-target="#thu7"
                                                    aria-controls="thu7"
                                                    aria-selected="false"
                                                >
                                                Хөгжөөн баясгах
                                                </button>
                                                </li>
                                            </ul>
                                            <div class="tab-content">
                                                <div class="tab-pane fade show active" id="thu1" role="tabpanel">
                                                    <textarea class="form-control" id="report" name="thu1" rows="3"><?=$data["thu1"];?></textarea>
                                                </div>
                                                <div class="tab-pane fade" id="thu2" role="tabpanel">
                                                    <textarea class="form-control" id="report" name="thu2" rows="3"><?=$data["thu2"];?></textarea>
                                                </div>
                                                <div class="tab-pane fade" id="thu3" role="tabpanel">
                                                    <textarea class="form-control" id="report" name="thu3" rows="3"><?=$data["thu3"];?></textarea>
                                                </div>
                                                <div class="tab-pane fade" id="thu4" role="tabpanel">
                                                    <textarea class="form-control" id="report" name="thu4" rows="3"><?=$data["thu4"];?></textarea>
                                                </div>
                                                <div class="tab-pane fade" id="thu5" role="tabpanel">
                                                    <textarea class="form-control" id="report" name="thu5" rows="3"><?=$data["thu5"];?></textarea>
                                                </div>
                                                <div class="tab-pane fade" id="thu5" role="tabpanel">
                                                    <textarea class="form-control" id="report" name="thu6" rows="3"><?=$data["thu6"];?></textarea>
                                                </div>
                                                <div class="tab-pane fade" id="thu5" role="tabpanel">
                                                    <textarea class="form-control" id="report" name="thu7" rows="3"><?=$data["thu7"];?></textarea>
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
                                            <h5> 5дах өдөр </h5>
                                            <div class="nav-align-top mb-4">
                                            <ul class="nav nav-pills mb-3" role="tablist">
                                                <li class="nav-item">
                                                <button
                                                    type="button"
                                                    class="nav-link active"
                                                    role="tab"
                                                    data-bs-toggle="tab"
                                                    data-bs-target="#fri1"
                                                    aria-controls="fri1"
                                                    aria-selected="true"
                                                >
                                                Тойргын цаг
                                                </button>
                                                </li>
                                                <li class="nav-item">
                                                <button
                                                    type="button"
                                                    class="nav-link"
                                                    role="tab"
                                                    data-bs-toggle="tab"
                                                    data-bs-target="#fri2"
                                                    aria-controls="fri2"
                                                    aria-selected="false"
                                                >
                                                Өглөөний дасгал
                                                </button>
                                                </li>
                                                <li class="nav-item">
                                                <button
                                                    type="button"
                                                    class="nav-link"
                                                    role="tab"
                                                    data-bs-toggle="tab"
                                                    data-bs-target="#fri3"
                                                    aria-controls="fri3"
                                                    aria-selected="false"
                                                >
                                                Сургалтын үйл ажиллагаа
                                                </button>
                                                </li>
                                                <li class="nav-item">
                                                <button
                                                    type="button"
                                                    class="nav-link"
                                                    role="tab"
                                                    data-bs-toggle="tab"
                                                    data-bs-target="#fri4"
                                                    aria-controls="fri4"
                                                    aria-selected="false"
                                                >
                                                Хөгжимийн цаг
                                                </button>
                                                </li>
                                                <li class="nav-item">
                                                <button
                                                    type="button"
                                                    class="nav-link"
                                                    role="tab"
                                                    data-bs-toggle="tab"
                                                    data-bs-target="#fri5"
                                                    aria-controls="fri5"
                                                    aria-selected="false"
                                                >
                                                Хотын соёл
                                                </button>
                                                </li>
                                                <li class="nav-item">
                                                <button
                                                    type="button"
                                                    class="nav-link"
                                                    role="tab"
                                                    data-bs-toggle="tab"
                                                    data-bs-target="#fri6"
                                                    aria-controls="fri6"
                                                    aria-selected="false"
                                                >
                                                Алчуураар тоглох цаг
                                                </button>
                                                </li>
                                                <li class="nav-item">
                                                <button
                                                    type="button"
                                                    class="nav-link"
                                                    role="tab"
                                                    data-bs-toggle="tab"
                                                    data-bs-target="#fri7"
                                                    aria-controls="fri7"
                                                    aria-selected="false"
                                                >
                                                Хөгжөөн баясгах
                                                </button>
                                                </li>
                                            </ul>
                                            <div class="tab-content">
                                                <div class="tab-pane fade show active" id="fri1" role="tabpanel">
                                                    <textarea class="form-control" id="report" name="fri1" rows="3"><?=$data["fri1"];?></textarea>
                                                </div>
                                                <div class="tab-pane fade" id="fri2" role="tabpanel">
                                                    <textarea class="form-control" id="report" name="fri2" rows="3"><?=$data["fri2"];?></textarea>
                                                </div>
                                                <div class="tab-pane fade" id="fri3" role="tabpanel">
                                                    <textarea class="form-control" id="report" name="fri3" rows="3"><?=$data["fri3"];?></textarea>
                                                </div>
                                                <div class="tab-pane fade" id="fri4" role="tabpanel">
                                                    <textarea class="form-control" id="report" name="fri4" rows="3"><?=$data["fri4"];?></textarea>
                                                </div>
                                                <div class="tab-pane fade" id="fri5" role="tabpanel">
                                                    <textarea class="form-control" id="report" name="fri5" rows="3"><?=$data["fri5"];?></textarea>
                                                </div>
                                                <div class="tab-pane fade" id="fri6" role="tabpanel">
                                                    <textarea class="form-control" id="report" name="fri6" rows="3"><?=$data["fri6"];?></textarea>
                                                </div>
                                                <div class="tab-pane fade" id="fri7" role="tabpanel">
                                                    <textarea class="form-control" id="report" name="fri7" rows="3"><?=$data["fri7"];?></textarea>
                                                </div>
                                            </div>
                                            </div>
                                        </div>   
                                    </div>   
                            </div>
                            <input type="submit" class="btn btn-outline-success mt-3 mb-3" value="Хадгалах">
                        </form>    
                        <?
                    }
                ?>



                <?
                    if ($action=="editing")
                    {
                        // $in_percent_id = $_POST["in_percent_id"];
                        $mon1 = mysqli_escape_string($conn,$_POST["mon1"]);
                        $mon2 = mysqli_escape_string($conn,$_POST["mon2"]);
                        $mon3 = mysqli_escape_string($conn,$_POST["mon3"]);
                        $mon4 = mysqli_escape_string($conn,$_POST["mon4"]);
                        $mon5 = mysqli_escape_string($conn,$_POST["mon5"]);
                        $mon6 = mysqli_escape_string($conn,$_POST["mon6"]);
                        $mon7 = mysqli_escape_string($conn,$_POST["mon7"]);
                        $tue1 = mysqli_escape_string($conn,$_POST["tue1"]);
                        $tue2 = mysqli_escape_string($conn,$_POST["tue2"]);
                        $tue3 = mysqli_escape_string($conn,$_POST["tue3"]);
                        $tue4 = mysqli_escape_string($conn,$_POST["tue4"]);
                        $tue5 = mysqli_escape_string($conn,$_POST["tue5"]);
                        $tue6 = mysqli_escape_string($conn,$_POST["tue6"]);
                        $tue7 = mysqli_escape_string($conn,$_POST["tue7"]);
                        $wed1 = mysqli_escape_string($conn,$_POST["wed1"]);
                        $wed2 = mysqli_escape_string($conn,$_POST["wed2"]);
                        $wed3 = mysqli_escape_string($conn,$_POST["wed3"]);
                        $wed4 = mysqli_escape_string($conn,$_POST["wed4"]);
                        $wed5 = mysqli_escape_string($conn,$_POST["wed5"]);
                        $wed6 = mysqli_escape_string($conn,$_POST["wed6"]);
                        $wed7 = mysqli_escape_string($conn,$_POST["wed7"]);
                        $thu1 = mysqli_escape_string($conn,$_POST["thu1"]);
                        $thu2 = mysqli_escape_string($conn,$_POST["thu2"]);
                        $thu3 = mysqli_escape_string($conn,$_POST["thu3"]);
                        $thu4 = mysqli_escape_string($conn,$_POST["thu4"]);
                        $thu5 = mysqli_escape_string($conn,$_POST["thu5"]);
                        $thu6 = mysqli_escape_string($conn,$_POST["thu6"]);
                        $thu7 = mysqli_escape_string($conn,$_POST["thu7"]);
                        $fri1 = mysqli_escape_string($conn,$_POST["fri1"]);
                        $fri2 = mysqli_escape_string($conn,$_POST["fri2"]);
                        $fri3 = mysqli_escape_string($conn,$_POST["fri3"]);
                        $fri4 = mysqli_escape_string($conn,$_POST["fri4"]);
                        $fri5 = mysqli_escape_string($conn,$_POST["fri5"]);
                        $fri6 = mysqli_escape_string($conn,$_POST["fri6"]);
                        $fri7 = mysqli_escape_string($conn,$_POST["fri7"]);
                        
                        

                        $sql = "UPDATE in_percent SET mon1='$mon1',mon2='$mon2',mon3='$mon3',mon4='$mon4',mon5='$mon5',mon6='$mon6',
                        mon7='$mon7', tue1='$tue1',tue2='$tue2', tue3='$tue3',tue4='$tue4',tue5='$tue5',tue6='$tue6',tue7='$tue7',wed1='$wed1',wed2='$wed2',wed3='$wed3',wed4='$wed4',wed5='$wed5',wed6='$wed6',wed7='$wed7',thu1='$thu1',
                        thu2='$thu2',thu3='$thu3',thu4='$thu4',thu5='$thu5',thu6='$thu6',thu7='$thu7',fri1='$fri1',fri2='$fri2', fri3='$fri3',fri4='$fri4',fri5='$fri5',fri6='$fri6',fri7='$fri7' WHERE id=1";

                        echo $sql;

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
                            echo mysqli_error($conn);
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
