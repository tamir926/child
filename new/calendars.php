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
    <? if (isset($_GET["year"])) $year=$_GET["year"]; else $year=date("Y"); ?>

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
                            <h2 class="content-header-title float-start mb-0">Календар</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index">Нүүр</a>
                                    </li>
                                    <li class="breadcrumb-item active">Календар
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="content-header-right text-md-end col-md-3 col-12 d-md-block d-none">
                    <div class="mb-1 breadcrumb-right">
                        <div class="btn-group">
                            <a class="btn btn-success" href="calendars?action=edit&year=<?=$year;?>">Засах</a>
                            <div class="dropdown">
                                
                                <button class="btn-icon btn btn-primary btn-round btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i data-feather="calendar"></i></button>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <a class="dropdown-item" href="calendars?action=list&year=<?=intval(date("Y"))-1;?>"><?=intval(date("Y"))-1;?></a>
                                    <a class="dropdown-item" href="calendars?action=list&year=<?=intval(date("Y"));?>"><?=intval(date("Y"));?></a>
                                    <a class="dropdown-item" href="calendars?action=list&year=<?=intval(date("Y"))+1;?>"><?=intval(date("Y"))+1;?></a>
                                </div>
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
                                                <th>Он</th>
                                                <th>Сар</th>
                                                <th>Ажлын өдөр</th>
                                                <th>Амралтын өдөр</th>
                                                <th>Амралтын өдрүүд</th>
                                                <th>НӨАТ өдрүүд</th>
                                                <th>НДШ өдрүүд</th>
                                                <th>Санхүүгийн өдрүүд</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?
                                                $count =0;
                                                $sql = "SELECT *FROM calendars WHERE year='$year'";
                                                $result = mysqli_query($conn,$sql);
                                                while ($data = mysqli_fetch_array($result))
                                                {
                                                    ?>
                                                    <tr>
                                                        <td><?=$data["year"];?></td>
                                                        <td><?=$data["month"];?></td>
                                                        <td><?=$data["workdays"];?></td>
                                                        <td><?=$data["offdays"];?></td>
                                                        <td><?=$data["holidays"];?></td>
                                                        <td><?=$data["nuatdays"];?></td>
                                                        <td><?=$data["nddays"];?></td>
                                                        <td><?=$data["findays"];?></td>
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
                if ($action=="edit")
                {
                    ?>
                    <section id="input-group-basic">
                        <form action="calendars?action=editing" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="year" value="<?=$year;?>"/>
                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <table class="datatables-basic table">
                                            <thead>
                                                <tr>
                                                    <th>Он</th>
                                                    <th>Сар</th>
                                                    <th>Ажлын өдөр</th>
                                                    <th>Амралтын өдөр</th>
                                                    <th>Амралтын өдрүүд</th>
                                                    <th>НӨАТ өдрүүд</th>
                                                    <th>НДШ өдрүүд</th>
                                                    <th>Санхүүгийн өдрүүд</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                    <?
                                                    $sql = "SELECT * FROM calendars WHERE year='$year' AND month='1' LIMIT 1";
                                                    $result = mysqli_query($conn,$sql);
                                                    $data = mysqli_fetch_array($result);
                                                    ?>
                                                    <tr>
                                                        <td><?=$year;?></td>
                                                        <td>1-р</td>
                                                        <td><input type="text" class="form-control" name="workdays_1" value="<?=$data["workdays"];?>" placeholder="Ажлын өдрийн тоо" ></td>
                                                        <td><input type="text" class="form-control" name="offdays_1" value="<?=$data["offdays"];?>" placeholder="Амралтын өдрийн тоо" ></td>
                                                        <td><input type="text" class="form-control" name="holidays_1" value="<?=$data["holidays"];?>" placeholder="Баярын өдрүүд (,) таслан оруулна" ></td>
                                                        <td><input type="text" class="form-control" name="nuatdays_1" value="<?=$data["nuatdays"];?>" placeholder="НӨАТ өдрүүд (,) таслан оруулна" ></td>
                                                        <td><input type="text" class="form-control" name="nddays_1" value="<?=$data["nddays"];?>" placeholder="НДШ өдрүүд (,) таслан оруулна" ></td>
                                                        <td><input type="text" class="form-control" name="findays_1" value="<?=$data["findays"];?>" placeholder="Санхүүгийн өдрүүд (,) таслан оруулна" ></td>
                                                    </tr>

                                                    <?
                                                    $sql = "SELECT * FROM calendars WHERE year='$year' AND month='2' LIMIT 1";
                                                    $result = mysqli_query($conn,$sql);
                                                    $data = mysqli_fetch_array($result);
                                                    ?>

                                                    <tr>
                                                        <td><?=$year;?></td>
                                                        <td>2-р</td>
                                                        <td><input type="text" class="form-control" name="workdays_2" value="<?=$data["workdays"];?>" placeholder="Ажлын өдрийн тоо" ></td>
                                                        <td><input type="text" class="form-control" name="offdays_2" value="<?=$data["offdays"];?>" placeholder="Амралтын өдрийн тоо" ></td>
                                                        <td><input type="text" class="form-control" name="holidays_2" value="<?=$data["holidays"];?>" placeholder="Баярын өдрүүд (,) таслан оруулна" ></td>
                                                        <td><input type="text" class="form-control" name="nuatdays_2" value="<?=$data["nuatdays"];?>" placeholder="НӨАТ өдрүүд (,) таслан оруулна" ></td>
                                                        <td><input type="text" class="form-control" name="nddays_2" value="<?=$data["nddays"];?>" placeholder="НДШ өдрүүд (,) таслан оруулна" ></td>
                                                        <td><input type="text" class="form-control" name="findays_2" value="<?=$data["findays"];?>" placeholder="Санхүүгийн өдрүүд (,) таслан оруулна" ></td>
                                                    </tr>

                                                    <?
                                                    $sql = "SELECT * FROM calendars WHERE year='$year' AND month='3' LIMIT 1";
                                                    $result = mysqli_query($conn,$sql);
                                                    $data = mysqli_fetch_array($result);
                                                    ?>

                                                    <tr>
                                                        <td><?=$year;?></td>
                                                        <td>3-р</td>
                                                        <td><input type="text" class="form-control" name="workdays_3" value="<?=$data["workdays"];?>" placeholder="Ажлын өдрийн тоо" ></td>
                                                        <td><input type="text" class="form-control" name="offdays_3" value="<?=$data["offdays"];?>" placeholder="Амралтын өдрийн тоо" ></td>
                                                        <td><input type="text" class="form-control" name="holidays_3" value="<?=$data["holidays"];?>" placeholder="Баярын өдрүүд (,) таслан оруулна" ></td>
                                                        <td><input type="text" class="form-control" name="nuatdays_3" value="<?=$data["nuatdays"];?>" placeholder="НӨАТ өдрүүд (,) таслан оруулна" ></td>
                                                        <td><input type="text" class="form-control" name="nddays_3" value="<?=$data["nddays"];?>" placeholder="НДШ өдрүүд (,) таслан оруулна" ></td>
                                                        <td><input type="text" class="form-control" name="findays_3" value="<?=$data["findays"];?>" placeholder="Санхүүгийн өдрүүд (,) таслан оруулна" ></td>
                                                    </tr>

                                                    <?
                                                    $sql = "SELECT * FROM calendars WHERE year='$year' AND month='4' LIMIT 1";
                                                    $result = mysqli_query($conn,$sql);
                                                    $data = mysqli_fetch_array($result);
                                                    ?>

                                                    <tr>
                                                        <td><?=$year;?></td>
                                                        <td>4-р</td>
                                                        <td><input type="text" class="form-control" name="workdays_4" value="<?=$data["workdays"];?>" placeholder="Ажлын өдрийн тоо" ></td>
                                                        <td><input type="text" class="form-control" name="offdays_4" value="<?=$data["offdays"];?>" placeholder="Амралтын өдрийн тоо" ></td>
                                                        <td><input type="text" class="form-control" name="holidays_4" value="<?=$data["holidays"];?>" placeholder="Баярын өдрүүд (,) таслан оруулна" ></td>
                                                        <td><input type="text" class="form-control" name="nuatdays_4" value="<?=$data["nuatdays"];?>" placeholder="НӨАТ өдрүүд (,) таслан оруулна" ></td>
                                                        <td><input type="text" class="form-control" name="nddays_4" value="<?=$data["nddays"];?>" placeholder="НДШ өдрүүд (,) таслан оруулна" ></td>
                                                        <td><input type="text" class="form-control" name="findays_4" value="<?=$data["findays"];?>" placeholder="Санхүүгийн өдрүүд (,) таслан оруулна" ></td>
                                                    </tr>


                                                    <?
                                                    $sql = "SELECT * FROM calendars WHERE year='$year' AND month='5' LIMIT 1";
                                                    $result = mysqli_query($conn,$sql);
                                                    $data = mysqli_fetch_array($result);
                                                    ?>

                                                    <tr>
                                                        <td><?=$year;?></td>
                                                        <td>5-р</td>
                                                        <td><input type="text" class="form-control" name="workdays_5" value="<?=$data["workdays"];?>" placeholder="Ажлын өдрийн тоо" ></td>
                                                        <td><input type="text" class="form-control" name="offdays_5" value="<?=$data["offdays"];?>" placeholder="Амралтын өдрийн тоо" ></td>
                                                        <td><input type="text" class="form-control" name="holidays_5" value="<?=$data["holidays"];?>" placeholder="Баярын өдрүүд (,) таслан оруулна" ></td>
                                                        <td><input type="text" class="form-control" name="nuatdays_5" value="<?=$data["nuatdays"];?>" placeholder="НӨАТ өдрүүд (,) таслан оруулна" ></td>
                                                        <td><input type="text" class="form-control" name="nddays_5" value="<?=$data["nddays"];?>" placeholder="НДШ өдрүүд (,) таслан оруулна" ></td>
                                                        <td><input type="text" class="form-control" name="findays_5" value="<?=$data["findays"];?>" placeholder="Санхүүгийн өдрүүд (,) таслан оруулна" ></td>
                                                    </tr>


                                                    <?
                                                    $sql = "SELECT * FROM calendars WHERE year='$year' AND month='6' LIMIT 1";
                                                    $result = mysqli_query($conn,$sql);
                                                    $data = mysqli_fetch_array($result);
                                                    ?>

                                                    <tr>
                                                        <td><?=$year;?></td>
                                                        <td>6-р</td>
                                                        <td><input type="text" class="form-control" name="workdays_6" value="<?=$data["workdays"];?>" placeholder="Ажлын өдрийн тоо" ></td>
                                                        <td><input type="text" class="form-control" name="offdays_6" value="<?=$data["offdays"];?>" placeholder="Амралтын өдрийн тоо" ></td>
                                                        <td><input type="text" class="form-control" name="holidays_6" value="<?=$data["holidays"];?>" placeholder="Баярын өдрүүд (,) таслан оруулна" ></td>
                                                        <td><input type="text" class="form-control" name="nuatdays_6" value="<?=$data["nuatdays"];?>" placeholder="НӨАТ өдрүүд (,) таслан оруулна" ></td>
                                                        <td><input type="text" class="form-control" name="nddays_6" value="<?=$data["nddays"];?>" placeholder="НДШ өдрүүд (,) таслан оруулна" ></td>
                                                        <td><input type="text" class="form-control" name="findays_6" value="<?=$data["findays"];?>" placeholder="Санхүүгийн өдрүүд (,) таслан оруулна" ></td>
                                                    </tr>


                                                    <?
                                                    $sql = "SELECT * FROM calendars WHERE year='$year' AND month='7' LIMIT 1";
                                                    $result = mysqli_query($conn,$sql);
                                                    $data = mysqli_fetch_array($result);
                                                    ?>
                                                    <tr>
                                                        <td><?=$year;?></td>
                                                        <td>7-р</td>
                                                        <td><input type="text" class="form-control" name="workdays_7" value="<?=$data["workdays"];?>" placeholder="Ажлын өдрийн тоо" ></td>
                                                        <td><input type="text" class="form-control" name="offdays_7" value="<?=$data["offdays"];?>" placeholder="Амралтын өдрийн тоо" ></td>
                                                        <td><input type="text" class="form-control" name="holidays_7" value="<?=$data["holidays"];?>" placeholder="Баярын өдрүүд (,) таслан оруулна" ></td>
                                                        <td><input type="text" class="form-control" name="nuatdays_7" value="<?=$data["nuatdays"];?>" placeholder="НӨАТ өдрүүд (,) таслан оруулна" ></td>
                                                        <td><input type="text" class="form-control" name="nddays_7" value="<?=$data["nddays"];?>" placeholder="НДШ өдрүүд (,) таслан оруулна" ></td>
                                                        <td><input type="text" class="form-control" name="findays_7" value="<?=$data["findays"];?>" placeholder="Санхүүгийн өдрүүд (,) таслан оруулна" ></td>
                                                    </tr>

                                                    <?
                                                    $sql = "SELECT * FROM calendars WHERE year='$year' AND month='8' LIMIT 1";
                                                    $result = mysqli_query($conn,$sql);
                                                    $data = mysqli_fetch_array($result);
                                                    ?>

                                                    <tr>
                                                        <td><?=$year;?></td>
                                                        <td>8-р</td>
                                                        <td><input type="text" class="form-control" name="workdays_8" value="<?=$data["workdays"];?>" placeholder="Ажлын өдрийн тоо" ></td>
                                                        <td><input type="text" class="form-control" name="offdays_8" value="<?=$data["offdays"];?>" placeholder="Амралтын өдрийн тоо" ></td>
                                                        <td><input type="text" class="form-control" name="holidays_8" value="<?=$data["holidays"];?>" placeholder="Баярын өдрүүд (,) таслан оруулна" ></td>
                                                        <td><input type="text" class="form-control" name="nuatdays_8" value="<?=$data["nuatdays"];?>" placeholder="НӨАТ өдрүүд (,) таслан оруулна" ></td>
                                                        <td><input type="text" class="form-control" name="nddays_8" value="<?=$data["nddays"];?>" placeholder="НДШ өдрүүд (,) таслан оруулна" ></td>
                                                        <td><input type="text" class="form-control" name="findays_8" value="<?=$data["findays"];?>" placeholder="Санхүүгийн өдрүүд (,) таслан оруулна" ></td>
                                                    </tr>

                                                    <?
                                                    $sql = "SELECT * FROM calendars WHERE year='$year' AND month='9' LIMIT 1";
                                                    $result = mysqli_query($conn,$sql);
                                                    $data = mysqli_fetch_array($result);
                                                    ?>

                                                    <tr>
                                                        <td><?=$year;?></td>
                                                        <td>9-р</td>
                                                        <td><input type="text" class="form-control" name="workdays_9" value="<?=$data["workdays"];?>" placeholder="Ажлын өдрийн тоо" ></td>
                                                        <td><input type="text" class="form-control" name="offdays_9" value="<?=$data["offdays"];?>" placeholder="Амралтын өдрийн тоо" ></td>
                                                        <td><input type="text" class="form-control" name="holidays_9" value="<?=$data["holidays"];?>" placeholder="Баярын өдрүүд (,) таслан оруулна" ></td>
                                                        <td><input type="text" class="form-control" name="nuatdays_9" value="<?=$data["nuatdays"];?>" placeholder="НӨАТ өдрүүд (,) таслан оруулна" ></td>
                                                        <td><input type="text" class="form-control" name="nddays_9" value="<?=$data["nddays"];?>" placeholder="НДШ өдрүүд (,) таслан оруулна" ></td>
                                                        <td><input type="text" class="form-control" name="findays_9" value="<?=$data["findays"];?>" placeholder="Санхүүгийн өдрүүд (,) таслан оруулна" ></td>
                                                    </tr>

                                                    <?
                                                    $sql = "SELECT * FROM calendars WHERE year='$year' AND month='10' LIMIT 1";
                                                    $result = mysqli_query($conn,$sql);
                                                    $data = mysqli_fetch_array($result);
                                                    ?>

                                                    <tr>
                                                        <td><?=$year;?></td>
                                                        <td>10-р</td>
                                                        <td><input type="text" class="form-control" name="workdays_10" value="<?=$data["workdays"];?>" placeholder="Ажлын өдрийн тоо" ></td>
                                                        <td><input type="text" class="form-control" name="offdays_10" value="<?=$data["offdays"];?>" placeholder="Амралтын өдрийн тоо" ></td>
                                                        <td><input type="text" class="form-control" name="holidays_10" value="<?=$data["holidays"];?>" placeholder="Баярын өдрүүд (,) таслан оруулна" ></td>
                                                        <td><input type="text" class="form-control" name="nuatdays_10" value="<?=$data["nuatdays"];?>" placeholder="НӨАТ өдрүүд (,) таслан оруулна" ></td>
                                                        <td><input type="text" class="form-control" name="nddays_10" value="<?=$data["nddays"];?>" placeholder="НДШ өдрүүд (,) таслан оруулна" ></td>
                                                        <td><input type="text" class="form-control" name="findays_10" value="<?=$data["findays"];?>" placeholder="Санхүүгийн өдрүүд (,) таслан оруулна" ></td>
                                                    </tr>


                                                    <?
                                                    $sql = "SELECT * FROM calendars WHERE year='$year' AND month='11' LIMIT 1";
                                                    $result = mysqli_query($conn,$sql);
                                                    $data = mysqli_fetch_array($result);
                                                    ?>

                                                    <tr>
                                                        <td><?=$year;?></td>
                                                        <td>11-р</td>
                                                        <td><input type="text" class="form-control" name="workdays_11" value="<?=$data["workdays"];?>" placeholder="Ажлын өдрийн тоо" ></td>
                                                        <td><input type="text" class="form-control" name="offdays_11" value="<?=$data["offdays"];?>" placeholder="Амралтын өдрийн тоо" ></td>
                                                        <td><input type="text" class="form-control" name="holidays_11" value="<?=$data["holidays"];?>" placeholder="Баярын өдрүүд (,) таслан оруулна" ></td>
                                                        <td><input type="text" class="form-control" name="nuatdays_11" value="<?=$data["nuatdays"];?>" placeholder="НӨАТ өдрүүд (,) таслан оруулна" ></td>
                                                        <td><input type="text" class="form-control" name="nddays_11" value="<?=$data["nddays"];?>" placeholder="НДШ өдрүүд (,) таслан оруулна" ></td>
                                                        <td><input type="text" class="form-control" name="findays_11" value="<?=$data["findays"];?>" placeholder="Санхүүгийн өдрүүд (,) таслан оруулна" ></td>
                                                    </tr>


                                                    <?
                                                    $sql = "SELECT * FROM calendars WHERE year='$year' AND month='12' LIMIT 1";
                                                    $result = mysqli_query($conn,$sql);
                                                    $data = mysqli_fetch_array($result);
                                                    ?>

                                                    <tr>
                                                        <td><?=$year;?></td>
                                                        <td>12-р</td>
                                                        <td><input type="text" class="form-control" name="workdays_12" value="<?=$data["workdays"];?>" placeholder="Ажлын өдрийн тоо" ></td>
                                                        <td><input type="text" class="form-control" name="offdays_12" value="<?=$data["offdays"];?>" placeholder="Амралтын өдрийн тоо" ></td>
                                                        <td><input type="text" class="form-control" name="holidays_12" value="<?=$data["holidays"];?>" placeholder="Баярын өдрүүд (,) таслан оруулна" ></td>
                                                        <td><input type="text" class="form-control" name="nuatdays_12" value="<?=$data["nuatdays"];?>" placeholder="НӨАТ өдрүүд (,) таслан оруулна" ></td>
                                                        <td><input type="text" class="form-control" name="nddays_12" value="<?=$data["nddays"];?>" placeholder="НДШ өдрүүд (,) таслан оруулна" ></td>
                                                        <td><input type="text" class="form-control" name="findays_12" value="<?=$data["findays"];?>" placeholder="Санхүүгийн өдрүүд (,) таслан оруулна" ></td>
                                                    </tr>
                                                   
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <input type="submit" class="btn btn-success waves-effect waves-float waves-light" value="хадгалах">

                        </form>
                    </section>
                    <?
                }
                ?>


                <?
                if ($action=="editing")
                {
                    $counter =0;
                    $year = $_POST["year"];
                    $workdays = $_POST["workdays_1"];
                    $offdays = $_POST["offdays_1"];
                    $holidays = $_POST["holidays_1"];
                    $nuatdays = $_POST["nuatdays_1"];
                    $nddays = $_POST["nddays_1"];
                    $findays = $_POST["findays_1"];

                    $sql = "SELECT *FROM calendars WHERE year='$year' AND month=1";
                    $result = mysqli_query($conn,$sql);
                    if (mysqli_num_rows($result)==1)
                    $sql = "UPDATE calendars SET workdays='$workdays',offdays='$offdays',holidays='$holidays',nuatdays='$nuatdays',nddays='$nddays',findays='$findays' WHERE year='$year' AND month=1 LIMIT 1";
                    else 
                    $sql = "INSERT INTO calendars (workdays,offdays,holidays,nuatdays,nddays,findays,month,year) VALUE ('$workdays','$offdays','$holidays','$nuatdays','$nddays','$findays',1,'$year')";
                    if (mysqli_query($conn,$sql)) $counter++;

                    $workdays = $_POST["workdays_2"];
                    $offdays = $_POST["offdays_2"];
                    $holidays = $_POST["holidays_2"];
                    $nuatdays = $_POST["nuatdays_2"];
                    $nddays = $_POST["nddays_2"];
                    $findays = $_POST["findays_2"];

                    $sql = "SELECT *FROM calendars WHERE year='$year' AND month=2";
                    $result = mysqli_query($conn,$sql);
                    if (mysqli_num_rows($result)==1)
                    $sql = "UPDATE calendars SET workdays='$workdays',offdays='$offdays',holidays='$holidays',nuatdays='$nuatdays',nddays='$nddays',findays='$findays' WHERE year='$year' AND month=2 LIMIT 1";
                    else 
                    $sql = "INSERT INTO calendars (workdays,offdays,holidays,nuatdays,nddays,findays,month,year) VALUE ('$workdays','$offdays','$holidays','$nuatdays','$nddays','$findays',2,'$year')";
                    if (mysqli_query($conn,$sql)) $counter++;


                    $workdays = $_POST["workdays_3"];
                    $offdays = $_POST["offdays_3"];
                    $holidays = $_POST["holidays_3"];
                    $nuatdays = $_POST["nuatdays_3"];
                    $nddays = $_POST["nddays_3"];
                    $findays = $_POST["findays_3"];

                    $sql = "SELECT *FROM calendars WHERE year='$year' AND month=3";
                    $result = mysqli_query($conn,$sql);
                    if (mysqli_num_rows($result)==1)
                    $sql = "UPDATE calendars SET workdays='$workdays',offdays='$offdays',holidays='$holidays',nuatdays='$nuatdays',nddays='$nddays',findays='$findays' WHERE year='$year' AND month=3 LIMIT 1";
                    else 
                    $sql = "INSERT INTO calendars (workdays,offdays,holidays,nuatdays,nddays,findays,month,year) VALUE ('$workdays','$offdays','$holidays','$nuatdays','$nddays','$findays',3,'$year')";
                    if (mysqli_query($conn,$sql)) $counter++;


                    $workdays = $_POST["workdays_4"];
                    $offdays = $_POST["offdays_4"];
                    $holidays = $_POST["holidays_4"];
                    $nuatdays = $_POST["nuatdays_4"];
                    $nddays = $_POST["nddays_4"];
                    $findays = $_POST["findays_4"];

                    $sql = "SELECT *FROM calendars WHERE year='$year' AND month=4";
                    $result = mysqli_query($conn,$sql);
                    if (mysqli_num_rows($result)==1)
                    $sql = "UPDATE calendars SET workdays='$workdays',offdays='$offdays',holidays='$holidays',nuatdays='$nuatdays',nddays='$nddays',findays='$findays' WHERE year='$year' AND month=4 LIMIT 1";
                    else 
                    $sql = "INSERT INTO calendars (workdays,offdays,holidays,nuatdays,nddays,findays,month,year) VALUE ('$workdays','$offdays','$holidays','$nuatdays','$nddays','$findays',4,'$year')";
                    if (mysqli_query($conn,$sql)) $counter++;


                    $workdays = $_POST["workdays_5"];
                    $offdays = $_POST["offdays_5"];
                    $holidays = $_POST["holidays_5"];
                    $nuatdays = $_POST["nuatdays_5"];
                    $nddays = $_POST["nddays_5"];
                    $findays = $_POST["findays_5"];

                    $sql = "SELECT *FROM calendars WHERE year='$year' AND month=5";
                    $result = mysqli_query($conn,$sql);
                    if (mysqli_num_rows($result)==1)
                    $sql = "UPDATE calendars SET workdays='$workdays',offdays='$offdays',holidays='$holidays',nuatdays='$nuatdays',nddays='$nddays',findays='$findays' WHERE year='$year' AND month=5 LIMIT 1";
                    else 
                    $sql = "INSERT INTO calendars (workdays,offdays,holidays,nuatdays,nddays,findays,month,year) VALUE ('$workdays','$offdays','$holidays','$nuatdays','$nddays','$findays',5,'$year')";
                    if (mysqli_query($conn,$sql)) $counter++;

                    $workdays = $_POST["workdays_6"];
                    $offdays = $_POST["offdays_6"];
                    $holidays = $_POST["holidays_6"];
                    $nuatdays = $_POST["nuatdays_6"];
                    $nddays = $_POST["nddays_6"];
                    $findays = $_POST["findays_6"];

                    $sql = "SELECT *FROM calendars WHERE year='$year' AND month=6";
                    $result = mysqli_query($conn,$sql);
                    if (mysqli_num_rows($result)==1)
                    $sql = "UPDATE calendars SET workdays='$workdays',offdays='$offdays',holidays='$holidays',nuatdays='$nuatdays',nddays='$nddays',findays='$findays' WHERE year='$year' AND month=6 LIMIT 1";
                    else 
                    $sql = "INSERT INTO calendars (workdays,offdays,holidays,nuatdays,nddays,findays,month,year) VALUE ('$workdays','$offdays','$holidays','$nuatdays','$nddays','$findays',6,'$year')";
                    if (mysqli_query($conn,$sql)) $counter++;


                    $workdays = $_POST["workdays_7"];
                    $offdays = $_POST["offdays_7"];
                    $holidays = $_POST["holidays_7"];
                    $nuatdays = $_POST["nuatdays_7"];
                    $nddays = $_POST["nddays_7"];
                    $findays = $_POST["findays_7"];

                    $sql = "SELECT *FROM calendars WHERE year='$year' AND month=7";
                    $result = mysqli_query($conn,$sql);
                    if (mysqli_num_rows($result)==1)
                    $sql = "UPDATE calendars SET workdays='$workdays',offdays='$offdays',holidays='$holidays',nuatdays='$nuatdays',nddays='$nddays',findays='$findays' WHERE year='$year' AND month=7 LIMIT 1";
                    else 
                    $sql = "INSERT INTO calendars (workdays,offdays,holidays,nuatdays,nddays,findays,month,year) VALUE ('$workdays','$offdays','$holidays','$nuatdays','$nddays','$findays',7,'$year')";
                    if (mysqli_query($conn,$sql)) $counter++;

                    $workdays = $_POST["workdays_8"];
                    $offdays = $_POST["offdays_8"];
                    $holidays = $_POST["holidays_8"];
                    $nuatdays = $_POST["nuatdays_8"];
                    $nddays = $_POST["nddays_8"];
                    $findays = $_POST["findays_8"];

                    $sql = "SELECT *FROM calendars WHERE year='$year' AND month=8";
                    $result = mysqli_query($conn,$sql);
                    if (mysqli_num_rows($result)==1)
                    $sql = "UPDATE calendars SET workdays='$workdays',offdays='$offdays',holidays='$holidays',nuatdays='$nuatdays',nddays='$nddays',findays='$findays' WHERE year='$year' AND month=8 LIMIT 1";
                    else 
                    $sql = "INSERT INTO calendars (workdays,offdays,holidays,nuatdays,nddays,findays,month,year) VALUE ('$workdays','$offdays','$holidays','$nuatdays','$nddays','$findays',8,'$year')";
                    if (mysqli_query($conn,$sql)) $counter++;


                    $workdays = $_POST["workdays_9"];
                    $offdays = $_POST["offdays_9"];
                    $holidays = $_POST["holidays_9"];
                    $nuatdays = $_POST["nuatdays_9"];
                    $nddays = $_POST["nddays_9"];
                    $findays = $_POST["findays_9"];

                    $sql = "SELECT *FROM calendars WHERE year='$year' AND month=9";
                    $result = mysqli_query($conn,$sql);
                    if (mysqli_num_rows($result)==1)
                    $sql = "UPDATE calendars SET workdays='$workdays',offdays='$offdays',holidays='$holidays',nuatdays='$nuatdays',nddays='$nddays',findays='$findays' WHERE year='$year' AND month=9 LIMIT 1";
                    else 
                    $sql = "INSERT INTO calendars (workdays,offdays,holidays,nuatdays,nddays,findays,month,year) VALUE ('$workdays','$offdays','$holidays','$nuatdays','$nddays','$findays',9,'$year')";
                    if (mysqli_query($conn,$sql)) $counter++;


                    $workdays = $_POST["workdays_10"];
                    $offdays = $_POST["offdays_10"];
                    $holidays = $_POST["holidays_10"];
                    $nuatdays = $_POST["nuatdays_10"];
                    $nddays = $_POST["nddays_10"];
                    $findays = $_POST["findays_10"];

                    $sql = "SELECT *FROM calendars WHERE year='$year' AND month=10";
                    $result = mysqli_query($conn,$sql);
                    if (mysqli_num_rows($result)==1)
                    $sql = "UPDATE calendars SET workdays='$workdays',offdays='$offdays',holidays='$holidays',nuatdays='$nuatdays',nddays='$nddays',findays='$findays' WHERE year='$year' AND month=10 LIMIT 1";
                    else 
                    $sql = "INSERT INTO calendars (workdays,offdays,holidays,nuatdays,nddays,findays,month,year) VALUE ('$workdays','$offdays','$holidays','$nuatdays','$nddays','$findays',10,'$year')";
                    if (mysqli_query($conn,$sql)) $counter++;


                    $workdays = $_POST["workdays_11"];
                    $offdays = $_POST["offdays_11"];
                    $holidays = $_POST["holidays_11"];
                    $nuatdays = $_POST["nuatdays_11"];
                    $nddays = $_POST["nddays_11"];
                    $findays = $_POST["findays_11"];

                    $sql = "SELECT *FROM calendars WHERE year='$year' AND month=11";
                    $result = mysqli_query($conn,$sql);
                    if (mysqli_num_rows($result)==1)
                    $sql = "UPDATE calendars SET workdays='$workdays',offdays='$offdays',holidays='$holidays',nuatdays='$nuatdays',nddays='$nddays',findays='$findays' WHERE year='$year' AND month=11 LIMIT 1";
                    else 
                    $sql = "INSERT INTO calendars (workdays,offdays,holidays,nuatdays,nddays,findays,month,year) VALUE ('$workdays','$offdays','$holidays','$nuatdays','$nddays','$findays',11,'$year')";
                    if (mysqli_query($conn,$sql)) $counter++;

                    $workdays = $_POST["workdays_12"];
                    $offdays = $_POST["offdays_12"];
                    $holidays = $_POST["holidays_12"];
                    $nuatdays = $_POST["nuatdays_12"];
                    $nddays = $_POST["nddays_12"];
                    $findays = $_POST["findays_12"];

                    $sql = "SELECT *FROM calendars WHERE year='$year' AND month=12";
                    $result = mysqli_query($conn,$sql);
                    if (mysqli_num_rows($result)==1)
                    $sql = "UPDATE calendars SET workdays='$workdays',offdays='$offdays',holidays='$holidays',nuatdays='$nuatdays',nddays='$nddays',findays='$findays' WHERE year='$year' AND month=12 LIMIT 1";
                    else 
                    $sql = "INSERT INTO calendars (workdays,offdays,holidays,nuatdays,nddays,findays,month,year) VALUE ('$workdays','$offdays','$holidays','$nuatdays','$nddays','$findays',12,'$year')";
                    if (mysqli_query($conn,$sql)) $counter++;




                    if ($counter==12)
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
                                <?=12-$counter;?> алдаа гарлаа. 
                            </div>
                        </div>
                        <?
                    }
                    ?>
                    <a class="btn btn-success" href="calendars?action=edit&year=<?=$year;?>">Засах</a>
                    <a class="btn btn-primary" href="calendars">Жагсаалт</a>
                    <?
                    
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
