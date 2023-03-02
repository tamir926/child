<!DOCTYPE html>
<html>
<?php include '../head.php';?>
<!----------------------------------------------------->
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<style>
.modal-dialog,
.modal-content {
    height: 80%;
}
.modal-body {
    max-height: calc(100% - 120px);
    overflow-y: scroll;
}
</style>
<!----------------------------------------------------->
<body class="theme-red">
    <?php include '../header.php';?>
    <?php include '../menu.php';?>
   <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2><a href="employer.php">Ажилтнууд</a> - Ажилтны дэлгэрэнгүй мэдээлэл3</h2>
            </div>
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
<!------------------------------------------><br/>
<?php
$id = $_GET['id'];
$query = mysqli_query($conn,"select b.id , b.fname, b.role role_id, b.lname, job_name, salary from job a, employer b where b.role = a.id and b.id=$id") or die (mysqli_error());
$data = mysqli_fetch_array($query);
?>
<table class="table table-bordered">
  <tr>
    <td>Ажилтны код</td><td><input type="text" class="form-control" value="МТ-<?=$data['id']?>" disabled></td>
    <td>Салбар</td><td><input type="text" class="form-control" value="Хороолол салбар" disabled></td>
  </tr>
  <tr>
    <td>Овог нэр</td><td><input type="text" class="form-control" value="<?=$data['lname'].'-'.$data['fname']?>" disabled></td>
    <td>Албан тушаал</td><td><input type="text" class="form-control" value="<?=$data['job_name']?>" disabled></td>
  </tr>
</table>
<ul class="nav nav-tabs" role="tablist">
<li class="nav-item">
  <a class="nav-link <?php if(!isset($_GET['t'])) { echo 'active';}?>" href="#profile" role="tab" data-toggle="tab" aria-selected="true">Үндсэн мэдээлэл</a>
</li>
<li class="nav-item">
  <a class="nav-link" href="#buzz" role="tab" data-toggle="tab">Боловсрол</a>
</li>
<li class="nav-item">
  <a class="nav-link" href="#references" role="tab" data-toggle="tab">Гэр бүлийн байдал</a>
</li>
<li class="nav-item">
  <a class="nav-link  <?php if(isset($_GET['t'])) { echo 'active';}?>" href="#kpi" role="tab" data-toggle="tab">Ажлын гүйцэтгэл</a>
</li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
<div role="tabpanel" class="tab-pane <?php if(!isset($_GET['t'])) { echo 'active';} else { echo 'fade';}?>" id="profile">...</div>
<div role="tabpanel" class="tab-pane fade" id="buzz">bbb</div>
<div role="tabpanel" class="tab-pane fade" id="references">ccc</div>
<div role="tabpanel" class="tab-pane <?php if(isset($_GET['t'])) { echo 'active';} else { echo 'fade';}?>" id="kpi">
  <?php include 'employer/kpi.php';?>
</div>
</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

	<script src="<?=$path;?>bootstrap/js/bootstrap.js"></script>
	<script src="<?=$path;?>js/jquery.slimscroll.js"></script>
	<script src="<?=$path;?>node-waves/waves.js"></script>
	<script src="<?=$path;?>js/jquery.countTo.js"></script>
	<script src="<?=$path;?>js/raphael.min.js"></script>
  <script src="<?=$path;?>js/morris.js"></script>
	<script src="<?=$path;?>js/jquery.sparkline.js"></script>
	<script src="<?=$path;?>js/admin.js"></script>
  <script src="<?=$path;?>js/index.js"></script>
	<script src="<?=$path;?>js/demo.js"></script>
</body>

</html>
