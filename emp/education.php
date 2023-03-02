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
<form action="<?=$path?>action/hr_education_action.php" method="post">
<table class="table table-bordered">
  <tr>
    <th colspan="7"><center>Боловсролын /ерөнхий, тусгай дунд, дээд боловсрол, дипломын, бакалаврын болон магистрийн зэргийг оролцуулан/</center></th>
  </tr>
  <tr>
    <td>Эрдмийн зэрэг цол</td>
    <td>Мэргэжил</td>
    <td>Сургуулийн нэр</td>
    <td>Элссэн огноо</td>
    <td>Төгссөн огноо</td>
    <td>Гэрчилгээ, дипломын дугаар</td>
    <td>Засах</td>
  </tr>
  <?php
  $query = mysqli_query($conn,"select *from hr_education where emp_id = $id") or die (mysqli_error());
  while($row = mysqli_fetch_array($query))
  {
  ?>
      <tr>
          <td>
            <select class="form-control" name="degreee[]">
              <option value="0" <?php if($row['degree']==0) echo "selected"; ?>>Сонго</option>
              <option value="1" <?php if($row['degree']==1) echo "selected"; ?>>Бага</option>
              <option value="2" <?php if($row['degree']==2) echo "selected"; ?>>Бүрэн дунд</option>
              <option value="3" <?php if($row['degree']==3) echo "selected"; ?>>Тусгай дунд</option>
              <option value="4" <?php if($row['degree']==4) echo "selected"; ?>>Баклавр</option>
              <option value="5" <?php if($row['degree']==5) echo "selected"; ?>>Магистер</option>
              <option value="6" <?php if($row['degree']==6) echo "selected"; ?>>Доктор</option>
            </select>
          </td>
          <input type="hidden" name="emp_id" value="<?=$id?>">
          <input type="hidden" name="edit_id[]" value="<?=$row['id']?>">
          <td><input type="text" class="form-control" name="proff[]" value="<?=$row['prof']?>"></td>
          <td>
            <input type="text" name="sch_namee[]" value="<?=$row['sch_name']?>" class="form-control">
            
          </td>
          <td><input type="text" class="form-control" maxlength="7" id="datepicker2" placeholder="yyyy-mm" name="startdatee[]" value="<?=$row['startdate']?>"></td>
          <td><input type="text" class="form-control" maxlength="7" id="datepicker3" placeholder="yyyy-mm" name="enddatee[]" value="<?=$row['enddate']?>"></td>
          <td><input type="text" class="form-control" name="certt[]" value="<?=$row['cert']?>"></td>
          <td><a href="<?=$path?>action/hr_education_action.php?delete_education=<?=$row['id']?>&userid=<?=$id?>" onclick="return confirm('Устгахдаа итгэлтэй байна уу?')">
          <i class="material-icons">delete_forever</i></a></td>
        </tr>
  <?php
  }
  ?>
  <tr>
    <td>
      <select class="form-control" name="degree">
        <option value="0">Сонго</option>
        <option value="1">Бага</option>
        <option value="2">Бүрэн дунд</option>
        <option value="3">Тусгай дунд</option>
        <option value="4">Баклавр</option>
        <option value="5">Магистер</option>
        <option value="6">Доктор</option>
      </select>
    </td>
    <input type="hidden" name="id" value="<?=$id?>">
    <td><input type="text" class="form-control" name="prof"></td>
    <td>
      <input type="text" name="sch_name" class="form-control">
    </td>
    <td><input type="text" class="form-control" id="datepicker" placeholder="yyyy-mm" maxlength="7" name="startdate"></td>
    <td><input type="text" class="form-control" id="datepicker1" placeholder="yyyy-mm" maxlength="7" name="enddate"></td>
    <td><input type="text" class="form-control" name="cert"></td>
    <td></td>
  </tr>
  <tr>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td><input type="submit" name="insert_education" class="btn btn-primary" value="Хадгалах"></td>
    <td></td>
  </tr>
</table>
</form>

<form action="<?=$path?>action/hr_education_action.php" method="post">
<table class="table table-bordered">
  <tr>
    <td colspan=7><center>Мэргэшлийн бэлтгэлийн талаарх мэдээлэл</center></td>
  </tr>
  <tr>
      <td>Хаана, ямар байгууллагад</td>
      <td>Ямар чиглэлээр</td>
      <td>Эхэлсэн он, сар, өдөр</td>
      <td>Төгссөн он, сар, өдөр</td>
      <td>Хугацаа/хоногоор/</td>
      <td>Үнэмлэх, гэрчилгээний дугаар</td>
      <td>Засварлах</td>
  </tr>
  <?php
  $query = mysqli_query($conn,"select *from hr_training where emp_id = $id") or die (mysqli_error());
  while($row = mysqli_fetch_array($query))
  {
  echo '<tr>
          <input type="hidden" name="emp_id" value="'.$id.'">
          <input type="hidden" name="e_id[]" value="'.$row['id'].'">
          <td><input type="text" name="locationn[]" value="'.$row['location'].'" class="form-control"></td>
          <td><input type="text" name="training_categoryy[]" value="'.$row['training_category'].'" class="form-control"></td>
          <td><input type="text" name="startdatee[]" id="datepicker10" value="'.$row['startdate'].'" class="form-control"></td>
          <td><input type="text" name="enddatee[]" id="datepicker11" value="'.$row['enddate'].'" class="form-control"></td>
          <td><input type="text" name="rangee[]" value="'.$row['range1'].'" class="form-control"></td>
          <td><input type="text" name="certificationn[]" value="'.$row['certification'].'" class="form-control"></td>
          <td>';
          ?>
          <a href="<?=$path?>action/hr_education_action.php?delete_training=<?=$row['id']?>&emp_id=<?=$id?>" onclick="return confirm('Устгахдаа итгэлтэй байна уу?')">
          <i class="material-icons">delete_forever</i></a>
          <?php
          echo '</td>
      </tr>';
  }
  ?>
  <tr>
      <input type="hidden" name="id" value="<?=$id?>">
      <td><input type="text" name="location" class="form-control"></td>
      <td><input type="text" name="training_category" class="form-control"></td>
      <td><input type="text" name="startdate" id="datepicker12" class="form-control"></td>
      <td><input type="text" name="enddate" id="datepicker13" class="form-control"></td>
      <td><input type="text" name="range" class="form-control"></td>
      <td><input type="text" name="certification" class="form-control"></td>
      <td></td>
  </tr>
  <tr>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td><input type="submit" class="btn btn-primary" name="insert_training" value="Хадгалах"></td>
  </tr>
</table>
</form>
