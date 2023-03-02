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
<? if (isset($_GET["action"])) $action=$_GET["action"]; else $action="grid"; ?>
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
                            <h2 class="content-header-title float-start mb-0">Видео контент</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index">Нүүр</a>
                                    </li>
                                    <li class="breadcrumb-item active">Видео контент
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
                                <a class="dropdown-item" href="lessons?action=new"><i class="mr-1" data-feather="plus-square"></i><span class="align-middle">Видео контент оруулах</span></a>
                                <a class="dropdown-item" href="lessons?action=category_add"><i class="mr-1" data-feather="bar-chart-2"></i><span class="align-middle">Ангилал нэмэх</span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <? 
                if ($action=="grid")
                {
                    ?>
                    <section id="card-demo-example">
                        <div class="row match-height">
                            <?
                            $sql = "SELECT lessons.*, teachers.name teacher_name, teachers.avatar teacher_avatar,lessons_category.name category_name
                            FROM lessons 
                            LEFT JOIN teachers ON lessons.teacher=teachers.id
                            LEFT JOIN lessons_category ON lessons.category=lessons_category.id";
                            $result = mysqli_query($conn,$sql);
                            while ($data = mysqli_fetch_array($result))
                            {
                                $lesson_id = $data["id"];
                                $lesson_name = $data["name"];
                                $lesson_description = $data["description"];
                                $lesson_teacher_id = $data["teacher"];
                                $lesson_teacher_name = $data["teacher_name"];
                                $lesson_teacher_avatar = $data["teacher_avatar"];
                                $lesson_image = $data["image"];
                                $lesson_category = $data["category_name"];
                                $lesson_date = $data["created_date"];
                               
                                ?>
                                <div class="col-md-6 col-12">
                                    <div class="card">
                                        <a href="lessons?action=detail&id=<?=$lesson_id;?>">
                                            <img class="card-img-top img-fluid" src="../<?=$lesson_image;?>" alt="<?=$lesson_name;?>" />
                                        </a>
                                        <div class="card-body">
                                            <h4 class="card-title">
                                                <a href="lessons?action=detail&id=<?=$lesson_id;?>" class="blog-title-truncate text-body-heading"><?=$lesson_name;?></a>
                                            </h4>
                                            <div class="media">
                                                <div class="avatar mr-50">
                                                    <img src="../<?=$lesson_teacher_avatar;?>" alt="Avatar" width="24" height="24" />
                                                </div>
                                                <div class="media-body">
                                                    <small class="text-muted mr-25">Оруулсан: </small>
                                                    <small><a href="teachers?action=detail&id=<?=$lesson_teacher_id;?>" class="text-body"><?=$lesson_teacher_name;?></a></small>
                                                    <span class="text-muted ml-50 mr-25">|</span>
                                                    <small class="text-muted"><?=substr($lesson_date,0,10);?></small>
                                                </div>
                                            </div>
                                            
                                            <p class="card-text blog-content-truncate mt-2">
                                                <?=$lesson_description;?>
                                            </p>
                                            <hr />
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div class="d-flex align-items-center">
                                                    <i data-feather="tag" class="font-medium-1 text-body mr-50"></i>
                                                    <span class="text-body font-weight-bold"><?=$lesson_category;?></span>
                                                </div>


                                                <a href="lessons?action=edit&id=<?=$lesson_id;?>" class="font-weight-bold text-success">Засах</a>
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
                    $lesson_id = $_GET["id"];
                  
                            $sql = "SELECT lessons.*, teachers.name teacher_name, teachers.avatar teacher_avatar
                            FROM lessons LEFT JOIN teachers ON lessons.teacher=teachers.id WHERE lessons.id='$lesson_id'";
                            $result = mysqli_query($conn,$sql);
                            if (mysqli_num_rows($result)==1)
                            {
                                $data = mysqli_fetch_array($result);                            
                                $lesson_id = $data["id"];
                                $lesson_name = $data["name"];
                                $lesson_description = $data["description"];
                                $lesson_teacher_id = $data["teacher"];
                                $lesson_teacher_name = $data["teacher_name"];
                                $lesson_teacher_avatar = $data["teacher_avatar"];
                                $lesson_image = $data["image"];
                                $lesson_visited = $data["visited"];
                                $lesson_bought = $data["bought"];
                                $lesson_price = $data["price"];
                                $lesson_date = $data["created_date"];
                                $lesson_subjects = $data["subjects"];

                                ?>
                                <div class="blog-detail-wrapper">
                                    <div class="row">
                                        <!-- Blog -->
                                        <div class="col-8">
                                            <div class="card">
                                                <img src="../<?=$lesson_image;?>" class="img-fluid card-img-top" alt="<?=$lesson_name;?>" />
                                                <div class="card-body">
                                                    <h4 class="card-title"><?=$lesson_name;?></h4>
                                                    <div class="media">
                                                        <div class="avatar mr-50">
                                                            <img src="../../../app-assets/images/portrait/small/avatar-s-7.jpg" alt="Avatar" width="24" height="24" />
                                                        </div>
                                                        <div class="media-body">
                                                            <small class="text-muted mr-25">by</small>
                                                            <small><a href="javascript:void(0);" class="text-body">Ghani Pradita</a></small>
                                                            <span class="text-muted ml-50 mr-25">|</span>
                                                            <small class="text-muted">Jan 10, 2020</small>
                                                        </div>
                                                    </div>
                                                    <div class="my-1 py-25">
                                                        <a href="javascript:void(0);">
                                                            <div class="badge badge-pill badge-light-danger mr-50">Gaming</div>
                                                        </a>
                                                        <a href="javascript:void(0);">
                                                            <div class="badge badge-pill badge-light-warning">Video</div>
                                                        </a>
                                                    </div>
                                                    <p class="card-text mb-2">
                                                        Before you get into the nitty-gritty of coming up with a perfect title, start with a rough draft: your
                                                        working title. What is that, exactly? A lot of people confuse working titles with topics. Let's clear that
                                                        Topics are very general and could yield several different blog posts. Think "raising healthy kids," or
                                                        "kitchen storage." A writer might look at either of those topics and choose to take them in very, very
                                                        different directions.A working title, on the other hand, is very specific and guides the creation of a
                                                        single blog post. For example, from the topic "raising healthy kids," you could derive the following working
                                                        title See how different and specific each of those is? That's what makes them working titles, instead of
                                                        overarching topics.
                                                    </p>
                                                    <h4 class="mb-75">Unprecedented Challenge</h4>
                                                    <ul class="p-0 mb-2">
                                                        <li class="d-block">
                                                            <span class="mr-25">-</span>
                                                            <span>Preliminary thinking systems</span>
                                                        </li>
                                                        <li class="d-block">
                                                            <span class="mr-25">-</span>
                                                            <span>Bandwidth efficient</span>
                                                        </li>
                                                        <li class="d-block">
                                                            <span class="mr-25">-</span>
                                                            <span>Green space</span>
                                                        </li>
                                                        <li class="d-block">
                                                            <span class="mr-25">-</span>
                                                            <span>Social impact</span>
                                                        </li>
                                                        <li class="d-block">
                                                            <span class="mr-25">-</span>
                                                            <span>Thought partnership</span>
                                                        </li>
                                                        <li class="d-block">
                                                            <span class="mr-25">-</span>
                                                            <span>Fully ethical life</span>
                                                        </li>
                                                    </ul>
                                                    <div class="media">
                                                        <div class="avatar mr-2">
                                                            <img src="../../../app-assets/images/portrait/small/avatar-s-6.jpg" width="60" height="60" alt="Avatar" />
                                                        </div>
                                                        <div class="media-body">
                                                            <h6 class="font-weight-bolder">Willie Clark</h6>
                                                            <p class="card-text mb-0">
                                                                Based in London, Uncode is a blog by Willie Clark. His posts explore modern design trends through photos
                                                                and quotes by influential creatives and web designer around the world.
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <hr class="my-2" />
                                                    <div class="d-flex align-items-center justify-content-between">
                                                        <div class="d-flex align-items-center">
                                                            <div class="d-flex align-items-center mr-1">
                                                                <a href="javascript:void(0);" class="mr-50">
                                                                    <i data-feather="message-square" class="font-medium-5 text-body align-middle"></i>
                                                                </a>
                                                                <a href="javascript:void(0);">
                                                                    <div class="text-body align-middle">19.1K</div>
                                                                </a>
                                                            </div>
                                                            <div class="d-flex align-items-center">
                                                                <a href="javascript:void(0);" class="mr-50">
                                                                    <i data-feather="bookmark" class="font-medium-5 text-body align-middle"></i>
                                                                </a>
                                                                <a href="javascript:void(0);">
                                                                    <div class="text-body align-middle">139</div>
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <div class="dropdown blog-detail-share">
                                                            <i data-feather="share-2" class="font-medium-5 text-body cursor-pointer" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></i>
                                                            <div class="dropdown-menu dropdown-menu-right">
                                                                <a href="javascript:void(0);" class="dropdown-item py-50 px-1">
                                                                    <i data-feather="github" class="font-medium-3"></i>
                                                                </a>
                                                                <a href="javascript:void(0);" class="dropdown-item py-50 px-1">
                                                                    <i data-feather="gitlab" class="font-medium-3"></i>
                                                                </a>
                                                                <a href="javascript:void(0);" class="dropdown-item py-50 px-1">
                                                                    <i data-feather="facebook" class="font-medium-3"></i>
                                                                </a>
                                                                <a href="javascript:void(0);" class="dropdown-item py-50 px-1">
                                                                    <i data-feather="twitter" class="font-medium-3"></i>
                                                                </a>
                                                                <a href="javascript:void(0);" class="dropdown-item py-50 px-1">
                                                                    <i data-feather="linkedin" class="font-medium-3"></i>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--/ Blog -->

                                        <div class="col-3">
                                            <div class="sidebar-detached sidebar-right">
                                                <div class="sidebar">
                                                    <div class="blog-sidebar my-2 my-lg-0">
                                                        <!-- Search bar -->
                                                        <div class="blog-search">
                                                            <div class="input-group input-group-merge">
                                                                <input type="text" class="form-control" placeholder="Search here" />
                                                                <div class="input-group-append">
                                                                    <span class="input-group-text cursor-pointer">
                                                                        <i data-feather="search"></i>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--/ Search bar -->

                                                        <!-- Recent Posts -->
                                                        <div class="blog-recent-posts mt-3">
                                                            <h6 class="section-label">Recent Posts</h6>
                                                            <div class="mt-75">
                                                                <div class="media mb-2">
                                                                    <a href="page-blog-detail.html" class="mr-2">
                                                                        <img class="rounded" src="../../../app-assets/images/banner/banner-22.jpg" width="100" height="70" alt="Recent Post Pic" />
                                                                    </a>
                                                                    <div class="media-body">
                                                                        <h6 class="blog-recent-post-title">
                                                                            <a href="page-blog-detail.html" class="text-body-heading">Why Should Forget Facebook?</a>
                                                                        </h6>
                                                                        <div class="text-muted mb-0">Jan 14 2020</div>
                                                                    </div>
                                                                </div>
                                                                <div class="media mb-2">
                                                                    <a href="page-blog-detail.html" class="mr-2">
                                                                        <img class="rounded" src="../../../app-assets/images/banner/banner-27.jpg" width="100" height="70" alt="Recent Post Pic" />
                                                                    </a>
                                                                    <div class="media-body">
                                                                        <h6 class="blog-recent-post-title">
                                                                            <a href="page-blog-detail.html" class="text-body-heading">Publish your passions, your way</a>
                                                                        </h6>
                                                                        <div class="text-muted mb-0">Mar 04 2020</div>
                                                                    </div>
                                                                </div>
                                                                <div class="media mb-2">
                                                                    <a href="page-blog-detail.html" class="mr-2">
                                                                        <img class="rounded" src="../../../app-assets/images/banner/banner-39.jpg" width="100" height="70" alt="Recent Post Pic" />
                                                                    </a>
                                                                    <div class="media-body">
                                                                        <h6 class="blog-recent-post-title">
                                                                            <a href="page-blog-detail.html" class="text-body-heading">The Best Ways to Retain More</a>
                                                                        </h6>
                                                                        <div class="text-muted mb-0">Feb 18 2020</div>
                                                                    </div>
                                                                </div>
                                                                <div class="media">
                                                                    <a href="page-blog-detail.html" class="mr-2">
                                                                        <img class="rounded" src="../../../app-assets/images/banner/banner-35.jpg" width="100" height="70" alt="Recent Post Pic" />
                                                                    </a>
                                                                    <div class="media-body">
                                                                        <h6 class="blog-recent-post-title">
                                                                            <a href="page-blog-detail.html" class="text-body-heading">Share a Shocking Fact or Statistic</a>
                                                                        </h6>
                                                                        <div class="text-muted mb-0">Oct 08 2020</div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--/ Recent Posts -->

                                                        <!-- Categories -->
                                                        <div class="blog-categories mt-3">
                                                            <h6 class="section-label">Categories</h6>
                                                            <div class="mt-1">
                                                                <div class="d-flex justify-content-start align-items-center mb-75">
                                                                    <a href="javascript:void(0);" class="mr-75">
                                                                        <div class="avatar bg-light-primary rounded">
                                                                            <div class="avatar-content">
                                                                                <i data-feather="watch" class="avatar-icon font-medium-1"></i>
                                                                            </div>
                                                                        </div>
                                                                    </a>
                                                                    <a href="javascript:void(0);">
                                                                        <div class="blog-category-title text-body">Fashion</div>
                                                                    </a>
                                                                </div>
                                                                <div class="d-flex justify-content-start align-items-center mb-75">
                                                                    <a href="javascript:void(0);" class="mr-75">
                                                                        <div class="avatar bg-light-success rounded">
                                                                            <div class="avatar-content">
                                                                                <i data-feather="shopping-cart" class="avatar-icon font-medium-1"></i>
                                                                            </div>
                                                                        </div>
                                                                    </a>
                                                                    <a href="javascript:void(0);">
                                                                        <div class="blog-category-title text-body">Food</div>
                                                                    </a>
                                                                </div>
                                                                <div class="d-flex justify-content-start align-items-center mb-75">
                                                                    <a href="javascript:void(0);" class="mr-75">
                                                                        <div class="avatar bg-light-danger rounded">
                                                                            <div class="avatar-content">
                                                                                <i data-feather="command" class="avatar-icon font-medium-1"></i>
                                                                            </div>
                                                                        </div>
                                                                    </a>
                                                                    <a href="javascript:void(0);">
                                                                        <div class="blog-category-title text-body">Gaming</div>
                                                                    </a>
                                                                </div>
                                                                <div class="d-flex justify-content-start align-items-center mb-75">
                                                                    <a href="javascript:void(0);" class="mr-75">
                                                                        <div class="avatar bg-light-info rounded">
                                                                            <div class="avatar-content">
                                                                                <i data-feather="hash" class="avatar-icon font-medium-1"></i>
                                                                            </div>
                                                                        </div>
                                                                    </a>
                                                                    <a href="javascript:void(0);">
                                                                        <div class="blog-category-title text-body">Quote</div>
                                                                    </a>
                                                                </div>
                                                                <div class="d-flex justify-content-start align-items-center">
                                                                    <a href="javascript:void(0);" class="mr-75">
                                                                        <div class="avatar bg-light-warning rounded">
                                                                            <div class="avatar-content">
                                                                                <i data-feather="video" class="avatar-icon font-medium-1"></i>
                                                                            </div>
                                                                        </div>
                                                                    </a>
                                                                    <a href="javascript:void(0);">
                                                                        <div class="blog-category-title text-body">Video</div>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--/ Categories -->
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?
                            }
                            else 
                            {
                                ?>
                                <div class="alert alert-danger" role="alert">
                                    <div class="alert-body">
                                    Видео контент олдсонгүй
                                    </div>
                                </div>
                                <?
                            }
                }
                ?>

                <?
                if ($action=="edit")
                {
                    $lesson_id = $_GET["id"];
                    $sql = "SELECT *FROM lessons WHERE id='$lesson_id'";
                    $result = mysqli_query($conn,$sql);
                    if (mysqli_num_rows($result)==1)
                    {
                        $data = mysqli_fetch_array($result);
                        $lesson_name = $data["name"];
                        $lesson_category = $data["category"];
                        $lesson_teacher = $data["teacher"];
                        $lesson_description = $data["description"];
                        $lesson_image = $data["image"];
                        $lesson_youtube = $data["youtube"];

                        ?>

                        <?
                    }
                    ?>
                    <section id="input-group-basic">
                        <form action="lessons?action=editing" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-header">
                                            <h4 class="card-title">Үндсэн мэдээлэл</h4>
                                        </div>
                                        <div class="card-body">
                                            
                                                <input type="hidden" name="lesson_id" value="<?=$lesson_id;?>">
                                                <div class="input-group mb-2">
                                                        <span class="input-group-text" id="basic-addon-search1"><i data-feather="home"></i></span>
                                                    <select class="form-control" name="category">
                                                        <?
                                                        $sql = "SELECT *FROM lessons_category ORDER BY dd";
                                                        $result= mysqli_query($conn,$sql);
                                                        while ($data = mysqli_fetch_array($result))
                                                        {
                                                            ?>
                                                            <option value="<?=$data["id"];?>" <?=($lesson_category == $data["id"])?'SELECTED':'';?>><?=$data["name"];?></option>
                                                            <?
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                                
                                                <div class="input-group mb-2">
                                                    <span class="input-group-text" id="basic-addon-search1"><i data-feather="tag"></i></span>
                                                    <input type="text" class="form-control" name="name" value="<?=$lesson_name;?>" placeholder="Нэр..." />
                                                </div>

                                                <div class="input-group mb-2">
                                                    <span class="input-group-text" id="basic-addon-search1"><i data-feather="users"></i></span>
                                                    <select class="form-control" name="teacher">
                                                        <?
                                                        $sql = "SELECT *FROM teachers";
                                                        $result= mysqli_query($conn,$sql);
                                                        while ($data = mysqli_fetch_array($result))
                                                        {
                                                            ?>
                                                            <option value="<?=$data["id"];?>" <?=($lesson_teacher == $data["id"])?'SELECTED':'';?>><?=$data["name"];?></option>
                                                            <?
                                                        }
                                                        ?>
                                                    </select>
                                                </div>

                                                <div class="input-group mb-2">
                                                    <span class="input-group-text">Тайлбар</span>
                                                    <textarea class="form-control" aria-label="With textarea" name="description"><?=$lesson_description;?></textarea>
                                                </div>

                                                <div class="input-group mb-2">
                                                    <span class="input-group-text" id="basic-addon-search1"><i data-feather="play"></i></span>
                                                    <input type="text" class="form-control" name="youtube" value="<?=$lesson_youtube;?>" placeholder="Youtube" />
                                                </div>


                                                <input type="submit" class="btn btn-success waves-effect waves-float waves-light mt-1" value="Хадгалах">
                                        </div>

                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-header">
                                            <h4 class="card-title">Зураг</h4>
                                        </div>
                                        <div class="card-body">
                                            <?
                                            if ($lesson_image<>"")
                                            {
                                                ?>
                                                <img src="../<?=$lesson_image;?>" style="max-width:100%;">
                                                <?
                                                
                                            }
                                            ?>
                                            <input type="file" class="form-control" name="image"/>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </form>
                    </section>
                    <a href="lessons?action=delete&id=<?=$lesson_id;?>" class="btn btn-danger">Устгах</a>
                    <?
                }
                ?>


                <?
                if ($action=="editing")
                {
                    $lesson_id = $_POST["lesson_id"];
                    $name = $_POST["name"];
                    $description = $_POST["description"];
                    $category = $_POST["category"];
                    $teacher = $_POST["teacher"];
                    $youtube = $_POST["youtube"];

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
                                    {
                                        $image_source = resize_image($target_file, 600, 800);
                                        imagejpeg ($image_source,$target_file);
                                        $target_file= substr($target_file,3);
                                        $sql = "UPDATE lessons SET image='$target_file' WHERE id='$lesson_id'";
                                        mysqli_query($conn,$sql);
                                    }
            
                                }
                        }

                    $sql = "UPDATE lessons SET name='$name',description='$description',category='$category',teacher='$teacher',youtube='$youtube' WHERE id='$lesson_id'";


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
                    <a class="btn btn-success" href="lessons?action=edit&id=<?=$lesson_id;?>">Засах</a>
                    <a class="btn btn-primary" href="lessons?action=detail&id=<?=$lesson_id;?>">Дэлгэрэнгүй</a>
                    <a class="btn btn-primary" href="lessons">Жагсаалт</a>
                    <?
                    
                }
                ?>

                <?
                if ($action=="new")
                {
                    ?>
                    <section id="input-group-basic">
                        <form action="lessons?action=adding" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-header">
                                            <h4 class="card-title">Үндсэн мэдээлэл</h4>
                                        </div>
                                        <div class="card-body">
                                            
                                                <input type="hidden" name="lesson_id" value="<?=$lesson_id;?>">
                                                <div class="input-group mb-2">
                                                        <span class="input-group-text" id="basic-addon-search1"><i data-feather="tag"></i></span>
                                                    <select class="form-control" name="category">
                                                        <?
                                                        $sql = "SELECT *FROM lessons_category ORDER BY dd";
                                                        $result= mysqli_query($conn,$sql);
                                                        while ($data = mysqli_fetch_array($result))
                                                        {
                                                            ?>
                                                            <option value="<?=$data["id"];?>"><?=$data["name"];?></option>
                                                            <?
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                                
                                                <div class="input-group mb-2">
                                                    <span class="input-group-text" id="basic-addon-search1"><i data-feather="home"></i></span>
                                                    <input type="text" class="form-control" name="name" value="" placeholder="Нэр..." />
                                                </div>

                                                <div class="input-group mb-2">
                                                    <span class="input-group-text" id="basic-addon-search1"><i data-feather="user"></i></span>
                                                    <select class="form-control" name="teacher">
                                                        <?
                                                        $sql = "SELECT *FROM teachers";
                                                        $result= mysqli_query($conn,$sql);
                                                        while ($data = mysqli_fetch_array($result))
                                                        {
                                                            ?>
                                                            <option value="<?=$data["id"];?>"><?=$data["name"];?></option>
                                                            <?
                                                        }
                                                        ?>
                                                    </select>
                                                </div>

                                                <div class="input-group mb-2">
                                                    <span class="input-group-text">Тайлбар</span>
                                                    <textarea class="form-control" aria-label="With textarea" name="description"></textarea>
                                                </div>

                                                <div class="input-group mb-2">
                                                    <span class="input-group-text" id="basic-addon-search1"><i data-feather="play"></i></span>
                                                    <input type="text" class="form-control" name="youtube" value="" placeholder="Youtube" />
                                                </div>

                                                <input type="submit" class="btn btn-success waves-effect waves-float waves-light mt-1" value="Хадгалах">
                                        </div>

                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-header">
                                            <h4 class="card-title">Зураг</h4>
                                        </div>
                                        <div class="card-body">
                                            <input type="file" class="form-control" name="image"/>
                                        </div>
                                    </div>
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
                    $description = $_POST["description"];
                    $category = $_POST["category"];
                    $teacher = $_POST["teacher"];
                    $youtube = $_POST["youtube"];

                    $sql = "INSERT INTO lessons (name,description,category,teacher,youtube)  VALUES ('$name','$description','$category','$teacher','$youtube')";
                    if (mysqli_query($conn,$sql))
                    {
                        $lesson_id  = mysqli_insert_id ($conn);

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
                                    {
                                        $image_source = resize_image($target_file, 600, 800);
                                        imagejpeg ($image_source,$target_file);
                                        $target_file= substr($target_file,3);
                                        $sql = "UPDATE lessons SET image='$target_file' WHERE id='$lesson_id'";
                                        mysqli_query($conn,$sql);
                                    }
            
                                }
                        }
                        

                        
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
                    <a class="btn btn-success" href="lessons?action=edit&id=<?=$lesson_id;?>">Засах</a>
                    <a class="btn btn-primary" href="lessons?action=detail&id=<?=$lesson_id;?>">Дэлгэрэнгүй</a>
                    <a class="btn btn-primary" href="lessons">Жагсаалт</a>
                    <?
                    
                }
                ?>

                <?
                if ($action=="delete")
                {
                    $lesson_id = $_GET["id"];
                    $sql = "SELECT *FROM lessons WHERE id='$lesson_id'";
                    $result = mysqli_query($conn,$sql);
                    if (mysqli_num_rows($result)==1)
                    {
                        $data = mysqli_fetch_array($result);
                        $lesson_image = $data["image"];

                        $sql = "DELETE FROM lessons WHERE id='$lesson_id' LIMIT 1";                        
                        if (mysqli_query($conn,$sql))
                        {
                            if ($lesson_image!="" && file_exists('../'.$lesson_image)) unlink('../'.$lesson_image);

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
                        <a class="btn btn-primary" href="news">Жагсаалт</a>                    
                        <?
                    }
                }
                ?>

                <? 
                if ($action=="category")
                {
                    ?>
                    <div class="row">
                            <?
                            $sql = "SELECT *FROM lessons_category ORDER BY dd";
                            $result = mysqli_query($conn,$sql);
                            while ($data = mysqli_fetch_array($result))
                            {
                                $category_name = $data["name"];
                                $category_id = $data["id"];
                                $category_dd = $data["dd"];
                                $category_image = $data["image"];
                                
                                ?>
                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="media-list">
                                                <div class="media">
                                                    <div class="media-left">
                                                        <img src="../<?=$category_image;?>" alt="avatar" class="cursor-pointer" width="64" height="64">
                                                    </div>
                                                    <div class="media-body">
                                                        <h4 class="media-heading"><?=$category_name;?></h4>
                                                        <p>Жагсаалтын эрэмбэ:<?=$category_dd;?></p>
                                                        <a href="lessons?action=category_edit&id=<?=$category_id;?>" class="btn btn-success btn-sm waves-effect waves-float waves-light"><i data-feather='edit'></i> Засах</a>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <?
                            }
                            ?>
                    </div>
                    <?
                }
                ?>

                <?
                if ($action=="category_add")
                {
                    ?>
                    <section id="input-group-basic">
                        <form action="lessons?action=category_adding" method="post" enctype="multipart/form-data">
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
                                                        <span class="input-group-text" id="basic-addon-search1"><i data-feather="at-sign"></i></span>
                                                    </div>
                                                    <input type="text" class="form-control" name="name" placeholder="Ангиллын нэр..." />
                                                </div>

                                                <div class="input-group mb-2">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon-search1"><i data-feather="cpu"></i></span>
                                                    </div>
                                                    <input type="number" class="form-control" name="dd" placeholder="Жагсаалтын эрэмбэ" value="0"/>
                                                </div>

                                                <input type="submit" class="btn btn-success waves-effect waves-float waves-light mt-1" value="Хадгалах">
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

                    $sql = "INSERT INTO lessons_category (name,dd,image)  VALUES ('$name','$dd','$target_file')";

                    if (mysqli_query($conn,$sql))
                    {
                        $category_id  = mysqli_insert_id ($conn);
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
                    <a class="btn btn-success" href="lessons?action=category_edit&id=<?=$category_id;?>">Засах</a>
                    <a class="btn btn-primary" href="lessons?action=category">Жагсаалт</a>
                    <?
                    
                }
                ?>

                <?
                if ($action=="category_edit")
                {
                    $category_id = $_GET["id"];
                    $sql = "SELECT *FROM lessons_category WHERE id='$category_id'";
                    $result = mysqli_query($conn,$sql);
                    if (mysqli_num_rows($result)==1)
                    {
                        $data = mysqli_fetch_array($result);
                        ?>
                        <section>
                            <form action="lessons?action=category_editing" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <!-- Basic -->
                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-header">
                                            <h4 class="card-title">Үндсэн мэдээлэл</h4>
                                        </div>
                                        <div class="card-body">
                                            
                                                <input type="hidden" name="id" value="<?=$category_id;?>">
                                                <div class="input-group mb-2">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon-search1"><i data-feather="at-sign"></i></span>
                                                    </div>
                                                    <input type="text" class="form-control" name="name" placeholder="Ангиллын нэр..." value="<?=$data["name"];?>"/>
                                                </div>

                                                <div class="input-group mb-2">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon-search1"><i data-feather="cpu"></i></span>
                                                    </div>
                                                    <input type="number" class="form-control" name="dd" placeholder="Жагсаалтын эрэмбэ" value="<?=$data["dd"];?>"/>
                                                </div>

                                                <input type="submit" class="btn btn-success waves-effect waves-float waves-light mt-1" value="Хадгалах">
                                            </form>
                                        </div>
                                    </div>

                                </div>                         

                                <div class="col-md-6">
                                    
                                    <div class="card">
                                        <div class="card-header">
                                            <h4 class="card-title">Зураг</h4>
                                        </div>
                                        <div class="card-body">
                                        
                                            <img src="../<?=$data["image"];?>" />

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
                            <a href="lessons?action=category_delete&id=<?=$category_id;?>" class="btn btn-danger btn-sm">Устгах</a>
                        </section>
                        <?

                    }
                    
                    
                }
                ?>


                <?
                if ($action=="category_editing")
                {

                    $category_id = $_POST["id"];
                    
                    $name = $_POST["name"];
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
                                $sql = "UPDATE category SET image='$target_file' WHERE id='$category_id'";

                                mysqli_query($conn,$sql);
        
                            }
                    }

                    
                   

                    $sql = "UPDATE lessons_category SET name='$name',dd='$dd' WHERE id='$category_id'";
                    
                    if (mysqli_query($conn,$sql))
                    {
                        ?>
                        <div class="alert alert-success" role="alert">
                            <div class="alert-body">
                               Амжилттай заслаа
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
                    <a class="btn btn-success" href="lessons?action=category_edit&id=<?=$category_id;?>">Засах</a>
                    <a class="btn btn-primary" href="lessons?action=category">Жагсаалт</a>
                    <?
                    
                }
                ?>

                <?
                if ($action=="category_delete")
                {
                    $category_id = $_GET["id"];
                    $sql = "SELECT *FROM lessons_category WHERE id='$category_id'";
                    $result = mysqli_query($conn,$sql);
                    if (mysqli_num_rows($result)==1)
                    {
                        $data = mysqli_fetch_array($result);
                        $image = $data["image"];
                        if (file_exists('../'.$image)) unlink('../'.$image);
                        $sql = "DELETE FROM lessons_category WHERE id=$category_id";
                        
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
                        <a class="btn btn-primary" href="lessons?action=category">Жагсаалт</a>
                        <?                        
                    }
                    else header("location:lessons?action=category");
                    
                    
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
