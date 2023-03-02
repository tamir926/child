<?php
if(isset($_GET['id']))
{
  $id = $_GET['id'];
}
else
{
  $id = '12345';
}
?>
<form action="<?=$path?>action/award_action.php" method="post">
<table class="table table-bordered">
  <tr>
    <td colspan="5"><center>Мэргэшлийн болон албан тушаалын зэрэг, цол </center></td>
  </tr>
  <tr>
    <td>Албан тушаал</td>
    <td>Зэрэг, цолны нэр</td>
    <td>Зарлиг, захирамж тушаалын нэр, огноо</td>
    <td>Үнэмлэхийн дугаар</td>
    <td>Устгах</td>
  </tr>
  <?php
  $query = mysqli_query($conn,"select *from hr_dev where emp_id = $id") or die (mysqli_error());
  while($row = mysqli_fetch_array($query))
  {
  echo '<tr>
        <input type="hidden" name="emp_id" value="'.$id.'">
        <input type="hidden" name="e_idd[]" value="'.$row['id'].'">
        <td><input type="text" class="form-control" value="'.$row['dev_type'].'" name="dev_typee[]"></td>
        <td><input type="text" class="form-control" value="'.$row['dev_name'].'" name="dev_namee[]"></td>
        <td><input type="text" class="form-control" value="'.$row['dev_date'].'" name="dev_datee[]"></td>
        <td><input type="text" class="form-control" value="'.$row['dev_number'].'" name="dev_numberr[]"></td>
        <td>';?>
        <a href="<?=$path?>action/award_action.php?delete_dev=<?=$row['id']?>&userid=<?=$id?>" onclick="return confirm('Устгахдаа итгэлтэй байна уу?')">
          <i class="material-icons">delete_forever</i>
        </a>
          <?php
  echo '</td>
      </tr>';
  }
  ?>
  <tr>
    <input type="hidden" name="emp_id" value="<?=$id?>">
    <td><input type="text" class="form-control" name="dev_type"></td>
    <td><input type="text" class="form-control" name="dev_name"></td>
    <td><input type="text" class="form-control" name="dev_date"></td>
    <td><input type="text" class="form-control" name="dev_number"></td>
    <td></td>
  </tr>
  <tr>
    <td></td>
    <td></td>
    <td></td>
    <td><input type="submit" name="dev_insert" value="Хадгалах" class="btn btn-default"></td>
    <td></td>
  </tr>
</table>
</form>

<form action="<?=$path?>action/skill_action.php" method="post">
  <table class="table table-bordered">
    <tr>
      <td colspan=6><center>Гадаад хэлний мэдлэг</center></td>
    </tr>
    <tr>
      <td>Гадаад хэлний нэр</td>
      <td>Сонсож ойлгох</td>
      <td>Ярих</td>
      <td>Унших</td>
      <td>Бичих</td>
      <td>Засах</td>
    </tr>
    <?php
    $query = mysqli_query($conn,"select *from hr_skill where emp_id = $id") or die (mysqli_error());
    while($row = mysqli_fetch_array($query))
    {
    $language_id = $row['language_id'];
    $know = $row['know1'];
    $speak = $row['speak1'];
    $read = $row['read1'];
    $write = $row['write1'];
    $e_id = $row['id'];

    echo '<tr>
          <td>
          <input type="hidden" name="emp_id" value="'.$id.'">
          <input type="hidden" name="e_id[]" value="'.$e_id.'">
          <select name="language_idd[]" class="form-select">
          <option value="0">Сонго</option>';
          $query1 = mysqli_query($conn,"select *from hr_country_category") or die (mysqli_error());
          while($row1 = mysqli_fetch_array($query1))
          {
          ?>
          <option <?php if($row1['id']==$language_id) { echo 'selected';}?> value=<?=$row1['id']?>><?=$row1['name']?></option>
          <?php
          }
    echo '</select>
          </td>';?>
          <td>
          <select name="knoww[]" class="form-select">
            <option value="1" <?php if($know==1) { echo 'selected';}?>>Дунд</option>
            <option value="2" <?php if($know==2) { echo 'selected';}?>>Сайн</option>
            <option value="3" <?php if($know==3) { echo 'selected';}?>>Онц</option>
          </select>
          </td>
          <td>
          <select name="speakk[]" class="form-select">
            <option value="1" <?php if($speak==1) { echo 'selected';}?>>Дунд</option>
            <option value="2" <?php if($speak==2) { echo 'selected';}?>>Сайн</option>
            <option value="3" <?php if($speak==3) { echo 'selected';}?>>Онц</option>
          </select>
          </td>
          <td>
            <select name="readd[]" class="form-select">
              <option value="1" <?php if($read==1) { echo 'selected';}?>>Дунд</option>
              <option value="2" <?php if($read==2) { echo 'selected';}?>>Сайн</option>
              <option value="3" <?php if($read==3) { echo 'selected';}?>>Онц</option>
            </select>
          </td>
          <td>
            <select name="writee[]" class="form-select">
              <option value="1" <?php if($write==1) { echo 'selected';}?>>Дунд</option>
              <option value="2" <?php if($write==2) { echo 'selected';}?>>Сайн</option>
              <option value="3" <?php if($write==3) { echo 'selected';}?>>Онц</option>
            </select>
          </td>
          <td>
            <a href="<?=$path?>action/skill_action.php?delete_skill=<?=$row['id']?>&userid=<?=$id?>" onclick="return confirm('Устгахдаа итгэлтэй байна уу?')">
            <i class="menu-icon tf-icons ti ti-settings"></i>
            </a>
          </td>
          </tr>
          <?php
    }
    ?>
    <tr>
      <td>
        <input type="hidden" name="emp_id" value="<?=$id?>">
        <select name="language_id" class="form-select">
          <option value="0">Хэлний мэдлэг нэмэх</option>
          <?php
          $query = mysqli_query($conn,"select *from hr_country_category") or die (mysqli_error());
          while($row = mysqli_fetch_array($query))
          {
            echo '<option value='.$row['id'].'>'.$row['name'].'</option>';
          }
          ?>
        </select>
      </td>
      <td>
        <select name="know" class="form-select">
          <option value="1">Дунд</option>
          <option value="2">Сайн</option>
          <option value="3">Онц</option>
        </select>
      </td>
      <td>
        <select name="speak" class="form-select">
          <option value="1">Дунд</option>
          <option value="2">Сайн</option>
          <option value="3">Онц</option>
        </select>
      </td>
      <td>
        <select name="read" class="form-select">
          <option value="1">Дунд</option>
          <option value="2">Сайн</option>
          <option value="3">Онц</option>
        </select>
      </td>
      <td>
        <select name="write" class="form-select">
          <option value="1">Дунд</option>
          <option value="2">Сайн</option>
          <option value="3">Онц</option>
        </select>
      </td>
      <td></td>
    </tr>
    <tr>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td><input type="submit" name="skill_insert" class="btn btn-default" value="Хадгалах"></td>
      <td></td>
    </tr>
  </table>
</form>
<form action="<?=$path?>action/skill_action.php" method="post">
<table class="table table-bordered">
  <tr>
    <td rowspan=2><center>Эзэмшсэн програмын нэр</center></td>
    <td colspan=3><center>Түвшин</center></td>
    <td rowspan="2"><center>Устгах</center></td>
  </tr>
  <tr>
    <td>Дунд</td>
    <td>Сайн</td>
    <td>Онц</td>
  </tr>
  <tr>
    <?php
    $s = 0;
    $query = mysqli_query($conn,"select *from hr_skill_program where emp_id = $id") or die (mysqli_error());
    while($row = mysqli_fetch_array($query))
    {
      $s++;
    ?>
    <tr>
      <input type="hidden" name="emp_id" value="<?=$id?>">
      <input type="hidden" name="e_idd[]" value="<?=$row['id']?>">
      <td><input type="text" class="form-control" name="programm[]" value="<?=$row['name']?>"></td>
      <td>
        <div class="custom-control custom-radio">
        <input type="radio" class="custom-control-input" value="1" id="defaultExample<?=$s?>" name="DefaultRadios<?=$row['id']?>[]" <?php if($row['check1']==1){ echo 'checked';}?>>
        <label class="custom-control-label" for="defaultExample<?=$s?>"></label>
        </div>
      </td>
      <?php $s++;?>
      <td>
        <div class="custom-control custom-radio">
        <input type="radio" class="custom-control-input" value="2" id="defaultExample<?=$s?>" name="DefaultRadios<?=$row['id']?>[]" <?php if($row['check1']==2){ echo 'checked';}?>>
        <label class="custom-control-label" for="defaultExample<?=$s?>"></label>
        </div>
      </td>
      <?php $s++;?>
      <td>
        <div class="custom-control custom-radio">
        <input type="radio" class="custom-control-input" value="3" id="defaultExample<?=$s?>" name="DefaultRadios<?=$row['id']?>[]" <?php if($row['check1']==3){ echo 'checked';}?>>
        <label class="custom-control-label" for="defaultExample<?=$s?>"></label>
        </div>
      </td>
      <td>
        <a href="<?=$path?>action/skill_action.php?delete_program=<?=$row['id']?>&userid=<?=$id?>" onclick="return confirm('Устгахдаа итгэлтэй байна уу?')">
        <i class="menu-icon tf-icons ti ti-settings"></i>
        </a>
      </td>
    </tr>
    <?php
    }
    ?>
  </tr>
  <tr>
    <input type="hidden" name="emp_id" value="<?=$id?>">
    <td><input type="text" class="form-control" name="program"></td>
    <td>
      <div class="custom-control custom-radio">
      <input type="radio" class="custom-control-input" value="1" id="defaultGroupExample1" name="groupOfDefaultRadios">
      <label class="custom-control-label" for="defaultGroupExample1"></label>
      </div>
    </td>
    <td>
      <div class="custom-control custom-radio">
      <input type="radio" class="custom-control-input" value="2" id="defaultGroupExample2" name="groupOfDefaultRadios">
      <label class="custom-control-label" for="defaultGroupExample2"></label>
      </div>
    </td>
    <td>
      <div class="custom-control custom-radio">
      <input type="radio" class="custom-control-input" value="3" id="defaultGroupExample3" name="groupOfDefaultRadios">
      <label class="custom-control-label" for="defaultGroupExample3"></label>
      </div>
    </td>
  </tr>
  <tr>
    <td></td>
    <td></td>
    <td></td>
    <td><input type="submit" class="btn btn-default" name="insert_program" value="Хадгалах"></td>
  </tr>
</table>
</form>
