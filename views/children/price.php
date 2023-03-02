<?php
echo '<table align="center" style="width:90%" class="table table-bordered">
  <tr>
    <td>Сар</td>
    <td>Төлөх ёстой төлбөрийн дүн</td>
    <td>Төлсөн төлбөр</td>
    <td>Огноо</td>
    <td>Үлдэгдэл</td>
    <td>Төлөх ёстой төлбөрийн дүн өөрчлөх</td>
  </tr>';
$i = 1;
$sum1 = 0;
$sum2 = 0;
$sum3 = 0;
$query = mysqli_query($conn,"select max(id) maxid , month from student_price where user_id = $id group by month ") or die (mysqli_error());
while($row = mysqli_fetch_array($query))
{
    $maxid = $row['maxid'];
    $query3 = mysqli_query($conn,"select *from student_price where user_id = $id and id = $maxid order by id desc limit 1 ") or die (mysqli_error());
    while($row2 = mysqli_fetch_array($query3))
    //$data2 = mysqli_fetch_array($query3);
    {
        $ognoo1 = substr($row['month'],0,6);
        $query4 = mysqli_query($conn,"select max(pprice) ppricea , sum(amount) niit_amount , max(price_date) price_date from student_price a where a.user_id = $id and month = '$ognoo1'") or die (mysqli_error());
        $data4 = mysqli_fetch_array($query4);
        if($data4['niit_amount']>0)
        {
            $ppp = $data4['price_date'];
        }
        else
        {
            $ppp = '-';
        }
echo '<tr>
        <td>'.substr($row['month'],0,4).'-'.substr($row['month'],4,2).'</td>
        <td>'.number_format($data4['ppricea']).' ₮</td>
        <td>'.number_format($data4['niit_amount']).' ₮</td>
        <td>'.$ppp.'</td>
        <td>'.number_format($row2['uld']).' ₮</td>
        <td>';
        echo '<a href="#" data-bs-toggle="modal" data-bs-target="#addprice'.$row['month'].'" class="btn btn-info">Харах</a>';
        echo '
        <a href="#" data-bs-toggle="modal" data-bs-target="#changeprice'.$row['month'].'" class="btn btn-info">Өөрчлөх</a>
        </td>
      </tr>';
      $i++;

      $sum1 = $sum1+$data4['ppricea'];
      $sum2 = $sum2+$data4['niit_amount'];
      $sum3 = $sum3+$row2['uld'];
    }
}
echo '<tr>
        <th>Нийт</th>
        <th>'.number_format($sum1).' ₮</th>
        <th>'.number_format($sum2).' ₮</th>
        <th></th>
        <th>'.number_format($sum3).' ₮</th>
        <th></th>
        </tr>';
echo '</table>';
?>


<!-----------------------------------------modal------------------------------------------------------->

<?php
$mm = 1;
$query1 = mysqli_query($conn,"select *from student_price where user_id = $id") or die (mysqli_error());
while($row1 = mysqli_fetch_array($query1))
{
  $ii = $row1['month'];
  $pprice1 = $row1['pprice'];
  $uld1 = $row1['uld'];
  $id = $row1['user_id'];
  $query22 = mysqli_query($conn,"select *from student where id = $id");
  $data22 = mysqli_fetch_array($query22);
  $branch = $data22['branch'];
  ?>
  <form action="../action/price_action.php" method="post">
  <div class="modal fade" id="addprice<?=$ii?>" tabindex="-1" role="dialog" aria-labelledby="addlevel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="addlevel"><img src="<?php echo $browser_img; ?>" width="90px;">
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      &nbsp;&nbsp;
      <?=substr($ii,0,4).'-'.substr($ii,4,2)?> сургалтын төлбөр</h5>
        </div>
      <div class="modal-body">
         <table class="table table-bordered">
          <tr>
            <input type="hidden" name="sar" value="<?=$ii?>">
            <input type="hidden" name="id" value="<?=$id?>">
            <th colspan=2><center>Төлбөр</center></th>
          </tr>
           <tr>
            <td>Төлөв</td>
            <td>
              <select name="ptype" class="form-control">
                <option value="1">Суралцсан</option>
                <option value="2">Чөлөө авсан</option>
                <option value="3">Бусад</option>
              </select>
            </td>
           </tr>
           <tr>
             <?php
             $query2 = mysqli_query($conn,"select *from student_price where user_id = $id and month = '$ii' order by id desc limit 1 ") or die (mysqli_error());
             $data1 = mysqli_fetch_array($query2);
             ?>
             <td>Сургалтын төлбөр</td><td><?=number_format($data1['uld']).' ₮';?></td>
             <input type="hidden" name="pprice" class="form-control" value="<?=$data1['uld']?>">
           </tr>
           <tr>
               <th colspan=2><center>Төлөлт</center></th>
           </tr>
           <tr>
             <td>Төлсөн огноо</td><td><input type="text" name="price_date" value="<?=date('Y-m-d')?>" placeholder="yyyy-mm-dd" class="form-control"></td>
           </tr>
           <tr>
             <td>Данс</td>
             <td><select name="type2" class="form-control">
                 <?php
                 $query5 = mysqli_query($conn,"select *from branch where id = $branch") or die (mysqli_error());
                 $data5 = mysqli_fetch_array($query5);
                 echo '<option value="'.$data5['dans'].'">'.$data5['dans'].'</option>';
                 echo '<option value="'.$data5['dans1'].'">'.$data5['dans1'].'</option>';
                 ?>
                 </select></td>
           </tr>
           <tr>
             <td>Төлбөр</td><td><input type="text" name="price_act" class="form-control"></td>
           </tr>
           <tr>
             <td></td>
             <td>
               <button type="button" class="btn btn-default" data-dismiss="modal">Гарах</button>
               <input type="submit" name="price_insert" class="btn btn-primary" value="Хадгалах">
             </td>
           </tr>
        </table>
        <table class="table table-bordered">
           <tr>
               <th colspan=6><center>Төлөлт</center></th>
           </tr>
           <tr>
              <td>Дугаар</td>
              <td>Огноо</td>
              <td>Данс</td>
              <td>Дүн</td>
              <td>Үлдэгдэл</td>
              <td>Үйлдэл</td>
           </tr>
           <?php
           $ss = 1;
           $query = mysqli_query($conn,"select *from student_price where user_id = $id and month='$ii' and amount <> 0") or die (mysqli_error());
           while($row = mysqli_fetch_array($query))
           {
            $query11 = mysqli_query($conn,"select *from student a , branch b where a.branch = b.id and a.id = $id") or die (mysqli_error());
            $data11 = mysqli_fetch_array($query11);
            $check = $row['check1'];
            $type1 = $row['type1'];
            if($type1==8)
            {
              $tr_style = 'class="bg-danger"';
            }
            else
            {
              $tr_style = '';
            }
            echo '<tr '.$tr_style.'>
                    <td>'.$ss.'</td>
                    <td>'.$row['price_date'].'</td>
                    <td>'.$check.'</td>
                    <td>'.number_format($row['amount']).'</td>
                    <td>'.number_format($row['uld']).'</td>';?>
                    <td><a href="../action/price_action.php?delete=<?=$row['id']?>&user_id=<?=$id?>" class="btn btn-default" onclick="return confirm('Устгахдаа итгэлтэй байна уу?')">Устгах</a></td>
                  <?php echo '</tr>';
            $ss++;
           }
           ?>
         </table>
      </div>
    </div>
    </div>
  </div>
  </form>
  <?php
}
?>



<?php
$mm = 1;
$query1 = mysqli_query($conn,"select *from student_price where user_id = $id") or die (mysqli_error());
while($row1 = mysqli_fetch_array($query1))
{
  $ii = $row1['month'];
  $pprice1 = $row1['pprice'];
  $uld1 = $row1['uld'];
  $id = $row1['user_id'];
  ?>
  <form action="../action/price_action.php" method="post">
  <div class="modal fade" id="changeprice<?=$ii?>" tabindex="-1" role="dialog" aria-labelledby="addlevel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="addlevel"><img src="<?php echo $browser_img; ?>" width="90px;">
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      &nbsp;&nbsp;
      <?=substr($ii,0,4).'-'.substr($ii,4,2)?> сургалтын төлбөр</h5>
        </div>
      <div class="modal-body">
         <table class="table table-bordered">
          <tr>
            <input type="hidden" name="sar" value="<?=$ii?>">
            <input type="hidden" name="user_id" value="<?=$id?>">
            <th colspan=2><center>Төлбөр</center></th>
          </tr>
           <tr>
             <td>Огноо</td><td><input type="text" name="price_date" value="<?=date('Y-m-d H:i:s')?>" class="form-control" disabled></td>
           </tr>
           <tr>
             <td>Төлбөр</td><td><input type="text" name="price_act" value="<?=$pprice1?>" class="form-control"></td>
           </tr>
           <tr>
             <td></td>
             <td>
               <button type="button" class="btn btn-default" data-dismiss="modal">Гарах</button>
               <input type="submit" name="price_change" class="btn btn-primary" value="Хадгалах">
             </td>
           </tr>
        </table>
      </div>
    </div>
    </div>
  </div>
  </form>
  <?php
}
?>
