<?
require_once("config.php");
require_once("views/helper.php");
require_once("views/login_check.php");
require_once("views/init.php");
?>
    <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/pickers/pickadate/pickadate.css">
    <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/pickers/flatpickr/flatpickr.min.css">

    <link rel="stylesheet" type="text/css" href="app-assets/css/plugins/forms/pickers/form-flat-pickr.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/plugins/forms/pickers/form-pickadate.css">


<body class="horizontal-layout horizontal-menu  navbar-floating footer-static  " data-open="hover" data-menu="horizontal-menu" data-col="">
    <? if (isset($_GET["action"])) $action=$_GET["action"]; else $action="list"; ?>

    <? require_once("views/header.php"); ?>
    <? require_once("views/topmenu.php"); ?>

    <!-- BEGIN: Content-->
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper container-xxl p-0">
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-start mb-0">Байгууллага</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index">Нүүр</a>
                                    </li>
                                    <li class="breadcrumb-item active">Байгууллага
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="content-header-right text-md-end col-md-3 col-12 d-md-block d-none">
                    <div class="mb-1 breadcrumb-right">
                        <div class="dropdown">
                            <button class="btn-icon btn btn-primary btn-round btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i data-feather="grid"></i></button>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a class="dropdown-item" href="organisation?action=new"><i class="mr-1" data-feather="plus-square"></i><span class="align-middle">Бүртгэх</span></a>
                                <a class="dropdown-item" href="organisation?action=category_new"><i class="mr-1" data-feather="plus-square"></i><span class="align-middle">Ангилал нэмэх</span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
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
                                                <th>№</th>
                                                <th>Зураг</th>
                                                <th>Нэр</th>
                                                <th>Албан тушаал</th>
                                                <th>Утас</th>
                                                <th>Имэйл</th>
                                                <th>Үйлдэл</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?
                                                $count =0;
                                                $sql = "SELECT organisation.*,organisation_category.name categpry_name FROM organisation LEFT JOIN organisation_category ON organisation.category=organisation_category.id ORDER BY organisation_category.dd,organisation.dd";
                                                $result = mysqli_query($conn,$sql);
                                                while ($data = mysqli_fetch_array($result))
                                                {
                                                    ?>
                                                    <tr>
                                                        <td><?=++$count;?></td>
                                                        <td>
                                                            <div class="avatar avatar-xl">
                                                                <img src="../<?=$data["avatar"];?>" class="avatar">
                                                            </div>
                                                        </td>
                                                        <td><?=$data["name"];?></td>
                                                        <td><?=$data["categpry_name"];?></td>
                                                        <td><?=$data["tel"];?></td>
                                                        <td><?=$data["email"];?></td>
                                                        <td>
                                                            <a class="btn btn-primary btn-sm" href="organisation?action=detail&id=<?=$data["id"];?>">Дэлгэрэнгүй</a>
                                                            <a class="btn btn-success btn-sm" href="organisation?action=edit&id=<?=$data["id"];?>">Засах</a>
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
                    $organisation_id = $_GET["id"];
                    $sql = "SELECT *FROM organisation WHERE id='$organisation_id'";
                    $result = mysqli_query($conn,$sql);
                    if (mysqli_num_rows($result)==1)
                    {
                        $data = mysqli_fetch_array($result);
                        $organisation_name = $data["name"];
                        $organisation_tel = $data["tel"];
                        $organisation_email = $data["email"];
                        $organisation_avatar = $data["avatar"];
                        $organisation_location= $data["location"];
                        $organisation_category_id = $data["category"];
                        $organisation_dd = $data["dd"];
                        ?>
                        <section id="input-group-basic">
                            <form action="organisation?action=editing" method="post" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="card">
                                            <div class="card-header">
                                                <h4 class="card-title">Зураг</h4>
                                            </div>
                                            <div class="card-body">
                                            
                                                <img class="img-fluid d-block" src="../<?=$organisation_avatar;?>" />

                                                <div class="form-group">
                                                    <label for="customFile1">Зураг сонгох</label>
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" id="customFile1"  name="image"/>
                                                        <label class="custom-file-label" for="customFile1">Зураг сонгох</label>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="category">Ангилал</label>

                                                        <select class="form-control" name="category">
                                                            <?
                                                            $sql_category= "SELECT *FROM organisation_category ORDER BY dd";
                                                            $result_category = mysqli_query($conn,$sql_category);
                                                            while ($data_category = mysqli_fetch_array($result_category))
                                                            {
                                                                ?>
                                                                <option value="<?=$data_category["id"];?>" <?=($data_category["id"]==$organisation_category_id)?'SELECTED':'';?>><?=$data_position["name"];?></option>
                                                                <?
                                                            }
                                                            ?>
                                                        </select>
                                                </div>

                                                <div class="form-group">
                                                    <label for="position">Жагсаалтын эрэмбэ</label>
                                                    <input type="number" class="form-control" name="dd" placeholder="Эрэмбэ" value="<?=$organisation_dd;?>" required/>
                                                </div>


                                            </div>
                                        </div>
                                        <input type="submit" class="btn btn-success waves-effect waves-float waves-light" value="Засварлах">
                                        <div class="clearfix"></div>

                                        <a href="organisation?action=delete&id=<?=$organisation_id;?>" class="btn btn-danger waves-effect waves-float waves-light btn-sm mt-5" >Устгах</a>
                                    </div>
                                    <!-- Basic -->
                                    <div class="col-md-9">
                                        <div class="card">
                                            <div class="card-header">
                                                <h4 class="card-title">Үндсэн мэдээлэл</h4>
                                            </div>
                                            <div class="card-body">
                                                
                                                    <input type="hidden" name="organisation_id" value="<?=$organisation_id;?>">
                                                    <div class="input-group mb-2">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id="basic-addon-search1"><i data-feather="user"></i></span>
                                                        </div>
                                                        <input type="text" class="form-control" name="name" value="<?=$organisation_name;?>" placeholder="Нэр..." required />
                                                    </div>
                                                    
                                                    <div class="input-group mb-2">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id="basic-addon-search1"><i data-feather="phone"></i></span>
                                                        </div>
                                                        <input type="text" class="form-control" name="tel" value="<?=$organisation_tel;?>" placeholder="Утас..." required/>
                                                    </div>

                                                    <div class="input-group mb-2">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id="basic-addon-search1"><i data-feather="mail"></i></span>
                                                        </div>
                                                        <input type="text" class="form-control" name="email" value="<?=$organisation_email;?>" placeholder="Имэйл..." required/>
                                                    </div>

                                                    <div class="input-group mb-2">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id="basic-addon-location"><i data-feather="map-pin"></i></span>
                                                        </div>
                                                        <input type="text" class="form-control" name="location" value="<?=$organisation_location;?>" placeholder="Байршил..." required/>
                                                    </div>


                                            </div>

                                        </div>

                                        <input type="submit" class="btn btn-success waves-effect waves-float waves-light" value="Засварлах">
                                    </div>

                                    
                                </div>
                            </form>
                        </section>
                        <?

                    }
                    
                }
                ?>


                <?
                if ($action=="editing")
                {
                    $organisation_id = $_POST["organisation_id"];
                    $name = $_POST["name"];
                    $category = $_POST["category"];
                    $tel = $_POST["tel"];
                    $email = $_POST["email"];
                    $location = $_POST["location"];
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
                                //$image=settings("base_url").$target_file;
                                //   $thumb_image_content = resize_image($target_file,300,200);
                                //   $thumb = substr($target_file,0,-4)."_thumb".substr($target_file,-4,4);
                                //   imagejpeg($thumb_image_content,$thumb,75);
                                //$thumb = settings("base_url").$thumb;
                                $target_file= substr($target_file,3);
                                $sql = "UPDATE organisation SET avatar='$target_file' WHERE id='$organisation_id'";

                                //echo $sql;
                                mysqli_query($conn,$sql);
        
                            }
                    }

                    $sql = "UPDATE organisation SET 
                    name='$name',
                    tel='$tel',
                    email='$email',
                    location='$location',
                    category='$category',
                    dd='$dd' 
                    WHERE id='$organisation_id'";

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
                    <a class="btn btn-success" href="organisation?action=edit&id=<?=$organisation_id;?>">Засах</a>
                    <a class="btn btn-primary" href="organisation?action=detail&id=<?=$organisation_id;?>">Дэлгэрэнгүй</a>
                    <a class="btn btn-primary" href="organisation">Жагсаалт</a>
                    <?
                    
                }
                ?>

                <?
                if ($action=="new")
                {
                    ?>
                    <section id="input-group-basic">
                            <form action="organisation?action=adding" method="post" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-md-3">
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

                                                <div class="form-group">
                                                    <label for="category">Ангилал</label>

                                                        <select class="form-control" name="category">
                                                            <?
                                                            $sql_category= "SELECT *FROM organisation_category ORDER BY dd";
                                                            $result_category = mysqli_query($conn,$sql_category);
                                                            while ($data_category = mysqli_fetch_array($result_category))
                                                            {
                                                                ?>
                                                                <option value="<?=$data_category["id"];?>"><?=$data_category["name"];?></option>
                                                                <?
                                                            }
                                                            ?>
                                                        </select>
                                                </div>

                                                <div class="form-group">
                                                    <label for="position">Жагсаалтын эрэмбэ</label>
                                                    <input type="number" class="form-control" name="dd" placeholder="Эрэмбэ" value="0" required/>
                                                </div>

                                            </div>
                                        </div>
                                        <input type="submit" class="btn btn-success waves-effect waves-float waves-light" value="Үүсгэх">
                                    </div>
                                    <!-- Basic -->
                                    <div class="col-md-9">
                                        <div class="card">
                                            <div class="card-header">
                                                <h4 class="card-title">Үндсэн мэдээлэл</h4>
                                            </div>
                                            <div class="card-body">
                                                
                                                    <input type="hidden" name="organisation_id" value="<?=$organisation_id;?>">
                                                    <div class="input-group mb-2">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id="basic-addon-search1"><i data-feather="user"></i></span>
                                                        </div>
                                                        <input type="text" class="form-control" name="name" value="" placeholder="Нэр..." required />
                                                    </div>

                                                    <div class="input-group mb-2">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id="basic-addon-search1"><i data-feather="phone"></i></span>
                                                        </div>
                                                        <input type="text" class="form-control" name="tel" value="" placeholder="Утас..." required/>
                                                    </div>

                                                    <div class="input-group mb-2">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id="basic-addon-search1"><i data-feather="mail"></i></span>
                                                        </div>
                                                        <input type="text" class="form-control" name="email" value="" placeholder="Имэйл..." required/>
                                                    </div>

                                                    <div class="input-group mb-2">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id="basic-addon-location"><i data-feather="map-pin"></i></span>
                                                        </div>
                                                        <input type="text" class="form-control" name="location" placeholder="Байршил..." required/>
                                                    </div>

                                            </div>

                                        </div>

                                        

                                        <input type="submit" class="btn btn-success waves-effect waves-float waves-light" value="Үүсгэх">
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
                    $name = $_POST["name"];
                    $category = $_POST["category"];
                    $tel = $_POST["tel"];
                    $email = $_POST["email"];
                    $location = $_POST["location"];
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
                                //$image=settings("base_url").$target_file;
                                //   $thumb_image_content = resize_image($target_file,300,200);
                                //   $thumb = substr($target_file,0,-4)."_thumb".substr($target_file,-4,4);
                                //   imagejpeg($thumb_image_content,$thumb,75);
                                //$thumb = settings("base_url").$thumb;
                                $target_file= substr($target_file,3);
        
                            }
                    }

                    $sql = "INSERT INTO organisation (name,tel,email,location,avatar,category,dd) 
                    VALUES ('$name','$tel','$email','$location','$target_file','$category','$dd')";

                    if (mysqli_query($conn,$sql))
                    {
                        $organisation_id = mysqli_insert_id($conn);
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
                    <a class="btn btn-success" href="organisation?action=edit&id=<?=$organisation_id;?>">Засах</a>
                    <a class="btn btn-primary" href="organisation?action=detail&id=<?=$organisation_id;?>">Дэлгэрэнгүй</a>
                    <a class="btn btn-primary" href="organisation">Жагсаалт</a>
                    <?
                }
                ?>

                <?
                if ($action=="detail")
                {
                    $organisation_id = $_GET["id"];
                    $sql = "SELECT organisation.*,organisation_category.name category_name FROM organisation LEFT JOIN organisation_category ON organisation.category=organisation_category.id WHERE organisation.id='$organisation_id'";
                    $result = mysqli_query($conn,$sql);
                    if (mysqli_num_rows($result)==1)
                    {
                        $data = mysqli_fetch_array($result);
                        $organisation_name = $data["name"];
                        $organisation_tel = $data["tel"];
                        $organisation_email = $data["email"];
                        $organisation_avatar = $data["avatar"];
                        $organisation_category_name = $data["category_name"];
                        $organisation_dd = $data["dd"];
                        $organisation_location = $data["location"];
                    
                        ?>
                        <section id="input-group-basic">
                            <div class="row">

                                <div class="col-md-3">
                                    <div class="card">
                                        <div class="card-header">
                                            <h4 class="card-title">Зураг</h4>
                                        </div>
                                        <div class="card-body">
                                            <img class="img-fluid d-block" src="../<?=$organisation_avatar;?>" />
                                        </div>
                                    </div>

                                    <div class="card">
                                        <div class="card-header">
                                            <h4 class="card-title">Ангилал</h4>
                                        </div>
                                        <div class="card-body">
                                            <p><?=$organisation_category_name;?></p>
                                        </div>
                                    </div>

                                    <div class="card">
                                        <div class="card-header">
                                            <h4 class="card-title">Эрэмбэ</h4>
                                        </div>
                                        <div class="card-body">
                                            <p><?=$organisation_dd;?></p>
                                        </div>
                                    </div>

                                </div>


                                <div class="col-md-9">
                                    <div class="card">
                                        <div class="card-header">
                                            <h4 class="card-title">Үндсэн мэдээлэл</h4>
                                        </div>
                                        <div class="card-body">
                                            <div class="user-info-wrapper">
                                                <div class="d-flex flex-wrap">
                                                    <div class="user-info-title mr-3 w-10">
                                                        <i data-feather="user" class="mr-1"></i>
                                                        <span class="card-text user-info-title font-weight-bold mb-0">Нэр</span>
                                                    </div>
                                                    <p class="card-text mb-0"><?=$organisation_name;?></p>
                                                </div>
    
                                                <div class="d-flex flex-wrap">
                                                    <div class="user-info-title mr-3 w-10">
                                                        <i data-feather="phone" class="mr-1"></i>
                                                        <span class="card-text user-info-title font-weight-bold mb-0">Утас</span>
                                                    </div>
                                                    <p class="card-text mb-0"><?=$organisation_tel;?></p>
                                                </div>
    
                                                <div class="d-flex flex-wrap">
                                                    <div class="user-info-title mr-3 w-10">
                                                        <i data-feather="mail" class="mr-1"></i>
                                                        <span class="card-text user-info-title font-weight-bold mb-0">Имэйл</span>
                                                    </div>
                                                    <p class="card-text mb-0"><?=$organisation_email;?></p>
                                                </div>
    
                                                <div class="d-flex flex-wrap">
                                                    <div class="user-info-title mr-3 w-10">
                                                        <i data-feather="map-pin" class="mr-1"></i>
                                                        <span class="card-text user-info-title font-weight-bold mb-0">Байршил</span>
                                                    </div>
                                                    <p class="card-text mb-0"><?=$organisation_location;?></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
    
                            
                            </div>
    
                            <a class="btn btn-success" href="organisation?action=edit&id=<?=$organisation_id;?>">Засах</a>
                            <a class="btn btn-primary" href="organisation">Жагсаалт</a>
                        </section>
                        <?
                    }
                    else 
                    header("location:organisation");
                }
                ?>

                <?
                if ($action=="delete")
                {
                    $course_id = $_GET["id"];
                    $sql = "SELECT *FROM organisation WHERE id='$course_id'";
                    $result = mysqli_query($conn,$sql);
                    if (mysqli_num_rows($result)==1)
                    {
                        $data = mysqli_fetch_array($result);
                        $image = $data["avatar"];

                        if(file_exists('../'.$image))
                        {
                            unlink('../'.$image);
                        }

                        $sql = "DELETE FROM organisation WHERE id='$course_id'";

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
                        <a class="btn btn-primary" href="organisation">Жагсаалт</a>
                        <?
                    }
                    else 
                    header("location:organisation");
                    
                }
                ?>

                <? 
                if ($action=="category")
                {
                    ?>
                    <section id="basic-datatable">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <table class="datatables-basic table">
                                        <thead>
                                            <tr>
                                                <th>№</th>
                                                <th>Нэр</th>
                                                <th>Үйлдэл</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?
                                                $count =0;
                                                $sql = "SELECT *FROM organisation_category ORDER BY dd";
                                                $result = mysqli_query($conn,$sql);
                                                while ($data = mysqli_fetch_array($result))
                                                {
                                                    ?>
                                                    <tr>
                                                        <td><?=++$count;?></td>
                                                        <td><?=$data["name"];?></td>
                                                        <td>
                                                            <a class="btn btn-success" href="organisation?action=category_edit&id=<?=$data["id"];?>">Засах</a>
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
                    </section>
                    <?
                }
                ?>

                <?
                if ($action=="category_edit")
                {
                    $category_id = $_GET["id"];
                    $sql = "SELECT *FROM organisation_category WHERE id='$category_id'";
                    $result = mysqli_query($conn,$sql);
                    if (mysqli_num_rows($result)==1)
                    {
                        $data = mysqli_fetch_array($result);
                        $name = $data["name"];
                        $dd = $data["dd"];
                        ?>
                            <section id="input-group-basic">
                                <form action="organisation?action=category_editing" method="post" enctype="multipart/form-data">
                                    <div class="row">
                                    
                                        <!-- Basic -->
                                        <div class="col-md-6">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h4 class="card-title">Үндсэн мэдээлэл</h4>
                                                </div>
                                                <div class="card-body">
                                                    
                                                        <input type="hidden" name="category_id" value="<?=$category_id;?>">
                                                        <div class="input-group mb-2">
                                                            <span class="input-group-text" id="basic-addon-search1"><i data-feather="help-circle"></i></span>
                                                            <input type="text" class="form-control" name="name" placeholder="Ангиллын нэр" required  value="<?=$name;?>"/>
                                                        </div>


                                                        <div class="input-group mb-2">
                                                            <span class="input-group-text" id="basic-addon-search1"><i data-feather="help-circle"></i></span>
                                                            <input type="number" class="form-control" name="dd" placeholder="Эрэмбэ" value="<?=$dd;?>" required/>
                                                        </div>

                                                </div>

                                            </div>
                                        </div>

                                    </div>

                                    <input type="submit" class="btn btn-success waves-effect waves-float waves-light" value="Засварлах">
                                    <a href="organisation?action=category_delete&id=<?=$category_id;?>" class="btn btn-danger waves-effect waves-float waves-light">Устгах</a>


                                </form>
                            </section>
                        <?
                    }
                    ?>
                   
                    <?
                }
                ?>


                <?
                if ($action=="category_editing")
                {
                    $category_id = $_POST["category_id"];
                    $name = $_POST["name"];
                    $dd = $_POST["dd"];
                

                    $sql = "UPDATE organisation_category SET name='$name',dd='$dd' WHERE id='$category_id'";

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
                    <a class="btn btn-success" href="organisation?action=category_edit&id=<?=$category_id;?>">Засах</a>
                    <a class="btn btn-primary" href="organisation?action=category">Жагсаалт</a>
                    <?
                    
                }
                ?>

                <?
                if ($action=="category_new")
                {
                    ?>
                    <section id="input-group-basic">
                        <form action="organisation?action=category_adding" method="post" enctype="multipart/form-data">
                            <div class="row">
                            
                                <!-- Basic -->
                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-header">
                                            <h4 class="card-title">Үндсэн мэдээлэл</h4>
                                        </div>
                                        <div class="card-body">
                                                <div class="input-group mb-2">
                                                    <span class="input-group-text" id="basic-addon-search1"><i data-feather="help-circle"></i></span>
                                                    <input type="text" class="form-control" name="name" placeholder="Ангиллын нэр" required />
                                                </div>

                                            

                                                <div class="input-group mb-2">
                                                    <span class="input-group-text" id="basic-addon-search1"><i data-feather="help-circle"></i></span>
                                                    <input type="number" class="form-control" name="dd" placeholder="Эрэмбэ" value="0" required/>
                                                </div>


                                        </div>

                                    </div>
                                </div>
                            </div>

                            <input type="submit" class="btn btn-success waves-effect waves-float waves-light" value="Үүсгэх">

                        </form>
                    </section>
                    <?
                }
                ?>


                <?
                if ($action=="category_adding")
                {
                    $name = $_POST["name"];
                    $dd = $_POST["dd"];
                

                    $sql = "INSERT INTO organisation_category (name,dd) VALUES ('$name','$dd')";

                    if (mysqli_query($conn,$sql))
                    {
                        $category_id = mysqli_insert_id($conn);
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
                    <a class="btn btn-success" href="organisation?action=category_edit&id=<?=$category_id;?>">Засах</a>
                    <a class="btn btn-primary" href="organisation?action=category">Жагсаалт</a>
                    <?
                }
                ?>

                <?
                if ($action=="category_delete")
                {
                    $category_id = $_GET["id"];
                    $sql = "SELECT *FROM organisation_category WHERE id='$category_id'";
                    $result = mysqli_query($conn,$sql);
                    if (mysqli_num_rows($result)==1)
                    {
                        $data = mysqli_fetch_array($result);
                        $sql = "DELETE FROM organisation_category WHERE id='$category_id' LIMIT 1";
                        
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
                        <a class="btn btn-primary" href="organisation?action=category">Жагсаалт</a>
                        <?

                    }
                    else header("location:organisation?action=category");
                }
                ?>

            </div>
        </div>
    </div>
    <!-- END: Content-->

    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>

    <!-- BEGIN: Footer-->
    <? require_once("views/footer.php");?>
    <button class="btn btn-primary btn-icon scroll-top" type="button"><i data-feather="arrow-up"></i></button>
    <!-- END: Footer-->


    <!-- BEGIN: Vendor JS-->
    <script src="app-assets/vendors/js/vendors.min.js"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="app-assets/vendors/js/ui/jquery.sticky.js"></script>
    <script src="app-assets/vendors/js/pickers/pickadate/picker.js"></script>
    <script src="app-assets/vendors/js/pickers/pickadate/picker.date.js"></script>
    <script src="app-assets/vendors/js/pickers/pickadate/picker.time.js"></script>
    <script src="app-assets/vendors/js/pickers/pickadate/legacy.js"></script>
    <script src="app-assets/vendors/js/pickers/flatpickr/flatpickr.min.js"></script>

    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="app-assets/js/core/app-menu.js"></script>
    <script src="app-assets/js/core/app.js"></script>
    <script src="app-assets/js/scripts/forms/pickers/form-pickers.js"></script>

    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <!-- END: Page JS-->

    <script>
        $(window).on('load', function() {
            if (feather) {
                feather.replace({
                    width: 14,
                    height: 14
                });
            }
        })
    </script>
</body>
<!-- END: Body-->

</html>
