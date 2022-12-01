<?php
include '../config.php';
if(isset($_POST['insert_finance1']))
{
  $createdate = $_POST['createdate'];
  $type1 = $_POST['type1'];
  $pay_type = $_POST['pay_type'];
  $branch = $_POST['branch'];
  $amount = $_POST['amount'];
  $note = $_POST['note'];
  $date = date('Y-m-d H:i:s');
  $dans = $_POST['dans'];
  $edate = $_POST['edate'];

  $bank_name = '';
  $bank_acntno = '';
  $acntname = '';

  //if($edate<$createdate)
  {
    //  header("location:../finance?branch=".$branch."&msg=Гүйлгээ оруулах боломжгүй");
  }
  //else // 1 saraas omnoh data zasah bolomjgvi
  {
      $query1 = mysqli_query($conn,"select *from finance where createdate > '$createdate' order by id desc") or die (mysqli_error());
      $num = mysqli_num_rows($query1);
      if($num>0)
      {
          mysqli_query($conn,"insert into finance (type1,pay_type,amount,note,createdate,systemdate1,branch,uld,bank_name,bank_acntno,acntname)
          values ($type1,$pay_type,'$amount','$note','$createdate','$date',$branch,'$dans','$bank_name','$bank_acntno','$acntname')") or die (mysqli_error());
      }
      else
      {
         mysqli_query($conn,"insert into finance (type1,pay_type,amount,note,createdate,systemdate1,branch,uld,bank_name,bank_acntno,acntname)
         values ($type1,$pay_type,'$amount','$note','$createdate','$date',$branch,'$dans','$bank_name','$bank_acntno','$acntname')") or die (mysqli_error());
      }
      header("location:../finance?branch=".$branch."&msg=Бичлэг амжилттай хадгалагдлаа");
  }
}

if(isset($_POST['insert_finance2']))
{
  $createdate = $_POST['createdate'];
  $type1 = $_POST['type1'];
  $pay_type = $_POST['pay_type'];
  $branch = $_POST['branch'];
  $amount = $_POST['amount'];
  $note = $_POST['note'];
  $date = date('Y-m-d H:i:s');
  $dans = $_POST['dans'];
  $edate = $_POST['edate'];

  $bank_name = $_POST['bank_name'];
  $bank_acntno = $_POST['bank_acntno'];
  $acntname = $_POST['acntname'];

  $query1 = mysqli_query($conn,"select *from finance where createdate > '$createdate' order by id desc") or die (mysqli_error());
  $num = mysqli_num_rows($query1);
  //if($edate<$createdate)
  {
    //  header("location:../finance?branch=".$branch."&msg=Гүйлгээ оруулах боломжгүй");
  }
  //else
  {
  if($num>0)
  {
      mysqli_query($conn,"insert into finance (type1,pay_type,amount,note,createdate,systemdate1,branch,uld,bank_name,bank_acntno,acntname)
      values ($type1,$pay_type,'$amount','$note','$createdate','$date',$branch,'$dans','$bank_name','$bank_acntno','$acntname')") or die (mysqli_error());
  }
  else
  {
     mysqli_query($conn,"insert into finance (type1,pay_type,amount,note,createdate,systemdate1,branch,uld,bank_name,bank_acntno,acntname)
     values ($type1,$pay_type,'$amount','$note','$createdate','$date',$branch,'$dans','$bank_name','$bank_acntno','$acntname')") or die (mysqli_error());
  }
  header("location:../finance?branch=".$branch."&msg=Бичлэг амжилттай хадгалагдлаа");
  }
}

if(isset($_POST['insert_finance']))
{
    $createdate = $_POST['createdate'];
    $type1 = $_POST['type1'];
    $pay_type = $_POST['pay_type'];
    $branch = $_POST['branch'];
    $amount = $_POST['amount'];
    $note = $_POST['note'];
    $date = date('Y-m-d H:i:s');
    $bank_name = $_POST['bank_name'];
    $bank_acntno = $_POST['bank_acntno'];
    $acntname = $_POST['acntname'];

    $query = mysqli_query($conn,"select *From finance where createdate <= '$createdate' and branch=$branch order by id desc limit 1") or die (mysqli_error());
    $num = mysqli_num_rows($query);
    if($num>0)
    {
      $query = mysqli_query($conn,"select *From finance where createdate <= '$createdate' and branch=$branch order by id desc limit 1") or die (mysqli_error());
      $data = mysqli_fetch_array($query);
      $jrno = $data['id'];
      $uldegdel = $data['uld'];

      if($pay_type==1)
      {
        $now_uld1=$uldegdel+$amount;
        echo 'zarlaga****';
        echo "select *From finance where createdate >= '$createdate' and branch=$branch order by createdate";
        echo '******';
        $query1 = mysqli_query($conn,"select *From finance where createdate >= '$createdate' and branch=$branch order by createdate") or die (mysqli_error());
        while($row1 = mysqli_fetch_array($query1))
        {
          $id1 = $row1['id'];
          $old_uld = $row1['uld'];
          $now_uld = $old_uld+$amount;
          echo "update finance set uld=$now_uld where id=$id1 and branch=$branch";
          echo "<br/><br/>";
          mysqli_query($conn,"update finance set uld=$now_uld where id=$id1 and branch=$branch") or die (mysqli_error());
        }
      }
      else
      {
        $now_uld1=$uldegdel-$amount;
        echo 'orlogo**';
        $query1 = mysqli_query($conn,"select *from finance where id> $jrno and branch=$branch order by id") or die (mysqli_error());
        while($row1 = mysqli_fetch_array($query1))
        {
          $id1 = $row1['id'];
          $old_uld = $row1['uld'];
          $now_uld = $old_uld-$amount;
          echo "update finance set uld=$now_uld where id=$id1 and branch=$branch";
          echo "<br/><br/>";
          mysqli_query($conn,"update finance set uld=$now_uld where id=$id1 and branch=$branch") or die (mysqli_error());
        }
      }
    }
    else
    {
      $uldegdel = 0;
      $jrno = 0;
      $now_uld1 = $amount;
      /*******************************************************************************************/
      if($pay_type==1)
      {
        $now_uld1=$uldegdel+$amount;
        echo 'zarlaga';
        echo "select *from finance where id> $jrno and branch=$branch order by id";
        $query1 = mysqli_query($conn,"select *from finance where id> $jrno and branch=$branch order by id") or die (mysqli_error());
        while($row1 = mysqli_fetch_array($query1))
        {
          $id1 = $row1['id'];
          $old_uld = $row1['uld'];
          $now_uld = $old_uld+$amount;
          echo "update finance set uld=$now_uld where id=$id1 and branch=$branch";
          echo "<br/><br/>";
          mysqli_query($conn,"update finance set uld=$now_uld where id=$id1 and branch=$branch") or die (mysqli_error());
        }
      }
      else
      {
        $now_uld1=$uldegdel-$amount;
        echo 'orlogo';
        $query1 = mysqli_query($conn,"select *from finance where id> $jrno and branch=$branch order by id") or die (mysqli_error());
        while($row1 = mysqli_fetch_array($query1))
        {
          $id1 = $row1['id'];
          $old_uld = $row1['uld'];
          $now_uld = $old_uld-$amount;
          echo "update finance set uld=$now_uld where id=$id1 and branch=$branch";
          echo "<br/><br/>";
          mysqli_query($conn,"update finance set uld=$now_uld where id=$id1 and branch=$branch") or die (mysqli_error());
        }
      }
      /*******************************************************************************************/


    }

    mysqli_query($conn,"insert into finance (type1,pay_type,amount,note,createdate,systemdate1,branch,uld,bank_name,bank_acntno,acntname) values ($type1,$pay_type,'$amount','$note','$createdate','$date',$branch,'$now_uld1','$bank_name','$bank_acntno','$acntname')") or die (mysqli_error());
    header("location:../finance?branch=".$branch."&msg=Бичлэг амжилттай хадгалагдлаа");

}


if(isset($_POST['update_finance2']))
{
  $createdate = $_POST['createdate'];
  $type1 = $_POST['type1'];
  $jrno = $_POST['jrno'];
  $pay_type = $_POST['pay_type'];
  $branch = $_POST['branch'];
  $new_amount = $_POST['amount'];
  $note = $_POST['note'];
  $dans = $_POST['dans'];
  $date = date('Y-m-d H:i:s');

  $bank_name = $_POST['bank_name'];
  $bank_acntno = $_POST['bank_acntno'];
  $acntname = $_POST['acntname'];

echo "update finance set amount=$new_amount, type1 = $type1,bank_name='$bank_name',bank_acntno='$bank_acntno',acntname='$acntname', uld=$dans where id = $jrno";
  mysqli_query($conn,"update finance set amount=$new_amount, type1 = $type1,bank_name='$bank_name',bank_acntno='$bank_acntno',acntname='$acntname', uld=$dans where id = $jrno") or die (mysqli_error());


  header("location:../finance?branch=".$branch."&msg=Бичлэг амжилттай хадгалагдлаа");

}

if(isset($_POST['update_finance1']))
{
  $createdate = $_POST['createdate'];
  $type1 = $_POST['type1'];
  $pay_type = $_POST['pay_type'];
  $branch = $_POST['branch'];
  $amount = $_POST['amount'];
  $old_uld1 = $_POST['old_uld'];
  $note = $_POST['note'];
  $date = date('Y-m-d H:i:s');

  $jrnoo = $_POST['jrno'];

  $result = mysqli_query($conn,"select *from finance where id = $jrnoo") or die (mysqli_error());
  $result_data = mysqli_fetch_array($result);
  $old_amount = $result_data['amount'];
  $old_uld = $result_data['uld'];
  $hasah_dun = $old_amount-$amount;
  $new_uld = $old_uld-$hasah_dun;
  echo $new_uld;
  //echo '<br/>'.$hasah_dun;

  //break;

  mysqli_query($conn,"delete from finance where id = $jrnoo") or die (mysqli_error());
  echo "select *From finance where createdate <= '$createdate' and branch=$branch order by createdate desc , id desc limit 1";
  $query = mysqli_query($conn,"select *From finance where createdate <= '$createdate' and branch=$branch order by createdate desc , id desc limit 1") or die (mysqli_error());
  $num = mysqli_num_rows($query);
  if($num>0)
  {
    //$query = mysqli_query($conn,"select *From finance where createdate <= '$createdate' and branch=$branch order by id desc limit 1") or die (mysqli_error());
    $data = mysqli_fetch_array($query);
    $jrno = $data['id'];
    $uldegdel = $data['uld'];
  }
  else
  {
  echo 'end orj irlee';
    $uldegdel = 0;
  }

  if($pay_type==1)
  {
    $now_uld1=$uldegdel+$amount;
  }
  else
  {
    $now_uld1=$uldegdel-$amount;
  }
  echo '<br/><br/>';
  echo "insert into finance (type1,pay_type,amount,note,createdate,systemdate1,branch,uld) values ($type1,$pay_type,'$amount','$note','$createdate','$date',$branch,'$new_uld')";
  echo '<br/><br/>';
  mysqli_query($conn,"insert into finance (id,type1,pay_type,amount,note,createdate,systemdate1,branch,uld) values ($jrnoo,$type1,$pay_type,'$amount','$note','$createdate','$date',$branch,'$new_uld')") or die (mysqli_error());
  //$query1 = mysqli_query($conn,"select *from finance where branch=$branch order by id desc limit 1") or die (mysqli_error());
  //$num1 = mysqli_fetch_array($query1);
  //$jurnal = $num1['id'];
  $jurnal = $jrnoo;
  echo "select *from finance where branch=$branch and id > $jurnal order by createdate";
  $query2 = mysqli_query($conn,"select *from finance where branch=$branch and id > $jurnal order by createdate") or die (mysqli_error());
  while($row2 = mysqli_fetch_array($query2))
  {
      $jur = $row2['id'];
      $uldegdel1 = $row2['uld'];
      /*if($pay_type==1)
      {
        $now_uld2=$uldegdel1-$hasah_dun;
        echo '<br/>nemj bna omnoh uldegdel '.$uldegdel1.'</br>';
      }
      else
      {
        $now_uld2=$uldegdel1+$hasah_dun;
        echo '<br/>hasaj bna omnoh uldegdel '.$uldegdel1.'->'.$hasah_dun.'</br>';
      }*/
      $now_uld2=$uldegdel1+$hasah_dun;
      echo '<br/>'.$now_uld2.'<br/>';
      //echo "update finance set uld=$now_uld2 where id = $jur and createdate>'$createdate' ";
      echo '<br/><br/>';
      mysqli_query($conn,"update finance set uld=$now_uld2 where id = $jur and createdate>'$createdate' ");
  }
  header("location:../finance?branch=".$branch."&msg=Бичлэг амжилттай хадгалагдлаа");
}

if(isset($_POST['update_finance']))
{
  $jrno = $_POST['jrno'];
  $createdate = $_POST['createdate'];
  $type1 = $_POST['type1']; // angilal
  $pay_type = $_POST['pay_type']; // orlogo zarlaga
  $amount = $_POST['amount'];
  $note = $_POST['note'];
  $branch = $_POST['branch'];

  $query1 = mysqli_query($conn,"select *from finance where id = $jrno") or die (mysqli_error());
  $data = mysqli_fetch_array($query1);
  $amount_old = $data['amount'];
  if($amount_old>$amount)
  {
    $zoruu = $amount_old-$amount;
  }
  else
  {
    $zoruu = $amount-$amount_old;
  }

  echo '<ul>';
  $query = mysqli_query($conn,"select *from finance where id>$jrno and branch=$branch") or die (mysqli_error());
  while($row = mysqli_fetch_array($query))
  {
    echo '<li>'.$row['id'].'-'.$row['uld'].'</li>';
  }
  echo '</ul>';
}
if(isset($_GET['delete_finance']))
{
  $jrno = $_GET['delete_finance'];

  $query = mysqli_query($conn,"select *from student_price where finance_id = $jrno");
  $data = mysqli_fetch_array($query);
  $branch = $data['branch'];
  mysqli_query($conn,"delete from finance where id = $jrno") or die (mysqli_error());

  //$jrno = 522;
  /*$query = mysqli_query($conn,"select *from finance where id = $jrno") or die (mysqli_error());
  $data = mysqli_fetch_array($query);
  $branch = $data['branch'];
  $amount = $data['amount'];
  $createdate = $data['createdate'];
  $systemdate1 = $data['systemdate1'];
  $uld = $data['uld'];
*/
/*
  $query = mysqli_query($conn,"select *from finance where branch=$branch and id not in ($jrno) and systemdate1>='$systemdate1' and createdate>='$createdate' order by createdate") or die (mysqli_error());
  while($row = mysqli_fetch_array($query))
  {
    $update_jrno = $row['id'];
    $go_old_uld = $row['uld'];
    //$go_old_uld = $go_old_uld-$amount;
    $go_old_uld = $go_old_uld-73230985.2;
    echo "update finance set uld=$go_old_uld where id = $update_jrno";
    echo '<br/><br/>';
    mysqli_query($conn,"update finance set uld=$go_old_uld where id = $update_jrno") or die (mysqli_error());
  }*/
  /****************nemse********************/
  /*$query = mysqli_query($conn,"select *from finance where branch=$branch and id not in ($jrno) and systemdate1>='$systemdate1' and createdate>='$createdate' order by id") or die (mysqli_error());
  while($row = mysqli_fetch_array($query))
  {
    $update_jrno = $row['id'];
    $go_old_uld = $row['uld'];
    $aaa = $row['amount'];
    //$go_old_uld = $go_old_uld-$amount;
    $go_old_uld = $go_old_uld-73230985.2;
    echo "update finance set uld=$go_old_uld where id = $update_jrno";
    echo '<br/><br/>';
    mysqli_query($conn,"update finance set uld=$go_old_uld where id = $update_jrno") or die (mysqli_error());
  }*/
  /************************************/

  //mysqli_query($conn,"delete from finance where id = $jrno");
  header("location:../finance?branch=".$branch."&msg=Бичлэг амжилттай хадгалагдлаа");
}
?>
