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
              <h4 class="fw-bold py-3 mb-4">Хүний нөөцийн мэдээлэл</h4>
              <div class="card" style="padding:30px;">
              <table id="example" class="table table-striped table-bordered" style="width:100%">
          <thead>
          <tr>
            <th>Дугаар</th>
            <th>Салбар</th>
            <th>Албан тушаал</th>
            <th>Овог нэр</th>
            <th>Нас</th>
            <th>Ажилд орсон огноо</th>
            <th>Дэлгэрэнгүй</th>
          </tr>
          </thead>
          <tbody>
          <?php
          $branch = '';
          $i = 1;
          $query = mysqli_query($conn,"select name, job_date , birthday ,  b.id , b.role role_id , b.fname, b.lname, job_name from job a, employer b , 
          branch c where b.role = a.id and b.brchno = c.id $branch") or die (mysqli_error());
          while($data = mysqli_fetch_array($query))
          {
              $birthday = $data['birthday'];
              $birthDate = explode("/", $birthday);
              $age = (date("md", date("U", mktime(0, 0, 0, $birthDate[0], $birthDate[1], $birthDate[2]))) > date("md")
                ? ((date("Y") - $birthDate[2]) - 1) : (date("Y") - $birthDate[2]));
                //echo "Age is:" . $age;
          ?>
          <tr>
            <td><?=$i?></td>
            <td><?=$data['name']?></td>
            <td><?=$data['job_name']?></td>
            <td><?=substr($data['lname'],0,2).'. '.$data['fname'];?></td>
            <td><?=$age?></td>
            <td><?=$data['job_date']?></td>
            <td><a href="profile/<?=$data['id']?>" class="btn btn-default">Дэлгэрэнгүй</a></td>
          </tr>
          <?php
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
    <script src="<?=$path?>assets/vendor/libs/formvalidation/dist/js/FormValidation.min.js"></script>
    <script src="<?=$path?>assets/vendor/libs/formvalidation/dist/js/plugins/Bootstrap5.min.js"></script>
    <script src="<?=$path?>assets/vendor/libs/formvalidation/dist/js/plugins/AutoFocus.min.js"></script>
    <script src="<?=$path?>assets/js/main.js"></script>
  </body>
</html>
