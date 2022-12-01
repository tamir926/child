<?php
if(!empty($_POST["branch"]))
{
  echo '<script>alert("aaa")</script>';
  //$result = $conn->query("select *from branch where id = ".$_POST['branch_typeee']."");
  $result = $conn->query("select *from branch where id = 3");
  if($result->num_rows > 0)
  {
    while($row = $result->fetch_assoc())
    {
      echo '<option value="'.$row['dans'].'">'.$row['dans'].'</option>';
      echo '<option value="'.$row['dans1'].'">'.$row['dans1'].'</option>';
    }
  }
  else
  {
    echo '<option value="">Данс мэдээлэл байхгүй байна.</option>';
  }
}
?>
