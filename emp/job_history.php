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
<form action="<?=$path?>action/job_history_action.php" method="post">
  <table class="table table-bordered">
    <tr>
      <td>Ажилласан байгууллагын нэр</td>
      <td>Албан тушаал</td>
      <td>Ажилд орсон он, сар</td>
      <td>Ажлаас гарсан он, сар</td>
      <td>Ажлаас гарсан шалтгаан</td>
      <td>Устгах</td>
    </tr>
    <?php
    $query = mysqli_query($conn,"select *from hr_job_history where emp_id = $id") or die (mysqli_error());
    while($row = mysqli_fetch_array($query))
    {
      echo '<tr>
            <td><input type="text" class="form-control" value="'.$row['organization'].'" name="organizationn[]"></td>
            <td>
              <input type="hidden" name="e_id[]" value="'.$row['id'].'">
              <input type="text" class="form-control" value="'.$row['job_name'].'" name="job_namee[]">
            </td>
            <input type="hidden" name="emp_id" value="'.$id.'">
            <td><input type="text" class="form-control" name="startdatee[]" id="datepicker6" value="'.$row['startdate'].'"></td>
            <td><input type="text" class="form-control" name="enddatee[]" id="datepicker7" value="'.$row['enddate'].'"></td>
            <td><input type="text" class="form-control" name="notee[]" value="'.$row['note'].'"></td>
            <td>';
            ?>
      <a href="<?=$path?>action/job_history_action.php?delete=<?=$row['id']?>&userid=<?=$id?>" onclick="return confirm('Устгахдаа итгэлтэй байна уу?')">
      <i class="menu-icon tf-icons ti ti-settings"></i>
      </a>
      <?php
        echo '</td></tr>';
    }
    ?>
    <tr>
      <td><input type="text" class="form-control" name="organization"></td>
      <td>
        <input type="text" class="form-control" name="job_name">
      </td>
      <input type="hidden" name="emp_id" value="<?=$id?>">
      <td><input type="text" class="form-control" id="datepicker4" name="startdate"></td>
      <td><input type="text" class="form-control" id="datepicker5" name="enddate"></td>
      <td><input type="text" class="form-control" name="note"></td>
      <td></td>
    </tr>
    <tr>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td><input type="submit" class="btn btn-default" value="Хадгалах" name="insert_job"></td>
      <td></td>
    </tr>

  </table>
</form>
