<script>
$(document).ready(function(){
  $('#branch_pt').on('change', function(){
  var branchaID = $(this).val();
  if(branchaID){
    $.ajax({
            type:'POST',
            url:'https://www.elite.mn/kpi/ajaxData.php',
            data:'salbar='+branchaID,
            success:function(html){
            $('#state_pt').html(html);
            }
          });
          }
    else{
          $('#state_pt').html('<option value="">Select country first</option>');
        }
    });
});
</script>
<?php
if(isset($_GET['id']))
{
  $id = $_GET['id'];
  $query = mysqli_query($conn,"select a.*, b.salary real_salary from employer a, hr_salary b where a.id = $id and a.salary = b.id") or die (mysqli_error());
  $data = mysqli_fetch_array($query);

    $fname = $data['fname'];
    $salary = $data['salary'];
    $lname = $data['lname'];
    $job = $data['role'];
    $status = $data['status1'];
    $nd = $data['nd'];
    $ed = $data['ed'];
    $job_date = $data['job_date'];
    $acntno = $data['acntno'];
    $undes = $data['undes'];
    $garal = $data['garal'];
    $register = $data['register'];
    $birthday = $data['birthday'];
    $tursun = $data['tursun'];
    $gender = $data['gender'];
    $handphone = $data['handphone'];
    $email = $data['email'];
    $address = $data['address'];
    $family_status = $data['family_status'];
    $davuu = $data['davuu'];
    $sul = $data['sul'];
    $brchno = $data['brchno'];
    $nd_pay = $data['nd_pay'];
    $real_salary = $data['real_salary'];
    if($nd_pay==$real_salary)
    {
      $nd_pay = 100;
    }

  $query1 = mysqli_query($conn,"select *from hr_emergency where emp_id=$id limit 0,1") or die (mysqli_error());
  $data1 = mysqli_fetch_array($query1);
    $pid1 = $data1['id'];
    $person1 = $data1['person'];
    $note1 = $data1['note'];

  $query2 = mysqli_query($conn,"select *from hr_emergency where emp_id=$id limit 1,1") or die (mysqli_error());
  $data2 = mysqli_fetch_array($query2);
    $pid2 = $data2['id'];
    $person2 = $data2['person'];
    $note2 = $data2['note'];

}
else
{
    $id = '';
    $fname = '';
    $lname = '';
    $job = '';
    $status = '';
    $acntno = '';
    $nd = '';
    $ed = '';
    $job_date = '';
    $undes = '';
    $garal = '';
    $birthday = '';
    $tursun = '';
    $gender = '';
    $handphone = '';
    $email = '';
    $address = '';
    $salary = '';

    $pid1 = '';
    $person1 = '';
    $note1 = '';
    $pid2 = '';
    $person2 = '';
    $note2 = '';
    $family_status = '';
    $davuu = '';
    $sul = '';
    $brchno = '';
    $nd_pay = '0';
    $register = '';
}
?><br/>
<form action="<?=$path?>action/add_employer_action.php" method="post" enctype="multipart/form-data">
<table class="table table-bordered">
  <tr>
    <td>Салбар 
      <?php
         $bra = '';  
        $bra1 = '';
   
    ?>
    </td>
    <td>
      <select class="form-select" id="branch_pt" name="brchno">
        <?php
        $query3 = mysqli_query($conn,"select *from branch") or die (mysqli_error());
        while($row3 = mysqli_fetch_array($query3))
        {
          ?>
          <option <?php if($row3['id']==$brchno) { echo 'selected';}?> value="<?=$row3['id']?>"><?=$row3['name']?></option>
          <?php
        }
        ?>
      </select>
    </td>
    <td>Төлөв</td>
    <input type="hidden" name="id" value="<?=$id?>">
    <td><select class="form-select" name="status">
          <option value="8" <?php if($status==8) { echo 'selected';}?>>Идэвхитэй</option>
          <option value="9" <?php if($status==9) { echo 'selected';}?>>Идэвхигүй</option>
          <option value="0" <?php if($status==0) { echo 'selected';}?>>Туршилт</option>
          <option value="1" <?php if($status==1) { echo 'selected';}?>>Үндсэн</option>
          <option value="2" <?php if($status==2) { echo 'selected';}?>>Гэрээт</option>
          <option value="3" <?php if($status==3) { echo 'selected';}?>>Нөөц</option>
          <option value="4" <?php if($status==4) { echo 'selected';}?>>Чөлөө авсан</option>
          <option value="5" <?php if($status==5) { echo 'selected';}?>>Жирэмсэний амралт</option>
          <option value="6" <?php if($status==6) { echo 'selected';}?>>Өвчтэй</option>
          <option value="7" <?php if($status==7) { echo 'selected';}?>>Ажлаас гарсан</option>
        </select></td>
  </tr>
  <tr>
    <td>Албан тушаал</td>
    <td><select name="job" class="form-select">
        <option value="0">Сонго</option>
        <?php
        $query = mysqli_query($conn,"select *from job") or die (mysqli_error());
        while($row = mysqli_fetch_array($query))
        {
        ?>
        <option <?php if($row['id']==$job) {echo 'selected';}?> value="<?=$row['id']?>"><?=$row['job_name']?></option>
        <?php
        }
        ?>
        </select>
    </td>
    <td>Цалин</td>
    <td>
      <?php
      /*echo '<select class="form-control" name="salary"><option value="0">-Сонго-</option>';
      $result = mysqli_query($conn,"select *from hr_salary $bra1") or die (mysqli_error());
      while($rows = mysqli_fetch_array($result))
      {
      ?>
      <option <?php if($rows['id']==$salary) {echo 'selected';}?> value="<?=$rows['id']?>"><?=$rows['code']?></option>
      <?php
      }
      echo '</select>';*/
      
      if($_GET['id'])
      {
          echo '<select class="form-select" name="salary"><option value="0">-Сонго-</option>';
          $result = mysqli_query($conn,"select *from hr_salary $bra1") or die (mysqli_error());
          while($rows = mysqli_fetch_array($result))
          {
          ?>
          <option <?php if($rows['id']==$salary) {echo 'selected';}?> value="<?=$rows['id']?>"><?=$rows['code']?> /<?=$rows['note']?></option>
          <?php
          }
          echo '</select>'; 
      }
      else 
      {
        echo '<select id="state_pt" name="salary" class="form-control">
                <option value="0">Цалин сонго</option>
              </select>';  
      }
      ?>
      
      
    </td>
  </tr>
  <tr>
    <td>Ажилд орсон огноо</td>
    <td>
        <select name="year_job" class="form-select">
            <option value="0">Он</option>
            <?php 
            $job_date = explode("/", $job_date);
            //$year = date('Y', strtotime('-16 years'));
            $year = date('Y');
            for($i=1960;$i<=$year;$i++)
            {
                ?>
                <option value='<?=$i?>' <?php if($job_date[2]==$i) { echo 'selected';}?>><?=$i?></option>
                <?php
            }
            ?>
        </select>
        <select name="month_job"  class="form-select">
            <option value="0">Сар</option>
            <?php 
            for($i=1;$i<13;$i++)
            {
                ?>
                <option value='<?=$i?>' <?php if($job_date[0]==$i) { echo 'selected';}?>><?=$i?></option>';
                <?php
            }
            ?>
        </select>
        <select name="day_job"  class="form-select">
            <option value="0">Өдөр</option>
            <?php 
            for($i=1;$i<32;$i++)
            {
                ?>
                <option value='<?=$i?>' <?php if($job_date[1]==$i) { echo 'selected';}?>><?=$i?></option>
                <?php
            }
            ?>
        </select>
    </td>
    <td>Нийгмийн даатгал төлөх дүн</td>
    <td><input type="text" class="form-control" value="<?=$nd_pay?>" name="nd_pay">
     </td>
  </tr>
  <tr>
    <td>Регистерийн дугаар</td><td><input type="text" autocomplete="off" name="register" value="<?=$register?>" class="form-control"></td><td>Цалингийн данс</td><td><input type="text" value="<?=$acntno?>" class="form-control" name="acntno"></td>
  </tr>
  <tr>
    <td>Эцэг /эх/-ийн нэр</td><td><input type="text" name="lname" value="<?=$lname?>" class="form-control"></td>
    <td>Нэр</td><td><input type="text" name="fname" value="<?=$fname?>" class="form-control"></td>
  </tr>
  <tr>
    <td>Нийгмийн даатгалын дэвтэр</td><td><input type="text" name="nd" value="<?=$nd?>" class="form-control"></td>
      <td>ЭМ-н дэвтэрийн дугаар</td><td><input type="text" name="ed" value="<?=$ed?>" class="form-control"></td>
  </tr>
  <tr>
    <td>Үндэс угсаа</td><td><input type="text" name="undes" value="<?=$undes?>" class="form-control"></td>
    <td>Нийгмийн гарал</td><td><input type="text" name="garal" value="<?=$garal?>" class="form-control"></td>
  </tr>
  <tr>
    <!--<td>Төрсөн он сар өдөр</td><td><input type="text" id="datepicker" name="birthday" value="<?=$birthday?>" class="form-control"></td>-->
    <td>Төрсөн он сар өдөр</td>
    <td>
        <select name="year" class="form-select">
            <option value="0">Он</option>
            <?php 
            $birthday = explode("/", $birthday);
            $year = date('Y', strtotime('-16 years'));
            //$year = date('Y');
            for($i=1960;$i<=$year;$i++)
            {
                ?>
                <option value='<?=$i?>' <?php if($birthday[2]==$i) { echo 'selected';}?>><?=$i?></option>
                <?php
            }
            ?>
        </select>
        <select name="month" class="form-select">
            <option value="0">Сар</option>
            <?php 
            for($i=1;$i<13;$i++)
            {
                ?>
                <option value='<?=$i?>' <?php if($birthday[0]==$i) { echo 'selected';}?>><?=$i?></option>';
                <?php
            }
            ?>
        </select>
        <select name="day" class="form-select">
            <option value="0">Өдөр</option>
            <?php 
            for($i=1;$i<32;$i++)
            {
                ?>
                <option value='<?=$i?>' <?php if($birthday[1]==$i) { echo 'selected';}?>><?=$i?></option>
                <?php
            }
            ?>
        </select>
    </td>
    <td>Зураг</td><td><input type="file" name="img" id="img" class="form-control"></td>
  </tr>
  <tr>
    <td>Төрсөн газрын мэдээлэл</td>
    <td><textarea name="tursun" class="form-control"><?=$tursun?></textarea></td>
    <td>Хүйс</td><td>
      <div class="custom-control custom-radio">
        <input type="radio" class="custom-control-input" value="1" id="defaultChecked" name="gender" <?php if($gender==1) { echo 'checked';}?>>
        <label class="custom-control-label" for="defaultChecked">Эрэгтэй</label>
        <input type="radio" class="custom-control-input" value="2" id="defaultUnchecked" name="gender" <?php if($gender==2) { echo 'checked';}?>>
        <label class="custom-control-label" for="defaultUnchecked">Эмэгтэй</label>
      </div></td>
  </tr>
  <tr>
    <td>Утасны дугаар</td><td><input type="text" name="handphone" value="<?=$handphone?>" class="form-control"></td>
    <td>Имэйл хаяг</td><td><input type="text" name="email" class="form-control" value="<?=$email?>"></td>
  </tr>
  <tr>
    <td>Оршин суугаа хаяг</td><td><textarea rows="4" cols="50" class="form-control" name="address"><?=$address?></textarea></td>
    <td>Гэр бүлийн байдал</td>
    <td>
      <select name="family_status" class="form-select">
        <option <?php if($family_status==1) { echo 'selected';}?> value=1>Гэрлэсэн</option>
        <option <?php if($family_status==2) { echo 'selected';}?> value=2>Гэрлээгүй</option>
        <option <?php if($family_status==3) { echo 'selected';}?> value=3>Бусад /Салсан,Бэлэвсэн/</option>
      </select>
    </td>
  </tr>
  <tr>
    <td>Давуу тал</td>
    <td>
      <textarea class="form-control" rows="4" cols="50" name="davuu" placeholder="Давуу тал"><?=$davuu?></textarea>
    </td>
    <td>Сул тал</td>
    <td>
      <textarea class="form-control" rows="4" cols="50" name="sul" placeholder="Сул тал"><?=$sul?></textarea>
    </td>
  </tr>
  <tr>
    <td></td><td></td><td></td><td>
      <?php if(!isset($_GET['id']))
      {
        echo '<input type="submit" name="insert_home" value="Хадгалах" class="btn btn-primary">';
      }
      else
      {
        ?>
        <input type="submit" name="update_home" value="Хадгалах" class="btn btn-default">&nbsp;&nbsp;
        <a href="<?=$path?>action/add_employer_action.php?delete_emp=<?=$_GET['id']?>" class="btn btn-danger" onclick="return confirm('Are you sure?')">Устгах</a>
        <?php
      }
      ?>
    </td>
  </tr>
</table>
</form>

<?php
if(isset($_GET['id']))
{
    $id = $_GET['id'];
    $query = mysqli_query($conn,"select *from hr_emergency where emp_id = $id") or die (mysqli_error());
?>
<form action="<?=$path?>action/add_employer_action.php" method="post" enctype="multipart/form-data">
<table style="width:50%; margin-left:20px;" class="table table-bordered">
  <tr>
    <th colspan="3"><center>Шаардлагатай тохиолдолд холбогдох хүний дугаар</center></th>
  </tr>
  <tr>
    <td>Дугаар</td>
    <td>Таны юу болох</td>
    <td>Утасны дугаар</td>
  </tr>
  <tr>
    <input type="hidden" name="emp_id" value="<?=$id?>">
    <td>1</td>
    <input type="hidden" name="pid1" value="<?=$pid1?>">
    <td><input type="text" class="form-control" name="person1" value="<?=$person1?>"></td>
    <td><input type="text" class="form-control" name="note1" value="<?=$note1?>"></td>
  </tr>
  <tr>
    <td>2</td>
    <input type="hidden" name="pid2" value="<?=$pid2?>">
    <td><input type="text" class="form-control" name="person2" value="<?=$person2?>"></td>
    <td><input type="text" class="form-control" name="note2" value="<?=$note2?>"></td>
  </tr>
  <tr>
    <td></td>
    <td></td>
    <td><input type="submit" name="sos_call" value="Хадгалах" class="btn btn-default"></td>
  </tr>
</table>
</form>
<?php 
    }
?>
<br/><br/>
