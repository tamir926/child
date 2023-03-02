<?php
//fetch.php
include 'config.php';
$output = '';
if(isset($_POST["query"]))
{
 $search = mysqli_real_escape_string($conn, $_POST["query"]);
 //$query = "select a.* , b.type_name from finance a , finance_type b where a.id = '$search' and a.type1 = b.id";
 $query = "select a.* , b.type_name , (case when pay_type=1 then 'Орлого' when pay_type=2 then 'Зарлага' end) pay_note from finance a , 
 finance_type b where a.id = '$search' and a.type1 = b.id";
}
else
{
 $query = "select *from student where register=1";
}

$result = mysqli_query($conn, $query);
if(mysqli_num_rows($result) > 0)
{
 $output .= '
  <div class="table-responsive">
   <form action="action/price_action.php" method="post">
   <table class="table table-bordered">
    <tr>
     <th>Журнал</th>
     <th>Төрөл</th>
     <th>Огноо</th>
     <th>Төлөв</th>
     <th>Гүйлгээний дүн</th>
     <th>Гүйлгээний утга</th>
    </tr>
 ';
 while($row = mysqli_fetch_array($result))
 {
  $output .= '
   <tr>
    <input type="hidden" name="corr_id" value="'.$row['id'].'">
    <td>'.$row['id'].'</td>
    <td>'.$row['pay_note'].'</td>
    <td>'.$row['createdate'].'</td>
    <td>'.$row['type_name'].'</td>
    <td>'.number_format($row['amount']).'</td>
    <td>'.$row['note'].'</td>
   </tr>
  ';
 $output .= '
    <tr>
      <td colspan=6><center>Буцаалтын гүйлгээний мэдээлэл</center></td>
    </tr>
    <tr>
    <td><input type="text" value="'.date('Y-m-d').'" name="corr_date" class="form-control"></td>
    <td><input type="text" value="'.$row['amount'].'" name="corr_amount" class="form-control"></td>
    <td colspan=4><textarea style="width:100%;" class="form-control" name="corr_txt" placeholder="Гүйлгээ буцаалтын тайлбар"></textarea></td>
    <td>';
  $output .= '<input type="submit" class="btn btn-danger" name="corr" value="Буцаах">';
  $output .= '</td></tr>';
  }
  $output .= '</table></form></div>';
 echo $output;
}
else
{
 echo 'Data Not Found';
}

?>
