<?php
////////// alban tushaal vzvvleltiin onoo shalgaj bna
$id = $_GET['id'];
//echo "select b.role_total, b.salary , a.id , a.maxcount , role role_id , c.salary from job a, hr_salary c,
//(select sum(total) role_total , c.role , c.salary from sub_questions a , kpi_connect b , employer c where b.qid = a.id and b.role = c.role and c.id = $id group by c.role , c.salary) b where b.role = a.id and b.salary = c.id";
$query = mysqli_query($conn,"select b.role_total, b.salary , a.id , a.maxcount , role role_id , c.salary from job a, hr_salary c,
(select sum(total) role_total , c.role , c.salary from sub_questions a , kpi_connect b , employer c where b.qid = a.id and b.role = c.role and c.id = $id group by c.role , c.salary) b where b.role = a.id and b.salary = c.id") or die (mysqli_error());
$data = mysqli_fetch_array($query);
$role_id = $data['role_id'];

/*********20201220 nemsen*****/
if(strlen($role_id)>0)
{
/*********20201220 nemsen*****/  

if($data['maxcount']==$data['role_total'])
{
  //echo 'Хэвийн';
}
else
{
  //echo 'Алдаа гарлаа';
}
////////// alban tushaal vzvvleltiin onoo shalgaj bna
if(!isset($_GET['uid']))
{

echo '<table align="center" class="table table-bordered" style="width:95%">
      <tr>
        <th><center>Дугаар</center></th>
        <th><center>Үнэлгээний огноо</center></th>
        <th><center>Үнэлгээгээр авбал зохих оноо</center></th>
        <th><center>Үнэлгээгээр авсан оноо</center></th>
        <th><center>Ажлын гүйцэтгэлийн чанар</center></th>
        <th><center>Ажлын гүйцэтгэлийн цалин</center></th>
        <th><center>Дэлгэрэнгүй</center></th>
      </tr>';
  $i = 1;
  $query = mysqli_query($conn,"select *from kpi_date") or die (mysqli_error());
  while($row = mysqli_fetch_array($query))
  {
    $kid = $row['id'];
    $data5 = mysqli_query($conn,"select sum(aa) ab from ( select ((emp_point*total)/100) aa , emp_point, total from kpi_employer where kpi_date=$kid and emp_id=$id) a") or die (mysqli_error());
    $data5 = mysqli_fetch_array($data5);
    //$ab = substr($data5['ab'],0,5);
    $ab = 1;
    
    //if(1>0)
    {
      //$hand = number_format(($ab*$data['salary'])/$row['total'],2);
      $hand = '';
    }
    //else
    {
      $hand = '';
    }

  echo '<tr>
          <td>'.$i.'</td>
          <td>'.$row['kdate'].'</td>
          <td>'.$row['total'].'</td>
          <td>'.$ab.'</td>
          <td>';
          if($ab>1)
          {
              $huwi = ($ab*100)/$row['total'];
              echo $huwi.' %';
          }
          echo '</td>
          <td>'.$hand.'</td>
          <td><a href="'.$path.$_GET['id'].'/'.$row['id'].'/kpi" class="btn btn-default">Дэлгэрэнгүй</a></td>
        </tr>';
    $i++;
  }
    echo '</table><br/><br/><br/>';
}
?>

<?php
if(isset($_GET['uid']))
{
  $kdate = $_GET['uid'];
  $salary = $data['salary'];
  $role_id = $data['role_id'];
?>

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?=$path?>profile/<?=$id?>&t=kpi">Ажлын гүйцэтгэл</a></li>
    <li class="breadcrumb-item active" aria-current="page">
      <?php $uid = $_GET['uid'];
      $data = mysqli_query($conn,"select *from kpi_date where id = $uid") or die (mysqli_error());
      $data = mysqli_fetch_array($data);
      echo $data['kdate'];
      ?>
    </li>
    <li><a href="<?=$path?>action/report/excel_c.php?kdate=<?=$kdate?>&id=<?=$id?>"><i style="font-size:24px;" class="material-icons">cloud_download</i></a></li>
  </ol>
</nav>
<table align="center" style="width:95%" class="table table-bordered">
  <tr>
    <th rowspan="2">Дугаар</th>
    <th rowspan="2">Гүйцэтгэлийн үнэлгээний хуудаснууд</th>
    <!--<th rowspan="2">Баримт бичгийн бүртгэлийн код</th>-->
    <th rowspan="2">Онооны хөрвүүлэлт</th>
    <th colspan="2">Үнэлгээгээр авбал зохих</th>
    <th colspan="2">Үнэлгээгээр авсан </th>
    <th rowspan="2">Өгөгдөл</th>
  </tr>
  <tr>
    <th>Оноо</th>
    <th>Цалин</th>
    <th>Оноо</th>
    <th>Хувь</th>
  </tr>
<?php
$i = 1;
$total_sum = 0;
$tsalin_niit = 0;
$user_sum = 0;
$user_point = 0;
//echo "select sum(total) sum_total from kpi_connect a , sub_questions b where a.qid = b.id and role=$role_id and kdate_id=$kdate";
$query1 = mysqli_query($conn,"select sum(total) sum_total from kpi_connect a , sub_questions b where a.qid = b.id and role=$role_id and kdate_id=$kdate") or die (mysqli_error());
$data1 = mysqli_fetch_array($query1);

//$query = mysqli_query($conn,"select a.name , connect_type , a.id , total, disid , d.code , e.name name_body from sub_questions a , kpi_connect b , employer c , code d , code_type e where b.qid = a.id and b.role = c.role and c.id = $id and b.kdate_id=$kdate and a.disid = d.id and d.type1 = e.id") or die (mysqli_error());
$query = mysqli_query($conn,"select a.name , connect_type , a.id , total, disid from sub_questions a , kpi_connect b , employer c  where b.qid = a.id and b.role = c.role and c.id = $id and b.kdate_id=$kdate") or die (mysqli_error());
while($row = mysqli_fetch_array($query))
{
  /*********** oruulsan kpi oloh***********/
  $sub_question_id = $row['id']; // sub_questions id shvv
  $connect_type = $row['connect_type'];
  $end_bna = $row['total']; // shalgaj bna
  $uid = $_GET['uid'];
  $query3 = mysqli_query($conn,"select *from kpi_employer where emp_id = $id and sub_questions_id = $sub_question_id and kpi_date=$uid") or die (mysqli_error());
  $data3 = mysqli_fetch_array($query3);

  $query4 = mysqli_query($conn,"select *from kpi_employer where emp_id = $id and sub_questions_id = $sub_question_id and kpi_date=$uid") or die (mysqli_error());
  $num = mysqli_fetch_array($query4);
  if($num>0)
  {
    $now_point = $num['total']; // omnoh onoonii niilber baazruu hadgalsan
    $point1 = $num['emp_point'];
    if($connect_type==1)
    {
      $btn = 'Бүлгийн багшийн оноо';
    }
    else
    {
        if($login==6 || $login==1)
        {
          $btn = '<a href="#" class="btn btn-default" data-toggle="modal" data-target="#oruulsan'.$sub_question_id.'" onClick="showModal('.$id.')">Засварлах</a>';  
        }
        else 
        {
            $btn = 'Эрх байхгүй';
        }
      
    }
  }
  else
  {
    $now_point = $row['total']; // omnoh onoonii niilber baazruu hadgalsan
    $point1 = 0;
    if($connect_type==1)
    {
      $btn = 'Бүлгийн багшийн оноо';
    }
    else
    {
        if($login==6 || $login==1)
        {
          $btn = '<a href="#" class="btn btn-default" data-toggle="modal" data-target="#view'.$row['id'].'">Оруулах</a>';  
        }
        else 
        {
            $btn = 'Эрх байхгүй';
        }
      
    }
  }

  if($data1['sum_total']==0)
  {
    $tsalin = 0;
  }
  else
  {
    $tsalin = substr(($salary*$row['total'])/$data1['sum_total'],0,9);
  }
  $olgoh = ($now_point*$point1)/100;
  /*********** oruulsan kpi oloh***********/
  echo '<tr>
          <td style="display:none;" id="json1_'.$id.'">'.$data3['json1'].'</td>
          <td>'.$i.'</td>
          <td>'.$row['name'].'</td>';
          /*<td>'.$row['name_body'].'-'.$row['code'].'</td>*/
          echo '<td>Оноо=(Үзүүлэлт*'.$now_point.')/100</td>
          <td id="now_point_'.$id.'">'.$end_bna.'</td>
          <td>'.number_format($tsalin).' ₮</td>
          <td>'.$olgoh.'</td>
          <td>'.$point1.'%</td>
          <td>'.$btn.'</td>
        </tr>';
  $i++;
  $total_sum = $total_sum+$end_bna;
  $user_sum = $user_sum+$point1;
  $tsalin_niit = $tsalin_niit + $tsalin;
  $user_point = $user_point+$olgoh;
}

$gar_deer_olgoh = ($user_point*$tsalin_niit)/$total_sum;
echo '<tr style="background-color:#eeeeee">
        <td><center>Нийт</center></td>
        <td></td>
        <td></td>
        <td>'.$total_sum.'</td>
        <td>'.number_format($tsalin_niit).' ₮</td>
        <td><b>'.$user_point.'</b></td>
        <td colspan=2><b><center>'.number_format($gar_deer_olgoh).' ₮</center></b></td>
      </tr></table>';
}
 ?>

<!-------------------modal nemekh----------------------->
<?php
$query1 = mysqli_query($conn,"select *from sub_questions") or die (mysqli_error());
while($row = mysqli_fetch_array($query1))
{
$sid = $row['id'];
$array = $row['json1'];
$name = $row['name'];
?>
<form action="<?=$path?>action/kpi_action.php" method="post">
<div class="modal fade" id="view<?=$sid?>" tabindex="-1" role="dialog" aria-labelledby="addlevel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
      <h5 class="modal-title" id="addlevel"><img src="<?php echo $browser_img; ?>" width="90px;">
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <br/><center><?=$name?></center></h5>
      </div>
      <div class="modal-body">
      <form action="" method="post">
      <?php
      $array = json_decode($array, true);
      $sum = 0;
      echo '<table class="table table-bordered">';
      foreach($array as $k=>$v)
      {
        echo '<tr>';
        if(strlen($k)>1)
        {
          $mm =  $k;
          $style = "";
        }
        else
        {
          $mm = '';
          $style='style="font-weight: bold;"';
        }
        if(is_numeric($mm))
        {
          $mm = '';
        }
        echo '<td colspan=3><b>'.$mm.'</b></td>';
        echo '</tr>';
        foreach($v as $k1=>$v1)
        {
          $sum = $sum+$v1['point'];
          echo '<tr '.$style.'>
                  <td>'.$v1['name'].'</td>
                  <td>'.$v1['point'].'</td>
                  <td>
                  <input type="hidden" name="kpi_date1" value="'.$_GET['uid'].'">
                  <input type="hidden" name="emp_id" value="'.$_GET['id'].'">
                  <input type="hidden" name="point_name[]" value="'.$v1['name'].'">
                  <input type="hidden" name="point[]" value="'.$v1['point'].'">
                  <input type="hidden" name="sid" value="'.$sid.'">
                  <input type="hidden" name="role_id" value="'.$role_id.'">
                  <input type="text" name="new_point[]" class="form-control"></td></tr>';
          }
        }
        echo '<tr>
                <td align="center">Нийт оноо</td>
                <td>'.$sum.'</td>
                <td><input type="submit" value="Хадгалах" name="insert" class="btn btn-primary"></td>
              </tr></table>';
        ?>
          </form>
         </div>
      </div>
      </div>
    </div>
  </form>
<?php
}
?>
<!--------------------------------------------->

<!-------------------kpi ognoo nemekh----------------------->
<form action="<?=$path?>action/kpi_action.php" method="post">
  <div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="addlevel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="addlevel"><img src="<?php echo $browser_img; ?>" width="90px;">
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        Гүйцэтгэл оруулах</h5>
        </div>
        <div class="modal-body">
          <form action="" method="post">
            <table class="table table-bordered">
              <input type="hidden" name="uid" value="<?=$_GET['id']?>">
              <input type="hidden" name="total" value="<?=$data['maxcount']?>">
              <tr><td>Гүйцэтгэлийн оноо</td><td><input type="text" name="date1" class="form-control"></td></tr>
              <tr><td>Авах оноо</td><td><?=$data['maxcount']?></td></tr>
              <tr><td>Авах авсан оноо</td><td>0</td></tr>
              <tr><td>Цалин</td><td>0</td></tr>
              <tr>
                <td></td>
                <td><input type="submit" class="btn btn-default" name="kpi_date" value="Хадгалах"></td>
              </tr>
            </table>
          </form>
         </div>
      </div>
    </div>
  </div>
</form>
<!--------------------------------------------->

<!------------------- oruulsan kpi harah----------------------->
<?php
if(isset($_GET['uid']))
{
$uid = $_GET['uid'];
$query4 = mysqli_query($conn,"select *from kpi_employer where emp_id = $id and kpi_date = $uid") or die (mysqli_error());
while($data4 = mysqli_fetch_array($query4))
{
$array4 = $data4['json1'];
$kid = $data4['id'];
$sid = $data4['sub_questions_id'];
    $query5 = mysqli_query($conn,"select *from sub_questions where id = $sid") or die (mysqli_error());
    $data5 = mysqli_fetch_array($query5);
?>
<form action="<?=$path?>action/kpi_action.php" method="post">
  <div class="modal fade" id="oruulsan<?=$data4['sub_questions_id']?>" tabindex="-1" role="dialog" aria-labelledby="addlevel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="addlevel"><img src="<?php echo $browser_img; ?>" width="90px;">
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <center><?=$data5['name']?> засварлах</center></h5>
        </div>
        <div class="modal-body">
        <form action="" method="post">
        <?php
        
        $array4 = json_decode($array4, true);
        //var_dump($array4);
        $sum = 0;
        echo '<table class="table table-bordered">';
        foreach($array4 as $k=>$v)
        {
          echo '<tr>';
          if(strlen($k)>1)
          {
            $mm =  $k;
            $style = "";
          }
          else
          {
            $mm = '';
            $style='style="font-weight: bold;"';
          }
          if(is_numeric($mm))
          {
            $mm = '';
          }
          echo '<td colspan=3><b>'.$mm.'</b></td>';
          echo '</tr>';
          foreach($v as $k1=>$v1)
          {
          $sum = $sum+$v1['point'];
          echo '<tr '.$style.'>
                  <td>'.$v1['name'].'</td>
                  <td>'.$v1['point'].'</td>
                  <td>
                  <input type="hidden" name="kpi_date1" value="'.$_GET['uid'].'">
                  <input type="hidden" name="emp_id" value="'.$_GET['id'].'">
                  <input type="hidden" name="point_name[]" value="'.$v1['name'].'">
                  <input type="hidden" name="point[]" value="'.$v1['point'].'">
                  <input type="hidden" name="kid" value="'.$kid.'">
                  <input type="hidden" name="sid" value="'.$sid.'">
                  <input type="text" name="new_point[]" value="'.$v1['upoint'].'" class="form-control"></td>
                </tr>';
          }
        }
        echo '<tr>
                <td align="center">Нийт оноо</td>
                <td>'.$sum.'</td>
                <td><input type="submit" value="Хадгалах" name="update" class="btn btn-primary"></td>
              </tr></table>';?>
        </form>
       </div>
      </div>
    </div>
  </div>
</form>
<?php
  }
}
?>
<!--------------------------------------------->
  <script>
  function showModal(id)
  {
      $('#json1').val($("#json1_"+id).text());
      $('#now').val($("#now_point_"+id).text());
  }
  </script>


<!-------------------20201220 nemsen--------------------------> 

  <?php 
}
else 
{
    echo 'KPI албан тушаал дээр ороогүй байна';
}
  ?>
<!--------------------------------------------->
