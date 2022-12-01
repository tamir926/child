<!-- Mongon ursgal orlogo -->
<div class="modal fade" id="orlogo" tabindex="-1" role="dialog" aria-labelledby="addlevel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addlevel"><img src="<?php echo $logo; ?>" width="90px;">
		        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            Орлогын гүйлгээ нэмэх</h5>
      </div>
	  <div class="modal-body">
		<form action="<?=$path?>action/finance_action.php" method="post">
      <table class="table table-bordered">
        <tr>
  				<td>Огноо</td>
  				<td><input type="text" class="form-control" name="createdate" value=<?=date('Y-m-d H:i:s')?>>
  				<input type="hidden" name="edate" value="<?=$edate?>">
  				</td>
  			</tr>
  			<tr>
  				<td>Төрлийн нэр</td>
  				<td>
  				  <select name="type1" class="form-select">
  				  <?php
            $query = mysqli_query($conn,"select *from finance_type where type1=1") or die (mysqli_error());
            while($row = mysqli_fetch_array($query))
            {
              echo '<option value="'.$row['id'].'">'.$row['type_name'].'</option>';
            }
            ?>
  				 </select>
  				</td>
  			</tr>
        <tr>
            <input type="hidden" name="pay_type" value=1>
  				<td>Дүн</td><td><input type="textbox" name="amount" class="form-control" required></td>
  			</tr>
  			<tr>
  			  <td>Утга</td><td><textarea name="note" class="form-control"></textarea></td>
  			</tr>
  			<tr>
  			  <td>Салбар</td>
  			  <td>
            <select name="branch" id="branch_type" class="form-select">
  			  <?php
  			  $query1 = mysqli_query($conn,"select *from branch") or die (mysqli_error());
  			  while($row1 = mysqli_fetch_array($query1))
          {
          ?>
          <option value="<?=$row1['id']?>"><?=$row1['name']?></option>
          <?php
          }
  			  ?>
  			  </select>
  			  </td>
  			</tr>
  			<tr>
  			    <td>Данс</td>
  			    <td><select name="dans" id="branch_dans" class="form-select">
                <?php
                $result = $conn->query("select *from branch where id = 3");
                if($result->num_rows > 0)
                {
                  while($row = $result->fetch_assoc())
                  {
                    echo '<option value="'.$row['dans'].'">'.$row['dans'].'</option>';
                    echo '<option value="'.$row['dans1'].'">'.$row['dans1'].'</option>';
                  }
                }
                ?>
  			        </select>
  			    </td>
  			</tr>
  			<tr>
				<td></td>
				<td>
					<input type="submit" name="insert_finance1" class="btn btn-info" value="Хадгалах">&nbsp;&nbsp;
					<button type="button" class="btn btn-warning" data-dismiss="modal">Гарах</button>
				</td>
			</tr>
		</table>
		</form>
      </div>
    </div>
  </div>
</div>

<!----- mongon ursgal zarlaga ----->
<div class="modal fade" id="zarlaga" tabindex="-1" role="dialog" aria-labelledby="addlevel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addlevel"><img src="<?php echo $logo; ?>" width="90px;">
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		Зарлагын гүйлгээ нэмэх</h5>
      </div>
	  <div class="modal-body">
		<form action="<?=$path?>action/finance_action.php" method="post">
      <table class="table table-bordered">
        <tr>
  				<td>Огноо:</td>
  				<td><input type="text" class="form-control" name="createdate" value=<?=date('Y-m-d H:i:s')?>>
  				</td>
  			</tr>
  			<tr>
  				<td>Төрлийн нэр:</td>
  				<td>
  				    <input type="hidden" name="pay_type" value=2>
  				 <select name="type1" class="form-select">
  				  <?php
            $query = mysqli_query($conn,"select *from finance_type where type1=2") or die (mysqli_error());
            while($row = mysqli_fetch_array($query))
            {
              echo '<option value="'.$row['id'].'">'.$row['type_name'].'</option>';
            }
            ?>
  				  </select>
  				</td>
  			</tr>
        <tr>
          <td>Илгээх банк:</td>
          <td><input name="bank_name" type="text" class="form-control"><td>
              <input type="hidden" name="edate" value="<?=$edate?>">
        </tr>
        <tr>
          <td>Хүлээн авах данс:</td>
          <td><input name="bank_acntno" type="text" class="form-control"><td>
        </tr>
        <tr>
          <td>Дансны нэр:</td>
          <td><input name="acntname" type="text" class="form-control"><td>
        </tr>
        <tr>
  				<td>Гүйлгээний дүн:</td><td><input type="textbox" name="amount" class="form-control" required></td>
  			</tr>
  			<tr>
  			  <td>Утга:</td><td><textarea name="note" class="form-control"></textarea></td>
  			</tr>
  			<tr>
  			    <td>Салбар:</td>
  			    <td><select name="branch" id="branch_type2" class="form-select">
  			        <?php
  			         $query1 = mysqli_query($conn,"select *from branch") or die (mysqli_error());
  			         while($row1 = mysqli_fetch_array($query1))
                 {
                ?>
                <option <?php if($row1['id']==3) { echo 'selected';}?> value="<?=$row1['id']?>"><?=$row1['name']?></option>
                <?php
                }
  			        ?>
  			        </select>
  			    </td>
  			</tr>
  			<tr>
  			    <td>Данс:</td>
            <td><select name="dans" id="branch_dans" class="form-select">
                <?php
                $result = $conn->query("select *from branch where id = 3");
                if($result->num_rows > 0)
                {
                  while($row = $result->fetch_assoc())
                  {
                    echo '<option value="'.$row['dans'].'">'.$row['dans'].'</option>';
                    echo '<option value="'.$row['dans1'].'">'.$row['dans1'].'</option>';
                  }
                }
                ?>
  			        </select>
  			    </td>
  			</tr>
  			<tr>
				<td></td>
				<td>
					<input type="submit" name="insert_finance2" class="btn btn-info" value="Хадгалах">&nbsp;&nbsp;
					<button type="button" class="btn btn-warning" data-dismiss="modal">Гарах</button>
				</td>
			</tr>
		</table>
		</form>
      </div>
    </div>
  </div>
</div>


<!--- Your modal -->
<form action="<?=$path?>action/finance_action.php" method="post">
<div id="mymodal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <center><img src="<?=$logo?>" width="80px"><span style="font-size:16px;" class="modal-title">
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Санхүүгийн мэдээлэл засварлах</span></center>
      </div>
      <div class="modal-body">
        <table class="table table-bordered">
          <tr>
            <td>Огноо</td>
            <input type="hidden" name="jrno" id="id">
            <input type="hidden" name="old_uld" id="uld" class="form-control">
          	<td><input type="text" class="form-control" name="createdate" id="ognoo"></td>
          </tr>
          <tr>
            <td>Төрөл</td>
          	<td>
          	   <select name="pay_type" id="pay_type" class="form-select" onchange="showDiv1(this)">
          		   <option value="1">Орлого</option>
          			 <option value="2">Зарлага</option>
          		 </select>
          	</td>
          </tr>
          <tr>
            <td>Ангилал</td>
          	<td>
          	  <select name="type1" id="type1" class="form-select">
          		<?php
                $query = mysqli_query($conn,"select *from finance_type") or die (mysqli_error());
                while($row = mysqli_fetch_array($query))
                {
                  echo '<option value="'.$row['id'].'">'.$row['type_name'].'</option>';
                }
              ?>
          		</select>
          	</td>
          </tr>
          <tr>
            <td></td>
            <td>
            <div id="zarlaga3" style="display:none;">
              <input placeholder="Илгээсэн банк" id="bank_name" name="bank_name" type="text" class="form-control"><br/>
              <input placeholder="Орсон данс" id="bank_acntno" name="bank_acntno" type="text" class="form-control"><br/>
              <input placeholder="Дансны нэр" id="acntname" name="acntname" type="text" class="form-control"><br/>
            </div>
            </td>
          </tr>
          <tr>
            <td>Дүн</td><td><input type="textbox" name="amount" id="amount" class="form-control" required></td>
          </tr>
          <tr>
            <td>Утга</td><td><textarea name="note" id="note" class="form-control"></textarea></td>
          </tr>
          <tr>
            <td>Салбар</td>
          	<td><select name="branch" id="branch" class="form-select">
          		    <?php
          		    $query1 = mysqli_query($conn,"select *from branch") or die (mysqli_error());
          		    while($row1 = mysqli_fetch_array($query1))
                    { ?>
                    <option value="<?=$row1['id']?>"><?=$row1['name']?></option>
                    <?php
                    } ?>
          			 </select>
          			</td>
          		</tr>
          		<tr>
          		    <td>Данс</td>
          		    <td><select name="dans" id="dans" class="form-select">
          		    <?php
          		    $query1 = mysqli_query($conn,"select *from (
                    select id , name , dans from branch
                    union all
                    select id , name , dans1 from branch
                        ) a order by id") or die (mysqli_error());
          		    while($row1 = mysqli_fetch_array($query1))
                    { ?>
                    <option value="<?=$row1['dans']?>"><?=$row1['name'].'- '.$row1['dans']?></option>
                    <?php
                    } ?>
          			 </select>
          			</td>
          		</tr>
          	</table>
            </div>
            <div class="modal-footer">
                <input type="submit" name="update_finance2" value="Хадгалах" class="btn btn-info">
                <button type="button" class="btn btn-warning" data-dismiss="modal">Буцах</button>
            </div>
        </div>
    </div>
</div>
</form>

<!-------------butsaalt------------------------->
<div class="modal fade" id="backmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Гүйлгээний буцаалт</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         <div class="input-group">
          <span class="input-group-addon">Гүйлгээний журнал №</span>
          <input type="text" id="search_jrno" class="search_jrno" class="form-control" style="border:solid 1px #eeeeee; padding-left:10px;" />
         </div>
        <div id="result1"></div>
      </div>
    </div>
  </div>
</div>
<!----------------------------------------------->

<!-------------suuld nemsne -------------------->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Сургалтын төлбөрийн мэдээлэл оруулах</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
         <div class="input-group">
          <span class="input-group-addon">Регистер</span>
          <input type="text" name="search_text" value="УЧ18225566" id="search_text" class="form-control" />
         </div>
        </div>
        <br />
        <?php
       $result = mysqli_query($conn, "select *from
        (
          select max(a.id) maxid , month from student_price a , student b  where a.user_id = b.id and register='УЧ18225566' group by a.month
        ) a , student_price b where a.maxid = b.id");
       if(mysqli_num_rows($result) > 0)
       {
         $query1 = mysqli_query($conn,"select a.ownname , b.id branch_name , a.id , a.surname , dans , dans1 , b.name , c.name sector_name from student a ,
          branch b , sector c where a.register = 'УЧ18225566' and a.branch = b.id and a.sector = c.id") or die (mysqli_error());
         $data1 = mysqli_fetch_array($query1);
         echo '<div class="table-responsive">
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
         echo '
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
             echo '<input type="text" name="price_amount[]" class="form-control" value="">';
           }
           else
           {
             echo '<input type="hidden" name="price_amount[]" class="form-control" value="">';
           }
           echo '</td>
          </tr>
         ';
        }
         echo '<tr><td colspan=4></td><td><input type="submit" class="btn btn-info" name="finance_insert" value="Хадгалах"></td></tr></table></form></div>';
       }
        ?>
      </div>
    </div>
  </div>
</div>
