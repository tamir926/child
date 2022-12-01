<?php
include '../config.php';
if(isset($_POST['price_insert']))
{
    $uld = 0;
    $month = $_POST['sar'];
    $ptype = $_POST['ptype'];
    $pprice = $_POST['pprice'];
    $type2 = $_POST['type2'];
    $price_act = $_POST['price_act'];
    $price_date = $_POST['price_date'];
    $id = $_POST['id'];
    $sysdate = date('Y-m-d H:i:s');
    $date1 = date('Y-m-d');
    $uld = $_POST['pprice']-$_POST['price_act'];
    $queryy = mysqli_query($conn,"select *from student where id = $id") or die (mysqli_error());
    $dataa = mysqli_fetch_array($queryy);
    $sectorr = $dataa['sector'];
    //echo $pprice.'<br/>';
    //echo $price_act.'<br/>';
    //echo $uld;
    //echo "insert into student_price(sector,user_id,type1,amount,check1,createdate,price_date,pprice,month,uld) values(0,$id,$ptype,'$price_act',$type2,'$sysdate','$price_date','$pprice','$month','$uld')";

    // student information
    $query1 = mysqli_query($conn,"select surname, sector , branch , ownname , register from student where id = $id") or die (mysqli_error());
    $data1 = mysqli_fetch_array($query1);
    $sector = $data1['sector'];
    $branch = $data1['branch'];
    $txt = '<a href="'.$path.'children/'.$id.'&t=2">'.substr($data1['surname'],0,2).'.'.$data1['ownname'].' '.$data1['register'].' /'.$month.'/</a>';


    // finance
    $query = mysqli_query($conn,"select id , uld from finance where id = (select max(id) maxid from finance where branch = $branch)") or die (mysqli_error());
    $data = mysqli_fetch_array($query);
    $nowuld = $data['uld']+$price_act;
    mysqli_query($conn,"insert into finance (type1,pay_type,amount,note,createdate,systemdate1,branch,uld,bank_name,bank_acntno,acntname)
    values (4,1,'$price_act','$txt','$price_date','$sysdate',$branch,'$type2','$bank_name','$bank_acntno','$acntname') ") or die (mysqli_error());

    $query2 = mysqli_query($conn,"select max(id) maxid from finance") or die (mysqli_error());
    $data2 = mysqli_fetch_array($query2);
    $maxid2 = $data2['maxid'];
    mysqli_query($conn,"insert into student_price(sector,user_id,type1,amount,check1,createdate,price_date,pprice,month,uld,file_id,finance_id)
    values ($sectorr,$id,$ptype,'$price_act',$type2,'$sysdate','$price_date','$pprice','$month','$uld',0,'$maxid2')") or die (mysqli_error());

    header("location:../children/$id&t=2&msg=Бичлэг амжилттай");
}
if(isset($_GET['delete']))
{
  $delete = $_GET['delete'];
  $user_id = $_GET['user_id'];

  $query = mysqli_query($conn,"select *from student_price where user_id = $user_id order by id") or die (mysqli_error());
  while($row = mysqli_fetch_array($query))
  {
    $amount = $row['amount'];
    $uld = $row['uld'];
    $add = $row['id'];
    $finance_id = $row['finance_id'];
  }

  $query1 = mysqli_query($conn,"select *from student_price where id = $delete and user_id = $user_id") or die (mysqli_error());
  $data = mysqli_fetch_array($query1);
  $nem_amount = $data['amount'];

  $aa_amount = $amount+$nem_amount;
  $aa_uld = $uld+$nem_amount;
  mysqli_query($conn,"update student_price set uld = $aa_uld, amount=$aa_amount where id = $add") or die (mysqli_error());
  mysqli_query($conn,"delete from student_price where id = $delete") or die (mysqli_error());
  mysqli_query($conn,"delete from finance where id = $finance_id") or die (mysqli_error());

  header("location:../children/$user_id&t=2&msg=Бичлэг амжилттай");
}
if(isset($_POST['price_change']))
{
    $sar = $_POST['sar'];
    $user_id = $_POST['user_id'];
    $price_act = $_POST['price_act'];
    $query = mysqli_query($conn,"select *from student_price where user_id = $user_id and month='$sar'") or die (mysqli_error());
    $num = mysqli_num_rows($query);
    if($num>1)
    {
        header("location:../children/$user_id&t=2&msg=Төлөлт хийгдсэн тул засварлах боломжгүй");
    }
    else
    {
        mysqli_query($conn,"update student_price set pprice = '$price_act' , uld = '$price_act' where user_id = $user_id and month='$sar'") or die (mysqli_error());
        header("location:../children/$user_id&t=2&msg=Бичлэг амжилттай");
    }
}


if(isset($_POST['finance_insert']))
{
  $count = count($_POST['price_amount']);
  for($i=0;$i<$count;$i++)
  {
    if (!empty($_POST['price_amount'][$i]))
    {
      $student_id = $_POST['student_id'];
      $price_amount = $_POST['price_amount'][$i];
      $dans = $_POST['dans'][$i];
      $month = $_POST['month'][$i];
      $now_uld = $_POST['now_uld'][$i];
      $sysdate = date('Y-m-d H:i:s');
      $price_date = $_POST['price_date'][$i];
      //echo $price_date;

      $branch = $_POST['branch'];
      $bank_name = '';
      $bank_acntno = '';
      $acntname = '';
      $odoo = $now_uld - $price_amount;


      $query1 = mysqli_query($conn,"select surname, sector , ownname , register from student where id = $student_id") or die (mysqli_error());
      $data1 = mysqli_fetch_array($query1);
      $sector = $data1['sector'];
      $txt = '<a href="'.$path.'children/'.$student_id.'&t=2">'.substr($data1['surname'],0,2).'.'.$data1['ownname'].' '.$data1['register'].' /'.$month.'/</a>';

      // finance
      echo "insert into finance (type1,pay_type,amount,note,createdate,systemdate1,branch,uld,bank_name,bank_acntno,acntname)
      values (4,1,'$price_amount','$txt','$price_date','$sysdate',$branch,'$dans','$bank_name','$bank_acntno','$acntname') ";
      mysqli_query($conn,"insert into finance (type1,pay_type,amount,note,createdate,systemdate1,branch,uld,bank_name,bank_acntno,acntname)
      values (4,1,'$price_amount','$txt','$price_date','$sysdate',$branch,'$dans','$bank_name','$bank_acntno','$acntname') ") or die (mysqli_error());
      $maxid = mysqli_insert_id($conn);
      echo '<br/>';
      echo '<br/>';
      echo "insert into student_price(sector,user_id,type1,amount,check1,createdate,price_date,pprice,month,uld,file_id,finance_id)
      values ($sector,$student_id,1,'$price_amount',$dans,'$sysdate','$price_date','$odoo','$month','$odoo',0,'$maxid')";
      mysqli_query($conn,"insert into student_price(sector,user_id,type1,amount,check1,createdate,price_date,pprice,month,uld,file_id,finance_id)
      values ($sector,$student_id,1,'$price_amount',$dans,'$sysdate','$price_date','$odoo','$month','$odoo',0,'$maxid')") or die (mysqli_error());
    }
  }
  header("location:../finance?msg=Сургалтын төлбөр хийгдлээ");
}
if(isset($_POST['corr']))
{
  $corr_id = $_POST['corr_id'];
  $corr_txt = $_POST['corr_txt'];
  $corr_date = $_POST['corr_date'];
  $corr_amount = $_POST['corr_amount'];
  $query = mysqli_query($conn,"select *from finance where id = $corr_id") or die (mysqli_error());
  $data = mysqli_fetch_array($query);
  $type1 = 23;
  $pay_type = $data['pay_type'];
  if($pay_type==1)
  {
    $pay_type=2;
  }
  else
  {
    $pay_type=1;
  }
  $tran_amount = $data['amount'];
  if($corr_amount==$tran_amount)
  {
    $note = 'Буцаалт/'.$corr_id.'/ '.$data['note'];
  }
  else
  {
    $note = 'Хэсэгчлэн буцаалт/'.$corr_id.'/ '.$data['note'];
  }
  $amount = $corr_amount;

  $createdate = $corr_date;
  $date = date('Y-m-d H:i:s');
  $branch = $data['branch'];
  $dans = $data['uld'];
  $bank_name = $data['bank_name'];
  $bank_acntno = $data['bank_acntno'];
  $acntname = $data['acntname'];

  // finance
  $query1 = mysqli_query($conn,"select *from finance where createdate > '$corr_date' order by id desc") or die (mysqli_error());
  $num = mysqli_num_rows($query1);
  if($num>0)
  {
      $query = mysqli_query($conn,"select *from finance where createdate > '$corr_date' order by id desc") or die (mysqli_error());
      while($row = mysqli_fetch_array($query))
      {
       $old = $row['id'];
       $new = $old+1;
       mysqli_query($conn,"update finance set id = $new where id = $old ");
      }
      echo "insert into finance (id,type1,pay_type,amount,note,createdate,systemdate1,branch,uld,bank_name,bank_acntno,acntname)
      values ($old,$type1,$pay_type,'$amount','$note','$createdate','$date',$branch,'$dans','$bank_name','$bank_acntno','$acntname')";
      $sql = mysqli_query($conn,"insert into finance (id,type1,pay_type,amount,note,createdate,systemdate1,branch,uld,bank_name,bank_acntno,acntname)
      values ($old,$type1,$pay_type,'$amount','$note','$createdate','$date',$branch,'$dans','$bank_name','$bank_acntno','$acntname')") or die (mysqli_error());
      $last_id = mysqli_insert_id($conn);
  }
  else
  {
    $sql = mysqli_query($conn,"insert into finance (type1,pay_type,amount,note,createdate,systemdate1,branch,uld,bank_name,bank_acntno,acntname)
    values ($type1,$pay_type,'$amount','$note','$createdate','$date',$branch,'$dans','$bank_name','$bank_acntno','$acntname')") or die (mysqli_error());
    $last_id = mysqli_insert_id($conn);
  }
  //$result = mysqli_query($conn,"select max(id) maxid from finance") or die (mysqli_error());
  //$data1 = mysqli_fetch_array($result);
  //$finance_max = $data1['maxid'];
  $note1 = 'Б:'.$data['note'];
  mysqli_query($conn,"insert into finance_corr (corr_id,txn_id,corr_txt,systemdate)
  values ($corr_id,$last_id,'$corr_txt','$date')") or die (mysqli_error());
  mysqli_query($conn,"update finance set note='$note1' where id = $corr_id") or die (mysqli_error());


  // student price
  echo "select *from student_price where finance_id = $corr_id";
  $query2 = mysqli_query($conn,"select *from student_price where finance_id = $corr_id") or die (mysqli_error());
  $num2 = mysqli_num_rows($query2);
  if($num2>0)
  {
  $query2 = mysqli_query($conn,"select *from student_price where finance_id = $corr_id") or die (mysqli_error());
  $data2 = mysqli_fetch_array($query2);
  $sector2 = $data2['sector'];
  $user_id2 = $data2['user_id'];
  $type2 = $data2['type1'];
  $amount2 = $data2['amount'];
  $check2 = $data2['check1'];
  $createdate2 = $data2['createdate'];
  $price_date2 = $data2['price_date'];
  $month2 = $data2['month'];
  $file_id2 = $data2['file_id'];
  $finance_id2 = $data2['finance_id'];
  $uldegdel = $data2['uld'];
  //$amount = '-'.$amount;

  $uld2 = $uldegdel+$amount;
  $pprice2 = $uldegdel-$amount;

  //$explode = explode("-",$uld2);
  //$uld2 = $explode[1];
  //$explod = explode("-",$pprice2);
  //$pprice2 = $explod[1];
    $amount = '-'.$amount;
  $date = date('Y-m-d H:i:s');
  mysqli_query($conn,"insert into student_price (sector,user_id,type1,amount,check1,createdate,price_date,pprice,month,uld,file_id,finance_id)
  values ($sector2,$user_id2,8,'$amount',$check2,'$date','$corr_date','$pprice2','$month2','$uld2',$file_id2,$finance_id2)");
  }
  header("location:../finance?msg=Буцаалт амжилттай хийгдлээ");
}
?>
