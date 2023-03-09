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
                  $plan_id = $_GET["id"];
                  ?>
                  <?
                  $sql = "SELECT *FROM plan WHERE id='$plan_id'";
                  $result = mysqli_query($conn,$sql);
                  while ($data = mysqli_fetch_array($result))
                  {
                    $plan_id = $data["id"];
                    $plan_name = $data["name"];
                    $plan_title = $data["title"];
                    $plan_date = $data["date"];
                    $plan_description = $data["description"];
                    $plan_purpose = $data["purpose"];
                    $plan_method = $data["method"];
                    $plan_tools = $data["tools"];
                    $plan_activity1 = $data["activity1"];
                    $plan_activity2 = $data["activity2"];
                    $plan_word = $data["word"];
                    $plan_image = $data["image"];
                    ?>
                    <h4 class="fw-bold py-3 mb-4 ">
                      <span class="text-muted fw-light">Хичээлийн хөтөлбөр /</span> <?=$data["name"];?>
                    </h4>
                    <a class="btn btn-outline-success mb-3" href="plan_detail?action=edit&id=<?=$plan_id;?>">Засах</a>
                    <a class="btn btn-outline-danger mb-3" href="plan_detail?action=delete&id=<?=$plan_id;?>">Устгах</a>
                    <div class="row height-match">
                      <div class="col-xl-6">
                          <div class="card">
                              <div class="card-body">
                                  <!-- <h6 class="text-muted">Цагаан сар</h6> -->
                                  <div class="nav-align-top mb-4">
                                    <ul class="nav nav-pills mb-3" role="tablist">
                                      <li class="nav-item">
                                        <button
                                          type="button"
                                          class="nav-link active"
                                          role="tab"
                                          data-bs-toggle="tab"
                                          data-bs-target="#title"
                                          aria-controls="title"
                                          aria-selected="true"
                                        >
                                          Суралцахуйн чиглэл
                                        </button>
                                      </li>
                                      <li class="nav-item">
                                        <button
                                          type="button"
                                          class="nav-link"
                                          role="tab"
                                          data-bs-toggle="tab"
                                          data-bs-target="#date"
                                          aria-controls="date"
                                          aria-selected="false"
                                        >
                                          Он сар өдөр
                                        </button>
                                      </li>
                                      <li class="nav-item">
                                        <button
                                          type="button"
                                          class="nav-link"
                                          role="tab"
                                          data-bs-toggle="tab"
                                          data-bs-target="#description"
                                          aria-controls="description"
                                          aria-selected="false"
                                        >
                                          Агуулга
                                        </button>
                                      </li>
                                    </ul>
                                    <div class="tab-content">
                                      <div class="tab-pane fade show active" id="title" role="tabpanel">
                                        <p>
                                        <?=$data["title"];?>
                                        </p>
                                        
                                      </div>
                                      <div class="tab-pane fade" id="date" role="tabpanel">
                                        <p>
                                        <?=$data["date"];?>
                                        </p>
                                        
                                      </div>
                                      <div class="tab-pane fade" id="description" role="tabpanel">
                                        <p>
                                        <?=$data["description"];?>
                                        </p>
                                        
                                      </div>
                                    </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                      <div class="col-xl-6">
                          <div class="card">
                              <div class="card-body">
                                  <!-- <h6 class="text-muted">Цагаан сар</h6> -->
                                  <div class="nav-align-top mb-4">
                                      <ul class="nav nav-pills mb-3" role="tablist">
                                      <li class="nav-item">
                                          <button
                                          type="button"
                                          class="nav-link active"
                                          role="tab"
                                          data-bs-toggle="tab"
                                          data-bs-target="#purpose"
                                          aria-controls="purpose"
                                          aria-selected="true"
                                          >
                                          Зорилго
                                          </button>
                                      </li>
                                      <li class="nav-item">
                                          <button
                                          type="button"
                                          class="nav-link"
                                          role="tab"
                                          data-bs-toggle="tab"
                                          data-bs-target="#method"
                                          aria-controls="method"
                                          aria-selected="false"
                                          >
                                          Сургалтын арга
                                          </button>
                                      </li>
                                      <li class="nav-item">
                                          <button
                                          type="button"
                                          class="nav-link"
                                          role="tab"
                                          data-bs-toggle="tab"
                                          data-bs-target="#tools"
                                          aria-controls="tools"
                                          aria-selected="false"
                                          >
                                          Хэрэгсэл
                                          </button>
                                      </li>
                                      </ul>
                                      <div class="tab-content">
                                      <div class="tab-pane fade show active" id="purpose" role="tabpanel">
                                          <p>
                                          <?=$data["purpose"];?>
                                          </p>
                                          
                                      </div>
                                      <div class="tab-pane fade" id="method" role="tabpanel">
                                          <p>
                                          <?=$data["method"];?>
                                          </p>
                                          
                                      </div>
                                      <div class="tab-pane fade" id="tools" role="tabpanel">
                                          <p>
                                          <?=$data["tools"];?>
                                          </p>
                                          
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
                              <!-- <h6 class="text-muted">Цагаан сар</h6> -->
                              <div class="nav-align-top mb-4">
                                <ul class="nav nav-pills mb-3" role="tablist">
                                  <li class="nav-item">
                                    <button
                                      type="button"
                                      class="nav-link active"
                                      role="tab"
                                      data-bs-toggle="tab"
                                      data-bs-target="#activity1"
                                      aria-controls="activity1"
                                      aria-selected="true"
                                    >
                                      Үйл ажилгаа 1
                                    </button>
                                  </li>
                                  <li class="nav-item">
                                    <button
                                      type="button"
                                      class="nav-link"
                                      role="tab"
                                      data-bs-toggle="tab"
                                      data-bs-target="#activity2"
                                      aria-controls="activity2"
                                      aria-selected="false"
                                    >
                                      Үйл ажилгаа 2
                                    </button>
                                  </li>
                                  <li class="nav-item">
                                    <button
                                      type="button"
                                      class="nav-link"
                                      role="tab"
                                      data-bs-toggle="tab"
                                      data-bs-target="#word"
                                      aria-controls="word"
                                      aria-selected="false"
                                    >
                                      Шинэ үг
                                    </button>
                                  </li>
                                </ul>
                                <div class="tab-content">
                                  <div class="tab-pane fade show active" id="activity1" role="tabpanel">
                                    <p>
                                    <?=$data["activity1"];?>
                                    </p>
                                    
                                  </div>
                                  <div class="tab-pane fade" id="activity2" role="tabpanel">
                                    <p>
                                    <?=$data["activity2"];?>
                                    </p>
                                    
                                  </div>
                                  <div class="tab-pane fade" id="word" role="tabpanel">
                                    <p>
                                    <?=$data["word"];?>
                                    </p>
                                    
                                  </div>
                                </div>
                              </div>
                          </div>   
                      </div>   
                      </div>
                      <div class="col-xl-6">
                          <div class="card mt-4">
                              <div class="card-body">
                                  <!-- <h6 class="text-muted">Зураг</h6> -->
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
                                          Зураг 3
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
                                      <img class="card-img-top" src="./assets/img/elements/3.jpg" alt="Card image cap" />
                                      
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
                    $plan_id = $_GET["id"];
                    $sql = "SELECT *FROM plan WHERE id='$plan_id'";
                    $result = mysqli_query($conn,$sql);
                    if (mysqli_num_rows($result)==1)
                    {
                        $data = mysqli_fetch_array($result);
                        $plan_id = $data["id"];
                        $plan_name = $data["name"];
                        $plan_title = $data["title"];
                        $plan_date = $data["date"];
                        $plan_description = $data["description"];
                        $plan_purpose = $data["purpose"];
                        $plan_method = $data["method"];
                        $plan_tools = $data["tools"];
                        $plan_activity1 = $data["activity1"];
                        $plan_activity2 = $data["activity2"];
                        $plan_word = $data["word"];
                        $plan_image = $data["image"];
                        ?>

                        <?
                    }
                    ?>
                    <form action="plan_detail?action=editing" method="post"  enctype="multipart/form-data">
                        <h4 class="fw-bold py-3 mb-4 ">
                            <span class="text-muted fw-light">Хичээлийн хөтөлбөр/</span> <?=$data["name"];?>
                        </h4>
                        <div class="col-md-12">
                          <div class="card mb-4">
                              <h5 class="card-header">Хөтөлбөр засварлах</h5>
                              <div class="card-body">
                              <input type="hidden" name="plan_id" value="<?=$plan_id;?>">
                                  
                                  
                                  <label for="exampleFormControlTextarea1" class="form-label">Хөтөлбөрийн нэр</label>
                                  <textarea class="form-control" id="report" name="name" rows="3"><?=$data["name"];?></textarea>
                                  <label for="exampleFormControlTextarea1" class="form-label">Суралцахуйн чиглэл</label>
                                  <textarea class="form-control" id="report" name="title" rows="3"><?=$data["title"];?></textarea>
                                  <div class="mb-3">
                                    <label for="exampleFormControlTextarea1" class="form-label">Он сар</label>
                                    
                                    <div class="card mb-4">
                                      <input
                                      type="text"
                                      class="form-control"
                                      id="defaultFormControlInput"
                                      placeholder="<?=$data["date"];?>"
                                      aria-describedby="defaultFormControlHelp"
                                      name="date"
                                      />
                                    </div>
                                  </div>
                                  <label for="exampleFormControlTextarea1" class="form-label">Агуулга</label>
                                  <textarea class="form-control" id="report" name="description" rows="3"><?=$data["description"];?></textarea>
                                  <label for="exampleFormControlTextarea1" class="form-label">Зорилго</label>
                                  <textarea class="form-control" id="report" name="purpose" rows="3"><?=$data["purpose"];?></textarea>
                                  <label for="exampleFormControlTextarea1" class="form-label">Сургалтын арга</label>
                                  <textarea class="form-control" id="report" name="method" rows="3"><?=$data["method"];?></textarea>
                                  <label for="exampleFormControlTextarea1" class="form-label">Хэрэгсэл</label>
                                  <textarea class="form-control" id="report" name="tools" rows="3"><?=$data["tools"];?></textarea>
                                  <label for="exampleFormControlTextarea1" class="form-label">Үйл ажиллагаа1</label>
                                  <textarea class="form-control" id="report" name="activity1" rows="3"><?=$data["activity1"];?></textarea>
                                  <label for="exampleFormControlTextarea1" class="form-label">Үйл ажиллагаа2</label>
                                  <textarea class="form-control" id="report" name="activity2" rows="3"><?=$data["activity2"];?></textarea>
                                  <label for="exampleFormControlTextarea1" class="form-label">Шинэ үгийн тайлбар</label>
                                  <textarea class="form-control" id="report" name="word" rows="3"><?=$data["word"];?></textarea>
                                  <div class="mb-3">
                                      <label for="formFile" class="form-label">Зураг оруулах</label>

                                      <?
                                      if ($plan_image<>"")
                                      {
                                          ?>
                                          <img src="<?=$plan_image;?>" class="w-100">
                                          <?
                                          
                                      }
                                      ?>
                                      <div class="input-group">
                                          <input type="file" name="image">
                                      </div>
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
                    $plan_id = $_POST["plan_id"];
                    $name = $_POST["name"];
                    $title = $_POST["title"];
                    $date = $_POST["date"];
                    $description = $_POST["description"];
                    $purpose = $_POST["purpose"];
                    $method = $_POST["method"];
                    $tools = $_POST["tools"];
                    $activity1 = $_POST["activity1"];
                    $activity2 = $_POST["activity2"];
                    $word = $_POST["word"];

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
                                $sql = "UPDATE plan SET image='$target_file' WHERE id='$plan_id'";

                                mysqli_query($conn,$sql);
        
                            }
                    }

                    $sql = "UPDATE plan SET name='$name',title='$title',date='$date',description='$description',purpose='$purpose',method='$method', tools='$tools', activity1='$activity1', activity2='$activity2', word='$word' WHERE id='$plan_id'";


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
                    <a class="btn btn-success" href="plan_detail?action=edit&id=<?=$plan_id;?>">Засах</a>
                    <a class="btn btn-primary" href="plan_detail?action=detail&id=<?=$plan_id;?>">Дэлгэрэнгүй</a>
                    <a class="btn btn-primary" href="plan">Бүх хөтөлбөр</a>
                    <?
                    
                }
              ?>



              <?
                if ($action=="delete")
                {
                    $plan_id = $_GET["id"];
                    $sql = "SELECT *FROM plan WHERE id='$plan_id'";
                    $result = mysqli_query($conn,$sql);
                    if (mysqli_num_rows($result)==1)
                    {
                        $data = mysqli_fetch_array($result);
                        $image = $data["image"];
                        if (file_exists('./'.$image)) unlink('./'.$image);
                        $sql = "DELETE FROM plan WHERE id=$plan_id";
                        
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
                        <a class="btn btn-primary" href="plan">Жагсаалт</a>
                        <?                        
                    }
                    else header("location:plan_detail");
                    
                    
                }
              ?>



              <?
                if ($action=="new")
                {
                    ?>
                    <h4 class="fw-bold py-3 mb-4 ">
                        <span class="text-muted fw-light">Шинэ хичээлийн хөтөлбөр нэмэх
                    </h4>
                    <form action="plan_detail?action=adding" method="post" enctype="multipart/form-data">
                      <section id="input-group-basic">
                        <div class="row">
                          <div class="col-md-12">
                            <div class="card">
                              <div class="card mb-4">
                                  <h5 class="card-header">Хөтөлбөр нэмэх</h5>
                                  <div class="card-body">
                                    <input type="hidden" name="plan_id" value="<?=$plan_id;?>">
                                    <label for="exampleFormControlTextarea1" class="form-label">Хөтөлбөрийн нэр</label>
                                    <textarea class="form-control" id="report" name="name" rows="3"></textarea>
                                    <label for="exampleFormControlTextarea1" class="form-label">Суралцахуйн чиглэл</label>
                                    <textarea class="form-control" id="report" name="title" rows="3"></textarea>
                                    <div class="mb-3">
                                      <label for="exampleFormControlTextarea1" class="form-label">Он сар</label>
                                      
                                      <div class="card mb-4">
                                        <input
                                        type="text"
                                        class="form-control"
                                        id="defaultFormControlInput"
                                        placeholder="0000-00-00"
                                        aria-describedby="defaultFormControlHelp"
                                        name="date"
                                        />
                                      </div>
                                    </div>
                                    <label for="exampleFormControlTextarea1" class="form-label">Агуулга</label>
                                    <textarea class="form-control" id="report" name="description" rows="3"></textarea>
                                    <label for="exampleFormControlTextarea1" class="form-label">Зорилго</label>
                                    <textarea class="form-control" id="report" name="purpose" rows="3"></textarea>
                                    <label for="exampleFormControlTextarea1" class="form-label">Сургалтын арга</label>
                                    <textarea class="form-control" id="report" name="method" rows="3"></textarea>
                                    <label for="exampleFormControlTextarea1" class="form-label">Хэрэгсэл</label>
                                    <textarea class="form-control" id="report" name="tools" rows="3"></textarea>
                                    <label for="exampleFormControlTextarea1" class="form-label">Үйл ажиллагаа1</label>
                                    <textarea class="form-control" id="report" name="activity1" rows="3"></textarea>
                                    <label for="exampleFormControlTextarea1" class="form-label">Үйл ажиллагаа2</label>
                                    <textarea class="form-control" id="report" name="activity2" rows="3"></textarea>
                                    <label for="exampleFormControlTextarea1" class="form-label">Шинэ үгийн тайлбар</label>
                                    <textarea class="form-control" id="report" name="word" rows="3"></textarea>
                                    <label for="exampleFormControlTextarea1" class="form-label">Зураг оруулах</label>
                                    <div class="input-group mt-3">
                                      <input type="file" name="image">
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
                  $name = $_POST["name"];
                  $title = $_POST["title"];
                  $date = $_POST["date"];
                  $description = $_POST["description"];
                  $purpose = $_POST["purpose"];
                  $method = $_POST["method"];
                  $tools = $_POST["tools"];
                  $activity1 = $_POST["activity1"];
                  $activity2 = $_POST["activity2"];
                  $word = $_POST["word"];
                  $image = $_POST["image"];

                  $sql = "INSERT INTO plan (name,title,date,description,purpose,method,tools,activity1,activity2,word,image)  VALUES ('$name','$title','$date','$description','$purpose','$method','$tools','$activity1','$activity2','$word','$image')";

                    if (mysqli_query($conn,$sql))
                    {
                        $plan_id  = mysqli_insert_id ($conn);
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
                    <a class="btn btn-success" href="plan_detail?action=edit&id=<?=$plan_id;?>">Засах</a>
                    <a class="btn btn-primary" href="plan_detail?action=detail&id=<?=$plan_id;?>">Дэлгэрэнгүй</a>
                    <a class="btn btn-primary" href="plan">Бүх хөтөлбөр</a>
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
