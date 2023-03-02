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
              <h4 class="fw-bold py-3 mb-4">Сурагчийн жагсаалт</h4>
              <div class="card" style="padding:30px;">
              <form action="list" method="post">
				<table class="table">
				<tr>
					<td>
            <select class="form-select" name="sector">
              <option value="0">-Бүлэг-</option>
							<?php
              $query = mysqli_query($conn,"select a.id , a.name , b.name branch_name from sector a , branch b where a.branch = b.id $branch") or die (mysqli_error());
              while($row = mysqli_fetch_array($query))
              {
                ?> <option <?php if(isset($_POST['sector'])) { if($_POST['sector']==$row['id']) { echo 'selected';}}?> value="<?=$row['id']?>"><?=$row['branch_name']?> - <?=$row['name']?></option> <?php
              }
              ?>
							</select>
				  </td>
          <td>
            <select class="form-select" name="statuscode">
              <option value="0">-Төлөв-</option>
              <option value="1" <?php if(isset($_POST['statuscode'])) { if($_POST['statuscode']==1) { echo 'selected';} }?>>Хэвийн</option>
              <option value="2" <?php if(isset($_POST['statuscode'])) { if($_POST['statuscode']==2) { echo 'selected';} }?>>Гарсан</option>
              <option value="3" <?php if(isset($_POST['statuscode'])) { if($_POST['statuscode']==3) { echo 'selected';} }?>>Өвчтэй</option>
              <option value="4" <?php if(isset($_POST['statuscode'])) { if($_POST['statuscode']==4) { echo 'selected';} }?>>Чөлөөтэй</option>
              <option value="5" <?php if(isset($_POST['statuscode'])) { if($_POST['statuscode']==5) { echo 'selected';} }?>>Төгссөн</option>
              <option value="6" <?php if(isset($_POST['statuscode'])) { if($_POST['statuscode']==6) { echo 'selected';} }?>>Сургуульд орсон</option>
						</select>
				  </td>
				  <td>
				      <select class="form-select" name="gender">
				          <option value="0">-Хүйс-</option>
				          <option value="1" <?php if(isset($_POST['gender'])) { if($_POST['gender']==1) { echo 'selected';} }?> >Эрэгтэй</option>
				          <option value="2" <?php if(isset($_POST['gender'])) { if($_POST['gender']==2) { echo 'selected';} }?> >Эмэгтэй</option>
				       </select>
				  </td>
				  <td>
				      <select name="age" class="form-select">
				          <option value="0">-Нас-</option>
				          <option value="<?php $year = substr(date('Y'),2,2); $year_a = $year-1; echo $year_a; ?>" <?php if(isset($_POST['age'])) { if($_POST['age']==$year_a) { echo 'selected';}} ?>>1</option>
				          <option value="<?php $year = substr(date('Y'),2,2); $year_a = $year-2; echo $year_a; ?>" <?php if(isset($_POST['age'])) { if($_POST['age']==$year_a) { echo 'selected';}} ?>>2</option>
				          <option value="<?php $year = substr(date('Y'),2,2); $year_a = $year-3; echo $year_a; ?>" <?php if(isset($_POST['age'])) { if($_POST['age']==$year_a) { echo 'selected';}} ?>>3</option>
				          <option value="<?php $year = substr(date('Y'),2,2); $year_a = $year-4; echo $year_a; ?>" <?php if(isset($_POST['age'])) { if($_POST['age']==$year_a) { echo 'selected';}} ?>>4</option>
				          <option value="<?php $year = substr(date('Y'),2,2); $year_a = $year-5; echo $year_a; ?>" <?php if(isset($_POST['age'])) { if($_POST['age']==$year_a) { echo 'selected';}} ?>>5</option>
				          <option value="<?php $year = substr(date('Y'),2,2); $year_a = $year-6; echo $year_a; ?>" <?php if(isset($_POST['age'])) { if($_POST['age']==$year_a) { echo 'selected';}} ?>>6</option>
				       </select>
				  </td>
				  <td><input type="text" placeholder="Нэр & Регистер" name="qsearch" value="<?php if(isset($_POST['qsearch'])) 
          { echo $_POST['qsearch'];}?>" class="form-control"></td>
					<td>
             <button type="submit" name="search" class="btn btn-primary">Хайх</button>
					</td>
				</tr>
			</table>
      </form>
                  <table class="table" style="margin-top:50px;">
                    <thead>
                    <tr>
                      <th>Дугаар</th>
                      <th>Цэцэрлэг</th>
                      <th>Бүлэг</th>
                      <th>Овог</th>
                      <th>Нэр</th>
                      <th>Регистер</th>
                      <th>Нас</th>
                      <th>Хүйс</th>
                      <th>Дэлгэрэнгүй</th>
                  </tr>
                    </thead>
                    <tbody>
		      <?php
			    $i=1;
          if(isset($_POST['search']))
          {
            $sector = $_POST['sector'];
            $qsearch = $_POST['qsearch'];
            $statuscode = $_POST['statuscode'];
            $gender = $_POST['gender'];
            if(strlen($qsearch)>0)
            {
                $qsearch = " and (a.ownname like '%".$qsearch."%' or a.register like '%".$qsearch."%')";
            }
            else 
            {
                $qsearch = "";
            }
            if($sector==0)
            {
                $sector = '';
            }
            else 
            {
                $sector = 'and a.sector = '.$sector;
            }
            if($gender==0)
            {
                $gender = '';
            }
            else 
            {
                $gender = 'and a.gender = '.$gender;
            }
            if($statuscode==0)
            {
                $statuscode = '';
            }
            else 
            {
                $statuscode = 'and a.type1='.$statuscode;
            }
            if(isset($_POST['age']))
            {
                $age = $_POST['age'];
                
                if($age==0)
                {
                    $age1 = '';
                }
                else 
                {
                    $age1 = 'and substr(register,3,2) = '.$age;  
                }
            }
            else 
            {
                $age1 = '';
                $branch = '';
            }
            //echo "select a.id,type1, register, img, a.surname,a.ownname,a.gender,b.name from student a, sector b where b.id = a.sector $branch $sector $gender $statuscode $qsearch $age1 order by ownname";
            $query = mysqli_query($conn,"select a.id,type1, register, img, a.surname,a.ownname,a.gender,b.name ,
             c.name branch_name from student a, sector b , branch c where a.branch=c.id and b.id = a.sector
               $sector $gender $statuscode $qsearch $age1 order by ownname") or die (mysqli_error());
          }
          else
          {
            $query = mysqli_query($conn,"select a.id, type1, register, img, a.surname,a.ownname,a.gender,b.name , 
            c.name branch_name from student a, sector b , branch c where b.id = a.sector and type1=1 and
             a.branch = c.id  order by ownname") or die (mysqli_error());
          }

          while($row = mysqli_fetch_array($query))
			    {
			      $register = substr($row['register'],4,2);
				  $date1 = substr(date('Y'),2,2);
				  $now_age = $date1-$register;
				  if($row['gender']==1) { $gender='Эрэгтэй';} else { $gender='Эмэгтэй';}
				  echo '<tr>
    				    <td>'.$i.'</td>
    				    <td>'.$row['branch_name'].'</td>
                        <td>'.$row['name'].'</td>
    					<td>'.$row['surname'].'</td>
    					<td>'.$row['ownname'].'</td>
    					<td>'.$row['register'].'</td>
    					<td>'.$now_age.'</td>
    					<td>'.$gender.'</td><td><a href="children/'.$row['id'].'" class="btn btn-default">Дэлгэрэнгүй</a></td>
    				    </tr>';
				$i++;
			}
		?>
		</tbody>
                  </table>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="layout-overlay layout-menu-toggle"></div>
      <div class="drag-target"></div>
    </div>

    <script src="assets/vendor/libs/jquery/jquery.js"></script>
    <script src="assets/vendor/libs/popper/popper.js"></script>
    <script src="assets/vendor/js/bootstrap.js"></script>
    <script src="assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="assets/vendor/libs/node-waves/node-waves.js"></script>
    <script src="assets/vendor/libs/hammer/hammer.js"></script>
    <script src="assets/vendor/libs/i18n/i18n.js"></script>
    <script src="assets/vendor/libs/typeahead-js/typeahead.js"></script>
    <script src="assets/vendor/js/menu.js"></script>

    <script src="assets/vendor/libs/jszip/jszip.js"></script>
    <script src="assets/vendor/libs/pdfmake/pdfmake.js"></script>
    <script src="assets/vendor/libs/formvalidation/dist/js/FormValidation.min.js"></script>
    <script src="assets/vendor/libs/formvalidation/dist/js/plugins/Bootstrap5.min.js"></script>
    <script src="assets/vendor/libs/formvalidation/dist/js/plugins/AutoFocus.min.js"></script>
    <script src="assets/js/main.js"></script>
  </body>
</html>
