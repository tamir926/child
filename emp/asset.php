<?php if(isset($_GET['id'])) { $id = $_GET['id'];}?>
<?php
if(isset($_GET['excel']))
{
  ?>
  <style>
  .table tr
  {
    border:solid 1px #000000;
  }
  </style>
  <?php
  include '../action/config.php';
  //$id = $_SESSION['id'];
  $id = $_GET['id'];
  $date = date('Ymd');
	$file = "asset-".$date.".xls";
	header("Content-type: application/vnd.ms-excel");
	header("Content-Disposition: attachment; filename=$file");
}
?>
<center>Ажилтанд бүртгэлтэй хөрөнгийн мэдээлэл</center>
  <table id="example" class="table table-striped table-bordered table-hover">
  <thead>
    <tr>
      <th>Дугаар</th>
      <th>Төрөл</th>
      <th>Барааны код</th>
      <th>Барааны нэр</th>
      <th>Тоо ширхэг</th>
      <th>Хариуцагч</th>
      <th>Үнэ</th>
      <th>Огноо</th>
      <th>Дуусах</th>
      <th>Тайлбар</th>
    </tr>
    <?php
    $i = 1;
    $sum = 0;
    $query = mysqli_query($conn,"select a.* , b.id cate_id , count1 , b.cate_name , fname , notes , lname , d.name branch_name 
    from asset a, category_asset b , add_owner e, employer c , branch d where a.type1 = b.id and a.emp_id = e.id and e.owner = c.id and c.brchno = d.id and e.owner = $id ") or die (mysqli_error());
    while($row = mysqli_fetch_array($query))
    {

    $now_date = date('m/d/Y');
    $d1 = new DateTime($row['date1']);
    $d2 = new DateTime($now_date);
    $interval = $d2->diff($d1);
    $month = $interval->format('%m months');
    $price = $row['price'];
    $piece = $row['piece1'];
    $eleg = $price-($piece*$month);
    $sid = $row['id'];

    echo '<tr>
            <td>'.$i.'</td>
            <td id="cate_name_'.$sid.'">'.$row['cate_name'].'</td>
            <td id="code_'.$sid.'">'.$row['code'].'</td>
            <td id="name_'.$sid.'">'.$row['name'].'</td>
            <td id="name_'.$sid.'">'.$row['count1'].'</td>
            <td id="emp_name_'.$sid.'">'.substr($row['lname'],0,2).'. '.$row['fname'].'</td>
            <td id="eleg_'.$sid.'">'.number_format($eleg).'</td>
            <td id="date1_'.$sid.'">'.$row['date1'].'</td>
            <td id="date1_'.$sid.'">'.$row['enddate'].'</td>
            <td id="date1_'.$sid.'">'.$row['notes'].'</td>
          </tr>';
          $i++;
          $sum = $sum + $eleg;
    }
    ?>
    <tr><td colspan=6>Нийт</td><td colspan=3><?=number_format($sum)?> ₮</td><td></td></tr>
</table>
<?php if(!isset($_GET['excel']))
{
echo '<a href="https://www.elite.mn/kpi/employer/asset.php?excel&id='.$id.'" style="margin:10px;" class="btn btn-default">Excel</a>';
}
else
{
  echo 'Хөрөнгө хариуцагч: ................';
  echo '<br/>';
  echo 'Шалгалт хийсэн:....................';
}
?>
