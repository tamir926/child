<?php
require_once("config.php");
require_once("views/helper.php");
require_once("views/login_check.php");
require_once("views/init.php");
?>
<?php
 $g_logged_name = $_SESSION['admin_name'];
 $g_logged_avatar = $_SESSION['admin_avatar'];
 $g_logged = $_SESSION['admin_logged'];
 $g_logged_timestamp = $_SESSION['admin_timestamp'];
 ?>
  <body>
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <?php require_once("views/sidemenu.php");?>
        <div class="layout-page">
        <?php require_once("views/topmenu.php");?>
          <div class="content-wrapper">
            <div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold py-3 mb-4">Ирцийн мэдээлэл</h4>
              <div class="card" style="padding:30px;">
              <div class="body">
          <form action="<?=$path?>finance" method="get">
          <table class="table">
            <tr>
              <td><input type="text" placeholder="Эхлэх огноо" value="<?php if(isset($_GET['startdate'])) { echo $_GET['startdate'];}?>" id="datepicker" class="form-control" autocomplete="off" name="startdate"></td>
              <td><input type="text" placeholder="Дуусах огноо" value="<?php if(isset($_GET['enddate'])) { echo $_GET['enddate'];}?>" id="datepicker1" class="form-control" autocomplete="off" name="enddate"></td>
              <td>
              <select class="form-select" name="pay_type">
              <option value="0" <?php if(isset($_GET['pay_type'])) { if($_GET['pay_type']==0) { echo 'selected';} }?>>Нийт</option>
              <option value="1" <?php if(isset($_GET['pay_type'])) { if($_GET['pay_type']==1) { echo 'selected';} }?>>Орлого</option>
              <option value="2" <?php if(isset($_GET['pay_type'])) { if($_GET['pay_type']==2) { echo 'selected';} }?>>Зарлага</option>
              </select>
              </td>
              <td>
              <select class="form-select" name="type1">
                <option value="0">Төрөл</option>
                <?php
                $query = mysqli_query($conn,"select *from finance_type") or die (mysqli_error());
                while($row = mysqli_fetch_array($query))
                {
                  ?>
                  <option value="<?=$row['id']?>" <?php if(isset($_GET['type1'])) { if($_GET['type1']==$row['id']) echo 'selected'; } ?>><?=$row['type_name']?></option>
                  <?php
                }
              ?>
              </select>
              </td>
              <td>
                <?php
                echo '<select class="form-select" name="dans">';
                $query = mysqli_query($conn,"select *from (select id , name , dans from branch
                union all
                select id , name , dans1 from branch ) a where a.id = 3 order by id") or die (mysqli_error());
                while($row = mysqli_fetch_array($query))
                {
                ?>
                <option <?php if(isset($_GET['dans'])) { if($_GET['dans']==$row['dans']) { echo 'selected';}}?> value='<?=$row['dans']?>'><?=$row['name']?> - <?=$row['dans']?></option>
                <?php
                }
                echo '</select>';
                ?>
              </td>
              <td>
                <button name="submit" class="btn btn-primary">Хайх</button>
              </td>
            </tr>
          </table>
          </form>
          <div class="dropdown">
            <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">Гүйлгээ
            <span class="caret"></span></button>
            <ul class="dropdown-menu">
            
              <li><a href="#" data-bs-toggle="modal" data-bs-target="#orlogo"><i class="menu-icon tf-icons ti ti-arrow-right "></i>Орлого</a></li>
              <li><a href="#" data-bs-toggle="modal" data-bs-target="#zarlaga"><i class="menu-icon tf-icons ti ti-arrow-right "></i>Зарлага</a></li>
              <li><a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="menu-icon tf-icons ti ti-arrow-right "></i>Сургалтын орлого</a></li>
              <li><a href="#" data-bs-toggle="modal" data-bs-target="#backmodal"><i class="menu-icon tf-icons ti ti-arrow-right "></i>Буцаалт</a></li>
            </ul>
          </div>
          <?php
              if(isset($_GET['submit']))
              {
                  echo '&nbsp;&nbsp;<a href="report/finance_excel.php?dans='.$_GET['dans'].'&type1='.$_GET['type1'].'&pay_type='.$_GET['pay_type'].'&startdate='.$_GET['startdate'].'&enddate='.$_GET['enddate'].'" class="btn btn-default">Хэвлэх</a>';
                    /*$date = date('Ymd');
                	$file = "asset-".$date.".xls";
                	header("Content-type: application/vnd.ms-excel");
                	header("Content-Disposition: attachment; filename=$file");*/
              }
           ?>
          <br/><br/>
          <div class="table-responsive">
            <?php
            if(isset($_GET['dans']))
            {
                $dans = $_GET['dans'];
                $dans = 'and uld = '.$dans;
            }
            else
            {
                $dans = 'and uld = 3501000147';
            }
            if(isset($_GET['type1']))
            {
              $type1 = $_GET['type1'];
              if($type1==0)
              {
                $type2 = '';
              }
              else
              {
                $type2 = 'and a.type1 ='.$type1;
              }
            }
            else
            {
              $type2 = '';
            }

            if(isset($_GET['pay_type']))
            {
              $pay_type = $_GET['pay_type'];
              if($pay_type==0)
              {
                $pay_type1 = '';
              }
              else
              {
                $pay_type1 = 'and pay_type ='.$pay_type;
              }
            }
            else
            {
              $pay_type1 = '';
            }

            if(!empty($_GET['startdate']) && !empty($_GET['enddate']))
            {
              $startdate = $_GET['startdate'];
              $startdate = date("Y-m-d", strtotime($startdate));
              $enddate = $_GET['enddate'];
              $enddate = date("Y-m-d", strtotime($enddate));
              $searchdate = "and a.createdate >= '$startdate' and a.createdate <= '$enddate'";
              $searchdate1 = "a.createdate >= '$startdate' and a.createdate <= '$enddate'";
            }
            else
            {
              $yy = date('Y');
              $mm = date('m');
              $one = $yy.'-'.$mm.'-01';
              $two = $yy.'-'.$mm.'-31';
              $searchdate = "and a.createdate >= '$one' and a.createdate <= '$two'";
              $searchdate1 = "a.createdate >= '$one' and a.createdate <= '$two'";
              $startdate = '2020-09-01';
            }

            $query = mysqli_query($conn,"select sum(orlogo) niit_orlogo , sum(zarlaga) niit_zarlaga , sum(orlogo)-sum(zarlaga) uldegdel from
            (
              select pay_type, amount, a.id, (case pay_type when 1 then amount else 0 end) orlogo, uld, (case pay_type when 2 then amount else 0 end) zarlaga , type_name , a.createdate, a.branch, a.note, a.type1 , b.name , systemdate1 ognoo , a.bank_name , a.bank_acntno , a.acntname from finance a, branch b , finance_type c where a.branch = b.id and a.type1 = c.id and a.createdate < '$startdate' $dans order by createdate , id
            ) a") or die (mysqli_error());
            $ehleh = mysqli_fetch_array($query);
            if(empty($ehleh['uldegdel']))
            {
              $ehleh = 0;
            }
            else 
            {
              $ehleh = $ehleh['uldegdel'];
            }
            ?>
            <?php 
            $effectiveDate = date('Y-m-d');
            $edate = date('Y-m-d', strtotime("-1 months", strtotime($effectiveDate)));
            ?>
            <table style="font-size:12px;" class="table table-striped">
              <tr>
                <td colspan=9 align="right">Эхний үлдэгдэл</td>
                <td><b><?=number_format($ehleh, 2, '.', ',')?></b></td>
              </tr>
              <tr>
                <th>Д</th>
                <th>Журнал</th>
                <th>Огноо</th>
                <th>Орлого</th>
                <th>Зарлага</th>
                <th>Үлдэгдэл</th>
                <th>Төрөл</th>
                <th>Салбар</th>
                <th>Гүйлгээний утга</th>
                <th>Үйлдэл</th>
              </tr>
              <?php
               
              $query = mysqli_query($conn,"select pay_type, amount, a.id,  (case pay_type when 1 then amount else 0 end) orlogo, uld,
              (case pay_type when 2 then amount else 0 end) zarlaga , type_name , a.createdate, a.branch, a.note, a.type1 , b.name ,
              systemdate1 ognoo  , a.bank_name , a.bank_acntno , a.acntname from finance a, branch b , finance_type c where a.branch = b.id and a.type1 = c.id $searchdate $pay_type1 $type2 $dans order by createdate , id") or die (mysqli_error());
              //mysqli_query($conn,"set @row_number = 0");
              //$query = mysqli_query($conn,"select (@row_number:=@row_number + 1) AS num, pay_type, amount, a.id, (case pay_type when 1 then amount else 0 end) orlogo, uld, (case pay_type when 2 then amount else 0 end) zarlaga , type_name , a.createdate, a.branch, a.note, a.type1 , b.name , systemdate1 ognoo , a.bank_name , a.bank_acntno , a.acntname from finance a, branch b , finance_type c where a.branch = b.id and a.type1 = c.id and a.createdate >= '2021-09-01' and a.createdate <= '2021-09-03' and uld = 452569698 order by createdate , id") or die (mysqli_error());
              $i = 1;
              $niit_orlogo = 0;
              $niit_zarlaga = 0;
              $aniit_orlogo = $ehleh;
              while($row = mysqli_fetch_array($query))
              {
                $jrno = $row['id'];
                $pay_type = $row['pay_type'];
                $amount = $row['amount'];
                $type1 = $row['type1'];
                $branch2 = $row['branch'];
                $uld = $row['uld'];
                if(isset($_GET['dans']))
                {
                  $uld = $_GET['dans'];
                  $uld = 'and uld = '.$uld;
                }
                else
                {
                  $uld = 'and uld = 3501000147';
                }
                $note = $row['note'];
                 echo '<tr>
                    <td>'.$i.'</th>
                    <td id="id_'.$jrno.'">'.$jrno.'</td>
                    <td style="display:none;" id="pay_type_'.$jrno.'">'.$pay_type.'</td>
                    <td style="display:none;" id="amount_'.$jrno.'">'.$amount.'</td>
                    <td style="display:none;" id="type1_'.$jrno.'">'.$type1.'</td>
                    <td style="display:none;" id="branch_'.$jrno.'">'.$branch2.'</td>
                    <td style="display:none;" id="uld_'.$jrno.'">'.$uld.'</td>
                    <td style="display:none;" id="bank_name_'.$jrno.'">'.$row['bank_name'].'</td>
                    <td style="display:none;" id="bank_acntno_'.$jrno.'">'.$row['bank_acntno'].'</td>
                    <td style="display:none;" id="acntname_'.$jrno.'">'.$row['acntname'].'</td>
                    <td id="ognoo_'.$jrno.'"><span style="cursor:pointer" title='.$row['ognoo'].'>'.$row['createdate'].'</span></td>
                    <td>'.number_format($row['orlogo'], 2, '.', ',').'</td>
                    <td>'.number_format($row['zarlaga'], 2, '.', ',').'</td><td>';
                    
                    //$aniit_orlogo = $data12['uldegdel'];
                    $now_uld = $ehleh;
                    if($row['pay_type']==1)
                    {
                      $aniit_orlogo = $aniit_orlogo+($row['orlogo']);
                    }
                    else
                    {
                      $aniit_orlogo = $aniit_orlogo-($row['zarlaga']);
                    }
                    echo number_format($aniit_orlogo, 2, '.', ',');
                    echo '</td>
                    <td id="type_name_'.$jrno.'">'.$row['type_name'].'</td>
                    <td id="name_'.$jrno.'">'.$row['name'].'</td>
                    <td id="note_'.$jrno.'">'.$row['note'].'</td>';
                    echo '<th><a href="#" data-bs-toggle="modal" class="btn btn-primary" data-bs-target="#mymodal" onClick="showModal('.$jrno.')">Засах</a>';
                     ?>
                     <a href="<?=$path?>action/finance_action.php?delete_finance=<?=$jrno?>"  onclick="return confirm('Бичлэг устгахдаа итгэлтэй байна уу?')" class="btn btn-danger">Устгах</a>
                     <?php '</th>
                     </tr>';
                  $i++;
                  $niit_orlogo = $niit_orlogo+$row['orlogo'];
                  $niit_zarlaga = $niit_zarlaga+$row['zarlaga'];
                }
                ?>
                <tr>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td><?=number_format($niit_orlogo, 2, '.', ',')?></td>
                  <td><?=number_format($niit_zarlaga, 2, '.', ',')?></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <?php
                  if(!empty($jrno))
                  {
                  $query = mysqli_query($conn,"select uld duusah from finance where id = $jrno") or die (mysqli_error());
                  $duusah = mysqli_fetch_array($query);
                  ?>
                  <td align="right">Эцсийн үлдэгдэл</td>
                  <td><b><?php echo number_format($aniit_orlogo, 2, '.', ',');?></b></td>
                  <?php
                  }
                  else
                  {
                    echo '<td></td><td></td>';
                  }
                  ?>
                </tr>
            </table>
          </div>
          </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>


    <!-- Mongon ursgal orlogo -->
<div class="modal fade" id="orlogo" tabindex="-1" role="dialog" aria-labelledby="addlevel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addlevel"><img src="<?php echo $g_icon; ?>" width="90px;">
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
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
            <select name="branch" id="branch_type1" class="form-select">
  			  <?php
  			  $query1 = mysqli_query($conn,"select *from branch where id = 3") or die (mysqli_error());
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
  			    <td><select name="dans" id="branch_typee1" class="form-select">
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
          <button type="submit" name="insert_finance1" class="btn btn-primary">Хадгалах</button>
          &nbsp;&nbsp;
          
					<button type="button" class="btn btn-default" data-bs-dismiss="modal">Гарах</button>
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
        <h5 class="modal-title" id="addlevel"><img src="<?php echo $g_icon; ?>" width="90px;">
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
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
          <td>
            <input name="bank_name" type="text" class="form-control">
            <input type="hidden" name="edate" value="<?=$edate?>">
          </td>
        </tr>
        <tr>
          <td>Хүлээн авах данс:</td>
          <td><input name="bank_acntno" type="text" class="form-control"></td>
        </tr>
        <tr>
          <td>Дансны нэр:</td>
          <td><input name="acntname" type="text" class="form-control"></td>
        </tr>
        <tr>
  				<td>Гүйлгээний дүн:</td>
          <td><input type="textbox" name="amount" class="form-control" required></td>
  			</tr>
  			<tr>
  			  <td>Утга:</td>
          <td><textarea name="note" class="form-control"></textarea></td>
  			</tr>
  			<tr>
  			    <td>Салбар:</td>
  			    <td><select name="branch" id="branch_type2" class="form-control">
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
          		    <td><select name="dans" id="dans" class="form-select">
          		    <?php
          		    $query1 = mysqli_query($conn,"select *from (
                    select id , name , dans from branch
                    union all
                    select id , name , dans1 from branch
                        ) a where a.id=3 order by id") or die (mysqli_error());
          		    while($row1 = mysqli_fetch_array($query1))
                    { ?>
                    <option value="<?=$row1['dans']?>"><?=$row1['name'].'- '.$row1['dans']?></option>
                    <?php
                    } ?>
          			 </select>
          			</td>
          	</tr>
  			<tr>
				<td></td>
				<td>
          <button type="submit" class="btn btn-primary" name="insert_finance2">Хадгалах</button>
          &nbsp;&nbsp;
					<button type="button" class="btn btn-default" data-bs-dismiss="modal">Гарах</button>
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
        <button type="button" class="close" data-bs-dismiss="modal">&times;</button>
        <h4 class="modal-title">Санхүүгийн мэдээлэл засварлах</h4>
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
                        ) a where a.id=3 order by id") or die (mysqli_error());
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
                <button type="submit" name="update_finance2" class="btn btn-primary">Хадгалах</button>
                <button type="button" class="btn btn-default" data-bs-dismiss="modal">Буцах</button>
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
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
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
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
         <div class="input-group">
          <span class="input-group-addon">Регистер</span>
          <input type="text" name="search_text" value="УШ18210273" id="search_text" class="form-control" />
         </div>
        </div>
        <br />
        <div id="result"></div>
      </div>
    </div>
  </div>
</div>
<script>
// suragchiin tolbor toloh
$(document).ready(function(){
 load_data();
 function load_data(query)
 {
  $.ajax({
   url:"test3.php",
   method:"POST",
   data:{query:query},
   success:function(data)
   {
    $('#result').html(data);
   }
  });
 }
 $('#search_text').keyup(function(){
  var search = $(this).val();
  if(search != '')
  {
   load_data(search);
  }
  else
  {
   load_data();
  }
 });
});
// guilgeenii butsaalt
$(document).ready(function(){
 load_data();
 function load_data(query)
 {
  $.ajax({
   url:"test4.php",
   method:"POST",
   data:{query:query},
   success:function(data)
   {
    $('#result1').html(data);
   }
  });
 }
 $('#search_jrno').keyup(function(){
  var search = $(this).val();
  if(search != '')
  {
   load_data(search);
  }
  else
  {
   load_data();
  }
 });
});
</script>
<script>
function showModal(id)
{
    $("#id").val($("#id_"+id).text());
    $("#ognoo").val($("#ognoo_"+id).text());
    $("#amount").val($("#amount_"+id).text());
    $("#name").val($("#name_"+id).text());
    $("#note").val($("#note_"+id).text());
    $("#type_name").val($("#type_name_"+id).text());
    $("#bank_name").val($("#bank_name_"+id).text());
    $("#bank_acntno").val($("#bank_acntno_"+id).text());
    $("#acntname").val($("#acntname_"+id).text());

    var ptt = document.getElementById("type1_"+id).innerText;
    $('#type1').val(ptt);
    var pt = document.getElementById("pay_type_"+id).innerText;
    $('#pay_type').val(pt);
    var pttt = document.getElementById("branch_"+id).innerText;
    $('#branch').val(pttt);
    var ptttt = document.getElementById("uld_"+id).innerText;
    $('#dans').val(ptttt);
}
</script>

<script>
$(document).ready(function(){
  $('#branch_type').on('change', function(){
  var typeeID = $(this).val();
  if(typeeID){
  $.ajax({
    type:'POST',
    url:'ajaxData.php',
    data:'branch_type='+typeeID,
    success:function(html){
    $('#branch_typee').html(html);
    }
    });
    }
  else{
        $('#branch_typee').html('<option value="">Select country first</option>');
     }
  });
});

$(document).ready(function(){
$('#branch_type1').on('change', function(){
var typeeeID = $(this).val();
if(typeeeID){
  $.ajax({
    type:'POST',
    url:'ajaxData.php',
    data:'branch_typeee='+typeeeID,
    success:function(html){
    $('#branch_typee1').html(html);
    }
    });
    }
      else{
          $('#branch_typee1').html('<option value="">Select country first</option>');
       }
    });
});

$(document).ready(function(){
$('#branch_type2').on('change', function(){
var typeeID = $(this).val();
if(typeeID){
  $.ajax({
    type:'POST',
    url:'ajaxData.php',
    data:'branch_typeee='+typeeID,
    success:function(html){
    $('#branch_typee2').html(html);
    }
    });
    }
  else{
      $('#branch_typee2').html('<option value="">Select country first</option>');
     }
  });
});
</script>






    <script src="<?=$path?>assets/vendor/libs/jquery/jquery.js"></script>
    <script src="<?=$path?>assets/vendor/libs/popper/popper.js"></script>
    <script src="<?=$path?>assets/vendor/js/bootstrap.js"></script>
    <script src="<?=$path?>assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="<?=$path?>assets/vendor/libs/node-waves/node-waves.js"></script>
    <script src="<?=$path?>assets/vendor/libs/hammer/hammer.js"></script>
    <script src="<?=$path?>assets/vendor/libs/i18n/i18n.js"></script>
    <script src="<?=$path?>assets/vendor/libs/typeahead-js/typeahead.js"></script>
    <script src="<?=$path?>assets/vendor/js/menu.js"></script>

    <script src="<?=$path?>assets/vendor/libs/jszip/jszip.js"></script>
    <script src="<?=$path?>assets/vendor/libs/pdfmake/pdfmake.js"></script>
    <script src="<?=$path?>assets/vendor/libs/formvalidation/dist/js/FormValidation.min.js"></script>
    <script src="<?=$path?>assets/vendor/libs/formvalidation/dist/js/plugins/Bootstrap5.min.js"></script>
    <script src="<?=$path?>assets/vendor/libs/formvalidation/dist/js/plugins/AutoFocus.min.js"></script>
    <script src="<?=$path?>assets/js/main.js"></script>
  </body>
</html>
