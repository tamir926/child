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
                        <a class="dropdown-item" href="?action=new">Шинэ хэрэглэгч</a>
                        </div>
                    </div>
                </div>
                <? 
                if ($action=="list")
                {
                    
                    
                    if (isset($_POST["search"])) 
                    {
                        $search = $_POST["search"];
                        if ($search<>'')
                        {
                            ?>
                            Хайсан утга: 
                            <a href="users">
                                <span class="badge rounded-pill bg-danger"><i data-feather='x-circle'></i> <?=$search;?></span>
                            </a>
                            <?
                        }
                    } 
                    else $search="";
                    ?>
                    <section id="basic-datatable">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <table class="datatables-basic table">
                                        <thead>
                                            <tr>
                                                <th>№</th>
                                                <th>Төрөл</th>
                                                <th>Нэр</th>
                                                <th>Утас</th>
                                                <th>Имэйл</th>
                                                <th>Үйлдэл</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?
                                                $count =0;
                                                if ($search<>'')
                                                $sql = "SELECT *FROM users WHERE name LIKE '%$search%' OR tel LIKE '%$search%' OR email LIKE '%$search%' ORDER BY created_date DESC";
                                                else 
                                                $sql = "SELECT *FROM users ORDER BY created_date DESC";
                                                $result = mysqli_query($conn,$sql);
                                                while ($data = mysqli_fetch_array($result))
                                                {
                                                    ?>
                                                    <tr>
                                                        <td><?=++$count;?></td>
                                                        <td><?=($data["type"])?'Байгууллага':'Иргэн';?></td>
                                                        <td><?=$data["name"];?></td>
                                                        <td><?=$data["tel"];?></td>
                                                        <td><?=$data["email"];?></td>
                                                        <td>
                                                            <a class="btn btn-success" href="users?action=edit&id=<?=$data["id"];?>">Засах</a>
                                                            <a class="btn btn-primary" href="users?action=detail&id=<?=$data["id"];?>">Дэлгэрэнгүй</a>
                                                        </td>
                                                    </tr>
                                                    <?
                                                }
                                                ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- Modal to add new record -->
                        <div class="modal modal-slide-in fade" id="modals-slide-in">
                            <div class="modal-dialog sidebar-sm">
                                <form class="add-new-record modal-content pt-0">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">×</button>
                                    <div class="modal-header mb-1">
                                        <h5 class="modal-title" id="exampleModalLabel">New Record</h5>
                                    </div>
                                    <div class="modal-body flex-grow-1">
                                        <div class="form-group">
                                            <label class="form-label" for="basic-icon-default-fullname">Full Name</label>
                                            <input type="text" class="form-control dt-full-name" id="basic-icon-default-fullname" placeholder="John Doe" aria-label="John Doe" />
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label" for="basic-icon-default-post">Post</label>
                                            <input type="text" id="basic-icon-default-post" class="form-control dt-post" placeholder="Web Developer" aria-label="Web Developer" />
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label" for="basic-icon-default-email">Email</label>
                                            <input type="text" id="basic-icon-default-email" class="form-control dt-email" placeholder="john.doe@example.com" aria-label="john.doe@example.com" />
                                            <small class="form-text text-muted"> You can use letters, numbers & periods </small>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label" for="basic-icon-default-date">Joining Date</label>
                                            <input type="text" class="form-control dt-date" id="basic-icon-default-date" placeholder="MM/DD/YYYY" aria-label="MM/DD/YYYY" />
                                        </div>
                                        <div class="form-group mb-4">
                                            <label class="form-label" for="basic-icon-default-salary">Salary</label>
                                            <input type="text" id="basic-icon-default-salary" class="form-control dt-salary" placeholder="$12000" aria-label="$12000" />
                                        </div>
                                        <button type="button" class="btn btn-primary data-submit mr-1">Submit</button>
                                        <button type="reset" class="btn btn-outline-secondary" data-dismiss="modal">Cancel</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </section>
                    <?
                }
                ?>

                <?
                if ($action=="edit")
                {
                    $user_id = $_GET["id"];
                    $sql = "SELECT *FROM users WHERE id='$user_id'";
                    $result = mysqli_query($conn,$sql);
                    if (mysqli_num_rows($result)==1)
                    {
                        $data = mysqli_fetch_array($result);
                        $user_name = $data["name"];
                        $user_tel = $data["tel"];
                        $user_email = $data["email"];
                        $user_username = $data["username"];
                        $user_type = $data["type"];

                    }
                    ?>
                    <section id="input-group-basic">
                        <form action="users?action=editing" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-6 mx-auto">
                                    <div class="card">
                                        <div class="card-header">
                                            <h4 class="card-title">Үндсэн мэдээлэл</h4>
                                        </div>
                                        <div class="card-body">
                                            
                                                <input type="hidden" name="user_id" value="<?=$user_id;?>">
                                                <div class="input-group mb-2">
                                                    <span class="input-group-text" id="basic-addon-search1"><i data-feather="user"></i></span>
                                                    <input type="text" class="form-control" name="name" value="<?=$user_name;?>" placeholder="Нэр..." required />
                                                </div>

                                                <div class="input-group mb-2">
                                                    <span class="input-group-text" id="basic-addon-search1"><i data-feather="phone"></i></span>
                                                    <input type="text" class="form-control" name="tel" value="<?=$user_tel;?>" placeholder="Утас..." required/>
                                                </div>

                                                <div class="input-group mb-2">
                                                    <span class="input-group-text" id="basic-addon-search1"><i data-feather="mail"></i></span>
                                                    <input type="text" class="form-control" name="email" value="<?=$user_email;?>" placeholder="Имэйл..." required/>
                                                </div>

                                                <div class="input-group mb-2">
                                                    <span class="input-group-text" id="basic-addon-search1"><i data-feather='lock'></i></span>
                                                    <input type="text" class="form-control" name="username" value="<?=$user_username;?>" placeholder="Нэвтрэх нэр..." />
                                                </div>
                                            
                                                <div class="input-group mb-2">
                                                    <span class="input-group-text" id="basic-addon-search1"><i data-feather='database'></i></span>
                                                    <input type="text" class="form-control" name="password" placeholder="Нууц үг (Засах бол оруулна уу)" />
                                                </div>

                                                <div class="mb-2">
                                                    Төрөл<br>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="type" id="inlineRadio1" value="0" <?=($user_type==0)?'checked':'';?> />
                                                        <label class="form-check-label" for="inlineRadio1">Иргэн</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="type" id="inlineRadio2" value="1" <?=($user_type==1)?'checked':'';?> />
                                                        <label class="form-check-label" for="inlineRadio2">Байгууллага</label>
                                                    </div>
                                                </div>

                                                <button type="submit" class="btn btn-success waves-effect waves-float waves-light" >Засварлах</button>
                                        </div>
                                    </div>
                                    <a class="btn btn-danger waves-effect waves-float waves-light" href="users?action=delete&id=<?=$user_id;?>">Устгах</a>
                                </div>
                            </div>
                        </form>

                    </section>
                    <?
                }
                ?>


                <?
                if ($action=="editing")
                {
                    $user_id = $_POST["user_id"];
                    $name = $_POST["name"];
                    $tel = $_POST["tel"];
                    $email = $_POST["email"];
                    $username = $_POST["username"];
                    $password = $_POST["password"];
                    $type = $_POST["type"];
                    if ($password<>"") 
                    {
                        $sql = "UPDATE users SET password='$password' WHERE id='$user_id'";
                        mysqli_query($conn,$sql);
                    }

                    $sql = "UPDATE users SET name='$name',tel='$tel',email='$email',username='$username',type='$type' WHERE id='$user_id'";

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
                    <a class="btn btn-success" href="users?action=edit&id=<?=$user_id;?>">Засах</a>
                    <a class="btn btn-primary" href="users?action=detail&id=<?=$user_id;?>">Дэлгэрэнгүй</a>
                    <a class="btn btn-primary" href="users">Жагсаалт</a>
                    <?
                    
                }
                ?>

                <?
                if ($action=="new")
                {
                    ?>
                    <section id="input-group-basic">
                        <form action="users?action=adding" method="post" enctype="multipart/form-data">
                            <div class="row">
                            
                                <!-- Basic -->
                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-header">
                                            <h4 class="card-title">Үндсэн мэдээлэл</h4>
                                        </div>
                                        <div class="card-body">
                                                <div class="input-group mb-2">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon-search1"><i data-feather="user"></i></span>
                                                    </div>
                                                    <input type="text" class="form-control" name="name" placeholder="Нэр..." required />
                                                </div>

                                                <div class="input-group mb-2">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon-search1"><i data-feather="phone"></i></span>
                                                    </div>
                                                    <input type="text" class="form-control" name="tel" placeholder="Утас..." required/>
                                                </div>

                                                <div class="input-group mb-2">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon-search1"><i data-feather="mail"></i></span>
                                                    </div>
                                                    <input type="text" class="form-control" name="email" placeholder="Имэйл..." required/>
                                                </div>

                                                <div class="input-group mb-2">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon-search1"><i data-feather='database'></i></span>
                                                    </div>
                                                    <input type="text" class="form-control" name="password" placeholder="Нууц үг..." required />
                                                </div>

                                        </div>

                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-header">
                                            <h4 class="card-title">Зураг</h4>
                                        </div>
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label for="customFile1">Зураг сонгох</label>
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="customFile1"  name="image"/>
                                                    <label class="custom-file-label" for="customFile1">Зураг сонгох</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-success waves-effect waves-float waves-light">Засварлах</button>

                        </form>
                    </section>
                    <?
                }
                ?>


                <?
                if ($action=="adding")
                {
                    $name = $_POST["name"];
                    $tel = $_POST["tel"];
                    $email = $_POST["email"];
                    $password = $_POST["password"]; 
                    $target_file ="";
                
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
                                //$image=settings("base_url").$target_file;
                                //   $thumb_image_content = resize_image($target_file,300,200);
                                //   $thumb = substr($target_file,0,-4)."_thumb".substr($target_file,-4,4);
                                //   imagejpeg($thumb_image_content,$thumb,75);
                                //$thumb = settings("base_url").$thumb;
                                $target_file= substr($target_file,3);
        
                            }
                    }

                    $sql = "INSERT INTO users (name,tel,email,password,avatar) VALUES ('$name','$tel','$email','$password','$target_file')";

                    if (mysqli_query($conn,$sql))
                    {
                        $user_id = mysqli_insert_id($conn);
                        ?>
                        <div class="alert alert-success" role="alert">
                            <div class="alert-body">
                            Амжилттай үүсгэгдлээ
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
                    <a class="btn btn-success" href="users?action=edit&id=<?=$user_id;?>">Засах</a>
                    <a class="btn btn-primary" href="users?action=detail&id=<?=$user_id;?>">Дэлгэрэнгүй</a>
                    <a class="btn btn-primary" href="users">Жагсаалт</a>
                    <?
                }
                ?>

                <?
                if ($action=="detail")
                {
                    $user_id = $_GET["id"];
                    $sql = "SELECT *FROM users WHERE id='$user_id'";
                    $result = mysqli_query($conn,$sql);
                    if (mysqli_num_rows($result)==1)
                    {
                        $data = mysqli_fetch_array($result);
                        $user_name = $data["name"];
                        $user_rd = $data["rd"];
                        $user_tel = $data["tel"];
                        $user_email = $data["email"];
                        $user_username = $data["username"];
                        $user_registered = $data["created_date"];
                        $user_logged = $data["logged_date"];
                        $user_expire = $data["expire_date"];
                        $user_type = $data["type"];
                        $user_rd = $data["rd"];

                    }
                    ?>
                    <section id="input-group-basic">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">Үндсэн мэдээлэл</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="user-info-wrapper">
                                            <dl class="row">
                                                <dt class="col-sm-3 text-end">
                                                        <i data-feather="tag" class="mr-1"></i>
                                                        <span class=" fw-bold">Төрөл</span>
                                                </dt>   
                                                <dd class="col-sm-9"><?=($user_type)?'Байгууллага':'Иргэн';?></dd>
                                            </dl>
                                            <dl class="row">
                                                <dt class="col-sm-3 text-end">
                                                        <i data-feather="user" class="mr-1"></i>
                                                        <span class=" fw-bold">Нэр</span>
                                                </dt>   
                                                <dd class="col-sm-9"><?=$user_name;?></dd>
                                            </dl>
                                            <?
                                            if ($user_type)
                                            {
                                                ?>
                                                <dl class="row">
                                                    <dt class="col-sm-3 text-end">
                                                            <i data-feather="name" class="mr-1"></i>
                                                            <span class=" fw-bold">Регистр</span>
                                                    </dt>   
                                                    <dd class="col-sm-9"><?=$user_rd;?></dd>
                                                </dl>

                                                <?
                                            }
                                            ?>
                                            <dl class="row">
                                                <dt class="col-sm-3 text-end">
                                                        <i data-feather="phone" class="mr-1"></i>
                                                        <span class=" fw-bold">Утас</span>
                                                </dt>   
                                                <dd class="col-sm-9"><?=$user_tel;?></dd>
                                            </dl>

                                            <dl class="row">
                                                <dt class="col-sm-3 text-end">
                                                        <i data-feather="mail" class="mr-1"></i>
                                                        <span class=" fw-bold">Имэйл</span>
                                                </dt>   
                                                <dd class="col-sm-9"><?=$user_email;?></dd>
                                            </dl>    

                                            <dl class="row">
                                                <dt class="col-sm-3 text-end">
                                                        <i data-feather="tag" class="mr-1"></i>
                                                        <span class=" fw-bold">Төрөл</span>
                                                </dt>   
                                                <dd class="col-sm-9"><?=($user_type)?'Байгууллага':'Иргэн';?></dd>
                                            </dl>    
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">Бүртгэл</h4>
                                    </div>
                                    <div class="card-body">
                                        <dl class="row">
                                            <dt class="col-sm-3 text-end">
                                                    <i data-feather="lock" class="mr-1"></i>
                                                    <span class=" fw-bold">Нэвтрэх нэр</span>
                                            </dt>   
                                            <dd class="col-sm-9"><?=$user_username;?></dd>
                                        </dl>       
                                    </div>
                                </div>

                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">Гишүүнчлэл</h4>
                                    </div>
                                    <div class="card-body">
                                        <dl class="row">
                                            <dt class="col-sm-3 text-end">
                                                    <i data-feather="calendar" class="mr-1"></i>
                                                    <span class=" fw-bold">Бүртгүүлсэн</span>
                                            </dt>   
                                            <dd class="col-sm-9"><?=$user_registered;?></dd>
                                        </dl>    
                                        <dl class="row">
                                            <dt class="col-sm-3 text-end">
                                                    <i data-feather="calendar" class="mr-1"></i>
                                                    <span class=" fw-bold">Сүүлд нэвтэрсэн</span>
                                            </dt>   
                                            <dd class="col-sm-9"><?=$user_logged;?></dd>
                                        </dl>      
                                        <dl class="row">
                                            <dt class="col-sm-3 text-end">
                                                    <i data-feather="calendar" class="mr-1"></i>
                                                    <span class=" fw-bold">Гишүүнчлэл дуусах</span>
                                            </dt>   
                                            <dd class="col-sm-9"><?=$user_expire;?></dd>
                                        </dl> 
                                        <a class="btn btn-warning" href="users?action=extend&id=<?=$user_id;?>">Сунгах</a>
      
                                    </div>
                                </div>
                            </div>
                        </div>

                        <a class="btn btn-success" href="users?action=edit&id=<?=$user_id;?>">Засах</a>
                        <a class="btn btn-primary" href="users">Жагсаалт</a>
                    </section>
                    <?
                }
                ?>

                <?
                if ($action=="extend")
                {
                    $user_id = $_GET["id"];
                    $sql = "SELECT *FROM users WHERE id='$user_id'";
                    $result = mysqli_query($conn,$sql);
                    if (mysqli_num_rows($result)==1)
                    {
                        $data = mysqli_fetch_array($result);
                        $user_name = $data["name"];
                        $user_tel = $data["tel"];
                        $user_email = $data["email"];
                        $user_username = $data["username"];
                        $user_type = $data["type"];

                    }
                    ?>
                    <section id="input-group-basic">
                        <form action="users?action=extending" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-6 mx-auto">
                                    <div class="card">
                                        <div class="card-header">
                                            <h4 class="card-title">Үндсэн мэдээлэл</h4>
                                        </div>
                                        <div class="card-body">
                                            
                                                <input type="hidden" name="user_id" value="<?=$user_id;?>">
                                                <dl class="row">
                                                    <dt class="col-sm-3 text-end">
                                                            <i data-feather="user" class="mr-1"></i>
                                                            <span class=" fw-bold">Нэр</span>
                                                    </dt>   
                                                    <dd class="col-sm-9"><?=$user_name;?></dd>
                                                </dl>
                                                <dl class="row">
                                                    <dt class="col-sm-3 text-end">
                                                            <i data-feather="phone" class="mr-1"></i>
                                                            <span class=" fw-bold">Утас</span>
                                                    </dt>   
                                                    <dd class="col-sm-9"><?=$user_tel;?></dd>
                                                </dl>

                                                <dl class="row">
                                                    <dt class="col-sm-3 text-end">
                                                            <i data-feather="mail" class="mr-1"></i>
                                                            <span class=" fw-bold">Имэйл</span>
                                                    </dt>   
                                                    <dd class="col-sm-9"><?=$user_email;?></dd>
                                                </dl>    


                                                <dl class="row">
                                                    <dt class="col-sm-3 text-end">
                                                            <i data-feather="calendar" class="mr-1"></i>
                                                            <span class=" fw-bold">Гишүүнчлэл сунгах</span>
                                                    </dt>   
                                                    <dd class="col-sm-9">
                                                        <input type="text" id="fp-default" class="form-control flatpickr-basic" placeholder="YYYY-MM-DD" name="extend"/>
                                                    </dd>
                                                </dl> 


                                                <button type="submit" class="btn btn-warning waves-effect waves-float waves-light">Сунгах</button>
                                        </div>
                                    </div>
                                    <a class="btn btn-danger waves-effect waves-float waves-light" href="users?action=delete&id=<?=$user_id;?>">Устгах</a>
                                </div>
                            </div>
                        </form>

                    </section>
                    <?
                }
                ?>

                <?
                if ($action=="extending")
                {
                    $user_id = $_POST["user_id"];
                    $extend = $_POST["extend"];
                   

                    $sql = "UPDATE users SET expire_date='$extend' WHERE id='$user_id'";

                    if (mysqli_query($conn,$sql))
                    {
                        ?>
                        <div class="alert alert-success" role="alert">
                            <div class="alert-body">
                            Амжилттай шинэчлэгдлээ
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
                    <a class="btn btn-success" href="users?action=edit&id=<?=$user_id;?>">Засах</a>
                    <a class="btn btn-warning" href="users?action=extend&id=<?=$user_id;?>">Сунгах</a>
                    <a class="btn btn-primary" href="users?action=detail&id=<?=$user_id;?>">Дэлгэрэнгүй</a>
                    <a class="btn btn-primary" href="users">Жагсаалт</a>
                    <?
                    
                }
                ?>


                <?
                if ($action=="delete")
                {
                    $user_id = $_GET["id"];
                    $sql = "SELECT *FROM users WHERE id='$user_id'";
                    $result = mysqli_query($conn,$sql);
                    if (mysqli_num_rows($result)==1)
                    {
                       $sql = "DELETE FROM users WHERE id='$user_id'";
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
                        <a class="btn btn-primary" href="users">Жагсаалт</a>
                        <?
                    }                 
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