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
 <?php
if(isset($_GET['id']))
{
  $id = $_GET['id'];
  $query = mysqli_query($conn,"select *from student where id = $id") or die (mysqli_error());
  $data = mysqli_fetch_array($query);
  $type1 = $data['type1'];
  $register = $data['register'];
  $surname = $data['surname'];
  $ownname = $data['ownname'];
  $age = $data['age'];
  $health = $data['health'];
  $discount = $data['discount'];
  $gender = $data['gender'];
  $branch = $data['branch'];
  $sector = $data['sector'];
  $createdate = $data['createdate'];
  $ognoo = $data['ognoo'];
  $date1 = $data['date1'];
  $date2 = $data['date2'];
  $price = $data['price'];
  $reason = $data['reason'];

  $query = mysqli_query($conn,"select *from student_family where student_id = $id and person_type = 1") or die (mysqli_error());
  $data3 = mysqli_fetch_array($query);
  $pid1 = $data3['id'];
  $person_type1 = $data3['person_type'];
  $person1 = $data3['person'];
  $birthday1 = $data3['birthday'];
  $age1 = $data3['age'];
  $family_count1 = $data3['family_count'];
  $range1 = $data3['range1'];
  $email1 = $data3['email'];
  $facebook1 = $data3['facebook'];
  $address1 = $data3['address'];
  $km1 = $data3['km'];
  $job1 = $data3['job'];
  $job_pro1 = $data3['job_pro'];
  $salary1 = $data3['salary'];
  $phone1 = $data3['phone'];
  $note1 = $data3['note'];

  $query1 = mysqli_query($conn,"select *from student_family where student_id = $id and person_type = 2") or die (mysqli_error());
  $data4 = mysqli_fetch_array($query1);
  $pid2 = $data4['id'];
  $person_type2 = $data4['person_type'];
  $person2 = $data4['person'];
  $birthday2 = $data4['birthday'];
  $age2 = $data4['age'];
  $family_count2 = $data4['family_count'];
  $range2 = $data4['range1'];
  $email2 = $data4['email'];
  $facebook2 = $data4['facebook'];
  $address2 = $data4['address'];
  $km2 = $data4['km'];
  $job2 = $data4['job'];
  $job_pro2 = $data4['job_pro'];
  $salary2 = $data4['salary'];
  $phone2 = $data4['phone'];
  $note2 = $data4['note'];
}
else
{
  $id = '';
  $type1 = '';
  $branch = '';
  $register = '';
  $surname = '';
  $ownname = '';
  $age = '';
  $health = '';
  $gender = '';
  $sector = '';
  $createdate = '';
  $ognoo = '';
  $date1 = '';
  $discount = '';
  $date2 = '';
  $price = '';


  $pid1 = '';
  $person_type1 = '';
  $person1 = '';
  $birthday1 = '';
  $age1 = '';
  $family_count1 = '';
  $range1 = '';
  $email1 = '';
  $facebook1 = '';
  $address1 = '';
  $km1 = '';
  $job1 = '';
  $job_pro1 = '';
  $salary1 = '';
  $phone1 = '';
  $note1 = '';

  $pid2 = '';
  $person_type2 = '';
  $person2 = '';
  $birthday2 = '';
  $age2 = '';
  $family_count2 = '';
  $range2 = '';
  $email2 = '';
  $facebook2 = '';
  $address2 = '';
  $km2 = '';
  $job2 = '';
  $job_pro2 = '';
  $salary2 = '';
  $phone2 = '';
  $note2 = '';
  $reason = '';
}
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
            
              <form action="<?=$path?>action/child_action.php" enctype="multipart/form-data" method="post">
            <table class="table table-bordered">
		        <tr>
			        <td colspan="4" align="center"><div style="font-size:18px;">Сурагчийн ерөнхий мэдээлэл</div></td>
		        </tr>
            <tr>
              <input type="hidden" name="id" value="<?=$id?>">
              <td>Салбар</td><td>
              <select id="branch" name="branch" class="form-select">
                <option value="0">Салбар</option>
                <?php
                $result = mysqli_query($conn,"select *from branch where id = 3");
                while($row = mysqli_fetch_array($result))
                  {
                    ?>
                    <option value="<?=$row['id']?>" <?php if($row['id']==$branch) { echo 'selected';}?>><?=$row['name']?></option>
                    <?php
                  }
              ?>
              </select>
              </td>
              <td>Бүлэг</td>
              <td>
                <?php
                if(isset($_GET['id']))
                {
                echo '<select name="sector" class="form-select">
                      <option value="0">Сонго</option>';
                      $qq = mysqli_query($conn,"select *from sector where branch = $branch") or die (mysqli_error());
                      while($roww = mysqli_fetch_array($qq))
                      {
                        ?>
                        <option value="<?=$roww['id']?>" <?php if($roww['id']==$sector) { echo 'selected';}?>><?=$roww['name']?></option>
                        <?php
                      }
                echo '</select>';
                }
                else
                {
                ?>
                <select id="state" name="sector" class="form-control">
                  <option value="0">Анги сонго</option>
                </select>
                <?php
                }
                ?>
              </td>
            </tr>
            <tr>
        			<td>Зураг оруулах:</td><td><input type="file" id="img" name="img" class="form-control-file"></td>
              <td>Бүртгүүлсэн огноо:</td><td><input type="text" class="form-control" value="<?=$ognoo?>" autocomplete="off" id="datepicker" name="ognoo"></td>
        		</tr>
            <tr>
			        <td><b>Төлөв:</b></td>
              <td>
                <select name="type" class="form-select">
                    <option value="1" <?php if($type1==1) { echo 'selected';}?>>Хэвийн</option>
                    <option value="2" <?php if($type1==2) { echo 'selected';}?>>Гарсан</option>
                    <option value="3" <?php if($type1==3) { echo 'selected';}?>>Өвчтэй</option>
                    <option value="4" <?php if($type1==4) { echo 'selected';}?>>Чөлөөтэй</option>
                    <option value="5" <?php if($type1==5) { echo 'selected';}?>>Төгссөн</option>
                    <option value="6" <?php if($type1==6) { echo 'selected';}?>>Сургуульд орсон</option>
                </select>
              </td>
			        <td>Регистерийн дугаар:</td><td><input type="textbox" value="<?=$register?>" name="register" class="form-control"></td>
		        </tr>
		        <tr>
		            <td>Төлвийн шалтгаан:</td><td><input type="text" class="form-control" name="reason" value="<?=$reason?>"></td>
		            <td>Шинжилгээ:</td>
		            <td>
		               <select class="form-select" name="health">
		                <option value=0 <?php if($health==0) { echo 'selected'; }?>>Бүрэн</option>
		                <option value=1 <?php if($health==1) { echo 'selected'; }?>>Шээс</option>
		                <option value=2 <?php if($health==2) { echo 'selected'; }?>>Цагаан хорхой</option>
		                <option value=3 <?php if($health==3) { echo 'selected'; }?>>Шинжилгээ өгөөгүй</option>
		               </select>
		               <!--<div class="custom-control custom-checkbox">
		              <input type="hidden" name="health" value="0" />
                      <input type="checkbox" class="custom-control-input" name="health" <?php if($health==1) { echo 'checked'; }?> value="1" id="defaultChecked2">
                      <label class="custom-control-label" for="defaultChecked2"></label>
                    </div>-->
                    </td>
		        </tr>
        		<tr>
        			<td>Овог:</td><td><input type="textbox" name="surname" value="<?=$surname?>" class="form-control"></td>
        			<td>Нэр:</td><td><input type="textbox" name="ownname" value="<?=$ownname?>" class="form-control"></td>
        		</tr>
		        <tr>
			        <td>Нас:</td>
        			<td>
        				<input type="text" name="age" value="<?=$age?>" class="form-control">
        			</td>
        			<td>Хүйс:</td>
              <td>
                <select name="gender" class="form-select">
                    <option value="0">-Сонгоно уу-</option>
                    <option value="1" <?php if($gender==1) { echo 'selected';}?>>Эрэгтэй</option>
                    <option value="2" <?php if($gender==2) { echo 'selected';}?>>Эмэгтэй</option>
                </select>
              </td>
        		</tr>
        		<tr>
              <td>Гэрээ эхлэх огноо:</td><td><input type="text" name="date1" value="<?=$date1?>" class="form-control" autocomplete="off" id="datepicker1"></td>
              <td>Гэрээ дуусах огноо:</td><td><input type="text" name="date2" value="<?=$date2?>" class="form-control" autocomplete="off" id="datepicker2"></td>
            </tr>
        		<tr>
              <td>Хөнгөлөлт</td>
              <td><select class="form-select" name="discount">
                    <?php 
                    $query = mysqli_query($conn,"select *from discount") or die (mysqli_error());
                    while($row = mysqli_fetch_array($query))
                    {
                        ?>
                        <option value="<?=$row['id']?>" <?php if($discount==$row['id']) { echo 'selected';}?>><?=$row['discount']?></option>
                        <?php
                    }
                    ?>
                  </select>
              </td>
              <td>Төлбөр</td><td>
                <input type="text" id="city" name="price" value="<?=$price?>" class="form-control"></td>
            </tr>
          </table>
    <table class="table table-bordered">
      <tr>
        <td colspan="4"><center>Гэр бүлийн мэдээлэл</center></td>
      </tr>
      <tr>
        <td>Дугаар</td><td>Мэдээлэл</td><td>Эцгийн мэдээлэл</td><td>Эхийн мэдээлэл</td>
      </tr>
      <tr>
        <td>1</td>
        <td>Овог Нэр</td>
        <input type="hidden" name="pid1" value="<?=$pid1?>">
        <input type="hidden" name="pid2" value="<?=$pid2?>">
        <td><input type="textbox" name="person1" value="<?=$person1?>" class="form-control"></td>
        <td><input type="textbox" name="person2" value="<?=$person2?>" class="form-control"></td>
      </tr>
      <tr>
        <td>2</td>
        <td>Төрсөн он</td>
        <td><input type="text" class="form-control" name="birthday1" value="<?=$birthday1?>"></td>
        <td><input type="text" class="form-control" name="birthday2" value="<?=$birthday2?>"></td>
      </tr>
      <tr>
        <td>3</td>
        <td>Нас</td>
        <td><input type="text" class="form-control" name="age1" value="<?=$age1?>"></td>
        <td><input type="text" class="form-control" name="age2" value="<?=$age2?>"></td>
      </tr>
      <tr>
        <td>4</td>
        <td>Ам бүл</td>
        <td colspan="2">
            <select name="family_count" class="form-select">
                <option value="0">Сонго</option>
                <?php
                for($i=2;$i<20;$i++)
                {
                    ?>
                    <option <?php if($family_count1==$i) { echo 'selected';}?> value='<?=$i?>'><?=$i?></option>
                    <?php
                }
                ?>
            </select>
            <!--<input type="text" class="form-control" name="family_count" value="<?=$family_count1?>"></td>-->
      </tr>
      <tr>
        <td>5</td>
        <td>6аас доош насны хүүхдийн тоо</td>
        <td colspan="2"><input type="text" class="form-control" name="range1" value="<?=$range1?>"></td>
      </tr>
      <tr>
        <td>6</td>
        <td>Имэйл хаяг</td>
        <td><input type="text" class="form-control" name="email1" value="<?=$email1?>"></td>
        <td><input type="text" class="form-control" name="email2" value="<?=$email2?>"></td>
      </tr>
      <tr>
        <td>7</td>
        <td>Facebook хаяг</td>
        <td><input type="text" class="form-control" name="facebook1" value="<?=$facebook1?>"></td>
        <td><input type="text" class="form-control" name="facebook2" value="<?=$facebook2?>"></td>
      </tr>
      <tr>
        <td>8</td>
        <td>Одоо амьдарч байгаа хаяг</td>
        <td colspan=2><input type="text" class="form-control" name="address" value="<?=$address1?>"></td>
      </tr>
      <tr>
        <td>9</td>
        <td>Гэрээс цэцэрлэг хүртэлх зай /км/</td>
        <td colspan="2"><input type="text" class="form-control" name="km" value="<?=$km1?>"></td>
      </tr>
      <tr>
        <td>10</td>
        <td>Ажлын газрын нэр</td>
        <td><input type="text" class="form-control" name="job1" value="<?=$job1?>"></td>
        <td><input type="text" class="form-control" name="job2" value="<?=$job2?>"></td>
      </tr>
      <tr>
        <td>11</td>
        <td>Албан тушаал</td>
        <td><input type="text" class="form-control" name="job_pro1" value="<?=$job_pro1?>"></td>
        <td><input type="text" class="form-control" name="job_pro2" value="<?=$job_pro2?>"></td>
      </tr>
      <tr>
        <td>12</td>
        <td>Өрхийн орлого</td>
        <td colspan="2"><input type="text" class="form-control" name="salary" value="<?=$salary1?>"></td>
      </tr>
      <tr>
        <td>13</td>
        <td>Утасны дугаар</td>
        <td><input type="text" class="form-control" name="phone1" value="<?=$phone1?>"></td>
        <td><input type="text" class="form-control" name="phone2" value="<?=$phone2?>"></td>
      </tr>
      <tr>
        <td>14</td>
        <td>Холбоо барих ойрын 2 хүний мэдээлэл</td>
        <td><input type="text" class="form-control" name="note1" value="<?=$note1?>"></td>
        <td><input type="text" class="form-control" name="note2" value="<?=$note2?>"></td>
      </tr>
      <tr>
  			   <td colspan="4">
             <button name="insert" class="btn btn-info">Бүртгэх</button>
             &nbsp;&nbsp;<a href="<?=$path?>list" class="btn btn-info">Буцах</a>
           </td>
  		</tr>
    </table>
	</form>
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
