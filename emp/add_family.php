<form action="action/add_employer_action.php" method="post">
<table class="table table-bordered">
    <tr>
      <th colspan="5"><center>Гэр бүлийн мэдээлэл</center></th>
    </tr>
    <tr>
      <td>Таны юу болох</td>
      <td>Эцэг, эх, өөрийн нэр</td>
      <td>Төрсөн он</td>
      <td>Төрсөн аймаг, хот, сум, дүүрэг</td>
      <td>Одоо эрхэлж буй ажил</td>
    <tr>
    <tr>
      <input type="hidden" value="<?php if(isset($_GET['id'])) { echo $_GET['id'];}?>" name="id">
      <td>
        <select name="family_category1" class="form-control">
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
      <td><input type="text" name="family1" class="form-control"></td>
      <td>
        <select name="family1_year" class="form-control">
          <option value="0">Сонго</option>
          <?php
          for($i=1950;$i<=date('Y');$i++)
          {
            echo '<option value="'.$i.'">'.$i.'</option>';
          }
          ?>
        </select>
      </td>
      <td><input type="text" name="family1_place" class="form-control"></td>
      <td><input type="text" name="family1_job" class="form-control"></td>
    </tr>
    <tr>
      <td>
        <select name="family_category2" class="form-control">
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
      <td><input type="text" name="family2" class="form-control"></td>
      <td>
        <select name="family2_year" class="form-control">
          <option value="0">Сонго</option>
          <?php
          for($i=1950;$i<=date('Y');$i++)
          {
            echo '<option value="'.$i.'">'.$i.'</option>';
          }
          ?>
        </select>
      </td>
      <td><input type="text" name="family2_place" class="form-control"></td>
      <td><input type="text" name="family2_job" class="form-control"></td>
    </tr>
    <tr>
      <td>
        <select name="family_category3" class="form-control">
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
      <td><input type="text" name="family3" class="form-control"></td>
      <td>
        <select name="family3_year" class="form-control">
          <option value="0">Сонго</option>
          <?php
          for($i=1950;$i<=date('Y');$i++)
          {
            echo '<option value="'.$i.'">'.$i.'</option>';
          }
          ?>
        </select>
      </td>
      <td><input type="text" name="family3_place" class="form-control"></td>
      <td><input type="text" name="family3_job" class="form-control"></td>
    </tr>
    <tr>
      <td>
        <select name="family_category4" class="form-control">
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
      <td><input type="text" name="family4" class="form-control"></td>
      <td>
        <select name="family4_year" class="form-control">
          <option value="0">Сонго</option>
          <?php
          for($i=1950;$i<=date('Y');$i++)
          {
            echo '<option value="'.$i.'">'.$i.'</option>';
          }
          ?>
        </select>
      </td>
      <td><input type="text" name="family4_place" class="form-control"></td>
      <td><input type="text" name="family4_job" class="form-control"></td>
    </tr>
    <tr>
      <td>
        <select name="family_category5" class="form-control">
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
      <td><input type="text" name="family5" class="form-control"></td>
      <td>
        <select name="family5_year" class="form-control">
          <option value="0">Сонго</option>
          <?php
          for($i=1950;$i<=date('Y');$i++)
          {
            echo '<option value="'.$i.'">'.$i.'</option>';
          }
          ?>
        </select>
      </td>
      <td><input type="text" name="family5_place" class="form-control"></td>
      <td><input type="text" name="family5_job" class="form-control"></td>
    </tr>
    <tr>
      <td>
        <select name="family_category6" class="form-control">
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
      <td><input type="text" name="family6" class="form-control"></td>
      <td>
        <select name="family6_year" class="form-control">
          <option value="0">Сонго</option>
          <?php
          for($i=1950;$i<=date('Y');$i++)
          {
            echo '<option value="'.$i.'">'.$i.'</option>';
          }
          ?>
        </select>
      </td>
      <td><input type="text" name="family6_place" class="form-control"></td>
      <td><input type="text" name="family6_job" class="form-control"></td>
    </tr>
    <tr>
      <td></td><td></td><td></td><td></td><td><input type="submit" name="insert_family" class="btn btn-primary" value="Хадгалах"></td>
    </tr>
</table>
</form>
