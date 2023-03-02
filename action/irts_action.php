<?php
include '../config.php';
if(isset($_POST['insert_irts']))
{
    $sectorid = $_POST['sectorid'];
	$studentid = $_POST['studentid'];
	$ognoo = $_POST['ognoo'];
	$patha = explode("-",$ognoo);
	$pathb = $patha[0].$patha[1];
	$irts = $_POST['irts'];
	$date = date('Y-m-d');
	for($i=0;count($studentid)>$i;$i++)
	{
	    echo "insert into irts (studentid,sectorid,systemdate,irts,ognoo,type1) values($studentid[$i],$sectorid,'$date',$irts[$i],'$ognoo',0)";
		mysqli_query($conn,"insert into irts (studentid,sectorid,systemdate,irts,ognoo,type1) values($studentid[$i],$sectorid,'$date',$irts[$i],'$ognoo',0)") or die (mysqli_error());
	}
	header("location:".$path."calendar/".$sectorid."&msg=Бичлэг амжилттай хадгалагдлаа.");
	

}
if(isset($_POST['update_irts']))
{
    $sectorid = $_POST['sectorid'];
	$irts_id = $_POST['irts_id'];
	$studentid = $_POST['id'];
	$ognoo = $_POST['ognoo'];
	$irts = $_POST['irts'];
	$date = date('Y-m-d');
	for($i=0;count($irts_id)>$i;$i++)
	{
	    mysqli_query($conn,"update irts set irts=$irts[$i] where id = $irts_id[$i] and ognoo = '$ognoo' ") or die (mysqli_error());
	}
	header("location:".$path."calendar/".$sectorid."&msg=Бичлэг амжилттай хадгалагдлаа.");
	

}
?>
