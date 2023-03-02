<? require_once("../config.php");?>
<? require_once("helper.php");?>
<? require_once("login_check.php");?>

<?
session_start();
header("Content-type: application/vnd.ms-excel; charset=utf-16");
//header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
header("Content-Disposition: attachment; filename=report.xls");
if (isset($_GET["category"])) $category=$_GET["category"]; else $category = 0;

// if ($category>0)
// {
//   $sql= "SELECT *FROM position_categories WHERE id ='$project_id' ";
//   $result =mysqli_query($conn,$sql);
//   $data = mysqli_fetch_array($result);
//   $category_name = $data["name"];  
// }


?>
  
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <table width="100%">

      <tr>
        <th>№</th>
        <th>Нэр</th>
        <th>Утас</th>
        <th>Имэйл</th>
        <th>Ангилал</th>
        <th>Дэд ангилал</th>
        <th>Хэн</th>
        <th>Бүтгэсэн</th> 
        <th>Дүүрэг</th> 
        <th>Zip</th> 
        <th>Байршил</th> 
        <th>Коммент</th>
        <?
          $sql = "SELECT *FROM position_forms ORDER BY dd";
          $result = mysqli_query($conn,$sql);
          while ($data = mysqli_fetch_array($result))
          {
            ?>
            <th>
              <?=$data["name"];?>
            </th>
            <?
          }
        ?>
      </tr>


      <?
      $count = 0;
      $sql = "SELECT positions.*,members.name member_name,position_categories.name category_name,position_subcategories.name subcategory_name
      FROM positions 
      LEFT JOIN members ON positions.member_id=members.id 
      LEFT JOIN position_categories ON positions.category=position_categories.id 
      LEFT JOIN position_subcategories ON positions.subcategory=position_subcategories.id";

      if (isset($_GET["category"])) $sql.=" WHERE category='".$_GET["category"]."'";

      $result = mysqli_query($conn,$sql);
      while ($data = mysqli_fetch_array($result))
      {

        $position_id =  $data["id"];
        $position_name =  $data["name"];
        $position_tel =  $data["tel"];
        $position_email =  $data["email"];
        $position_comment =  $data["comment"];
        $position_registered =  $data["registered_date"];
        $member_name =$data["member_name"];
        $category_name =$data["category_name"];
        $subcategory_name =$data["subcategory_name"];

        $zip =$data["zip"];
        $zip_name =$data["zip_name"];
        $district = zip2dist($zip);
        $position_responces =$data["forms"];
          ?>
            <tr>
                <td><?=$count;?></td>
                <td><?=$position_name;?></td>
                <td><?=$position_tel;?></td>
                <td><?=$position_email;?></td>
                <td><?=$category_name;?></td>
                <td><?=$subcategory_name;?></td>
                <td><?=$member_name;?></td>
                <td><?=substr($position_registered,0,10);?></td>
                <td><?=$district;?></td>
                <td><?=$zip;?></td>
                <td><?=$zip_name;?></td>
                <td><?=$position_comment;?></td>

                <?
                  $sql_forms = "SELECT *FROM position_forms ORDER BY dd";
                  $result_forms = mysqli_query($conn,$sql_forms);
                  while ($data_forms = mysqli_fetch_array($result_forms))
                  {
                    ?>
                    <td>
                      <?
                      if ($position_responces<>'')
                      {
                        $form_id = $data_forms["id"];
                        $sql_responces= "SELECT *FROM position_formresponces WHERE form_id='$form_id' AND id IN ($position_responces)";
                        $result_responces = mysqli_query($conn,$sql_responces);
                        while ($data_responces = mysqli_fetch_array($result_responces))
                        {
                          echo $data_responces["name"];
                        }
                      }
                      ?>
                    </td>
                    <?
                  }
                ?>
            </tr>
            <?
            $count++;
              
      }
      ?>
    </table>
