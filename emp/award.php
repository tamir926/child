<?php if(isset($_GET['id'])) { $id = $_GET['id'];}?>
<form action="<?=$path?>action/award_action.php" method="post">
<table class="table table-bordered">
  <tr>
    <td colspan=6><center>Ажилтны шагнал урамшууллын талаарх мэдээлэл</center></td>
  </tr>
  <tr>
    <td>Шагнагдсан огноо</td>
    <td>Шагналын төрөл</td>
    <td>Алдар, цол, одон,медалийн нэр</td>
    <td>Шийдвэрийн нэр, огноо, дугаар</td>
    <td>Шагнал авсан үндэслэл</td>
    <td>Устгах</td>
  </tr>
  <?php
  $query = mysqli_query($conn,"select *from hr_award where emp_id = $id") or die (mysqli_error());
  while($row = mysqli_fetch_array($query))
  {
  echo '<tr>
      <input type="hidden" name="emp_id" value="'.$id.'">
      <input type="hidden" name="e_id[]" value="'.$row['id'].'">
      <td><input type="text" name="award_datee[]" id="datepicker8" value="'.$row['award_date'].'" class="form-control"></td>
      <td>';?>
        <select class="form-select" name="award_typee[]">
          <option <?php if($row['award_type']==0) { echo 'selected';}?> value="0">Сонго</option>
          <option <?php if($row['award_type']==1) { echo 'selected';}?> value="1">Байгууллага</option>
          <option <?php if($row['award_type']==2) { echo 'selected';}?> value="2">Салбар</option>
          <option <?php if($row['award_type']==3) { echo 'selected';}?> value="3">Төр</option>
        </select>
<?php
  echo '</td>
      <td><input type="text" name="award_namee[]" value="'.$row['award_name'].'" class="form-control"></td>
      <td><input type="text" name="notee[]" value="'.$row['note'].'" class="form-control"></td>
      <td><input type="text" name="reasonn[]" value="'.$row['reason'].'" class="form-control"></td>
      <td>';
      ?>
      <a href="<?=$path?>action/award_action.php?delete_award=<?=$row['id']?>&userid=<?=$id?>" onclick="return confirm('Устгахдаа итгэлтэй байна уу?')">
      <i class="menu-icon tf-icons ti ti-settings"></i>
      </a>
      <?php
      echo '</td>
    </tr>';
  }
  ?>
  <tr>
    <input type="hidden" name="emp_id" value="<?=$id?>">
    <td><input type="text" name="award_date" id="datepicker9" class="form-control"></td>
    <td>
      <select class="form-select" name="award_type">
        <option value="0">Сонго</option>
        <option value="1">Байгууллага</option>
        <option value="2">Салбар</option>
        <option value="3">Төр</option>
      </select>
    </td>
    <td><input type="text" name="award_name" class="form-control"></td>
    <td><input type="text" name="note" class="form-control"></td>
    <td><input type="text" name="reason" class="form-control"></td>
    <td></td>
  </tr>
  <tr>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td><input type="submit" class="btn btn-default" name="insert_award" value="Хадгалах"></td>
    <td></td>
  </tr>
</table>


</form>
