<?php
//fetch.php
include 'config.php';
$output = '';
if(isset($_POST["query"]))
{
 $search = mysqli_real_escape_string($conn, $_POST["query"]);
 //$query = "select *from student where register like '%".$search."%'";
 //$query = "select *from student where register = '$search'";
 //$query = "select b.* from student a , student_price b where b.user_id = a.id and a.register = '$search'";
 $query = "select *FROM
  (
    select max(a.id) maxid , month from student_price a , student b  where a.user_id = b.id and register='$search' group by a.month
  ) a , student_price b where a.maxid = b.id";
}
else
{
 $query = "select *from student where register=1";
}

$result = mysqli_query($conn, $query);
if(mysqli_num_rows($result) > 0)
{
  $query1 = mysqli_query($conn,"select a.ownname , b.id branch_name , a.id , a.surname , dans , dans1 , b.name , c.name sector_name from student a , branch b , sector c where a.register = '$search' and a.branch = b.id and a.sector = c.id") or die (mysqli_error());
  $data1 = mysqli_fetch_array($query1);
 $output .= '
  <div class="table-responsive">
   <form action="action/price_action.php" method="post">
   <table class="table table-bordered">
    <tr>
      <td><b>Салбар:</b></td><td>'.$data1['name'].'</td>
      <td><b>Бүлэг:</b></td><td>'.$data1['sector_name'].'</td>
    </tr>
    <tr>
      <td><b>Овог:</b></td><td>'.$data1['surname'].'</td>
      <td><b>Нэр:</b></td><td>'.$data1['ownname'].'</td>
    </tr>
   </table>
   <table class="table table-bordered">
    <tr>
     <th>Сар</th>
     <th>Үлдэгдэл</th>
     <th>Огноо</th>
     <th>Данс</th>
     <th>Төлөх дүн</th>
    </tr>
 ';
 while($row = mysqli_fetch_array($result))
 {
  $output .= '
   <tr>
    <td>'.substr($row["month"],0,4).'-'.substr($row["month"],4,2).'</td>
    <td>'.number_format($row["uld"]).'</td>
    <td><input type="text" class="form-control" name="price_date[]" value="'.substr($row["month"],0,4).'-'.substr($row["month"],4,2).'-01"></td>
    <td>
      <input type="hidden" name="month[]" value="'.substr($row["month"],0,4).''.substr($row["month"],4,2).'">
      <input type="hidden" name="student_id" value="'.$data1['id'].'">
      <input type="hidden" name="branch" value="'.$data1['branch_name'].'">
      <input type="hidden" name="now_uld[]" value="'.$row['uld'].'">
      <select name="dans[]" class="form-control">
        <option value="'.$data1['dans'].'">'.$data1['dans'].'</option>
        <option value="'.$data1['dans1'].'">'.$data1['dans1'].'</option>
      </select>
    </td>
    <td>';
    if($row['uld']>0)
    {
      $output .= '<input type="text" name="price_amount[]" class="form-control" value="">';
    }
    else 
    {
      $output .= '<input type="hidden" name="price_amount[]" class="form-control" value="">';   
    }
    echo '</td>
   </tr>
  ';
 }
  $output .= '<tr><td colspan=4></td><td><input type="submit" class="btn btn-default" name="finance_insert" value="Хадгалах"></td></tr></table></form></div>';
 echo $output;
}
else
{
 echo 'Data Not Found';
}

?>
