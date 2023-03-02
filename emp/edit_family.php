<form action="<?=$path?>action/add_employer_action.php" method="post">
<table class="table table-bordered">
    <tr>
      <th colspan="6"><center>Гэр бүлийн байдал (зөвхөн гэр бүлийн бүртгэлд байгаа хүмүүсээ бичнэ)</center></th>
    </tr>
    <tr>
      <td>Таны юу болох</td>
      <td>Эцэг эх өөрийн нэр</td>
      <td>Төрсөн он</td>
      <td>Төрсөн аймаг, хот, сум, дүүрэг</td>
      <td>Одоо эрхэлж буй ажил</td>
      <td>Устгах</td>
    <tr>
      <?php
      $id = $_GET['id'];
      $query = mysqli_query($conn,"select *from hr_family where emp_id = $id") or die (mysqli_error());
      while($row = mysqli_fetch_array($query))
      {
          echo '<tr>
                <input type="hidden" value="'.$id.'" name="id">
                <input type="hidden" value="'.$row['id'].'" name="edit_id[]">
                <td>
                  <select name="family_categoryy[]" class="form-select">
                    <option value="0">Сонго</option>';
                    $query1 = mysqli_query($conn,"select *from hr_family_category") or die (mysqli_eror());
                    while($row1 = mysqli_fetch_array($query1))
                    {
                      ?>
                      <option <?php if($row1['id']==$row['f_id']) { echo 'selected';}?> value=<?=$row1['id']?>><?=$row1['name']?></option>
                      <?php
                    }
                  echo '</select>
                </td>
                <td><input type="text" name="familyy[]" value="'.$row['name'].'" class="form-control"></td>
                <td>
                  <select name="family_yearr[]" class="form-select">
                    <option value="0">Сонго</option>';
                    for($i=1950;$i<=date('Y');$i++)
                    {
                      ?>
                      <option <?php if($i==$row['birthday']) { echo 'selected';}?> value=<?=$i?>><?=$i?></option>
                      <?php
                    }
                  echo '</select>
                </td>
                <td><input type="text" name="family_placee[]" value="'.$row['place'].'" class="form-control"></td>
                <td><input type="text" name="family_jobb[]" value="'.$row['job'].'" class="form-control"></td><td>'; ?>
                <a href="<?=$path?>/action/add_employer_action.php?delete_family=<?=$row['id']?>&userid=<?=$id?>" onclick="return confirm('Устгахдаа итгэлтэй байна уу?')">
                <i class="menu-icon tf-icons ti ti-settings"></i>
                <?php echo '</a></td></tr>';
      }
      ?>
      <tr>
        <td>
          <input type="hidden" value="<?=$id?>" name="id">
          <select name="family_category" class="form-select">
            <option value="0">Сонго</option>
            <?php
            $query = mysqli_query($conn,"select *from hr_family_category") or die (mysqli_eror());
            while($row = mysqli_fetch_array($query))
            {
              echo '<option value='.$row['id'].'>'.$row['name'].'</option>';
            }
            ?>
          </select>
        </td>
        <td><input type="text" name="family" class="form-control"></td>
        <td>
          <select name="family_year" class="form-select">
            <option value="0">Сонго</option>
            <?php
            for($i=1950;$i<=date('Y');$i++)
            {
              echo '<option value="'.$i.'">'.$i.'</option>';
            }
            ?>
          </select>
        </td>
        <td><input type="text" name="family_place" class="form-control"></td>
        <td><input type="text" name="family_job" class="form-control"></td>
        <td></td>
      </tr>
    <tr>
      <td></td><td></td><td></td><td></td><td><input type="submit" name="update_family" class="btn btn-default" value="Хадгалах"></td>
    </tr>
</table>
</form>



<form action="<?=$path?>/action/add_employer_action.php" method="post">
<table class="table table-bordered">
    <tr>
      <th colspan="6"><center>Садан төрлийн байдал (Таны эцэг,эх,төрсөн ах, эгч, дүү өрх тусгаарласан хүүхэд болон бусад садан төрлийг оруулна)</center></th>
    </tr>
    <tr>
      <td>Таны юу болох</td>
      <td>Эцэг эх өөрийн нэр</td>
      <td>Төрсөн он</td>
      <td>Төрсөн аймаг, хот, сум, дүүрэг</td>
      <td>Одоо эрхэлж буй ажил</td>
      <td>Устгах</td>
    <tr>
      <?php
      $id = $_GET['id'];
      $query = mysqli_query($conn,"select *from hr_kinship where emp_id = $id") or die (mysqli_error());
      while($row = mysqli_fetch_array($query))
      {
          echo '<tr>
                <input type="hidden" value="'.$id.'" name="id">
                <input type="hidden" value="'.$row['id'].'" name="edit_id[]">
                <td>
                  <select name="family_categoryy[]" class="form-select">
                    <option value="0">Сонго</option>';
                    $query1 = mysqli_query($conn,"select *from hr_family_category") or die (mysqli_eror());
                    while($row1 = mysqli_fetch_array($query1))
                    {
                      ?>
                      <option <?php if($row1['id']==$row['f_id']) { echo 'selected';}?> value=<?=$row1['id']?>><?=$row1['name']?></option>
                      <?php
                    }
                  echo '</select>
                </td>
                <td><input type="text" name="familyy[]" value="'.$row['name'].'" class="form-control"></td>
                <td>
                  <select name="family_yearr[]" class="form-select">
                    <option value="0">Сонго</option>';
                    for($i=1950;$i<=date('Y');$i++)
                    {
                      ?>
                      <option <?php if($i==$row['birthday']) { echo 'selected';}?> value=<?=$i?>><?=$i?></option>
                      <?php
                    }
                  echo '</select>
                </td>
                <td><input type="text" name="family_placee[]" value="'.$row['place'].'" class="form-control"></td>
                <td><input type="text" name="family_jobb[]" value="'.$row['job'].'" class="form-control"></td><td>'; ?>
                <a href="<?=$path?>action/add_employer_action.php?delete_kinship=<?=$row['id']?>&userid=<?=$id?>" onclick="return confirm('Устгахдаа итгэлтэй байна уу?')">
                <i class="menu-icon tf-icons ti ti-settings"></i>
                <?php echo '</a>
              </tr>';
      }
      ?>
      <tr>
        <td>
          <select name="family_category" class="form-select">
            <option value="0">Сонго</option>
            <?php
            $query = mysqli_query($conn,"select *from hr_family_category") or die (mysqli_eror());
            while($row = mysqli_fetch_array($query))
            {
              echo '<option value='.$row['id'].'>'.$row['name'].'</option>';
            }
            ?>
          </select>
        </td>
        <input type="hidden" name="id" value="<?=$_GET['id']?>">
        <td><input type="text" name="family" class="form-control"></td>
        <td>
          <select name="family_year" class="form-select">
            <option value="0">Сонго</option>
            <?php
            for($i=1950;$i<=date('Y');$i++)
            {
              echo '<option value="'.$i.'">'.$i.'</option>';
            }
            ?>
          </select>
        </td>
        <td><input type="text" name="family_place" class="form-control"></td>
        <td><input type="text" name="family_job" class="form-control"></td>
        <td></td>
      </tr>
    <tr>
      <td></td><td></td><td></td><td></td><td><input type="submit" name="update_urag" class="btn btn-default" value="Хадгалах"></td><td></td>
    </tr>
</table>
</form>
