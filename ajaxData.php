<?php
include 'config.php';

if(!empty($_POST['bairshil']))
{
  $result = $conn->query("select *from add_owner where branch = ".$_POST['bairshil']."");
  if($result->num_rows > 0)
  {
    echo '<option value="">Байршил сонго</option>';
    while($row = $result->fetch_assoc())
    {
      echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
    }
  }
  else
  {
    echo '<option value="">Байршил мэдээлэл байхгүй.</option>';
  }
}

if(!empty($_POST['orchin']))
{
  $result = $conn->query("select *from asset_location where bairshil = ".$_POST['orchin']."");
  if($result->num_rows > 0)
  {
    echo '<option value="">Орчин сонго</option>';
    while($row = $result->fetch_assoc())
    {
      echo '<option value="'.$row['ID'].'">'.$row['name'].'</option>';
    }
  }
  else
  {
    echo '<option value="">Байршил мэдээлэл байхгүй.</option>';
  }
}

if(!empty($_POST["branch_location"]))
{
  $result = $conn->query("select *from add_owner where branch = ".$_POST['branch_location']."");
  if($result->num_rows > 0)
  {
    echo '<option value="">Байршил сонго</option>';
    while($row = $result->fetch_assoc())
    {
      echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
    }
  }
  else
  {
    echo '<option value="">Байршил мэдээлэл байхгүй.</option>';
  }
}


// asset torloos elegdeliin vne gargah
if(!empty($_POST["type1"]))
{
  $result = mysqli_query($conn,"select month_range from category_asset a , asset_type b where a.cate_id = b.id and a.id = ".$_POST['type1']."");
  $num = mysqli_num_rows($result);
  if($num>0)
  {
    $result = mysqli_query($conn,"select month_range from category_asset a , asset_type b where a.cate_id = b.id and a.id = ".$_POST['type1']."");
    $data = mysqli_fetch_array($result);
    $month_range = $data['month_range'];
  }
  else
  {
    $month_range = '';
  }
  echo '<input type="text" name="date1_month" class="form-control" value="'.$month_range.'">';
}
// asset torloos elegdeliin vne gargah

if(!empty($_POST["salbar"]))
{
  $result = $conn->query("select *from hr_salary where branch = ".$_POST['salbar']."");
  if($result->num_rows > 0)
  {
    echo '<option value="">Цалин сонго</option>';
    while($row = $result->fetch_assoc())
    {
      echo '<option value="'.$row['id'].'">'.$row['code'].' /'.$row['note'].'</option>';
    }
  }
  else
  {
    echo '<option value="">Цалин мэдээлэл байхгүй байна.</option>';
  }
}

if(!empty($_POST["branch_type"]))
{
  $result = $conn->query("select *from branch where id = ".$_POST['branch_type']."");
  if($result->num_rows > 0)
  {
    echo '<option value="">Данс сонго</option>';
    while($row = $result->fetch_assoc())
    {
      echo '<option value="'.$row['dans'].'">'.$row['dans'].'</option>';
      echo '<option value="'.$row['dans1'].'">'.$row['dans1'].'</option>';
    }
  }
  else
  {
    echo '<option value="">Данс мэдээлэл байхгүй байна.</option>';
  }
}

if(!empty($_POST["branch_typeee"]))
{
  //$result = $conn->query("select *from branch where id = ".$_POST['branch_typeee']."");
  $result = $conn->query("select *from branch where id = 3");
  if($result->num_rows > 0)
  {
    while($row = $result->fetch_assoc())
    {
      echo '<option value="'.$row['dans'].'">'.$row['dans'].'</option>';
      echo '<option value="'.$row['dans1'].'">'.$row['dans1'].'</option>';
    }
  }
  else
  {
    echo '<option value="">Данс мэдээлэл байхгүй байна.</option>';
  }
}

if(!empty($_POST["country_id"]))
{
  $result = $conn->query("select *from employer where brchno = ".$_POST['country_id']."");
  if($result->num_rows > 0)
  {
    echo '<option value="">Ажилтан сонго</option>';
    while($row = $result->fetch_assoc())
    {
      echo '<option value="'.$row['id'].'">'.$row['fname'].'</option>';
    }
  }
  else
  {
    echo '<option value="">Багшийн мэдээлэл байхгүй байна.</option>';
  }
}

////// finance orlogo zarlaga yalgaj bna
if(!empty($_POST["typeid"]))
{
  $result = $conn->query("select *from finance_type where type1 = ".$_POST['typeid']."");
  if($result->num_rows > 0)
  {
    echo '<option value="">Төрөл сонгох</option>';
    while($row = $result->fetch_assoc())
    {
      echo '<option value="'.$row['id'].'">'.$row['type_name'].'</option>';
    }
  }
  else
  {
    echo '<option value="">Төрөл байхгүй байна.</option>';
  }
}
///////////////////

if(!empty($_POST["pro_type"]))
{
  $result = $conn->query("select *from b_product where pro_type = ".$_POST['pro_type']."");
  if($result->num_rows > 0)
  {
    echo '<option value="">Бараа сонгох</option>';
    while($row = $result->fetch_assoc())
    {
      echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
    }
  }
  else
  {
    echo '<option value="">Барааны мэдээлэл байхгүй байна.</option>';
  }
}

if(!empty($_POST["pro_type1"]))
{
  $result = $conn->query("select *from b_product where pro_type = ".$_POST['pro_type1']."");
  if($result->num_rows > 0)
  {
    echo '<option value="">Бараа сонгох</option>';
    while($row = $result->fetch_assoc())
    {
      echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
    }
  }
  else
  {
    echo '<option value="">Барааны мэдээлэл байхгүй байна.</option>';
  }
}

if(!empty($_POST["level"]))
{
  $id = $_SESSION['id'];
  if($_POST["level"]==6)
  {
    $result = $conn->query("select p.name as product_name,b.quantity as quantity from b_invoice as b, b_product as p where b.product_name=p.id and status=0");
  }
  else
  {
    $result = $conn->query("select b.id as id,p.name as product_name,b.quantity as quantity from b_invoice as b, b_product as p where b.product_name=p.id and status=0");
  }
  if($result->num_rows > 0)
  {
    echo ' <table id="statusTable" class="table table-bordered">
            <thead>
                  <tr>
                    <th>Барааны нэр</th>
                    <th>Тоо хэмжээ</th>
                    <th>Өөрчлөх</th>
                  </tr>
            </thead>
            <tbody>';
            $i=0;
    while($row = $result->fetch_assoc())
    {
      echo '<tr>
              <td style="display:none" id="checked'.$i.'">'.$row['id'].'</td>
              <td>'.$row['product_name'].'</td>
              <td>'.$row['quantity'].'</td>
              <td><div class="custom-control custom-checkbox">
              <input type="checkbox" class="custom-control-input" id="defaultUnchecked_'.$i.'">
              <label class="custom-control-label" for="defaultUnchecked_'.$i.'">Худалдаж авсан</label>
          </div></td>
              </tr>';
        $i++;
    }
    echo '</tbody>
        </table>
    <button onclick="insertStatus()" class="btn btn-primary">Хадгалах</button>';
  }
  else
  {
    echo '<h3>Жагсаалт хоосон</h3>';
  }
}

if(!empty($_POST["statusUpdate"]))
{
    $ids = $_POST["statusUpdate"];
    foreach($ids as $id)
    {
      mysqli_query($conn,"update b_invoice set status='1' where id = '$id'") or die (mysqli_error($conn));
    }
}

if(!empty($_POST["sectorID"]))
{
  echo '<table class="table table-bordered">
                	<tr>
                   <th>Бараа</th>
                   <th>Тоо хэмжээ</th>
                   <th>Захиалсан огноо</th>
                   <th>Нэхэмжлэлийн төрөл</th>
                   <th>Төлөв</th>
                   <th>Үнэ</th>
                   <th>Засах</th>
                   </tr>';
                      $id = $_SESSION['id'];
                      $level = $_SESSION['level'];
                      $sectorID = $_POST['sectorID'];
            $query = mysqli_query($conn,"select b.product_name as proname, b.description as description, b.receiver as receiver, b.date_received as received, b.id as id,p.name as product, b.quantity as quantity, b.date_invoiced as date1, b.invoice_type as itype, b.status as status, b.price as price from b_invoice as b, b_product as p,employer as e where b.product_name=p.id and b.receiver=e.id and e.brchNo = '$sectorID'") or die (mysqli_error($conn));
						while($row = mysqli_fetch_array($query))
						{
              $id = $row['id'];
              echo '<tr>
              <td style="display:none">'.$id.'</td>
              <td id="receiver_'.$id.'" style="display:none">'.$row['receiver'].'</td>
              <td id="itype_'.$id.'" style="display:none">'.$row['itype'].'</td>
              <td id="iStatus_'.$id.'" style="display:none">'.$row['status'].'</td>
              <td id="receivedDate_'.$id.'" style="display:none">'.$row['received'].'</td>
              <td id="description_'.$id.'" style="display:none">'.$row['description'].'</td>
              <td id="proName_'.$id.'">'.$row['product'].'</td>
              <td id="quantity_'.$id.'">'.$row['quantity'].'</td>
              <td id="invoicedDate_'.$id.'">'.$row['date1'].'</td>
              <td id="invoiceType_'.$id.'">';
              switch($row['itype'])
                    {
                          case 1: echo "Яаралтай"; break;
                          case 0: echo "Энгийн"; break;
                    }
              echo '</td>
              <td id="invoiceStatus_'.$id.'">';
              switch($row['status'])
                    {
                          case 1: echo "Худалдаж авсан"; break;
                          case 0: echo "Худалдаж аваагүй"; break;
                    }
              echo '</td>
              <td id="price_'.$id.'">'.$row['price'].'</td>
              <td><button data-toggle="modal" data-target="#editInvoice" onclick="showModal('.$id.')" class="btn btn-primary btnEdit">Засварлах</button></td>
              </tr>';
						}
            echo '</table>';

}

if(!empty($_POST["invoice_id"]))
{
  $result1 = $conn->query("select *from b_invoice where id = ".$_POST['invoice_id']."");
  $result = $result1->fetch_assoc();
  if(!(isset($invoice)))
  {
    $invoice = new stdClass();
  }
  $invoice->productName = $result['product_name'];
  $invoice->quantity = $result['quantity'];
  $invoice->receiver = $result['receiver'];
  $invoice->invoiceType = $result['invoice_type'];
  $invoice->dateInvoiced = $result['date_invoiced'];
  $invoice->dateReceived = $result['date_received'];
  $invoice->status = $result['status'];
  $invoice->price = $result['price'];
  $myJSON = json_encode($invoice);
  echo $myJSON;
}

if(isset($_POST['deleteID']))
{
    $id = $_POST['deleteID'];
    mysqli_query($conn,"delete from b_invoice where id = $id") or die (mysqli_error());
    echo true;
}

if(!empty($_POST["branch_id"]))
{
  $result = $conn->query("select *from sector where branch = ".$_POST['branch_id']."");
  //$result = $conn->query("select *from sector where branch = 3");
  if($result->num_rows > 0)
  {
    echo '<option value="">Бүлэг сонго</option>';
    while($row = $result->fetch_assoc())
    {
      echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
    }
  }
  else
  {
    echo '<option value="">Бүлэг мэдээлэл байхгүй байна.</option>';
  }
}
elseif(!empty($_POST["state_id"]))
{

    $result = $conn->query("select *from sector where id = ".$_POST['state_id']."");
    if($result->num_rows > 0)
    {
      while($row = $result->fetch_assoc())
      {
        echo $row['price'];
      }
    }
    else
    {
        echo 'Алдаа гарлаа';
    }
}

// asset salbaraas hariutsagch gargah
if(!empty($_POST["branch_id1"]))
{
  $result = $conn->query("select a.id , b.id emp_id, a.branch , a.owner , a.name , b.fname , b.lname , c.name branch_name from add_owner a, employer b , branch c where a.owner = b.id and a.branch = c.id and branch = ".$_POST['branch_id1']."");
  if($result->num_rows > 0)
  {
    echo '<option value="">Байршил сонго</option>';
    while($row = $result->fetch_assoc())
    {
      echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
    }
  }
  else
  {
    echo '<option value="">Байршил олдсонгүй.</option>';
  }
}


// asset salbaraas horongiin bairshil gargah asset_location
if(!empty($_POST["branch_id2"]))
{
  $result = $conn->query("select *from asset_location where brchno = ".$_POST['branch_id2']."");
  if($result->num_rows > 0)
  {
    echo '<option value="">Орчин сонго</option>';
    while($row = $result->fetch_assoc())
    {
      echo '<option value="'.$row['ID'].'">'.$row['name'].'</option>';
    }
  }
  else
  {
    echo '<option value="">Байршил олдсонгүй.</option>';
  }
}
?>
