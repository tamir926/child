<?php
$id = $_GET['id'];
$sector = $data['sector'];
function job_day($a)
{
  
  $workdays = array();
  $type = CAL_GREGORIAN;
  $month = substr($a,5,2);
  $month = ltrim($month, '0');
  $year = substr($a,0,4);
  $day_count = cal_days_in_month($type, $month, $year);
for ($i = 1; $i <= $day_count; $i++)
{
  $date = $year.'/'.$month.'/'.$i; //format date
  $get_name = date('l', strtotime($date)); //get week day
  $day_name = substr($get_name, 0, 3); // Trim day name to 3 chars
    if($day_name != 'Sun' && $day_name != 'Sat')
    {
      $workdays[] = $i;
    }
}
  return count($workdays);
}
echo '<table style="width:90%" align="center" class="table table-bordered">
          <tr>
          <th>Сар</th>
          <th>Ажлын өдөр</th>
          <th>Ирсэн</th>
          <th>Чөлөөтэй</th>
          <th>Өвчтэй</th>
          <th>Тасалсан</th>
          <th>Ирцийн хувь</th>
          </tr>';
$i = 1;
$sum_irsen = 0;
$sum_choloo = 0;
$sum_uvchtei = 0;
$sum_odor = 0;
$sum_ireegui = 0;
$sum_huwi = 0;
$query = mysqli_query($conn,"select *from kpi_date where kdate >= '2022-09'") or die (mysqli_error());
while($row = mysqli_fetch_array($query))
{
    $kpi_date = $row['kdate'];
    $query1 = mysqli_query($conn,"select sum(irsen) niit_irsen , sum(choloo) niit_choloo , sum(ireegui) niit_ireegvi , sum(uvchtei) niit_uvchtei from
    (select (case when irts = 2 then 1 else 0 end) ireegui , (case when irts = 4 then 1 else 0 end) uvchtei , (case when irts = 1 then 1 else 0 end) irsen 
    , (case when irts = 3 then 1 else 0 end) choloo from irts where studentid = $id and sectorid = $sector and substr(ognoo,1,7) = '$kpi_date') a") or die (mysqli_error());
    while($row1 = mysqli_fetch_array($query1))
    {
    
      $niit_irsen = $row1['niit_irsen']; if(strlen($niit_irsen)==0) {$niit_irsen = 0;}
      $niit_choloo = $row1['niit_choloo']; if(strlen($niit_choloo)==0) {$niit_choloo = 0;}
      $niit_ireegvi = $row1['niit_ireegvi']; if(strlen($niit_ireegvi)==0) {$niit_ireegvi = 0;}
      $niit_uvchtei = $row1['niit_uvchtei']; if(strlen($niit_uvchtei)==0) {$niit_uvchtei = 0;}
      $ireegui = $niit_choloo+$niit_ireegvi+$niit_uvchtei;
      $irsen = job_day($kpi_date);
      $huwi =  substr(($niit_irsen*100)/$irsen,0,4);
          
      echo '<tr>
                <td>'.$kpi_date.'</td>
                <td>'.job_day($kpi_date).'</td>
                <td>'.$niit_irsen.'</td>
                <td>'.$niit_choloo.'</td>
                <td>'.$niit_uvchtei.'</td>
                <td>'.$niit_ireegvi.'</td>
                <td>'.$huwi.' %</td></tr>';
    }
    $sum_irsen = $sum_irsen + $niit_irsen;
    $sum_choloo = $sum_choloo + $niit_choloo;
    $sum_uvchtei = $sum_uvchtei + $niit_uvchtei;
    $sum_ireegui = $sum_ireegui + $niit_ireegvi;
    $sum_odor = $sum_odor + $irsen;
    $sum_huwi = $sum_huwi + $huwi;
    $i++;
    
}
 $d = $i-1;
 $ene = ($sum_huwi*$d)/100;
 echo '<tr><td>НИЙТ</td><td>'.$sum_odor.'</td><td>'.$sum_irsen.'</td><td>'.$sum_choloo.'</td><td>'.$sum_uvchtei.'</td><td>'.$sum_ireegui.'</td><td>'.substr($ene,0,4).' %</td></tr>';
echo '</table>';

?>
