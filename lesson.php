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
              <h4 class="fw-bold py-3 mb-4">Ирцийн мэдээлэл</h4>
              <div class="card" style="padding:30px;">
              <table class="table table-bordered">
           <tr>
            <th>Дугаар</th>
            <th>Салбар</th>
            <th>Бүлгийн нэр</th>
            <th>Анги удирдсан багш</th>
            <th>Туслах багш</th>
            <th>Ирц</th>
          </tr>
          <?php
          $i=1;
          $query = mysqli_query($conn,"select *from sector where statuscode>0 order by branch") or die (mysqli_error());
          while($row = mysqli_fetch_array($query))
          {
            $main_teacher = $row['main_teacher'];
            $sub_teacher = $row['sub_teacher'];
            
            $data1 = mysqli_query($conn,"select a.lname , a.fname, a.brchno , b.name from employer a, 
            branch b where a.id = $main_teacher and a.brchno = b.id order by b.id") or die (mysqli_error());
            $data1 = mysqli_fetch_array($data1);
            $data2 = mysqli_query($conn,"select *from employer where id = $sub_teacher") or die (mysqli_error());
            $data2 = mysqli_fetch_array($data2);
            if(!empty($data1['name']))
            {
            echo '<tr>
                  <td>'.$i.'</td>
                  <td>'.$data1['name'].'</td>
                  <td>'.$row['name'].'</td>
                  <td>'.substr($data1['lname'],0,2).'. '.$data1['fname'].'</td>';
                  echo '<td>';
                  if(!empty($data2['lname']))
                  { echo substr($data2['lname'],0,2).'. '.$data2['fname'];}
                  else 
                  {

                  }
                  echo '</td>
                  <td><a href="'.$path.'calendar/'.$row['id'].'" class="btn btn-primary">Ирц оруулах</a></td>
                  </tr>';
                  $i++;
            }
           }
           ?>
           </table>
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
