<style>
.num_table
{
	width:90%;
	border:solid 1px;
	box-shadow: 5px 10px #dbd9d9;
}
.num_table td
{
	border:solid 1px #E1E1E1;
}
.number
{
	padding:5px;
	font-size:16px;
}
.num
{
	height:90px;
	color:#6b6b6b;
}
.num a
{
	font-size:20px;
	margin-left:35px;
	color:#ededed;
}
.num a:hover
{
	color:#5AA4A3;
}
</style>
<?php
$today = date('Y-m-d');
$date = time() ;
if(isset($_GET['uid']))
{
    $uid = $_GET['uid'];
    $year = substr($uid,0,4);
    $month = substr($uid,4,2);
    $day =15;
}
else 
{
    $day = date('d', $date) ;
    $year = date('Y', $date);
    $month = date('m', $date); 
}

$last_mont_days_in_month = 0;
$first_day = mktime(0,0,0,$month, 1, $year) ;
$title = date('F', $first_day) ;
$day_of_week = date('D', $first_day) ;
switch($day_of_week)
{ 
case "Sun": $blank = 0; break; 
case "Mon": $blank = 1; break; 
case "Tue": $blank = 2; break; 
case "Wed": $blank = 3; break; 
case "Thu": $blank = 4; break; 
case "Fri": $blank = 5; break; 
case "Sat": $blank = 6; break; 
} 

$days_in_month = cal_days_in_month(0, $month, $year) ;
$ss = $year.'-'.$month;
$prev_month = date('Ym', strtotime('-1 months', strtotime($ss)));
$next_month = date('Ym', strtotime('+1 months', strtotime($ss)));

echo "<table align='center' class='num_table'>"; 
echo "<tr align='center' style='height:40px; background-color:#685DD8; color:#FFFFFF;'>
		<td><a href='".$path.'calendar/'.$id."/".$prev_month."' style='color:#FFFFFF;'><i class='menu-icon tf-icons ti ti-arrow-left'></i></a></td>
		<td align='center' colspan=5>$title $year</td>
		<td><a href='".$path.'calendar/'.$id."/".$next_month."' style='color:#FFFFFF;'><i class='menu-icon tf-icons ti ti-arrow-right'></i></a></td>
	  </tr>"; 
echo "<tr align='center' style='height:40px; background-color:#EEEEEE; color:#685DD8;'>
		<td width='15%'>Sun</td>
		<td width='14%'>Mon</td>
		<td width='14%'>Tue</td>
		<td width='14%'>Wed</td>
		<td width='14%'>Thu</td>
		<td width='15%'>Fri</td>
		<td>Sat</td>
	   </tr>";            //This counts the days in the week, up to 7 
$day_count = 1; echo "<tr>"; 

if($month-1 != 0) 
{
    $last_month = $month-1;
}
else 
{
    $last_month = 12;
}
if($last_month == '12') 
{
    $year = $year-1;
}

$last_month_first_day = mktime(0,0,0,$last_month, 1, $year);
$last_month_days_in_month = cal_days_in_month(0, $last_month, $year);
$last_month_day_of_week = date('D', $last_mont_days_in_month);
$last_month_days_to_add_to_last_month_end = $blank;
$last_month_end = $last_month_days_in_month-    $last_month_days_to_add_to_last_month_end;

while ( $blank > 0 ) 
{ 
echo "<td><div class='num' style='background-color:#f2f2f2;'>".$last_month_end."</div></td>"; 
$last_month_end++;
$blank = $blank-1; 
$day_count++; 
}

$day_num = 1; 

while ( $day_num <= $days_in_month ) 
{ 
		$ognoo = $year.'-'.$month.'-'.str_pad($day_num, 2, "0", STR_PAD_LEFT);
		
		$ognoo_2022 = '2023-'.$month.'-'.str_pad($day_num, 2, "0", STR_PAD_LEFT);
		$query2 = mysqli_query($conn,"select count(*) niit , sum(case irts when 1 then 1 else 0 end) irsen from irts where sectorid=$id and ognoo = '$ognoo_2022'") or die (mysqli_error());
		$data1 = mysqli_fetch_array($query2);
		echo "<td><div class='num'>";
				echo str_pad($day_num, 2, "0", STR_PAD_LEFT)."<br/>";
				if($month=="01")
				{
				    $zoomblaa = strtotime($ognoo. ' + 1 days');    
				}
				else
				{
				    $zoomblaa = strtotime($ognoo);    
				}
			    $weekday= date("N", $zoomblaa );
                
				//echo '->'.$weekday.'<-';
				/*****************/
				if(!empty($data1['irsen']))
				{
				    /*********************/
				    $result = mysqli_query($conn,"select *from holiday where hdate = '$ognoo'");
            		$result_data = mysqli_fetch_array($result);
            		if(!empty($result_data['id']))
            		{
            		    $weekday = 6;
            		    $holiday_note = $result_data['note'];
            		}
            		else 
            		{
            		    $holiday_note = '';
            		}
            		/*********************/
				    if($weekday==6 || $weekday==7)
				    {
				    echo '<span style="color:green">'.$holiday_note.'</span>';     
				    }
				    else
				    {
				        if($today>=$ognoo)
    				    {
    				        echo "<a data-bs-toggle='modal' data-bs-target='#addteacher".$day_num."' href='#'><i class='material-icons md-48'>edit</i></a>";  
    				    }
				    }
					
?>
<!-- Modal edit -->
<form action="<?=$path?>action/irts_action.php" method="post">
<div class="modal fade" id="addteacher<?=$day_num?>" tabindex="-1" role="dialog" aria-labelledby="addlevel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addlevel"><img src="<?php echo $g_icon; ?>" width="90px;">
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<?=$data['name']?> бүлгийн ирц засварлах /<?=$ognoo_2022?>/</h5>
      </div>
	  <div class="modal-body">
		<table class="table table-bordered">
			<tr>
				<td>Дугаар</td><td>Сурагчийн нэр</td><td>Ирц</td>
			</tr>
			<?php
			$i=1;
			//echo "select (select CONCAT(substr(surname,1,1),'.',ownname) from student where id = studentid) as name , studentid , id , irts , sectorid from irts where sectorid = $id and ognoo='$ognoo_2022'";
			$query1 = mysqli_query($conn,"select (select CONCAT(substr(surname,1,1),'.',ownname) from student where id = studentid) as name , studentid , id , irts , sectorid from irts where sectorid = $id and ognoo='$ognoo_2022'") or die (mysqli_error());
			//$query1 = mysqli_query($conn,"select a.id , b.id irts_id , a.ownname  , a.surname , a.sector, b.* from student a , irts b where a.sector = $id and a.id=b.studentid and b.ognoo='$ognoo'") or die (mysqli_error());
			while($row1 = mysqli_fetch_array($query1))
			{
				echo '<tr><td>'.$i.'</td><td>'.$row1['name'].'</td>
				<input type="hidden" name="sectorid" value="'.$row1['sectorid'].'">
				<input type="hidden" name="studentid[]" value="'.$row1['studentid'].'">
				<input type="hidden" name="irts_id[]" value="'.$row1['id'].'">
				<input type="hidden" name="ognoo" value="'.$ognoo_2022.'">
				<td><select name="irts[]" class="form-select">';?>
					<option <?php if($row1['irts']==1) { echo 'selected="selected"';}?> value=1>Ирсэн</option>
					<option <?php if($row1['irts']==2) { echo 'selected="selected"';}?> value=2>Тасалсан</option>
					<option <?php if($row1['irts']==3) { echo 'selected="selected"';}?> value=3>Чөлөөтэй</option>
					<option <?php if($row1['irts']==4) { echo 'selected="selected"';}?> value=4>Өвчтэй</option>
				<?php echo '</select></td></tr>';
				$i++;
			}
			?>
		</table>
	   </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-bs-dismiss="modal">Гарах</button>
		<button type="submit" name="update_irts" class="btn btn-primary">Хадгалах</button>
      </div>
	</div>
  </div>
</div>
</form>
<?php
			echo "<span style='font-size:12px;'>Ирц ".$data1['irsen']."/".$data1['niit']."(".substr(($data1['irsen']*100)/$data1['niit'],0,4)."%)</span></div>";	
				}
				else
				{
				    /*********************/
				    $result = mysqli_query($conn,"select *from holiday where hdate = '$ognoo'");
            		$result_data = mysqli_fetch_array($result);
            		if(!empty($result_data['id']))
            		{
            		    $weekday = 6;
            		    $holiday_note = $result_data['note'];
            		}
            		else 
            		{
            		    $holiday_note = '';
            		}
            		/*********************/
				    if($weekday==6 || $weekday==7)
				    {
				    echo '<span style="color:green">'.$holiday_note.'</span>';   
				    }
				    else
				    {
				        if($today>=$ognoo)
				        {
                            ?><a data-bs-toggle='modal' data-bs-target='#add<?=$day_num?>' href='#'><i class='menu-icon tf-icons ti ti-plus'></a><?php 
                        }
}
?>
<!-- Modal add -->
<form action="<?=$path?>action/irts_action.php" method="post">
<div class="modal fade" id="add<?=$day_num?>" tabindex="-1" role="dialog" aria-labelledby="addlevel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addlevel"><img src="<?=$g_icon;?>" width="90px;">
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<?=$data['name']?> бүлгийн ирц оруулах /<?=$ognoo_2022?>/
		<?php $pieces = explode("-", $ognoo);  $status_irts = $pieces[1].'/'.$pieces[2].'/'.$pieces[0]; ?>
		</h5>
      </div>
	  <div class="modal-body">
		<table class="table" style="font-size:12px;">
			<tr>
				<td>Дугаар</td><td>Сурагчийн нэр</td><td>Ирц</td>
			</tr>
			<?php
			$i=1;
			$query1 = mysqli_query($conn,"select *from student where sector = $id and type1=1") or die (mysqli_error());
			while($row1 = mysqli_fetch_array($query1))
			{
			    echo '<tr><td>'.$i.'</td><td>'.substr($row1['surname'],0,2).'. '.$row1['ownname'].'</td>
				<input type="hidden" name="sectorid" value="'.$row1['sector'].'">
				<input type="hidden" name="studentid[]" value="'.$row1['id'].'">
				<input type="hidden" name="ognoo" value="'.$ognoo_2022.'">
				<td><select name="irts[]" class="form-select">
					<option value=1>Ирсэн</option>
					<option value=2>Тасалсан</option>
					<option value=3>Чөлөөтэй</option>
					<option value=4>Өвчтэй</option>
					</select></td></tr>';
				$i++;
			}
			?>
		</table>
	   </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-bs-dismiss="modal">Гарах</button>
        <!--<input type="submit" name="insert_irts" value="Хадгалах" class="btn btn-primary">-->
        <button type="submit" name="insert_irts" class="btn btn-primary">Хадгалах</button>
      </div>
	</div>
  </div>
</div>
</form>
<?php					
				}
		echo "</td>"; 
		$day_num++;
		$day_count++; 
if ($day_count > 7) 
{ 
echo "</tr><tr>"; 
$day_count = 1; 
} 
}

$end_days = 1;
while ( $day_count >1 && $day_count <=7 )   {   
echo "<td><div class='num' style='background-color:#f2f2f2;'>".$end_days."</div></td>";   
$day_count++;   
$end_days++;
}   
echo "</tr></table><br/><br/>";


?>
