<form action="../action/child_action.php" enctype="multipart/form-data" method="post">
<table class="table table-bordered" style="width:40%; float:right;">
  <tr>
    <input type="hidden" name="id" value="<?=$id?>">
    <td><input type="file" class="form-control" name="sfile" id="sfile"></td>
    <td><input type="submit" class="btn btn-info" name="student_file" value="Хадгалах"></td>
  </tr>
</table>
</form>
<?php
/*$files = scandir(substr($data['folder'],3,200), 1);
$m=1;
echo '<table style="width:90%" align="center" class="table table-bordered">';
for($i=0;count($files)>$i;$i++)
{
  if(strlen($files[$i])>4)
  {
  echo '<tr>
          <td>'.$m.'</td>
          <td>'.$files[$i].'</td>
          <td><i class="material-icons">';
          $pp = explode('.',$files[$i]);
          if(strtolower($pp[1])=="pdf") { echo 'picture_as_pdf'; }
          elseif(strtolower($pp[1])=="jpg" || strtolower($pp[1])=="png") { echo 'photo_library'; }
          elseif(strtolower($pp[1])=="docx") { echo 'file_copy'; }
          else { echo 'block';}
          echo '</i>';
          echo '</td>
          <td>
          <a href="'.$data['folder'].$files[$i].'" target="_blank" class="btn btn-primary">Файлыг үзэх</a></td>
          <td>'; ?>
          <a href="../action/child_action.php?id=<?=$id?>&delete=<?php echo $data['folder'].$files[$i];?>" onclick="return confirm('Are you sure?')" class="btn btn-danger">Устгах</a>
          <?php echo '</td></tr>';
    }
    $m++;
  }
  echo '</table>';*/
  ?>
