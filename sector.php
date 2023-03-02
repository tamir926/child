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
              <div class="body">
          <div class="table-responsive">
					<?php
					if(!isset($_GET['id']))
					{
					?>
            <a href="#" style="float:right" data-bs-toggle="modal" data-bs-target="#addsector" class="btn btn-danger">Бүлэг нэмэх</a><br/><br/><br/>
            <table class="table table-bordered">
            <tr>
              <th>Дугаар</th>
              <th>Төлөв</th>
              <th>Төрөл</th>
              <th>Салбар</th>
              <th>Бүлгийн нэр</th>
              <th>Анги удирдсан багш</th>
              <th>Туслах багш</th>
              <th>Сургалтын төлбөр</th>
              <th>Засах</th>
            </tr>
            <?php
            $i=1;
            $query = mysqli_query($conn,"select a.* , b.name from sector a, branch b where a.branch = b.id") or die (mysqli_error());
            while($row = mysqli_fetch_array($query))
            {
              $main_teacher = $row['main_teacher'];
              $sub_teacher = $row['sub_teacher'];
              $data1 = mysqli_query($conn,"select a.lname , a.fname, a.brchno , b.name from employer a, branch b where a.id = $main_teacher and a.brchno = b.id") or die (mysqli_error());
              $data1 = mysqli_fetch_array($data1);
              $data2 = mysqli_query($conn,"select *from employer where id = $sub_teacher") or die (mysqli_error());
              $data2 = mysqli_fetch_array($data2);
              $statuscode = $row['statuscode'];
              $sector_type = $row['sector_type'];

              if(empty($data2['lname']))
              {
                $lname2 = '';
              }
              else 
              {
                $lname2 = substr($data2['lname'],0,2);
              }
              if(empty($data2['fname']))
              {
                $fname2 = '';
              }
              else 
              {
                $fname2 = substr($data2['fname'],0,2);
              }
              if($statuscode==1)
              {
                //$statuscode = 'Идэвхитэй';
                $statuscode = '<i class="material-icons">check</i><span></span>';
              }
              else
              {
                //$statuscode = 'Идэвхигүй';
                $statuscode = '<i class="material-icons">close</i><span></span>';
              }
              if($sector_type==1)
              {
                $sector_type = 'Үндсэн анги';    
              }
              else 
              {
                 $sector_type = 'Дугуйлан';    
              }
              //if(strlen($data1['name'])>0)
              {
              echo '<tr>
                      <td>'.$i.'</td>
                      <td>'.$statuscode.'</td>
                      <td>'.$sector_type.'</td>
                      <td>'.$data1['name'].'</td>
                      <td>'.$row['name'].'</td>
                      <td>'.substr($data1['lname'],0,2).'. '.$data1['fname'].'</td>
                      <td>'.$lname2.'. '.$fname2.'</td>
                      <td>'.number_format($row['price'],2).'</td>
                      <td><a href="sector/'.$row['id'].'" class="btn btn-primary">Засварлах</a></td>
                    </tr>';
              $i++;
              }
            }
            ?>
            </table>
					<?php
					}
					else
					{
					$id = $_GET['id'];
					$query = mysqli_query($conn,"select *from sector where id = $id") or die (mysqli_error());
					$data = mysqli_fetch_array($query);
                    $branch = $data['branch'];
                    $sector_type = $data['sector_type'];
                    
                    echo '<form action="'.$path.'action/sector_action.php" method="post">
					<table class="table table-bordered">
          <tr>
            <td>Салбар</td><td>';
              $result = mysqli_query($conn,"select *from branch where id = $branch");
              $data1 = mysqli_fetch_array($result);
              echo '<select class="form-select"><option value="0">'.$data1['name'].'</option></select>';
              echo '</td>
            </tr>
            <tr>
            <td>Төрөл</td>
            <td>
                <select class="form-select" name="sector_type">';
                ?>
                <option value="1" <?php if($sector_type==1) { echo 'selected';} ?>>Үндсэн бүлэг</option>
                <option value="2" <?php if($sector_type==2) { echo 'selected';} ?>>Дугуйлан</option>';
                <?php
                echo '</select>
            </td>
            </tr>
            <tr>
							<input type="hidden" name="id" value="'.$id.'">
							<td>Бүлгийн нэр</td><td><input type="textbox" value="'.$data['name'].'" name="sector_name" class="form-control" required></td>
						</tr>
						<tr>
							<td>Анги удирдсан багш</td>
							<td>
								<select name="main_teacher" class="form-select">
									<option value="0">-Сонго-</option>';
									$query = mysqli_query($conn,"select *from employer where brchno = $branch  and status1 = 1") or die (mysqli_error());
									while($row = mysqli_fetch_array($query))
									{
										?>
										<option <?php if($row['id']==$data['main_teacher']){ echo 'selected';}?> value="<?=$row['id']?>"><?php echo substr($row['lname'],0,2).'. '.$row['fname']?></option>
										<?php
									}
							echo '</select>
							</td>
						</tr>
						<tr>
							<td>Туслах багш</td>
							<td>
              <select name="sub_teacher" class="form-select">
                <option value="0">-Сонго-</option>';
                $query = mysqli_query($conn,"select *from employer where brchno = $branch and status1 = 1") or die (mysqli_error());
                while($row = mysqli_fetch_array($query))
                {
                  ?>
                  <option <?php if($row['id']==$data['sub_teacher']){ echo 'selected';}?> value="<?=$row['id']?>"><?php echo substr($row['lname'],0,2).'. '.$row['fname']?></option>
                  <?php
                }
            echo '</select>
							</td>
						</tr>
            <tr>
              <td>Сургалтын төлбөр</td>
              <td><input type="text" class="form-control" name="price" value="'.$data['price'].'"></td>
            </tr>
            <tr>
              <td>Сурагчийн тоо</td>
              <td><input type="text" class="form-control" name="student_count" value="'.$data['student_count'].'"></td>
            </tr>
            ';?>
				    <tr>
              <td>Төлөв</td>
              <td><div class="form-check">
              <input type="checkbox" <?php if($data['statuscode']==1) { echo 'checked';}?> name="active" value="1" class="form-check-input" id="exampleCheck1">
              <?php echo '<label class="form-check-label" for="exampleCheck1"></label>
              </div>
              </td>
            </tr>
						<tr>
							<td></td>
							<td>
								<input type="submit" name="update_sector" class="btn btn-default" value="Хадгалах">&nbsp;&nbsp;
								<a href="'.$path.'action/sector_action.php?delete_sector='.$id.'" class="btn btn-danger">Устгах</a>&nbsp;&nbsp;
								<a href="'.$path.'sector" class="btn btn-default">Буцах</a>
							</td>
						</tr>
					</table>
					</form>';
					}
					?>
            </div>
          </div>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>


    <div class="modal fade" id="addsector" tabindex="-1" role="dialog" aria-labelledby="addlevel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addlevel"><img src="<?php echo $g_icon; ?>" width="90px;">
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		Цэцэрлэгийн бүлэг нэмэх</h5>
      </div>
	  <div class="modal-body">
		<form action="<?=$path?>action/sector_action.php" method="post">
    <table class="table table-bordered">
    <tr>
      <td>Салбар</td><td>
      <?php
        $query = "SELECT * FROM branch";
        $result = $conn->query($query);
      ?>
      <select id="country" name="branch" class="form-select">
        <option value="">Салбар</option>
        <?php
        if($result->num_rows > 0)
        {
            while($row = $result->fetch_assoc())
            {
                echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
            }
        }
        else
        {
            echo '<option value="">Салбар байхгүй байна</option>';
        }
        ?>
    </select>
      </td>
    </tr>
    <tr>
        <td>Төрөл</td>
        <td>
            <select class="form-select" name="sector_type">
                <option value="1">Үндсэн бүлэг</option>
                <option value="2">Дугуйлан</option>
            </select>        
        </td>
    </tr>
    <tr>
    <td>Бүлгийн нэр</td><td><input type="textbox" name="sector_name" class="form-control" required></td>
		</tr>
		<tr>
		    <td>Анги удирдсан багш</td>
				<td>
          <select id="state" name="main_teacher" class="form-select">
              <option value="">Багш сонго</option>
          </select>
				</td>
			</tr>
      <tr>
				<td>Туслах багш</td>
				<td>
          <select id="state1" name="sub_teacher" class="form-select">
              <option value="">Багш сонго</option>
          </select>
				</td>
			</tr>
			<tr>
        <td>Сургалтын төлбөр</td><td><input type="text" name="price" class="form-control"></td>
      </tr>
      <tr>
          <td>Сурагчийн тоо</td>
          <td><input type="text" class="form-control" name="student_count"></td>
          </tr>
			<tr>
        <td>Төлөв</td>
        <td><div class="form-check">
            <input type="checkbox" name="active" value="1" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1"></label>
            </div></td>
      </tr>
			<tr>
				<td></td>
				<td>
					<input type="submit" name="insert_sector" class="btn btn-default" value="Хадгалах">&nbsp;&nbsp;
					<button type="button" class="btn btn-default" data-dismiss="modal">Гарах</button>
				</td>
			</tr>
		</table>
		</form>
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
